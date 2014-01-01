<?php

namespace Smart\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\ExecutionContext;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user Type
 *
 * @author nisam
 */
class businessType extends AbstractType {

    private $app;

    public function __construct(\Silex\Application $app) {
        $this->app = $app;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $app = $this->app;
        $builder
                ->add('username', 'text', array('constraints' => array(new Assert\NotBlank(array('message' => 'Please Enter a Username'))), 'attr' => array('required' => false, 'placeholder' => 'username')))
                ->add('password', 'repeated', array(
                    
                    'type' => 'password',
                    'invalid_message' => 'The password fields must match.',
                    'options' => array('required' => false),
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password'),
                    'first_name' => 'pass',
                    'second_name' => 'confirm',
                ))
                ->add('email', 'email', array('constraints' => array(new Assert\NotBlank(), new Assert\Email()
                    ), 'attr' => array('required' => true, 'placeholder' => 'Email address')))
                ->add('org', new orgType($app))
                ->add('loc', new locationType($app))


        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Entities\Users'
        ));
    }

    public function getName() {
        return 'business';
    }

//put your code here
}
