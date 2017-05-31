<?php

declare(strict_types=1);

namespace LeadExt\WysiwygEditorPlugin\Twig\Extension;

class WysiwygExtension extends \Twig_Extension
{
    /** @var string */
    protected $baseUrl;

    /** @var array */
    private $config;

    /** @var string */
    private $apiKey;

    public function __construct(array $config, string $apiKey)
    {
        $this->config = $config;
        $this->apiKey = $apiKey;
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            'wysiwyg_init' => new \Twig_SimpleFunction(
                'wysiwyg_init',
                [$this, 'wysiwygInit'],
                [
                    'needs_environment' => true,
                    'is_safe' => ['html'],
                ]
            ),
        ];
    }

    /**
     * @param \Twig_Environment $environment
     * @param array $options
     *
     * @return string
     */
    public function wysiwygInit(\Twig_Environment $environment, array $options = [])
    {
        $config = array_replace_recursive($this->config, $options);

        if (isset($config['language_url']) && $config['language'] != 'en') {
            $config['language_url'] = $config['language_url'].$config['language'].'.js';
        }

        $configuration = json_encode($config);

        return $environment->render('LeadExtWysiwygEditorPlugin:Script:init.html.twig', [
            'apiKey' => $this->apiKey,
            'config' => $configuration,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'lead_ext_wysiwyg';
    }
}
