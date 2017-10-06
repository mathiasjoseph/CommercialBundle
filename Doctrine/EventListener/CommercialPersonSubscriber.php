<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 18/08/16
 * Time: 22:02
 */

namespace Miky\Bundle\CommercialBundle\Doctrine\EventListener;


use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Miky\Component\Commercial\Model\Traits\CommercialPersonInterface;


class CommercialPersonSubscriber implements EventSubscriber
{
    /**
     * @var string
     */
    private $contactSheetClass;

    /**
     * CommercialPersonSubscriber constructor.
     */
    public function __construct($contactSheetClass)
    {
        $this->contactSheetClass = $contactSheetClass;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            Events::loadClassMetadata,
        );
    }

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        // the $metadata is the whole mapping info for this class
        $metadata = $eventArgs->getClassMetadata();
        if (!in_array(CommercialPersonInterface::class, class_implements($metadata->getName()))) {
            return;
        }
        if (strpos($metadata->getName(), 'Entity') == false) {
            return;
        }
        $builder = new ClassMetadataBuilder($metadata);
        $builder
            ->createManyToOne("contactSheet", $this->contactSheetClass)
            ->build();
    }
}