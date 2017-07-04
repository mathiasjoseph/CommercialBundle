<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/07/17
 * Time: 10:16
 */

namespace Miky\Bundle\CommercialBundle\Form\Type;


use Miky\Bundle\UserBundle\Form\Type\EmployeeEntityType;
use Miky\Bundle\UserBundle\Form\Type\UserEntityType;
use Miky\Bundle\UserBundle\Form\Type\UserPersonType;
use Miky\Component\Commercial\Model\Traits\CommercialPersonInterface;
use Miky\Component\User\Model\Traits\UserPersonInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class CommercialPersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("personType", ChoiceType::class,array(
                "choices" => array(
                    "miky_user.by_user" => UserPersonInterface::TYPE_USER,
                    "miky_user.by_employee" => UserPersonInterface::TYPE_EMPLOYEE,
                    "miky_commercial.by_contact_sheet" => CommercialPersonInterface::TYPE_CONTACT_SHEET,
                ),
                "casper_group" => "commercial_person",
                "casper_name" => "type",
                "casper_hide" => array(
                    UserPersonInterface::TYPE_USER => array(UserPersonInterface::TYPE_EMPLOYEE, CommercialPersonInterface::TYPE_CONTACT_SHEET),
                    UserPersonInterface::TYPE_EMPLOYEE => array(UserPersonInterface::TYPE_USER, CommercialPersonInterface::TYPE_CONTACT_SHEET),
                    CommercialPersonInterface::TYPE_CONTACT_SHEET => array(UserPersonInterface::TYPE_EMPLOYEE, UserPersonInterface::TYPE_USER)
                ),
                "casper_show" => array(
                    UserPersonInterface::TYPE_USER => array(UserPersonInterface::TYPE_USER),
                    UserPersonInterface::TYPE_EMPLOYEE => array(UserPersonInterface::TYPE_EMPLOYEE),
                    CommercialPersonInterface::TYPE_CONTACT_SHEET => array(CommercialPersonInterface::TYPE_CONTACT_SHEET)

                )
            ))
            ->add('user', UserEntityType::class, array(
                "label" => "miky_user.user",
                "casper_group" => "commercial_person",
                "casper_name" => UserPersonInterface::TYPE_USER
            ))
            ->add('employee', EmployeeEntityType::class, array(
                "label" => "miky_user.employee",
                "casper_group" => "commercial_person",
                "casper_name" => UserPersonInterface::TYPE_EMPLOYEE
            ))
            ->add('contactSheet', ContactSheetEntityType::class, array(
                "label" => "miky_commercial.contact_sheet",
                "casper_group" => "commercial_person",
                "casper_name" => CommercialPersonInterface::TYPE_CONTACT_SHEET
            ))

        ;
    }
}