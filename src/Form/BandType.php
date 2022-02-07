<?php

namespace App\Form;

use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
                ['label' => 'Nom du groupe'])
            ->add('style', TextType::class,
                ['label' => 'Style'])
            ->add('picture', FileType::class,
                ['label' => 'Photo',
                'data_class' => null])
            ->add('info', TextType::class,
                ['label' => 'Description',
                'required' => false])
            ->add('artists', EntityType::class,
                ['class' => Artist::class,
                'choice_label' => 'name',
                'multiple' => true])
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
