<?php

namespace Smart\Controllers;

/**
 * Description of indexController
 *
 * @author nisam <mail2nisam@gmail.com>
 */
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use Silex\Application;
use Symfony\Component\Validator\ExecutionContext;
use Smart\Models\userModel;
use PayPal\Service\PayPalAPIInterfaceServiceService,
    PayPal\EBLBaseComponents\PaymentDetailsType,
    PayPal\CoreComponentTypes\BasicAmountType,
    PayPal\EBLBaseComponents\SetExpressCheckoutRequestDetailsType,
    PayPal\EBLBaseComponents\BillingAgreementDetailsType,
    PayPal\PayPalAPI\SetExpressCheckoutRequestType,
    PayPal\PayPalAPI\SetExpressCheckoutReq,
    PayPal\EBLBaseComponents\RecurringPaymentsProfileDetailsType,
    PayPal\EBLBaseComponents\BillingPeriodDetailsType,
    PayPal\EBLBaseComponents\ScheduleDetailsType,
    PayPal\EBLBaseComponents\CreateRecurringPaymentsProfileRequestDetailsType,
    PayPal\PayPalAPI\CreateRecurringPaymentsProfileRequestType,
    PayPal\PayPalAPI\CreateRecurringPaymentsProfileReq;

class IndexController {

    public function homeAction(Application $app, Request $request) {
//        $app['session']->getFlashBag()->add('warning', 'Warning flash message');
//        $app['session']->getFlashBag()->add('info', 'Info flash message');
//        $app['session']->getFlashBag()->add('success', 'Success flash message');
//        $app['session']->getFlashBag()->add('error', 'Error flash message');
        $builder = $app['form.factory']->createBuilder('form');
        $form = $builder->add('probe', 'choice', array('choices' => array(1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10), 'label' => ''))
                ->add('subscription', 'checkbox', array('label' => 'Subscrbe', 'required' => false,))
                ->add('subscription_period', 'choice', array('choices' => array('weekly' => 'Weekly', 'monthly' => 'Monthly', 'yearly' => 'Yearly')))
                ->add('submit', 'submit')
                ->getForm();
        if ($request->isMethod('POST')) {
            if ($form->submit($request)->isValid()) {
                $formData = $form->getData();
                $subscriptionStatus = $formData['subscription'];
                $subscription_period = $formData['subscription_period'];
                $no_of_probes = $formData['probe'];
                $app['session']->set('probuct_n_subscription', (object) array('_subscription_status' => $subscriptionStatus, '__subscription_period' => $subscription_period, '__no_of_probes' => $no_of_probes));
                return $app->redirect($app['url_generator']->generate('buy_stage_one'));
            }
        }
        return $app['twig']->render('index.html.twig', array('form' => $form->createView()));
    }

