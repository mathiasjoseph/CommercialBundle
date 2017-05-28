<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/05/17
 * Time: 16:57
 */

namespace Miky\Bundle\CommercialBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuotationFormType extends AbstractType
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
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
        return "miky_commercial_quotation";
    }

}