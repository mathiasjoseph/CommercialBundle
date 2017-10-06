<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 11/05/17
 * Time: 22:09
 */

namespace Miky\Bundle\CommercialBundle\Model;



use Miky\Component\Resource\Model\ResourceInterface;

class CommercialAction extends \Miky\Component\Commercial\Model\CommercialAction implements ResourceInterface
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