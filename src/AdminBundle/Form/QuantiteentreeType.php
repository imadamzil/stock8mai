<?php

namespace AdminBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
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
            ->add('pro', EntityType::class, array(
                'class' => 'AdminBundle:Produit',
                'multiple' => false,
                'label' => 'Produit: ',
                'attr' => array(
                    'class' => 'chosen-select',
                    'data-placeholder' => 'Choisir un Produit',
                    'multiple' => false

                )))
            ->add('qteentree')

            ->add('dateentree', DateTimeType::class, [
                'widget' => 'single_text',

                // prevents rendering it as type="date", to avoid HTML5 date pickers
                'html5' => false,

                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'date-timepicker1'],
            ])
            ->add('fou', EntityType::class, array(
                'class' => 'AdminBundle:Fournisseur',
                'multiple' => false,
                'label' => 'Fournisseur: ',
                'attr' => array(
                    'class' => 'chosen-select',
                    'data-placeholder' => 'Choisir un fournisseur',
                    'multiple' => false

                )));
    }

    /**
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
