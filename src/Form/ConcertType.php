<?php

namespace App\Form;

use App\Entity\Band;
use App\Entity\Concert;
use App\Entity\ConcertHall;
use App\Entity\Management;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConcertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class,
                ['widget' => 'choice',
                'format' => 'dd / MM / yyyy'
                ])
            ->add('name', TextType::class,
                ['label' => 'Nom de la tournée'])
            ->add('poster', FileType::class,
                ['label' => 'Poster de l\'événement',
                'data' => '',
                'required' => false])
            ->add('info', TextType::class,
                ['label' => 'Description'])
            ->add('concertHall', EntityType::class,
                ['class' => ConcertHall::class,
                'choice_label' => 'name'])
            ->add('openingBand', EntityType::class,
                ['class' => Band::class,
                'choice_label' => 'name',
                'required' => false])
            ->add('mainBand', EntityType::class,
                ['class' => Band::class,
                'choice_label' => 'name'])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'Valider btn btn-primary'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concert::class,
        ]);
    }
}
