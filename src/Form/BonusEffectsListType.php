<?php

namespace App\Form;

use App\Entity\BonusEffectsList;
use App\Entity\Ranks;
use App\Entity\UpFeature;
use App\Entity\FeatureTypes;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\ORM\EntityRepository;

 

class BonusEffectsListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                    'attr' => ['class' => 'form-control'],
                ])

            ->add('rank', EntityType::class, [
                'class' => Ranks::class,
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getType() . " de rang ". $choice->getNumber();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => true
            ])

            ->add('description', TextareaType::class, [
                    'attr' => ['class' => 'form-control']
            ])

            ->add('add_glyph_place', IntegerType::class, [
                    'attr' => ['class' => 'form-control']
            ])
            ->add('isunique', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false, 
            ])
            ->add('israre', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false, 
            ])
            ->add('bought', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false, 
            ])
            ->add('special', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false, 
            ])
            ->add('evol_salary', IntegerType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('evol_maintenance', NumberType::class, [
                'help' => '(1 pour un coût réduit de 100%, 0.5 pour un coût réduit de 50%, 0 si aucune réduction)',
                'attr' => ['class' => 'form-control'],
                'invalid_message' => 'Seules 0, 0.5 et 1 sont des valeurs acceptées'
            ])
            ->add('evol_staff', NumberType::class, [
                'help' => '(1 pour un coût réduit de 100%, 0.5 pour un coût réduit de 50%, 0 si aucune réduction)', 
                'attr' => ['class' => 'form-control'],
                'invalid_message' => 'Seules 0, 0.5 et 1 sont des valeurs acceptées'

            ])
            ->add('up_feature', EntityType::class, [
                'class' => UpFeature::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('u')
                        ->join('u.feature', 'f')
                        ->orderBy('f.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    $tempo="";
                    if ($choice->getTemporary()) {
                        $tempo = "temporaire";
                    } else {
                        $tempo = "permanent";
                    }
                    return $choice->getFeature()->getName() . " ( " . $choice->getUpQuantity() . " )  - " . $tempo;},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
                'multiple' => true,
                'help' => '(Appuyez sur Ctrl pour sélectionner deux valeurs)'
            ])
             
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BonusEffectsList::class
        ]);
    }
}
