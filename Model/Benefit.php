<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/05/17
 * Time: 21:55
 */

namespace Miky\Bundle\CommercialBundle\Model;


use Miky\Component\Commercial\Model\Benefit as BaseBenefit;
use Miky\Component\Resource\Model\ResourceInterface;

class Benefit extends BaseBenefit implements ResourceInterface
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