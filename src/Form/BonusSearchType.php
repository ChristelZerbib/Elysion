<?php

namespace App\Form;

use App\Entity\AlloysList;
use App\Entity\BonusEffectsList;
use App\Entity\Ranks;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


class BonusSearchType extends AbstractType
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
                'class' => Ranks::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('r')
                        ->groupBy('r.type');
                        },
                        'choice_label' => function ($choice, $key, $value) {
                    return $choice->getType();},
                    'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('rank', EntityType::class, [
                'class' => Ranks::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('rk')
                        ->groupBy('rk.number');
                        },
                        'choice_label' => function ($choice, $key, $value) {
                    return $choice->getNumber();},
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
