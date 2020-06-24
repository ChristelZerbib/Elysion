<?php

namespace App\Form;

use App\Entity\GlyphsList;
use App\Entity\IngredientTypes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


class GlyphsSearchType extends AbstractType
{
    // private $entityManager;

    // public function __construct(EntityManagerInterface $entityManager)
    // {
    //     $this->entityManager = $entityManager;

        // parent::__construct();
    // }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recherche', TextType::class, [
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Rechercher par mot-clé'

                ],
                'required'=>false,
            ])
            ->add('order', ChoiceType::class, [
                'choices' => [
                    'Tri par ordre alphabétique' => 'alpha',
                    'Tri par prix croissant' => 'price',
                ],
                'expanded' =>true, 
                'multiple' => false, 
                'data' => 'alpha'
                
            ])

            ->add('type',  EntityType::class, [
                'class' => IngredientTypes::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('i');
                              $er->groupBy('i.type');
                        },
                        'choice_label' => function ($choice, $key, $value) {
                    return $choice->getType();},
                    'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('effect',  EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('g')
                        ->where("g.effect != ''")
                        ->groupBy('g.effect')
                    ;
                },
                'choice_label' => function ($choice, $key, $value) {
                        return $choice->getEffect();
                },
                    'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('support', EntityType::class, [
                'class' => GlyphsList::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('g')
                        ->where("g.support != ''")
                        ->groupBy('g.support');
                        },
                        'choice_label' => function ($choice, $key, $value) {
                    return $choice->getSupport();},
                    'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('validate', SubmitType::class,[
                'attr'=>[
                   'class'=>'btn btn-dark border-info text-info float-right',
                ],
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // 'data_class' => AlloysList::class,
            // 'entityManager' => null
        ]);
    }

    
    // public function getAlloysTypes($options) {
    //    $result = $options['entityManager']->createQueryBuilder()
    //         ->select('a.type')
    //         ->from(AlloysList::class, 'a')
    //         ->distinct()
    //         ->getQuery()
    //         ->getResult();


    // }
    // public function getAlloysSupport($options) {
    //    $result = $options['entityManager']->createQueryBuilder()
    //         ->select('a.support')
    //         ->from(AlloysList::class, 'a')
    //         ->distinct()
    //         ->getQuery()
    //         ->getResult();


    // }
}
