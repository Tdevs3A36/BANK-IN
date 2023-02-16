<?php

namespace App\Form;

use App\Entity\Pret;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PretType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_complet')
            ->add('date_naissance')
            ->add('telephone')
            ->add('email')
            ->add('ville')
            ->add('region')
            ->add('zip_code')
            ->add('country')
            ->add('location')
            ->add('montant')
            ->add('raison')
            ->add('poste')
            ->add('debut_travail')
            ->add('revenu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pret::class,
        ]);
    }
}
