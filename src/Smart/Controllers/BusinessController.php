<?php

namespace Smart\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use Silex\Application;
use Symfony\Component\Validator\ExecutionContext;

/**
 * Description of AjaxController
 *
 * @author uvj
 */
class BusinessController {

    public function listLocationAction(Application $app) {
        $user=$app['security.smart.user'];
        $business=$user->getOrg();
        $locations = $app['orm.em']->getRepository('Entities\Locations')->findByOrg($business);
        return $app['twig']->render('locations.html.twig',array('locations'=>$locations));
    }
    public function editLocationAction(Application $app, Request $request,$id) {
        $location = $app['orm.em']->getRepository('Entities\Locations')->find($id);
        $form = $app['form.factory']->create(new \Smart\Form\locationType(),$location);

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
                
                if ($app['orm.em']->flush()) {
                    return $app['session']->getFlashBag()->add('success', 'Location  Succesfully');
                }
            }
        }
        return $app['twig']->render('edit-location.html.twig', array('form' => $form->createView()));
    }
    public function resetAccessKeyAction(Application $app,  Request $request,$accesskey){
        $location = $app['orm.em']->getRepository('Entities\Locations')->findOneByLocAccessKey($accesskey);
        $location->setLocSecret(hash_hmac('md5', 'smartpro_' . $location->getLocName() . rand(), 'dty4523grtuyh745t45htg487gh'));
        $app['orm.em']->flush();
        return json_encode($location->getLocSecret());
    }

}
