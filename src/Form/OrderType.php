<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orderCode', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('productId', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('quantity', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('address', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('shippingDate', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ;
    }
}