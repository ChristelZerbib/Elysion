<?php

namespace App\Form;

use App\Entity\ObjectsList;
use App\Entity\Titles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Doctrine\ORM\EntityRepository;

class ObjectsListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                    'attr' => ['class' => 'form-control'],
            ])
            ->add('decription', TextareaType::class, [
                    'attr' => ['class' => 'form-control'],
            ])
            ->add('comment', TextType::class, [
                    'attr' => ['class' => 'form-control'],
            ])
            ->add('shop', ChoiceType::class, [
                'choices' => $this->getShop(),
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
            ])
            ->add('price', IntegerType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('max_number', IntegerType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('personalization', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false,
            ])
            ->add('title', EntityType::class, [
                'class' => Titles::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('subtype', EntityType::class, [
                'class' => ObjectTypes::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('c')
                        ->orderBy('c.subtype', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getSubtype();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('alloy', EntityType::class, [
                'class' => AlloysList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('rarity', EntityType::class, [
                'class' => Rarity::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('r')
                        ->where("r.type = 'objet'")
                        ->orderBy('r.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('legend', EntityType::class, [
                'class' => ObjectLegend::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('u');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    $legend="";
                    if ($choice->getEveil()) {
                        $legend = "Phase d\'éveil (3)";
                    } else if ($choice->getFusion()) {
                        $legend = "Phase de Fusion (2)";
                    }
                    else if ($choice->getPartage()) {
                        $legend = "Phase de Partage (1)";
                    }
                    else {
                        $legend = "Non éveillé";
                    }
                    return $legend;},
                'attr' => ['class' => 'form-control'],
            ])
            ->add('characters', EntityType::class, [
                'class' => Characters::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('boat', EntityType::class, [
                'class' => Boats::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('c')
                        ->orderBy('c.id', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('glyph1', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph2', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph3', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph4', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph5', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph6', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph7', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph8', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph9', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('glyph10', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ObjectsList::class,
        ]);
    }
}
