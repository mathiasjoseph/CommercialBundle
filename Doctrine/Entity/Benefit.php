<?php

namespace Miky\Bundle\CommercialBundle\Doctrine\Entity;

/**
 * Benefit
 */
class Benefit extends \Miky\Bundle\CommercialBundle\Model\Benefit
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

