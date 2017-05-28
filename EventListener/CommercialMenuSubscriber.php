<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 19/05/17
 * Time: 17:15
 */

namespace Miky\Bundle\CommercialBundle\EventListener;


use Miky\Bundle\AdminBundle\Menu\AdminMenuBuilder;
use Miky\Bundle\MenuBundle\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CommercialMenuSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            AdminMenuBuilder::EVENT_NAME => 'onAdminMenu',
        );
    }

    public function onAdminMenu(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $commercialSubMenu = $menu
            ->addChild('commercial')
            ->setLabel('miky_commercial.commercial')
            ->setLabelAttribute('icon', 'users')
        ;
        $commercialSubMenu
            ->addChild('formations_list', array("route" => "gaia_formation_admin_formation_index" ))
            ->setLabel('formations')
            ->setLabelAttribute('icon', 'users')
        ;

    }
}