<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/06/17
 * Time: 21:15
 */

namespace Miky\Bundle\CommercialBundle\Form\Type\Admin;


use Miky\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class QuotationItemAdminType extends AbstractResourceType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                "label" => "miky_core.name"
            ))
            ->add('description', TextareaType::class, array(
                "label" => "miky_core.description"
            ))
            ->add('price', TextType::class, array(
                "label" => "miky_core.price"
            ))
            ->add('quantity', TextType::class, array(
                "label" => "miky_core.quantity"
            ))
            ;
    }



}