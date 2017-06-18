<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/06/17
 * Time: 21:15
 */

namespace Miky\Bundle\CommercialBundle\Form\Type\Admin;


use Miky\Bundle\CommercialBundle\Form\Type\ContactSheetFormType;
use Miky\Bundle\CommercialBundle\Model\CommercialAction;
use Miky\Bundle\CoreBundle\Form\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommercialActionAdminType extends AbstractType
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                "label" => "miky_core.title"
            ))
            ->add('priority', ChoiceType::class, array(
                "label" => "miky_commercial.priority",
                "choices" => array(
                    "miky_commercial.priority_low" => CommercialAction::PRIORITY_LOW,
                    "miky_commercial.priority_normal" => CommercialAction::PRIORITY_NORMAL,
                    "miky_commercial.priority_high" => CommercialAction::PRIORITY_HIGH,
                    "miky_commercial.priority_urgent" => CommercialAction::PRIORITY_URGENT

                )
            ))
            ->add('report', TextareaType::class, array(
                "label" => "miky_commercial.report"
            ))
            ->add('actionDate', DateTimeType::class, array(
                "label" => "miky_commercial.action_date"
            ))
            ->add('dunningDate', DateTimeType::class, array(
                "label" => "miky_commercial.dunning_date"
            ))

            ->add('workers', CollectionType::class,array(
                'entry_type'   => CommercialActionWorkerAdminType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                "label" => "miky_commercial.workers",
            ))
            ->add('contacts', CollectionType::class,array(
                'entry_type'   => CommercialActionContactAdminType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                "label" => "miky_commercial.contacts",
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