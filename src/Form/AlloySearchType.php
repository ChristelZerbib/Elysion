<?php

namespace App\Form;

use App\Entity\AlloysList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Doctrine\ORM\EntityManagerInterface;
// use Doctrine\ORM\Query;


class AlloySearchType extends AbstractType
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
                'label'=>'Type d\'alliage : ',
                'attr'=>[
                    'class'=>'form-control',
                ],
                'required'=>false,
                'placeholder' => 'Afficher tout'

            ])
            ->add('support', ChoiceType::class,[
                'choices'  => $this->getSupport(),
                'label'=>'Supports : ',
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // 'data_class' => AlloysList::class,
            // 'entityManager' => null
        ]);
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

    public function getBonusEffect() {
        $results = [];
        foreach (AlloysList::SUPPORTS as $support) {
           $results[$support] = $support;
        }
        return $results;
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
