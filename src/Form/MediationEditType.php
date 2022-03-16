<?php

namespace App\Form;

use App\Entity\Mediations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediationEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('particulier_nom')
            ->add('particulier_prenom')
            ->add('particulier_email')
            ->add('particulier_tel')
            ->add('entreprise_nom')
            ->add('entreprise_email')
            ->add('entreprise_tel')
            ->add('entreprise_avocat')
            ->add('particulier_avocat')
            ->add('article')
            ->add('paiement')
            ->add('remboursement')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mediations::class,
        ]);
    }
}
