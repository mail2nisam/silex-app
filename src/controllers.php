<?php

use Symfony\Component\Routing\RouteCollection;
use Silex\Application;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

$app['routes'] = $app->extend('routes', function (RouteCollection $routes, Application $app) {
    $loader     = new YamlFileLoader(new FileLocator('../resources/config'));
    $collection = $loader->load('routes.yml');
    $routes->addCollection($collection);

    return $routes;
});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message, $code);
});

//
//$app->match('/form', function (Request $request) use ($app) {
//
//    $builder = $app['form.factory']->createBuilder('form');
//    $choices = array('choice a', 'choice b', 'choice c');
//
//    $form = $builder
//        ->add(
//            $builder->create('sub-form', 'form')
//                ->add('subformemail1', 'email', array(
//                    'constraints' => array(new Assert\NotBlank(), new Assert\Email()),
//                    'attr'        => array('placeholder' => 'email constraints'),
//                    'label'       => 'A custom label : ',
//                ))
//                ->add('subformtext1', 'text')
//        )
//        ->add('text1', 'text', array(
//            'constraints' => new Assert\NotBlank(),
//            'attr'        => array('placeholder' => 'not blank constraints')
//        ))
//        ->add('text2', 'text', array('attr' => array('class' => 'span1', 'placeholder' => '.span1')))
//        ->add('text3', 'text', array('attr' => array('class' => 'span2', 'placeholder' => '.span2')))
//        ->add('text4', 'text', array('attr' => array('class' => 'span3', 'placeholder' => '.span3')))
//        ->add('text5', 'text', array('attr' => array('class' => 'span4', 'placeholder' => '.span4')))
//        ->add('text6', 'text', array('attr' => array('class' => 'span5', 'placeholder' => '.span5')))
//        ->add('text8', 'text', array('disabled' => true, 'attr' => array('placeholder' => 'disabled field')))
//        ->add('textarea', 'textarea')
//        ->add('email', 'email')
//        ->add('integer', 'integer')
//        ->add('money', 'money')
//        ->add('number', 'number')
//        ->add('password', 'password')
//        ->add('percent', 'percent')
//        ->add('search', 'search')
//        ->add('url', 'url')
//        ->add('choice1', 'choice',  array(
//            'choices'  => $choices,
//            'multiple' => true,
//            'expanded' => true
//        ))
//        ->add('choice2', 'choice',  array(
//            'choices'  => $choices,
//            'multiple' => false,
//            'expanded' => true
//        ))
//        ->add('choice3', 'choice',  array(
//            'choices'  => $choices,
//            'multiple' => true,
//            'expanded' => false
//        ))
//        ->add('choice4', 'choice',  array(
//            'choices'  => $choices,
//            'multiple' => false,
//            'expanded' => false
//        ))
//        ->add('country', 'country')
//        ->add('language', 'language')
//        ->add('locale', 'locale')
//        ->add('timezone', 'timezone')
//        ->add('date', 'date')
//        ->add('datetime', 'datetime')
//        ->add('time', 'time')
//        ->add('birthday', 'birthday')
//        ->add('checkbox', 'checkbox')
//        ->add('file', 'file')
//        ->add('radio', 'radio')
//        ->add('password_repeated', 'repeated', array(
//            'type'            => 'password',
//            'invalid_message' => 'The password fields must match.',
//            'options'         => array('required' => true),
//            'first_options'   => array('label' => 'Password'),
//            'second_options'  => array('label' => 'Repeat Password'),
//        ))
//        ->add('submit', 'submit')
//        ->getForm()
//    ;
//
//    if ($request->isMethod('POST')) {
//        if ($form->submit($request)->isValid()) {
//            $app['session']->getFlashBag()->add('success', 'The form is valid');
//        } else {
//            $form->addError(new FormError('This is a global error'));
//            $app['session']->getFlashBag()->add('info', 'The form is bind, but not valid');
//        }
//    }
//
//    return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
//})->bind('form');

//$app->get('/page-with-cache', function () use ($app) {
//    $response = new Response($app['twig']->render('page-with-cache.html.twig', array('date' => date('Y-M-d h:i:s'))));
//    $response->setTtl(10);
//
//    return $response;
//})->bind('page_with_cache');

return $app;
