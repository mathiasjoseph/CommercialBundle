<?php

namespace Miky\Bundle\CommercialBundle\Doctrine\Entity;

/**
 * ContactSheet
 */
class ContactSheet extends \Miky\Bundle\CommercialBundle\Model\ContactSheet
{
    /**
     * @var int
     */
    protected $id;


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

