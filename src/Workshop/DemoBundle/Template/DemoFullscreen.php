<?php

namespace Workshop\DemoBundle\Template;

use Mapbender\CoreBundle\Template\Fullscreen;

class DemoFullscreen extends Fullscreen
{
    protected static $title             = "Fullscreen Template Workshop";
    protected static $regions           = array('toolbar', 'sidepane', 'content', 'footer');
    protected static $regionsProperties = array(
        'sidepane' => array(
            'tabs'      => array(
                'name'  => 'tabs',
                'label' => 'mb.manager.template.region.tabs.label'),
            'accordion' => array(
                'name'  => 'accordion',
                'label' => 'mb.manager.template.region.accordion.label')
        )
    );
    protected static $css               = array(
        '@MapbenderCoreBundle/Resources/public/sass/template/fullscreen.scss',
        '@WorkshopDemoBundle/Resources/public/demo_fullscreen.scss',
    );
    protected static $js                = array(
        '@FOMCoreBundle/Resources/public/js/frontend/sidepane.js',
        '@FOMCoreBundle/Resources/public/js/frontend/tabcontainer.js',
        '@MapbenderCoreBundle/Resources/public/mapbender.container.info.js',
        '/components/jquerydialogextendjs/jquerydialogextendjs-built.js',
        "/components/vis-ui.js/vis-ui.js-built.js"
    );

    public $twigTemplate = 'DemoDemoBundle:Template:DemoFullscreen.html.twig';
}

