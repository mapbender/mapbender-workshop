<?php

namespace Workshop\DemoBundle\Element\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints;
use Symfony\Contracts\Translation\TranslatorInterface;

class ClickAdminType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('help', TextType::class,array(
                'required' => false,
                'label' => 'mb.core.click.admin.help',
                'help' => 'mb.core.click.admin.help_help'
             ))
           ;
    }

}
