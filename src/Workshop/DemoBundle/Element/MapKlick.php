<?php

namespace Workshop\DemoBundle\Element;

use Mapbender\CoreBundle\Component\Element;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class MapKlick extends Element {
    public static function getClassTitle() {
        return "MapKlick";
    }

    public static function getClassDescription() {
        return "MapKlick Beschreibung";
    }

    public static function getClassTags() {
        return array();
    }

    static public function listAssets() {
        return array(
            'js' => array(
                '@MapbenderCoreBundle/Resources/public/mapbender.element.button.js',
                'mapbender.element.mapklick.js'
            ),
            'css' => array()
        );
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

    public function getWidgetName() {
        return 'mapbender.mbMapKlick';
    }
    
    /**
     * @inheritdoc
     */
    public static function getType()
    {
        return 'Workshop\DemoBundle\Element\Type\MapKlickAdminType';
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


    /**
     * If you want a custom button template, copy the button template from the
     * CoreBundle to your own bundle as a starter.
     */
    public function render() {
        return $this->container->get('templating')->render('MapbenderCoreBundle:Element:button.html.twig', array(
                'id' => $this->getId(),
                'configuration' => $this->entity->getConfiguration(),
                'title' => $this->getTitle()));
    }
}
