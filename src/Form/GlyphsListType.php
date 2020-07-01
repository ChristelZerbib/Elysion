<?php

namespace App\Form;

use App\Entity\GlyphsList;
use App\Entity\Characters;
use App\Entity\Rarity;
use App\Entity\IngredientTypes;
use App\Entity\UpFeature;
use App\Entity\FeatureTypes;
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

class GlyphsListType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                    'attr' => ['class' => 'form-control'],
            ])
            ->add('price', IntegerType::class, [
                    'attr' => ['class' => 'form-control']
            ])
            ->add('isunique', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false,
            ])
            ->add('description', TextareaType::class, [
                    'attr' => ['class' => 'form-control'],
            ])
            ->add('bought', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false,
            ])
            ->add('used', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false,
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
            ->add('effect', ChoiceType::class, [
                'choices' => $this->getEffect(),
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
            ])
            ->add('support', ChoiceType::class, [
                'choices' => $this->getSupport(),
                'attr' => ['class' => 'form-control'],
                'empty_data' => null, 
            ])
            ->add('special', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false,
            ])
            ->add('support_2', ChoiceType::class, [
                'choices' => $this->getSupport(),
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('support_3', ChoiceType::class, [
                'choices' => $this->getSupport(),
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('evol_salary', IntegerType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('evol_maintenance', NumberType::class, [
                'help' => '(1 pour un coût réduit de 100%, 0.5 pour un coût réduit de 50%, 0 si aucune réduction)',
                'attr' => ['class' => 'form-control']
            ])
            ->add('evol_staff', NumberType::class, [
                'help' => '(1 pour un coût réduit de 100%, 0.5 pour un coût réduit de 50%, 0 si aucune réduction)', 
                'attr' => ['class' => 'form-control']
            ])
            ->add('personalization', CheckboxType::class, [
                    'attr' => ['class' => 'form-check-input'],
                    'required' => false,
            ])
            ->add('rarity', EntityType::class, [
                'class' => Rarity::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('r')
                        ->where("r.type = 'glyphe'")
                        ->orderBy('r.name', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getName();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
                'required' => false, 
            ])
            ->add('ingredient_type', EntityType::class, [
                'class' => IngredientTypes::class,
                'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('i')
                        ->orderBy('i.type', 'ASC');
                        },
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->getType();},
                'attr' => ['class' => 'form-control'],
                'empty_data' => null,
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
            'data_class' => GlyphsList::class,
        ]);
    }

    public function getEffect(){
        $results = [];
        foreach (GlyphsList::EFFECTS as $effect) {
           $results[$effect] = $effect;
        }
        return $results;
    }
    public function getSupport(){
        $results = [];
        foreach (GlyphsList::SUPPORTS as $support) {
           $results[$support] = $support;
        }
        return $results;
    }
}
