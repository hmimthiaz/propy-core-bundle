<?php

namespace Propy\CoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $tb = new TreeBuilder('propy_core');

        $rootNode = $tb->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('mode')
                    ->defaultValue('admin')
                    ->info('library used mode')
                ->end()
            ->end();

        return $tb;
    }
}
