<?php

namespace Workshop\DemoBundle\Element;

use Mapbender\Component\Element\ButtonLike;
use Mapbender\CoreBundle\Component\ElementBase\ConfigMigrationInterface;
use Mapbender\CoreBundle\Entity\Element;
use Mapbender\Component\Element\TemplateView;

/**
 * Class MapKlick
 * @package Workshop\DemoBundle\Element
 */
class MapKlick extends ButtonLike implements ConfigMigrationInterface
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
        return array_replace(parent::getDefaultConfiguration(), array(
            'group' => null,
            'target' => null,
        ));
    }
    

    public function getRequiredAssets(Element $element)
    {
        $assets = parent::getRequiredAssets($element) + array(
            'js' => array(),
        );
        $assets['js'][] = '@WorkshopDemoBundle/Resources/public/mapbender.element.mapklick.js';
        return $assets;
    }


    /**
     * @inheritdoc
     */
    public function getWidgetName(Element $element)
    {
        return 'mapbender.mbMapKlick';
    }
    

    /**
     * @inheritdoc
     */
    public static function getFormTemplate()
    {
        return '@WorkshopDemoBundle/Resources/views/ElementAdmin/mapklickadmin.html.twig';
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
        $view = new TemplateView('@WorkshopDemoBundle/Resources/views/Element/mapklick.html.twig');
        $this->initializeView($view, $element);
        $view->attributes['class'] = 'mb-element-mapklick';
        $view->attributes['data-title'] = $element->getTitle();

       /* veraltet
        $view->variables['submitUrl'] = $this->urlGenerator->generate('mapbender_core_application_element', array(
            'slug' => $element->getApplication()->getSlug(),
            'id' => $element->getId(),
        ));
*/
       // $generator = new Routing\Generator\UrlGenerator($routes, $context);

        return $view;;
    }

    public static function updateEntityConfig(Element $entity)
    {
        return NULL;
    }

}
