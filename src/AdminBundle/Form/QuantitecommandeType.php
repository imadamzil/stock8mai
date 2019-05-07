<?php

namespace AdminBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuantitecommandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder  ->add('bon', BoncommandeType::class,array('label'=>'Bon de commande'))
            ->add('qtecomm')
            ->add('pro', EntityType::class, array(
                'class' => 'AdminBundle:Produit',
                'multiple' => false,
                'label' => 'Produit: ',
                'attr' => array(
                    'class' => 'chosen-select',
                    'data-placeholder' => 'Choisir un produit',
                    'multiple' => false

                )));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Quantitecommande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'adminbundle_quantitecommande';
    }


}
