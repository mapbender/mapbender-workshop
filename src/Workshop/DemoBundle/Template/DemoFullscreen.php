<?php

namespace Workshop\DemoBundle\Template;

use Mapbender\CoreBundle\Template\Fullscreen;

/**
 * Template DemoFullscreen
 * 
 * @author Astrid Emde
 */
class DemoFullscreen extends Fullscreen
{
    protected static $title = 'Workshop Demo Fullscreen Template (Kreis Groß-Gerau)';
    protected static $css   = array(
        '@MapbenderCoreBundle/Resources/public/sass/template/fullscreen.scss',
        '@WorkshopDemoBundle/Resources/public/demo_fullscreen.css',
    );

    public $twigTemplate = 'WorkshopDemoBundle:Template:demo_fullscreen.html.twig';

}
