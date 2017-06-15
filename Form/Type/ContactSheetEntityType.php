<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/06/17
 * Time: 07:12
 */

namespace Miky\Bundle\CommercialBundle\Form\Type;


use Miky\Bundle\CommercialBundle\Model\ContactSheet;
use Miky\Bundle\UserBundle\Model\User;
use Miky\Component\User\Model\UserInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactSheetEntityType extends AbstractType
{
    /**
     * @var string
     */
    protected $class;

    /**
     * ContactSheetEntityType constructor.
     * @param string $class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'class' => $this->class,
            'choice_label' => function (ContactSheet $contactSheet) {
                if (!empty($contactSheet->getFirstname()) && !empty($contactSheet->getLastname())){
                    return $contactSheet->getFirstname(). " " . $contactSheet->getLastname();
                }else{
                    return $contactSheet->getEmail();
                }
            }
        ));
    }


    public function getParent()
    {
        return EntityType::class;
    }
}