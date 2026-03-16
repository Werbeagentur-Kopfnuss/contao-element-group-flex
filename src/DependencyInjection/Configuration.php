<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupFlex\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('contao_element_group_flex');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->arrayNode('allowed_types')
            ->scalarPrototype()->end()
            ->defaultValue(['image', 'text', 'player', 'table', 'headline', 'element_group', 'accordion', 'rsce_icon_text'])
            ->end()
            ->end();

        return $treeBuilder;
    }
}