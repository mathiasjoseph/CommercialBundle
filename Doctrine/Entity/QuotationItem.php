<?php

namespace Miky\Bundle\CommercialBundle\Doctrine\Entity;

/**
 * QuotationItem
 */
class QuotationItem extends \Miky\Bundle\CommercialBundle\Model\QuotationItem
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

