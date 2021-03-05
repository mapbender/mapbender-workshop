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
    /**
     * @inheritdoc
     */
    public static function getTitle()
    {
        return 'Fullscreen Template Workshop';
    }


    /**
     * @inheritdoc
     */
    public function getAssets($type)
    {
        switch ($type) {
            case 'css':
                return array(
                    '@MapbenderCoreBundle/Resources/public/sass/template/fullscreen.scss',
                    '@WorkshopDemoBundle/Resources/public/demo_fullscreen.css',
                );
            case 'js':
                return array(
                    '@FOMCoreBundle/Resources/public/js/frontend/sidepane.js',
                    '@FOMCoreBundle/Resources/public/js/frontend/tabcontainer.js',
                    '@MapbenderCoreBundle/Resources/public/mapbender.container.info.js',
                );
            case 'trans':
            default:
                return parent::getAssets($type);
        }
    }

    public function getTwigTemplate()
    {
        return 'WorkshopDemoBundle:Template:demo_fullscreen.html.twig';
    }

    public function getBodyClass(\Mapbender\CoreBundle\Entity\Application $application)
    {
        return 'desktop-template';
    }
}
