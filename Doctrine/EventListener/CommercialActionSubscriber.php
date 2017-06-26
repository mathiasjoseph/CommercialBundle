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
use Miky\Bundle\CommercialBundle\Model\CommercialAction;


class CommercialActionSubscriber implements EventSubscriber
{
    /**
     * @var string
     */
    private $workerClass;

    /**
     * @var string
     */
    private $contactClass;



    /**
     * FormationParticipantSubscriber constructor.
     */
    public function __construct($contactClass, $workerClass)
    {
        $this->workerClass = $workerClass;
        $this->contactClass = $contactClass;

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
        if (!in_array(CommercialAction::class, class_parents($metadata->getName()))) {
            return;
        }

        $builder = new ClassMetadataBuilder($metadata);
        $builder
            ->createOneToMany("workers", $this->workerClass)
            ->mappedBy("commercialAction")
            ->cascadeAll()
            ->build();
        $builder
            ->createOneToMany("contacts", $this->contactClass)
            ->mappedBy("commercialAction")
            ->cascadeAll()
            ->build();
    }
}