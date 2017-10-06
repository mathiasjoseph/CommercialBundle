<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/05/17
 * Time: 21:52
 */

namespace Miky\Bundle\CommercialBundle\Model;


use Miky\Component\Resource\Model\ResourceInterface;

class QuotationItem extends \Miky\Component\Commercial\Model\QuotationItem implements ResourceInterface
{
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}