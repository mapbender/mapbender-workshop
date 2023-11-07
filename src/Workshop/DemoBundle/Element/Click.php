<?php

namespace Workshop\DemoBundle\Element;

use Mapbender\Component\Element\AbstractElementService;
use Mapbender\Component\Element\StaticView;
use Mapbender\CoreBundle\Entity\Element;

/**
 * Class Click
 * @package Workshop\DemoBundle\Element
 */
class Click extends AbstractElementService
{

    /**
     * @inheritdoc
     */
    public static function getClassTitle()
    {
        return "Click";
    }

    /**
     * @inheritdoc
     */
    public static function getClassDescription() 
    {
        return "Click Description - click in the map and get some action.";
    }

    /**
     * @inheritdoc
     */
    public static function getType()
    {
        return 'Workshop\DemoBundle\Element\Type\ClickAdminType';
    }

    public static function getDefaultConfiguration() {
        return array(
            'help' => 'mb.core.click.help',
        );
    }
    

    public function getRequiredAssets(Element $element)
    {
        return array(
            'js' => array(
                '@WorkshopDemoBundle/Resources/public/mapbender.element.click.js',
            ),
            'css' => array(),
            'trans' => array(
                'mb.core.click.help',
                'mb.core.click.test',
            ),
        );
    }


    /**
     * @inheritdoc
     */
    public function getWidgetName(Element $element)
    {
        return 'mapbender.mbClick';
    }
  

    /**
     * @inheritdoc
     */
    public static function getFormTemplate()
    {
        return '@WorkshopDemoBundle/Resources/views/ElementAdmin/clickadmin.html.twig';
    }


    public function httpAction($action) {
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
        $view = new StaticView('');
        $view->attributes['class'] = 'mb-element-click';
        $view->attributes['data-title'] = $element->getTitle();
        return $view;
    }

}
