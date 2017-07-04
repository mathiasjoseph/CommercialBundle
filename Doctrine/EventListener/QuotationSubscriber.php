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
use Miky\Bundle\CommercialBundle\Model\Quotation;


class QuotationSubscriber implements EventSubscriber
{
    /**
     * @var string
     */
    private $itemClass;

    /**
     * QuotationSubscriber constructor.
     * @param string $itemClass
     */
    public function __construct($itemClass)
    {
        $this->itemClass = $itemClass;
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
        if (!in_array(Quotation::class, class_parents($metadata->getName()))) {
            return;
        }

        $builder = new ClassMetadataBuilder($metadata);
        $builder
            ->createOneToMany("items", $this->itemClass)
            ->cascadeAll()
            ->inversedBy("quotation")
            ->build();
    }


}