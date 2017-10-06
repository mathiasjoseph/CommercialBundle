<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/06/17
 * Time: 21:15
 */

namespace Miky\Bundle\CommercialBundle\Form\Type\Admin;


use Miky\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class QuotationAdminType extends AbstractResourceType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                "label" => "miky_core.name"
            ))
            ->add('reference', TexType::class, array(
                "label" => "miky_core.reference"
            ))
            ->add('items', CollectionType::class, array(
                "label" => "miky_commercial.quotation_items",
                'entry_type'   => QuotationItemAdminType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                "reference_property" => "name"

            ))

        ;
    }



}