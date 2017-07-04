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
use Miky\Bundle\CommercialBundle\Model\QuotationItem;


class QuotationItemSubscriber implements EventSubscriber
{
    /**
     * @var string
     */
    private $quotationClass;

    /**
     * QuotationItemSubscriber constructor.
     * @param string $quotationClass
     */
    public function __construct($quotationClass)
    {
        $this->quotationClass = $quotationClass;
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
        if (!in_array(QuotationItem::class, class_parents($metadata->getName()))) {
            return;
        }

        $builder = new ClassMetadataBuilder($metadata);
        $builder
            ->createManyToOne("quotation", $this->quotationClass)
            ->inversedBy("items")
            ->build();

    }


}