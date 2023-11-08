<?php

namespace Workshop\DemoBundle\Element;

use Mapbender\Component\Element\AbstractElementService;
use Mapbender\Component\Element\StaticView;
use Mapbender\CoreBundle\Entity\Element;
use Mapbender\Utils\HtmlUtil;
use Symfony\Contracts\Translation\TranslatorInterface;
use Workshop\DemoBundle\Element\Type\ClickAdminType;


class ClickButtonTriggered extends AbstractElementService
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @inheritdoc
     */
    public static function getClassTitle()
    {
        return "Click - Button Triggered";
    }

    /**
     * @inheritdoc
     */
    public static function getClassDescription()
    {
        return "Click Description - click in the map and get some action. Add this element to the
        map area and add a button to trigger it";
    }

    /**
     * @inheritdoc
     */
    public static function getType()
    {
        return ClickAdminType::class;
    }

    public static function getDefaultConfiguration()
    {
        return array(
            'help' => 'mb.workshop.click.help',
            'link' => '',
        );
    }


    public function getRequiredAssets(Element $element)
    {
        return array(
            'js' => array(
                '@WorkshopDemoBundle/Resources/public/mapbender.element.click_button_triggered.js',
            ),
            'css' => array(),
            'trans' => array(
                'mb.workshop.click.help',
                'mb.workshop.click.test',
            ),
        );
    }


    /**
     * @inheritdoc
     */
    public function getWidgetName(Element $element)
    {
        return 'mapbender.mbClickButtonTriggered';
    }


    /**
     * @inheritdoc
     */
    public static function getFormTemplate()
    {
        return '@WorkshopDemoBundle/Resources/views/ElementAdmin/clickadmin.html.twig';
    }


    public function getView(Element $element)
    {
        $help = $this->translator->trans($element->getConfiguration()['help']);
        $pTag = HtmlUtil::renderTag('p', $help, [
            'class' => 'mb-element mb-element-click',
            'id' => $element->getId(),
            'data-title' => $element->getTitle()
        ]);
        return new StaticView($pTag);
    }

}
