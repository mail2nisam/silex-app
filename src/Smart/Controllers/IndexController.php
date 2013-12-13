<?php

namespace Smart\Controllers;

/**
 * Description of indexController
 *
 * @author nisam mail2nisam@gmail.com
 */
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Silex\Application;
use Symfony\Component\Validator\ExecutionContext;
use Smart\Models\userModel;

class IndexController {

    public function homeAction(Application $app) {
        $app['session']->getFlashBag()->add('warning', 'Warning flash message');
        $app['session']->getFlashBag()->add('info', 'Info flash message');
        $app['session']->getFlashBag()->add('success', 'Success flash message');
        $app['session']->getFlashBag()->add('error', 'Error flash message');

        return $app['twig']->render('index.html.twig');
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
                ->add('state', 'text', array('label' => 'State', 'attr' => array('class'=>'state_list','required' => true)))
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
    protected function getTimeZones(Application $app){
        $countryObj = $app['orm.em']->getRepository('Entities\Timezones')->findAll();
        $choices = [];
        foreach ($countryObj as $table2Obj) {
            $choices[$table2Obj->getId()] = $table2Obj->getTimezonename();
        }
        return $choices;
    }

    public function stateListAction(Application $app,$countryId){
        $countryObj = $app['orm.em']->getRepository('Entities\States')->findByCountryid($countryId);
        $states = [];
        foreach ($countryObj as $table2Obj) {
            $states[$table2Obj->getId()] = $table2Obj->getStatename();
        }
        return $app['twig']->render('states.html.twig', array('states' => $countryObj));
    }
    public function newLocationAction(Application $app, Request $request){
        // $builder = $app['form.factory']->createBuilder('form');
        $form = $app['form.factory']->create(new \Smart\Form\locationType());  
//        
//        $form = $builder
//                ->add('loc_name', 'text', array('label' => 'Location Name'))
//                ->add('loc_address', 'text', array('label' => 'Address'))
//                ->add('city', 'text', array('label' => 'City'))
//                ->add('zip_code', 'text', array('label' => 'Zip'))
//                ->add('time_zone', 'choice', array(
//                    'choices' => $this->getTimeZones($app),
//                    'empty_value' => 'Choose an country',
//                ))
//                ->add('country', 'choice', array(
//                    'choices' => $this->getCountry($app),
//                    'preferred_choices' => array('13'),
//                    'empty_value' => 'Choose a country',
//                ))
//                ->add('state', 'text', array('label' => 'State', 'attr' => array('class'=>'state_list','required' => true)))
//                ->add('loc_lat', 'hidden')
//                ->add('loc_lng', 'hidden')
//                ->add('loc_id', 'hidden')
//                ->add('submit', 'submit')
//                ->getForm();
        if ($request->isMethod('POST')) {
         if ($form->submit($request)->isValid()) {
             $currentUser    =   $app['session']->get('user');
             $formData = $form->getData();
             $location  =  new \Entities\Locations();
             $location->setCreatedAt(new \DateTime());
             $location->setLocAccessKey('smart_' . substr(hash_hmac('sha256',$formData->getlocName(), 'dty4523grtuy'), 0, 20));
             $location->setLocAddress($formData->getLocAddress());
             $location->setLocCity($formData->getLocCity());
             $location->setLocCountry($formData->getLocCountry());
             $location->setLocLatitude($formData->getLocLatitude());
             $location->setLocLongitude($formData->getLocLongitude());
             $location->setLocName($formData->getLocName());
             $location->setLocSecret(hash_hmac('md5', 'smartpro_' . $formData->getLocName(). rand(), 'dty4523grtuyh745t45htg487gh'));
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

}
