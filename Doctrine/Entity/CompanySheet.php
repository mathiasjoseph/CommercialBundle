<?php

namespace Miky\Bundle\CommercialBundle\Doctrine\Entity;

/**
 * CompanySheet
 */
class CompanySheet extends \Miky\Bundle\CommercialBundle\Model\CompanySheet
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

