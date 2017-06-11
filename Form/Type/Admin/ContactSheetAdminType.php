<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/06/17
 * Time: 21:15
 */

namespace Miky\Bundle\CommercialBundle\Form\Type\Admin;


use Miky\Bundle\CommercialBundle\Form\Type\ContactSheetFormType;

class ContactSheetAdminType extends ContactSheetFormType
{
    public function __construct($class)
    {
       parent::__construct($class);
    }
}