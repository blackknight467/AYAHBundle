<?php

namespace blackknight467\AYAHBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ayah');

        $rootNode
            ->children()
            ->scalarNode('publisher_key')->isRequired()->info('the publisher key of your "Are You A Human" Application')->end()
            ->scalarNode('scoring_key')->isRequired()->info('the scoring key of your "Are You A Human" Application')->end()
            ->scalarNode('error_message')->defaultValue('You did not pass the "Are You A Human" test. This is a problem. Study up and try again.')->end()
            ->end();

        return $treeBuilder;
    }
}
