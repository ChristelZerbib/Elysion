<?php

namespace App\Form;

use App\Entity\GlyphsList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GlyphsListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('isunique')
            ->add('description')
            ->add('bought')
            ->add('used')
            ->add('characters')
            ->add('effect')
            ->add('support')
            ->add('special')
            ->add('support_2')
            ->add('support_3')
            ->add('evol_salary')
            ->add('evol_maintenance')
            ->add('evol_staff')
            ->add('personalization')
            ->add('rarity')
            ->add('ingredient_type')
            ->add('up_feature')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GlyphsList::class,
        ]);
    }
}
