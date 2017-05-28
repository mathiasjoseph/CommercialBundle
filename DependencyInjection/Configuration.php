<?php

namespace Miky\Bundle\CommercialBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('miky_commercial');
        $rootNode
            ->children()
            ->scalarNode('benefit_class')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('commercial_action_class')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('company_sheet_class')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('contact_sheet_class')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('quotation_class')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('quotation_item_class')->isRequired()->cannotBeEmpty()->end()
            ->end();


        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
