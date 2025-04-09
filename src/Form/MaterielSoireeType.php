<?php

namespace App\Form;

use App\Entity\Material;
use App\Entity\MaterielSoiree;
use App\Entity\Party;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterielSoireeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bookingDate', null, [
                'widget' => 'single_text',
            ])
            ->add('materiel', EntityType::class, [
                'class' => Material::class,
                'choice_label' => 'name',
            ])
            ->add('party', EntityType::class, [
                'class' => Party::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MaterielSoiree::class,
        ]);
    }
}