    public function loginAction(Request $request, Application $app) {
        return $app['twig']->render('login.html.twig', array(
                    'error' => $app['security.last_error']($request),
                    'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    public function logoutAction(Application $app) {
        $app['session']->clear();

        return $app->redirect($app['url_generator']->generate('homepage'));
    }

    public function registerAction(Request $request, Application $app) {
        $builder = $app['form.factory']->createBuilder('form');

        $form = $builder
                ->add('username', 'text', array('constraints' => array(new Assert\NotBlank(array('message' => 'Please Enter a Username')), new Assert\Callback(array(
                            "methods" => array(function ($username, ExecutionContext $context) use ($app) {
                            if ($app['orm.em']->getRepository('Entities\Users')->findByUsername($username)) {
                                $context->addViolation("Username Already Exists");
                            }
                        }),
                                )),), 'attr' => array('required' => true, 'placeholder' => 'username')))
                ->add('password_repeated', 'repeated', array(
                    'constraints' => new Assert\NotBlank(),
                    'type' => 'password',
                    'invalid_message' => 'The password fields must match.',
                    'options' => array('required' => true),
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password'),
                ))
                ->add('email', 'email', array('constraints' => array(new Assert\NotBlank(), new Assert\Email()
                    ), 'attr' => array('required' => true, 'placeholder' => 'Email address')))
                ->add('org_name', 'text', array('constraints' => new Assert\NotBlank(), 'label' => 'Company/Business Name', 'attr' => array('required' => true, 'placeholder' => 'Business Name')))
                ->add('org_description', 'textarea', array('label' => 'Details', 'constraints' => new Assert\NotBlank(), 'attr' => array('required' => true)))
                ->add('address', 'text', array('label' => 'Street Name and Number', 'attr' => array('required' => true)))
                ->add('zip_code', 'text', array('label' => 'Zip Code', 'attr' => array('required' => true)))
                ->add('country', 'choice', array(
                    'choices' => $this->getCountry($app),
                    'preferred_choices' => array('13'),
                    'empty_value' => 'Choose a country',
                ))
                ->add('state', 'text', array('label' => 'State', 'attr' => array('class' => 'state_list', 'required' => true)))
                ->add('office_phone', 'text', array('label' => 'Office Phone', 'attr' => array('required' => false)))
                ->add('office_fax', 'text', array('label' => 'Office Fax', 'attr' => array('required' => false)))
                ->add('moile_phone', 'text', array('label' => 'Mobile Phone Number', 'attr' => array('required' => false)))
                ->add('submit', 'submit')
                ->getForm();
        if ($request->isMethod('POST')) {

            if ($form->submit($request)->isValid()) {
                $formData = $form->getData();
                $users = new \Entities\Users;
                $organization = new \Entities\Organization();
                $organization->setAddress($formData['address']);
                $organization->setCountry($formData['country']);
                $organization->setOrgName($formData['org_name']);
                $organization->setState($formData['state']);
                $organization->setOrgDescription($formData['org_description']);
                $organization->setMobilePhone($formData['moile_phone']);
                $organization->setOfficeFax($formData['office_fax']);
                $organization->setOfficePhone($formData['office_phone']);
                $organization->setZipCode($formData['zip_code']);
                $organization->setOrgCreatedAt(new \DateTime());
                $app['orm.em']->persist($organization);
                $app['orm.em']->flush();
                $orgId = $organization->getId();
                $users->setUsername($formData['username']);
                $users->setPassword($app['security.encoder.digest']->encodePassword($formData['password_repeated'], ''));
                $users->setEmail($formData['email']);
                $users->setRoles('ROLE_MASTER');
                $users->setStatus('inactive');
                $users->setActivationKey($app['security.encoder.digest']->encodePassword($formData['username'], ''));
                $users->setAccess('organizer');
                $users->setOrgId($orgId);
                $app['orm.em']->persist($users);
                if ($app['orm.em']->flush()) {
                    return $app['session']->getFlashBag()->add('success', 'New Business Added Succesfully');
                }
            } else {

                $app['session']->getFlashBag()->add('error', 'Something went wrong please check once again');
            }
        }
        $app['session']->getFlashBag()->add('success', 'New Business Added Succesfully');
        return $app['twig']->render('register.html.twig', array('form' => $form->createView()));
    }

    protected function getCountry(Application $app) {
        $countryObj = $app['orm.em']->getRepository('Entities\Countries')->findAll();
        $choices = [];
        foreach ($countryObj as $table2Obj) {
            $choices[$table2Obj->getId()] = $table2Obj->getCountryname();
        }
        return $choices;
    }

    protected function getTimeZones(Application $app) {
        $countryObj = $app['orm.em']->getRepository('Entities\Timezones')->findAll();
        $choices = [];
        foreach ($countryObj as $table2Obj) {
            $choices[$table2Obj->getId()] = $table2Obj->getTimezonename();
        }
        return $choices;
    }

    public function stateListAction(Application $app, $countryId) {
        $countryObj = $app['orm.em']->getRepository('Entities\States')->findByCountryid($countryId);
        $states = [];
        foreach ($countryObj as $table2Obj) {
            $states[$table2Obj->getId()] = $table2Obj->getStatename();
        }
        return $app['twig']->render('states.html.twig', array('states' => $countryObj));
    }

    public function newLocationAction(Application $app, Request $request) {
        // $builder = $app['form.factory']->createBuilder('form');
        $form = $app['form.factory']->create(new \Smart\Form\locationType());

        if ($request->isMethod('POST')) {
            if ($form->submit($request)->isValid()) {
                $currentUser = $app['session']->get('user');
                $formData = $form->getData();
                $location = new \Entities\Locations();
                $location->setCreatedAt(new \DateTime());
                $location->setLocAccessKey('smart_' . substr(hash_hmac('sha256', $formData->getlocName(), 'dty4523grtuy'), 0, 20));
                $location->setLocAddress($formData->getLocAddress());
                $location->setLocCity($formData->getLocCity());
                $location->setLocCountry($formData->getLocCountry());
                $location->setLocLatitude($formData->getLocLatitude());
                $location->setLocLongitude($formData->getLocLongitude());
                $location->setLocName($formData->getLocName());
                $location->setLocSecret(hash_hmac('md5', 'smartpro_' . $formData->getLocName() . rand(), 'dty4523grtuyh745t45htg487gh'));
                $location->setLocState($formData->getLocState());
                $location->setLocZip($formData->getLocZip());
                $location->setUpdatedAt(new \DateTime());
                $location->setTimeZone($formData->getTimeZone());
                $location->setOrg($app['orm.em']->getRepository('Entities\Organization')->find($currentUser->__org_id));
                $app['orm.em']->persist($location);
                if ($app['orm.em']->flush()) {
                    return $app['session']->getFlashBag()->add('success', 'New Business Added Succesfully');
                }
            }
        }
        return $app['twig']->render('new-location.html.twig', array('form' => $form->createView()));
    }

    public function testAction(Application $app) {
        $userModel = new userModel($app);
        $states = $userModel->fetchStates();

        return $app['twig']->render('doctrine.html.twig', array('posts' => $states));
    }

    public function buyerInfoAction(Application $app, Request $request) {
        if (!$app['session']->get('probuct_n_subscription')) {
            return $app->redirect($app['url_generator']->generate('homepage'));
        }
        $pructDetails = $this->priceAndSubscriptionDetails($app);

        if ($app['security']->isGranted('ROLE_USER')) {
            $token = $app['security']->getToken();
            $token->getUser();
        } else {

            $form = $app['form.factory']->create(new \Smart\Form\buyerInfoType());
            if ($request->isMethod('POST')) {
                if ($form->submit($request)->isValid()) {

                    $formData = $form->getData();
                    $entity = new \Entities\BuyerInfo();

                    $entity->setEmail($formData->getEmail());

                    $app['session']->set('buyer_email', $formData->getEmail());
                    $entity->setName($formData->getName());

                    $entity->setBillingAddress1($formData->getBillingAddress1());
                    $entity->setBillingAddress2($formData->getBillingAddress2());
                    $entity->setBillingCity($formData->getBillingCity());
                    $entity->setBillingCountry($formData->getBillingCountry());
                    $entity->setBillingState($formData->getBillingState());
                    $entity->setBillingZip($formData->getBillingZip());

                    $entity->setShipNBill(($formData->getShipNBill() == 1) ? 'Yes' : 'No');

                    $entity->setShippingAddress1($formData->getShippingAddress1());
                    $entity->setShippingAddress2($formData->getShippingAddress2());
                    $entity->setShippingCity($formData->getShippingCity());
                    $entity->setShippingCountry($formData->getShippingCountry());
                    $entity->setShippingState($formData->getShippingState());
                    $entity->setShippingZip($formData->getShippingZip());
                    $app['orm.em']->persist($entity);
                    try {
                        $app['orm.em']->flush();
                        $app['session']->set('buyer_info_id', $entity->getId());
                        $this->setExpressCheckout($app);
                    } catch (\Exception $exc) {
                        echo $exc->getTraceAsString();
                    }
                }
            }
        }
        return $app['twig']->render('buyerinfo.html.twig', array('form' => $form->createView(), 'productDetails' => $pructDetails));
    }

    public function expressResponseAction(Application $app, Request $request) {

        if ($request->query->get('token') && $request->query->get('PayerID')) {

            $token = $request->query->get('token');
            $PayerID = $request->query->get('PayerID');

            $productInfo = $this->priceAndSubscriptionDetails($app);
            $paypalService = new PayPalAPIInterfaceServiceService($app['paypal.config']);

            $doExpressCheckoutPaymentRequestDetails = new \PayPal\EBLBaseComponents\DoExpressCheckoutPaymentRequestDetailsType();
            $doExpressCheckoutPaymentRequestDetails->Token = $token;
            $doExpressCheckoutPaymentRequestDetails->PayerID = $PayerID;
            $paymentDetails = new PaymentDetailsType();

            $orderTotal = new BasicAmountType();
            $orderTotal->currencyID = 'AUD';
            $orderTotal->value = $productInfo['subTotal'];

            $paymentDetails->OrderTotal = $orderTotal;
            $paymentDetails->PaymentAction = 'Sale';
            $doExpressCheckoutPaymentRequestDetails->PaymentDetails = $paymentDetails;
            $doExpressCheckoutPaymentReq = new \PayPal\PayPalAPI\DoExpressCheckoutPaymentReq();
            $doExpressCheckoutPaymentRequest = new \PayPal\PayPalAPI\DoExpressCheckoutPaymentRequestType($doExpressCheckoutPaymentRequestDetails);
            $doExpressCheckoutPaymentReq->DoExpressCheckoutPaymentRequest = $doExpressCheckoutPaymentRequest;
            try {

                $response = $paypalService->DoExpressCheckoutPayment($doExpressCheckoutPaymentReq);
            } catch (Exception $ex) {
                
            }
            if ($response->Ack == "Success") {
                
            }
            if ($response->Ack == "Success") {
                $this->registerNewBusinessUser($app);
                $app['session']->remove('probuct_n_subscription');
                if (!empty($productInfo['subscription'])) {

                    $profileDetails = new RecurringPaymentsProfileDetailsType();
                    $profileDetails->BillingStartDate = "2014-01-01T00:00:00:000Z";

                    $paymentBillingPeriod = new BillingPeriodDetailsType();
                    $paymentBillingPeriod->BillingFrequency = 1;
                    $paymentBillingPeriod->BillingPeriod = $productInfo['subscription']->subscriptionPeriod;
                    $paymentBillingPeriod->Amount = new BasicAmountType("AUD", $productInfo['subscription']->totalSubscriptionCost);

                    $scheduleDetails = new ScheduleDetailsType();
                    $scheduleDetails->Description = $productInfo['description'];
                    $scheduleDetails->PaymentPeriod = $paymentBillingPeriod;

                    $createRPProfileRequestDetails = new CreateRecurringPaymentsProfileRequestDetailsType();
                    $createRPProfileRequestDetails->Token = $token;

                    $createRPProfileRequestDetails->ScheduleDetails = $scheduleDetails;
                    $createRPProfileRequestDetails->RecurringPaymentsProfileDetails = $profileDetails;

                    $createRPProfileRequest = new CreateRecurringPaymentsProfileRequestType();
                    $createRPProfileRequest->CreateRecurringPaymentsProfileRequestDetails = $createRPProfileRequestDetails;

                    $createRPProfileReq = new CreateRecurringPaymentsProfileReq();
                    $createRPProfileReq->CreateRecurringPaymentsProfileRequest = $createRPProfileRequest;



                    $createRPProfileResponse = $paypalService->CreateRecurringPaymentsProfile($createRPProfileReq);
                    if ($createRPProfileResponse->Ack == 'Success') {
                        return $app->redirect($app['url_generator']->generate('activate_user'));
                    }
                }  else {
                     return $app->redirect($app['url_generator']->generate('payment_thanks'));
                }
            }  else {
                return $app->redirect($app['url_generator']->generate('buy_stage_one'));
            }
            
        }
    }

    protected function priceAndSubscriptionDetails(Application $app) {
        if ($app['session']->get('probuct_n_subscription')) {

            $purchaseDetails = $app['session']->get('probuct_n_subscription');
            $subscriptionStatus = $purchaseDetails->_subscription_status;
            $subscription_period = $purchaseDetails->__subscription_period;
            $no_of_probes = $purchaseDetails->__no_of_probes;
            $subTotal = ($no_of_probes * 120) + 120;
            $totalCost = $subTotal;
            $subscriptionDetails = array();
            $description = 'Master Probe and ' . $no_of_probes . 'Probe unit(s) with a cost of $' . $subTotal;

            if ($subscriptionStatus) {
                switch ($subscription_period) {
                    case 'weekly':
                        $weekly_subscription_fee = 0.50;
                        $totalCost = $subTotal + ($no_of_probes * $weekly_subscription_fee);
                        $totalSubscription = ($no_of_probes * $weekly_subscription_fee);
                        $BillingPeriod = 'Week';
                        $description = 'Master Probe + ' . $no_of_probes . 'Probe unit(s) for $' . $subTotal . ' and  $' . $totalSubscription . ' for every Week';
                        break;
                    case 'monthly':
                        $monthly_subscription_fee = 1.50;
                        $totalCost = $subTotal + ($no_of_probes * $monthly_subscription_fee);
                        $totalSubscription = ($no_of_probes * $monthly_subscription_fee);
                        $BillingPeriod = 'Month';
                        $description = 'Master Probe + ' . $no_of_probes . 'Probe unit(s) for $' . $subTotal . 'and  $' . $totalSubscription . ' for every Month';
                        break;
                    case 'yearly':
                        $yearly_subscription_fee = 12.00;
                        $totalCost = $subTotal + ($no_of_probes * $yearly_subscription_fee);
                        $totalSubscription = ($no_of_probes * $yearly_subscription_fee);
                        $BillingPeriod = 'Year';
                        $description = 'Master Probe + ' . $no_of_probes . 'Probe unit(s) fro $' . $subTotal . ' and  $' . $totalSubscription . ' for every Year';
                        break;
                }
                $subscriptionDetails = (object) array('subscriptionStatus' => $subscriptionStatus, 'subscriptionPeriod' => $BillingPeriod, 'totalSubscriptionCost' => $totalSubscription);
            }
            return array('subTotal' => $subTotal, 'totalCost' => $totalCost, 'subscription' => $subscriptionDetails, 'description' => $description);
        } else {
            return false;
        }
    }

    protected function setExpressCheckout(Application $app) {

        $productInfo = $this->priceAndSubscriptionDetails($app);


        $paypalService = new PayPalAPIInterfaceServiceService($app['paypal.config']);
        $paymentDetails = new PaymentDetailsType();

        $orderTotal = new BasicAmountType();
        $orderTotal->currencyID = 'AUD';
        $orderTotal->value = $productInfo['subTotal'];

        $paymentDetails->OrderTotal = new BasicAmountType('AUD', $productInfo['subTotal']+2);;;
        $paymentDetails->ItemTotal  =   $orderTotal;
        $paymentDetails->PaymentAction = 'Sale';
        $paymentDetails->ShippingTotal  = 2;  

        $setECReqDetails = new SetExpressCheckoutRequestDetailsType();
        $setECReqDetails->PaymentDetails[0] = $paymentDetails;
        $setECReqDetails->CancelURL = 'http://localhost/newsilex/web/index_dev.php/buy/stage-1';
        $setECReqDetails->ReturnURL = 'http://localhost/newsilex/web/index_dev.php/buy/stage-2';

        $billingAgreementDetails = new BillingAgreementDetailsType('RecurringPayments');
        $billingAgreementDetails->BillingAgreementDescription = $productInfo['description'];
        $setECReqDetails->BillingAgreementDetails = array($billingAgreementDetails);

        $setECReqType = new SetExpressCheckoutRequestType();
        $setECReqType->Version = '104.0';
        $setECReqType->SetExpressCheckoutRequestDetails = $setECReqDetails;

        $setECReq = new SetExpressCheckoutReq();
        $setECReq->SetExpressCheckoutRequest = $setECReqType;

        $setECResponse = $paypalService->SetExpressCheckout($setECReq);

        $getExpressDetailsType = new \PayPal\PayPalAPI\GetExpressCheckoutDetailsRequestType();
        $getExpressDetailsType->Token = $setECResponse->Token;
        $getExpressCheckoutDetailsReq = new \PayPal\PayPalAPI\GetExpressCheckoutDetailsReq();
        $getExpressCheckoutDetailsReq->GetExpressCheckoutDetailsRequest = $getExpressDetailsType;
        $getExpressCheckoutResponse = $paypalService->GetExpressCheckoutDetails($getExpressCheckoutDetailsReq);

        if ($getExpressCheckoutResponse->Ack == "Success") {
            $buyerInfo = $app['orm.em']->getRepository('Entities\BuyerInfo')->find( $app['session']->get('buyer_info_id'));
            $buyerInfo->setTransactionResponse($setECResponse->Token);
            // $app['orm.em']->persist($buyerInfo);
            $app['orm.em']->flush();
            header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&useraction=commit&token=' . $setECResponse->Token);
            //return $app->redirect('https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $setECResponse->Token,301);
            exit;
        } else {
            return $getExpressCheckoutResponse;
        }
    }

    public function ajaxOrderUpdateAction(Application $app, Request $request) {
        $probeDetails = $request->query->get('probes');
        $subscription = $request->query->get('subscription');
        if ($subscription) {
            $subscriptionStatus = 1;
            $subscription_period = $subscription;
        } else {
            $subscriptionStatus = 0;
            $subscription_period = $subscription;
        }
        $no_of_probes = $probeDetails;
        $app['session']->set('probuct_n_subscription', (object) array('_subscription_status' => $subscriptionStatus, '__subscription_period' => $subscription_period, '__no_of_probes' => $no_of_probes));
        $purchaseDEtails = $this->priceAndSubscriptionDetails($app);
        $result = array('no_of_probes' => $no_of_probes, 'purchaseDEtails' => $purchaseDEtails);
        return json_encode($result);
    }

    public function ajaxPostCalculateAction(Application $app, Request $request) {
        $type = $request->query->get('type');
        $destination = $request->query->get('destination');
        $length = $request->query->get('length');
        $width = $request->query->get('width');
        $height = $request->query->get('height');
        $weight = $request->query->get('weight');
        $shipping = new \Smart\lib\AustraliaPostAPI\Shipping();

        if ($type == 'domestic') {
            $data = array(
                'from_postcode' => 4511,
                'to_postcode' => $destination,
                'weight' => $weight,
                'height' => $height,
                'width' => $width,
                'length' => $length
            );
            try {
                return new \Symfony\Component\BrowserKit\Response($shipping->getDomesticShippingCost($data));
            } catch (Exception $e) {
                return new \Symfony\Component\BrowserKit\Response($e->getMessage());
            }
        }
    }

    protected function registerNewBusinessUser(Application $app) {
        $buyerInfo = $app['orm.em']->getRepository('Entities\BuyerInfo')->find($app['session']->get('buyer_info_id'));
        $organization = new \Entities\Organization();
        $user = new \Entities\Users();
        $location = new \Entities\Locations();
        $organization->setAddress($buyerInfo->getBillingAddress1());
        $organization->setCountry($app['orm.em']->getRepository('Entities\Countries')->find($buyerInfo->getBillingCountry()));
        $organization->setState($app['orm.em']->getRepository('Entities\States')->find($buyerInfo->getBillingState()));
        $organization->setOrgCreatedAt(new \DateTime());
        $organization->setOrgName($buyerInfo->getName() . "'s New Business");
        $organization->setZipCode($buyerInfo->getBillingZip());
        $organization->setOrgDescription($buyerInfo->getName() . "'s New Business");
        $app['orm.em']->persist($organization);
        try {
            $app['orm.em']->flush();

            $location->setCreatedAt(new \DateTime());
            $location->setLocAccessKey('smart_' . substr(hash_hmac('sha256', $buyerInfo->getName(), 'dty4523grtuy'), 0, 20));
            $location->setLocSecret(hash_hmac('md5', 'smartpro_' . $buyerInfo->getName() . rand(), 'dty4523grtuyh745t45htg487gh'));
            $location->setLocAddress($buyerInfo->getShippingAddress1());
            $location->setLocCountry($app['orm.em']->getRepository('Entities\Countries')->find($buyerInfo->getShippingCountry()));
            $location->setLocState($app['orm.em']->getRepository('Entities\States')->find($buyerInfo->getShippingState()));
            $location->setLocZip($buyerInfo->getShippingZip());
            $location->setLocCity($buyerInfo->getShippingCity());
            $location->setLocName($buyerInfo->getName() . '\'s location');
            $location->setOrg($organization);
            $app['orm.em']->persist($location);
            try {
                $app['orm.em']->flush();
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
            $user->setAccess('organizer');
            $user->setActivationKey(hash_hmac('sha256', $buyerInfo->getName(), 'dty4523grtuy'));
            $user->setEmail($buyerInfo->getEmail());
            $user->setLocId($location->getId());
            $user->setOrgId($organization->getId());
            $user->setRoles('ROLE_MASTER');
            $user->setStatus('inactive');
            $user->setUsername($buyerInfo->getEmail());
            $user->setPassword($app['security.encoder.digest']->encodePassword($buyerInfo->getEmail(), ''));
            $app['orm.em']->persist($user);
            try {
                $app['orm.em']->flush();
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
