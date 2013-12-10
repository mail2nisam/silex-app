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
//            $include = array(
//                'error' => $this->app['security.last_error']($request),
//                'last_username' => $this->app['session']->get('_security.last_username'),
//            );
            return $this->app->redirect($this->app['url_generator']->generate('homepage'));
        }
    }

}