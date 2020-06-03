<?php

namespace App\Form;

use App\Entity\BonusEffectsList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BonusEffectsListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('isunique')
            ->add('israre')
            ->add('description')
            ->add('add_glyph_place')
            ->add('bought')
            ->add('special')
            ->add('evol_salary')
            ->add('evol_maintenance')
            ->add('evol_staff')
            ->add('rank')
            ->add('up_feature')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BonusEffectsList::class,
        ]);
    }
}
