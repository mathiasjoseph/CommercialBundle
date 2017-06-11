<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/05/17
 * Time: 16:57
 */

namespace Miky\Bundle\CommercialBundle\Form\Type;


use Miky\Component\Commercial\Model\ContactSheet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactSheetFormType  extends AbstractType
{
    /**
     * @var ContactSheet
     */
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array(
                "label" => "miky_core.firstname"
            ))
            ->add('lastname', TextType::class, array(
                "label" => "miky_core.lastname"
            ))
            ->add('email', EmailType::class, array(
                "label" => "miky_core.email"
            ))
            ->add('phone', EmailType::class, array(
                "label" => "miky_core.phone"
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
        return "miky_commercial_contact_sheet";
    }

}