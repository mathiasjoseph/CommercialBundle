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
use Gaia\Bundle\FormationBundle\Model\FormationParticipant;
use Miky\Bundle\CommercialBundle\Model\CommercialActionContact;
use Miky\Bundle\CommercialBundle\Model\CommercialActionWorker;


class CommercialActionContactSubscriber implements EventSubscriber
{
    /**
     * @var string
     */
    private $userClass;

    /**
     * @var string
     */
    private $contactSheetClass;

    /**
     * @var string
     */
    private $employeeClass;

    /**
     * @var string
     */
    private $commercialActionClass;

    /**
     * CommercialActionContactSubscriber constructor.
     */
    public function __construct($userClass, $employeeClass, $contactSheetClass, $commercialActionClass)
    {
        $this->userClass = $userClass;
        $this->contactSheetClass = $contactSheetClass;
        $this->employeeClass = $employeeClass;
        $this->commercialActionClass = $commercialActionClass;
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
        if (!in_array(CommercialActionContact::class, class_parents($metadata->getName()))) {
            return;
        }

        $builder = new ClassMetadataBuilder($metadata);
        $builder
            ->createManyToOne("commercialAction", $this->commercialActionClass)
            ->inversedBy("contacts")
            ->build();
        $builder
            ->createOneToOne("user", $this->userClass)
            ->build();
        $builder
            ->createOneToOne("employee", $this->employeeClass)
            ->build();
        $builder
            ->createOneToOne("contactSheet", $this->contactSheetClass)
            ->build();
    }


}