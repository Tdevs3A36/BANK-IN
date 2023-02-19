<?php

namespace App\Form;

use App\Entity\Depenses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class DepensesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('prenom_destinataire')
            ->add('rib_destinataire')
            ->add('montant')
            ->add('backgroundcolor',ColorType::class)
            ->add('datedebut',DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('categorie_depense',ChoiceType::class, [
                'choices'  => [
                    'aa' => 'aa',
                    'bb' => 'bb',
                    
                ],
            ])
            ->add('type_depense',ChoiceType::class, [
                'choices'  => [
                    'virement' => 'virement',
                    'cash' => 'cash',
                    
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Depenses::class,
        ]);
    }
}
