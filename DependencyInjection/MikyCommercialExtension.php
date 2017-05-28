<?php

namespace Miky\Bundle\CommercialBundle\DependencyInjection;

use Miky\Bundle\CoreBundle\DependencyInjection\AbstractCoreExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MikyCommercialExtension extends AbstractCoreExtension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $this->remapParametersNamespaces($config, $container, array(
            '' => array(
                'benefit_class' => 'miky_commercial.model.benefit.class',
                'commercial_action_class' => 'miky_commercial.model.commercial_action.class',
                'company_sheet_class' => 'miky_commercial.model.company_sheet.class',
                'contact_sheet' => 'miky_commercial.model.contact_sheet.class',
                'quotation_class' => 'miky_commercial.model.quotation.class',
                'quotation_item_class' => 'miky_commercial.model.quotation_item.class',
            ),
        ));
    }

    public function prepend(ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/app'));
        $loader->load('config.yml');
    }
}
