<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 01/12/16
 * Time: 10:43
 */

namespace Miky\Bundle\CommercialBundle\Model;


use Miky\Component\Commercial\Model\ContactSheet as BaseContactSheet;
use Miky\Component\Resource\Model\ResourceInterface;

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