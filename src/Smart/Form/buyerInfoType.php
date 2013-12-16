<?php

namespace Smart\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of locationType
 *
 * @author nisam
 */
class buyerInfoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text',array('constraints' => array(new Assert\NotBlank()),'label' => 'Name', 'attr' => array('required' => true, 'placeholder' => 'Name')))
                ->add('email', 'email', array('constraints' => array(new Assert\NotBlank(),new Assert\Email()),'label' => 'Email', 'attr' => array('required' => true, 'placeholder' => 'Email')))
                ->add('billingAddress1', 'text',array('constraints' => array(new Assert\NotBlank()),'label' => 'Billing Address', 'attr' => array('required' => true, 'placeholder' => 'Billing Address')))
                ->add('billingAddress2', 'text', array('label' => 'Billing Address2','attr' => array('required' => false, 'placeholder' => 'Billing Address2')))
                ->add('billingCity', 'text', array('constraints'=>array(new Assert\NotBlank()),'label' => 'City','attr'=>array('placeholder'=>'Billing City')))
                ->add('billingZip', 'text', array('constraints'=>array(new Assert\NotBlank()),'label' => 'PostCode/Zip','attr'=>array('placeholder'=>'PostCode/Zip')))
                ->add('billingCountry','entity',array('class'=>'Entities\Countries','empty_value' => 'Choose a country'))
                ->add('billingState','entity',array('class'=>'Entities\States','empty_value' => 'Choose a state'))
                
                ->add('shippingAddress1', 'text',array('constraints' => array(new Assert\NotBlank()),'label' => 'Shipping Address', 'attr' => array('required' => true, 'placeholder' => 'Shipping Address')))
                ->add('shippingAddress2', 'text', array('label' => 'Shipping Address2','attr' => array('required' => false, 'placeholder' => 'Shipping Address2')))
                ->add('shippingCity', 'text', array('constraints'=>array(new Assert\NotBlank()),'label' => 'City','attr'=>array('placeholder'=>'Shipping City')))
                ->add('shippingZip', 'text', array('constraints'=>array(new Assert\NotBlank()),'label' => 'PostCode/Zip','attr'=>array('placeholder'=>'PostCode/Zip')))
                ->add('shippingCountry','entity',array('class'=>'Entities\Countries','empty_value' => 'Choose a country'))
                ->add('shippingState','entity',array('class'=>'Entities\States','empty_value' => 'Choose a state'))
                ->add('ship_n_bill', 'checkbox',array('label' => 'Shipping Address is same as Billing address'))
                ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Entities\BuyerInfo'
        ));
    }

    public function getName() {
        return 'BuyerInfo';
    }

//put your code here
}
