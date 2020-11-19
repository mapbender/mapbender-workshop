<?php

namespace Workshop\DemoBundle\Element;

use Mapbender\CoreBundle\Component\Element;

/**
 * Class MapKlick
 * @package Workshop\DemoBundle\Element
 */
class MapKlick extends Element
{

    /**
     * @inheritdoc
     */
    public static function getClassTitle()
    {
        return "MapKlick";
    }

    /**
     * @inheritdoc
     */
    public static function getClassDescription() 
    {
        return "MapKlick Beschreibung";
    }

    /**
     * @inheritdoc
     */
    public static function getType()
    {
        return 'Workshop\DemoBundle\Element\Type\MapKlickAdminType';
    }

    public static function getDefaultConfiguration() {
        return array(
            'title' => 'MapKlick - map click tool',
            'target' => null,
            'label' => true,
            'icon' => 'iconPoi',
            'target' => null,
            'click' => null,
            'group' => null,
            'action' => null,
            'deactivate' => null
        );
    }

    /**
     * @inheritdoc
     */
    public function getAssets()
    {
        return array(
            'js' => array(
                '@MapbenderCoreBundle/Resources/public/mapbender.element.button.js',
                'mapbender.element.mapklick.js'
            ),
            'css' => array(),
            'trans' => array()
        );
    }

    /**
     * @inheritdoc
     */
    public function getWidgetName() {
        return 'mapbender.mbMapKlick';
    }
    

    /**
     * @inheritdoc
     */
    public static function getFormTemplate()
    {
        return 'WorkshopDemoBundle:ElementAdmin:mapklickadmin.html.twig';
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


    public function getFrontendTemplatePath($suffix = '.html.twig')
    {
        return 'WorkshopDemoBundle:ElementAdmin:mapklickadmin.html.twig';
    }

    /**
     * If you want a custom button template, copy the button template from the
     * CoreBundle to your own bundle as a starter.
     */
    /**
     * @inheritdoc
     */
    public function render()
    {
        return $this->container->get('templating')->render('MapbenderCoreBundle:Element:button.html.twig', array(
                'id' => $this->getId(),
                'configuration' => $this->entity->getConfiguration(),
                'title' => $this->getTitle()
        ));
    }
}
