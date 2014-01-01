<?php

namespace Smart\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;


/**
 * Description of successHandler
 * Login Success Handler
 * 
 * @author nisam mail2nisam@gmail.com
 */
class successHandler implements AuthenticationSuccessHandlerInterface {

    public function __construct(\Silex\Application $app) {
        $this->app = $app;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
        
        if ($this->app['security']->isGranted('ROLE_ADMIN')) {
//            $include = array(
//                'error' => $this->app['security.last_error']($request),
//                'last_username' => $this->app['session']->get('_security.last_username'),
//                'granted' => true
//            );
            return $this->app->redirect($this->app['url_generator']->generate('admin_index'));
        } else {
              $currentUserObj   =   $this->app['orm.em']->getRepository('Entities\Users')->findByUsername($token->getUsername());
              $currentUser = $currentUserObj[0]  ;
              //var_dump($currentUser[0]);exit;
              $org  =   $currentUser->getOrg();
             
              $loc  =   $currentUser->getLoc();
              if(!null==$loc){
                  $locID   =   $loc->getId();
              }else{
                  $locID   =   0;
              }
              if(!null==$org){
                  $orgID   =   $org->getId();
              }else{
                  $orgID   =   0;
              }
               //var_dump($loc);
            $this->app['session']->set('user', (object)array('__org_id' => $orgID,'__loc_id'=>$locID));
//            $include = array(
//                'error' => $this->app['security.last_error']($request),
//                'last_username' => $this->app['session']->get('_security.last_username'),
//            );
          //  $userSession    =   $this->app['session']->get('user');
         //   var_dump($userSession->__org_id);exit;
            return $this->app->redirect($this->app['url_generator']->generate('homepage'));
        }
    }

}