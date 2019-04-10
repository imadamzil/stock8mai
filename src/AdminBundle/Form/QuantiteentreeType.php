<?php

namespace AdminBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuantiteentreeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qteentree')
            ->add('dateentree')
            ->add('fou')
            ->add('pro', EntityType::class, array(
                'class' => 'AdminBundle:Produit',
                'multiple' => false,
                'label' => 'Produit',
                'attr' => array(
                    'class' => 'chosen-select',
                    'data-placeholder' => 'choose',
                    'multiple' => false

                )));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Quantiteentree'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'adminbundle_quantiteentree';
    }


}
