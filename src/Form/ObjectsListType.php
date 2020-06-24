<?php

namespace App\Form;

use App\Entity\ObjectsList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectsListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('comment')
            ->add('shop')
            ->add('price')
            ->add('max_number')
            ->add('personalization')
            ->add('title')
            ->add('subtype')
            ->add('alloy')
            ->add('rarity')
            ->add('legend')
            ->add('characters')
            ->add('boat')
            ->add('glyph1')
            ->add('glyph2')
            ->add('glyph3')
            ->add('glyph4')
            ->add('glyph5')
            ->add('glyph6')
            ->add('glyph7')
            ->add('glyph8')
            ->add('glyph9')
            ->add('glyph10')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ObjectsList::class,
        ]);
    }
}
