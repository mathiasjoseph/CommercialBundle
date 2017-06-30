<?php

namespace Miky\Bundle\CommercialBundle\Doctrine\Entity;

/**
 * CommercialActionContact
 */
class CommercialActionContact extends \Miky\Bundle\CommercialBundle\Model\CommercialActionContact
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

