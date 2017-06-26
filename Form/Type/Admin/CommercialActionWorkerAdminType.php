<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/06/17
 * Time: 21:15
 */

namespace Miky\Bundle\CommercialBundle\Form\Type\Admin;


use Miky\Bundle\CommercialBundle\Form\Type\ContactSheetEntityType;
use Miky\Bundle\CommercialBundle\Model\CommercialActionWorker;
use Miky\Bundle\UserBundle\Form\Type\EmployeeEntityType;
use Miky\Bundle\UserBundle\Form\Type\UserEntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommercialActionWorkerAdminType extends AbstractType
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("type", ChoiceType::class,array(
                "choices" => array(
                    "miky_user.by_user" => CommercialActionWorker::TYPE_USER,
                    "miky_user.by_employee" => CommercialActionWorker::TYPE_EMPLOYEE,
                    "miky_commercial.by_contact_sheet" => CommercialActionWorker::TYPE_CONTACT_SHEET,
                ),
                "casper_group" => "commercial_action_worker",
                "casper_name" => "type",
                "casper_hide" => array(
                    CommercialActionWorker::TYPE_USER => array(CommercialActionWorker::TYPE_EMPLOYEE, CommercialActionWorker::TYPE_CONTACT_SHEET),
                    CommercialActionWorker::TYPE_EMPLOYEE => array(CommercialActionWorker::TYPE_USER, CommercialActionWorker::TYPE_CONTACT_SHEET),
                    CommercialActionWorker::TYPE_CONTACT_SHEET => array(CommercialActionWorker::TYPE_EMPLOYEE, CommercialActionWorker::TYPE_USER)
                ),
                "casper_show" => array(
                    CommercialActionWorker::TYPE_USER => array(CommercialActionWorker::TYPE_USER),
                    CommercialActionWorker::TYPE_EMPLOYEE => array(CommercialActionWorker::TYPE_EMPLOYEE),
                    CommercialActionWorker::TYPE_CONTACT_SHEET => array(CommercialActionWorker::TYPE_CONTACT_SHEET)

                )
            ))
            ->add('user', UserEntityType::class, array(
                "label" => "miky_user.user",
                "casper_group" => "commercial_action_worker",
                "casper_name" => CommercialActionWorker::TYPE_USER
            ))
            ->add('employee', EmployeeEntityType::class, array(
                "label" => "miky_user.employee",
                "casper_group" => "commercial_action_worker",
                "casper_name" => CommercialActionWorker::TYPE_EMPLOYEE
            ))
            ->add('contactSheet', ContactSheetEntityType::class, array(
                "label" => "miky_commercial.contact_sheet",
                "casper_group" => "commercial_action_worker",
                "casper_name" => CommercialActionWorker::TYPE_CONTACT_SHEET
            ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
        ));
    }

}