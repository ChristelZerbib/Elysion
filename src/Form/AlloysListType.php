<?php

namespace App\Form;

use App\Entity\AlloysList;
use App\Entity\BonusEffectsList;
use App\Entity\Ranks;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class AlloysListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                    'attr' => ['class' => 'form-control'],
            ])
            ->add('description', TextareaType::class, [
                    'attr' => ['class' => 'form-control']
            ])
            ->add('type', ChoiceType::class, [
                'choices' => $this->getTypes(),
                'attr' => ['class' => 'form-control']
                
            ])
            ->add('support', ChoiceType::class, [
                'choices' => $this->getSupport(),
                'attr' => ['class' => 'form-control']
            ])
            ->add('support_3', ChoiceType::class, [
                'choices' => $this->getSupport(),
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('support_2', ChoiceType::class, [
                'choices' => $this->getSupport(),
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('isunique', CheckboxType::class,[
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false,
            ])
            ->add('bought', CheckboxType::class,[
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false,
            ])
            ->add('used', CheckboxType::class,[
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false
            ])
            ->add('bonus_1', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "bonus");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
             ->add('bonus_2', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "bonus");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])

            ->add('bonus_3', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "bonus");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])

            ->add('bonus_4', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "bonus");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])

            ->add('malus_1', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "malus");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])

            ->add('malus_2', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "malus");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])

            ->add('malus_3', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "malus");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])

            ->add('effect_1', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "effet");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])

            ->add('effect_2', EntityType::class, [
                'class' => BonusEffectsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('b')
                        ->join('b.rank', 'r')
                        ->where('r.type = ?1')
                        ->orderBy('b.name', 'ASC')
                        ->setParameter(1, "effet");
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName() . " : ". $choice->getDescription();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
        ;
    }

        public function getTypes() {
        $results = [];
        foreach (AlloysList::TYPES as $type) {
           $results[$type] = $type;
        }
        return $results;
    }

        public function getSupport() {
        $results = [];
        foreach (AlloysList::SUPPORTS as $support) {
           $results[$support] = $support;
        }
        return $results;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AlloysList::class,
        ]);
    }
}
