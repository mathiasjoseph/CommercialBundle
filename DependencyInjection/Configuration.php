<?php

namespace Miky\Bundle\CommercialBundle\DependencyInjection;

use Miky\Bundle\CommercialBundle\Doctrine\Entity\Benefit;
use Miky\Bundle\CommercialBundle\Doctrine\Entity\CommercialAction;
use Miky\Bundle\CommercialBundle\Doctrine\Entity\CommercialActionContact;
use Miky\Bundle\CommercialBundle\Doctrine\Entity\CommercialActionWorker;
use Miky\Bundle\CommercialBundle\Doctrine\Entity\CompanySheet;
use Miky\Bundle\CommercialBundle\Doctrine\Entity\ContactSheet;
use Miky\Bundle\CommercialBundle\Doctrine\Entity\Quotation;
use Miky\Bundle\CommercialBundle\Doctrine\Entity\QuotationItem;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    private $useDefaultEntities;

    /**
     * Configuration constructor.
     */
    public function __construct($useDefaultEntities)
    {
        $this->useDefaultEntities = $useDefaultEntities;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('miky_commercial');
        if ($this->useDefaultEntities){
            $rootNode
                ->children()
                ->scalarNode('benefit_class')->defaultValue(Benefit::class)->cannotBeEmpty()->end()
                ->scalarNode('commercial_action_class')->defaultValue(CommercialAction::class)->cannotBeEmpty()->end()
                ->scalarNode('commercial_action_worker_class')->defaultValue(CommercialActionWorker::class)->cannotBeEmpty()->end()
                ->scalarNode('commercial_action_contact_class')->defaultValue(CommercialActionContact::class)->cannotBeEmpty()->end()
                ->scalarNode('company_sheet_class')->defaultValue(CompanySheet::class)->cannotBeEmpty()->end()
                ->scalarNode('contact_sheet_class')->defaultValue(ContactSheet::class)->cannotBeEmpty()->end()
                ->scalarNode('quotation_class')->defaultValue(Quotation::class)->cannotBeEmpty()->end()
                ->scalarNode('quotation_item_class')->defaultValue(QuotationItem::class)->cannotBeEmpty()->end()
                ->end();
        }else{
            $rootNode
                ->children()
                ->scalarNode('benefit_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('commercial_action_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('commercial_action_worker_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('commercial_action_contact_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('company_sheet_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('contact_sheet_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('quotation_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('quotation_item_class')->isRequired()->cannotBeEmpty()->end()
                ->end();
        }
        


        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
