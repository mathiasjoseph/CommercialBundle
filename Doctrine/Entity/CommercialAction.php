<?php

namespace Miky\Bundle\CommercialBundle\Doctrine\Entity;

/**
 * CommercialAction
 */
class CommercialAction extends \Miky\Bundle\CommercialBundle\Model\CommercialAction
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

