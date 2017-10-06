<?php

namespace Miky\Bundle\CommercialBundle\Doctrine\Entity;

/**
 * Quotation
 */
class Quotation extends \Miky\Bundle\CommercialBundle\Model\Quotation
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

