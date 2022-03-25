<?php

declare(strict_types=1);

namespace App\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color', ChoiceType::class, [
                'choices' => [
                    'None' => '',
                    'Red' => 'Red',
                    'Blue' => 'Blue',
                    'Green' => 'Green',
                ],
                'required' => true,
                'label' => 'Color',
            ]);

    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
