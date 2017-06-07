<?php

declare(strict_types = 1);

namespace LeadExt\WysiwygEditorPlugin\Form\Extension;

use LeadExt\WysiwygEditorPlugin\Form\TextWysiwygType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductTranslationType;
use Symfony\Component\Form\AbstractTypeExtension;
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
            ->add('description', TextWysiwygType::class, [
                'required' => false,
                'label' => 'sylius.form.product.description',
            ])
            ->add('shortDescription', TextWysiwygType::class, [
                'required' => false,
                'label' => 'sylius.form.product.short_description',
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
