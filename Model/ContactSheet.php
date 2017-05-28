<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 01/12/16
 * Time: 10:43
 */

namespace Miky\Bundle\CommercialBundle\Model;


use Miky\Component\Resource\Model\ResourceInterface;
use Miky\Component\Commercial\Model\ContactSheet as BaseContactSheet;

class ContactSheet extends BaseContactSheet implements ResourceInterface
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