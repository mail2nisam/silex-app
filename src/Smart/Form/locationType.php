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
class locationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('loc_name', 'text', array('constraints' => array(new Assert\NotBlank()),'label' => 'Location Name', 'attr' => array('required' => true, 'placeholder' => 'Location Name')))
                ->add('loc_address', 'text',array('constraints' => array(new Assert\NotBlank()),'label' => 'Address', 'attr' => array('required' => true, 'placeholder' => 'Location Address')))
                ->add('locCity', 'text', array('label' => 'City'))
                ->add('locZip', 'text', array('label' => 'Zip'))
                ->add('locCountry','entity',array('class'=>'Entities\Countries','empty_value' => 'Choose a country'))
                ->add('timeZone')
                ->add('locState','entity',array('class'=>'Entities\States','empty_value' => 'Choose a state'))
                ->add('locLatitude', 'hidden')
                ->add('locLongitude', 'hidden');
              
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Entities\Locations', 'countryid' => null
        ));
    }

    public function getName() {
        return 'location';
    }

//put your code here
}
