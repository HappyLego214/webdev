<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // FIND WAY TO REMOVE UNDERSCORE

        $builder
            ->add('description', TextType::class)
            ->add('quantity', IntegerType::class)
            ->add('price', IntegerType::class)
            ->add('name', TextType::class)
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Vape_Pen' => 0,
                    'Box_Mod' => 1,
                    'POD' => 2,
                    'Disposable' => 3,
                    'Cigalike'=> 4,
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
