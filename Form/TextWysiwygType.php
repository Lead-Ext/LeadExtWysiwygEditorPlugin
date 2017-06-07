<?php

declare(strict_types = 1);

namespace LeadExt\WysiwygEditorPlugin\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TextWysiwygType extends TextareaType
{
    private CONST WYSIWYG_CLASS = 'tinymce';

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefaults([
                'attr' => [
                    'class' => self::WYSIWYG_CLASS,
                ],
            ])
        ;
    }

    /**
     * @inheritdoc
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);

        if (strpos($view->vars['attr']['class'], self::WYSIWYG_CLASS) === false) {
            $view->vars['attr']['class'] .= ' '.self::WYSIWYG_CLASS;
        }
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lead_ext_text_wysiwyg';
    }
}
