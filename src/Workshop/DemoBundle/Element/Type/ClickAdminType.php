<?php

namespace Workshop\DemoBundle\Element\Type;

use Mapbender\CoreBundle\Element\Type\MapbenderTypeTrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints;
use Symfony\Contracts\Translation\TranslatorInterface;

class ClickAdminType extends AbstractType
{

    use MapbenderTypeTrait;

    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator) {
        $this->translator = $translator;
    }

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('help', TextType::class,$this->createInlineHelpText([
                'required' => false,
                'label' => 'mb.workshop.click.admin.help',
                'help' => 'mb.workshop.click.admin.help_help',
             ], $this->translator))
           ;
    }

}
