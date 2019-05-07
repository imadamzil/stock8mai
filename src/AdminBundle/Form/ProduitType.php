<?php

namespace AdminBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('reference')
            ->add('labelle')
            ->add('description', TextareaType::class)
            ->add('cat', EntityType::class, array(
                'class' => 'AdminBundle:Categorie',
                'multiple' => false,
                'label' => 'Categorie: ',
                'attr' => array(
                    'class' => 'chosen-select',
                    'data-placeholder' => 'Choisir une Catégorie',
                    'multiple' => false

                )))->add('per');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'adminbundle_produit';
    }


}
