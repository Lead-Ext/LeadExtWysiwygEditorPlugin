#Lead Ext WYSIWYG Editor plugin

WYSIWYG editor for Sylius.

By default plugins adds text editor for product's description and short description. 

##Manual steps:
* add `raw` filter for rendered data. F.e. `{{ product.shortDescription|raw }}`

##Usage:
* init WYSIWYG editor on a page: with desired options:
```twig
{{ wysiwyg_init({
    browser_spellcheck: true,
    branding: false,
    elementpath: false,
    statusbar: false,
    menubar: false,
    language: app.request.locale
})}}
```
* add class `tynimce` for form types:
    - via PHP 
    ```php
    $builder
        ->add('description', TextareaType::class, [
            'attr' => [
                'class' => 'tinymce'
            ],
        ]);
    ```

    - or twig:
```twig
{{ form_row(form.description, { attr: { class: 'tinymce' } }) }}
```
