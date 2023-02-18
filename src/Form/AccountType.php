<?php

namespace App\Form;

use App\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomComplet')
            ->add('NumTel')
            ->add('Email')
            ->add('Sexe', ChoiceType::class, array(
                'choices' => array(
                    'Male' => 'male',
                    'Female' => 'female',
                    'Other' => 'other',
                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('DateNaiss', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('Adresse')
            ->add('Ville')
            ->add('CarteCIN', FileType::class, [
                "attr" =>[
                    "class" =>"form-control"],
                'data_class' => null,
                'required' => false,]) 
            ->add('Services', CheckboxType::class, [
                'label'    => 'Quels Services Voulez Vous Choisir?',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }
}
