<?php

namespace Miky\Bundle\CommercialBundle\Doctrine\Entity;

/**
 * CommercialActionWorker
 */
class CommercialActionWorker extends \Miky\Bundle\CommercialBundle\Model\CommercialActionWorker
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

