<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class,
                ['label' => 'Nom d\'utilisateur'])
            ->add('firstName', TextType::class,
                ['label' => 'Prénom'])
            ->add('lastName', TextType::class,
                ['label' => 'Nom'])
            ->add('password', PasswordType::class,
                ['label' => 'Mot de passe'])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'Valider btn btn-primary'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
