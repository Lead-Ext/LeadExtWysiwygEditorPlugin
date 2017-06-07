# Lead Ext WYSIWYG Editor plugin

WYSIWYG editor for Sylius.

By default plugin adds text editor for product's description and short description. 

## Usage:

1. Install bundle:
    ```bash
    $ composer.phar require lead-ext/wysiwyg-editor-plugin
    ```
    
2. Add bundle to `AppKernel.php`:
    ```php
        new LeadExt\WysiwygEditorPlugin\LeadExtWysiwygEditorPlugin(),
    ```

3. Configure bundle in `app/config/config.yml`:
    ```yaml
    lead_ext_wysiwyg_editor:
        api_key: 'your_api_key' #please read official web site for more information https://www.tinymce.com/
    ```

4. Add init script for WYSIWYG editor on a page with desired options:
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
    Please check official documentation for all available options: https://www.tinymce.com/docs/
    
4. Use `TextWysiwygType` form type for your field:
    ```php
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextWysiwygType::class, [
                'required' => false,
            ])
    }
    ```

## Manual steps:
* add `raw` filter for rendered fields. F.e. `{{ product.shortDescription|raw }}`

