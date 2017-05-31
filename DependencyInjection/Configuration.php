<?php

declare(strict_types = 1);

namespace LeadExt\WysiwygEditorPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lead_ext_wysiwyg_editor');

        $rootNode
            ->children()
                ->scalarNode('api_key')->isRequired()->end()
                ->scalarNode('selector')->defaultValue('.tinymce')->end()
                ->scalarNode('language')->defaultNull()->end()
                ->scalarNode('language_url')->defaultNull()->end()
                ->scalarNode('theme')->defaultValue('modern')->end()
                ->arrayNode('plugins')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        'advlist autolink lists link charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime contextmenu paste'
                    ])
                ->end()
            ->end();

        return $treeBuilder;
    }
}
