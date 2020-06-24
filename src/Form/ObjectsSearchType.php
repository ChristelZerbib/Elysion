<?php

namespace App\Form;

use App\Entity\GlyphsList;
use App\Entity\ObjectsList;
use App\Entity\ObjectTypes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


class ObjectsSearchType extends AbstractType
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

            ->add('type', ChoiceType::class,[
                'choices'  =>  $this->getTypes(),
                'label'=>'Type : ',
                'attr'=>[
                    'class'=>'form-control',
                ],
                'required'=>false,
                'placeholder' => 'Afficher tout'

            ])

            ->add('subtype',  EntityType::class, [
                'class' => ObjectTypes::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('t')->orderBy('t.subtype', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getSubtype();},
                'choice_attr' => function($choice, $key, $value) {
                    return ['data-type'=>$choice->getType()];
                },
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false
            ])
            ->add('shop', ChoiceType::class,[
                'choices'  =>  $this->getShop(),
                'label'=>'Boutique : ',
                'attr'=>[
                    'class'=>'form-control',
                ],
                'required'=>false,
                'placeholder' => 'Afficher tout'

            ])
            
            ->add('validate', SubmitType::class,[
                'attr'=>[
                   'class'=>'btn btn-dark border-info text-info float-right',
                ],
            ]);

    }

    public function getShop(){
        $results = [];
        foreach (ObjectsList::SHOP as $shop) {
           $results[$shop] = $shop;
        }
        return $results;
    }

    public function getTypes(){
        $results = [];
        foreach (ObjectsList::TYPES as $types) {
           $results[$types] = $types;
        }
        return $results;
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
