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
class orgType extends AbstractType {
    private $app;
    public function __construct(\Silex\Application $app)
    {
        $this->app = $app;
    }
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $app =  $this->app;
        $builder
                ->add('org_name', 'text', array('constraints' => new Assert\NotBlank(), 'label' => 'Company/Business Name', 'attr' => array('required' => true, 'placeholder' => 'Business Name')))
                ->add('org_description', 'textarea', array('label' => 'Details', 'constraints' => new Assert\NotBlank(), 'attr' => array('required' => true)))
                ->add('address', 'text', array('label' => 'Street Name and Number', 'attr' => array('required' => true)))
                ->add('zip_code', 'text', array('label' => 'Zip Code', 'attr' => array('required' => true)))
                ->add('country', 'entity',array('class'=>'Entities\Countries','empty_value' => 'Choose a country'))
                ->add('state', 'entity',array('class'=>'Entities\States','empty_value' => 'Choose a state'))
                ->add('office_phone', 'text', array('label' => 'Office Phone', 'attr' => array('required' => false)))
                ->add('office_fax', 'text', array('label' => 'Office Fax', 'attr' => array('required' => false)))
               
            ;
                
    }

    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Entities\Organization'
        ));
    }

    public function getName() {
        return 'org';
    }

//put your code here
}
