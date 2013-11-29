<?php

namespace Smart\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of indexController
 *
 * @author uvj
 */
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Silex\Application;
use Symfony\Component\Validator\ExecutionContext;
use Smart\Models\userModel;

class IndexController
{
    public function homeAction(Application $app)
    {
        $app['session']->getFlashBag()->add('warning', 'Warning flash message');
        $app['session']->getFlashBag()->add('info', 'Info flash message');
        $app['session']->getFlashBag()->add('success', 'Success flash message');
        $app['session']->getFlashBag()->add('error', 'Error flash message');

        return $app['twig']->render('index.html.twig');
    }

    public function loginAction(Request $request, Application $app)
    {
        return $app['twig']->render('login.html.twig', array(
                    'error' => $app['security.last_error']($request),
                    'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    public function logoutAction(Application $app)
    {
        $app['session']->clear();

        return $app->redirect($app['url_generator']->generate('homepage'));
    }

    public function registerAction(Request $request, Application $app)
    {
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
                ->add('org_name', 'text', array('constraints' => new Assert\NotBlank(), 'attr' => array('required' => true, 'placeholder' => 'Business Name')))
                ->add('org_description', 'textarea', array('constraints' => new Assert\NotBlank(), 'attr' => array('required' => true)))
                ->add('submit', 'submit')
                ->getForm();
        if ($request->isMethod('POST')) {
            if ($form->submit($request)->isValid()) {
                $formData = $form->getData();
                $users = new \Entities\Users;
                //$users = $app['orm.em']->getRepository('Entities\Users');
                $users->setUsername($formData['username']);
                $users->setPassword($app['security.encoder.digest']->encodePassword($formData['password_repeated'], ''));
                $users->setEmail($formData['email']);
                $users->setRoles(serialize(array('ROLE_USER','ROLE_MASTER')));
                $users->setStatus('inactive');
                $users->setActivationKey($app['security.encoder.digest']->encodePassword($formData['username'], ''));
                $users->setAccess('organizer');
                $app['orm.em']->persist($users);
                $app['orm.em']->flush();
            } else {
                // $form->addError(new FormError('This is a global error'));
                $app['session']->getFlashBag()->add('error', 'Plesae ensure all data to be filled');
            }
        }

        return $app['twig']->render('register.html.twig', array('form' => $form->createView()));
    }

    public function testAction(Application $app)
    {
        $userModel = new userModel($app);
        $states = $userModel->fetchStates();

        return $app['twig']->render('doctrine.html.twig', array('posts' => $states));
    }

}
