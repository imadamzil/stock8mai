<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('projet')->add('sujet')->add('intervenant')->add('dateCreation')->add('sip')->add('loginInternet')->add('dateInstallation')->add('dateMes')->add('etat')->add('problemeClient')->add('etatInstallation')->add('problemeInstallation')->add('blocageClient')->add('statutActivite')->add('file')->add('technologie')->add('typeOffre')->add('kam')->add('dateGoInstallation')->add('dateActivation')->add('proprietaire')->add('offre')->add('modifiePar')->add('portabilite')->add('adressMac')->add('changementEffectue')->add('dateEnvoiFile')->add('dateMaj');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Demande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'adminbundle_demande';
    }


}
