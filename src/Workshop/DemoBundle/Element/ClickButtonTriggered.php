<?php

namespace Workshop\DemoBundle\Element;

use Mapbender\Component\Element\AbstractElementService;
use Mapbender\Component\Element\StaticView;
use Mapbender\CoreBundle\Entity\Element;
use Workshop\DemoBundle\Element\Type\ClickAdminType;


class ClickButtonTriggered extends AbstractElementService
{

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

    public function httpAction($action)
    {
        $response = new Response();

        $data = array(
            'message' => 'Hello World'
        );
        $response->setContent(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function getView(Element $element)
    {
        return new StaticView('');
    }

}
