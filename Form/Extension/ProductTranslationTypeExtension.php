<?php

declare(strict_types = 1);

namespace LeadExt\WysiwygEditorPlugin\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductTranslationType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTranslationTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('description')
            ->remove('shortDescription')
            ->add('description', TextareaType::class, [
                'required' => false,
                'label' => 'sylius.form.product.description',
                'attr' => [
                    'class' => 'tinymce'
                ],
            ])
            ->add('shortDescription', TextareaType::class, [
                'required' => false,
                'label' => 'sylius.form.product.short_description',
                'attr' => [
                    'class' => 'tinymce'
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return ProductTranslationType::class;
    }
}

