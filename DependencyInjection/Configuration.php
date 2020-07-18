<?php


namespace Mastox\ReactI18NextTranslationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


class Configuration implements ConfigurationInterface {


    public function getConfigTreeBuilder() {

        $treeBuilder = new TreeBuilder('react_i18_next_translation');

        $treeBuilder
                ->getRootNode()
                    ->children()
                        ->scalarNode('file_extension')->defaultValue('yaml')->end()
                    ->end()
                ->end();

        return $treeBuilder;
    }
}