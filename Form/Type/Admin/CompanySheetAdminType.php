<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/06/17
 * Time: 21:15
 */

namespace Miky\Bundle\CommercialBundle\Form\Type\Admin;


use Miky\Bundle\CommercialBundle\Form\Type\ContactSheetFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanySheetAdminType extends AbstractType
{
    /**
     * @var string
     */
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                "label" => "miky_core.name"
            ))
            ->add('email', TextType::class, array(
                "label" => "miky_core.email"
            ))
            ->add('phone', TextType::class, array(
                "label" => "miky_core.phone"
            ))
            ->add('companyNumber', TextType::class, array(
                "label" => "miky_commercial.company_number"
            ))


        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
        ));
    }

    public function getName()
    {
        return "miky_commercial_company_sheet";
    }
}