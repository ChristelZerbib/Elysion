<?php

namespace App\Form;

use App\Entity\AlloysList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlloysListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('isunique')
            ->add('description')
            ->add('bought')
            ->add('used')
            ->add('type')
            ->add('support')
            ->add('support_3')
            ->add('support_2')
            ->add('bonus_1')
            ->add('bonus_2')
            ->add('bonus_3')
            ->add('bonus_4')
            ->add('malus_1')
            ->add('malus_2')
            ->add('malus_3')
            ->add('effect_1')
            ->add('effect_2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AlloysList::class,
        ]);
    }
}
