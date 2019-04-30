<?php

namespace AdminBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoncommandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('datecomm')
           ->add('datecomm', DateType::class, [
               'widget' => 'single_text',
             //  'format' => 'DD/MM/YYYY',
               'html5'=>false,

               // prevents rendering it as type="date", to avoid HTML5 date pickers

               // adds a class that can be selected in JavaScript
              'attr' => ['class' => 'js-datepicker'],
           ])
            ->add('pre',EntityType::class,array(
                'class'=>'AdminBundle:Prestataire',
                'label'=>'Prestataire'
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Boncommande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'adminbundle_boncommande';
    }


}
