<?php

namespace Workshop\DemoBundle\Template;

use Mapbender\CoreBundle\Template\Fullscreen;
use Mapbender\CoreBundle\Entity\Application;

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

    public function getSassVariablesAssets(Application $application)
    {
        return array(
            '@MapbenderCoreBundle/Resources/public/sass/libs/_variables.scss',
            '@WorkshopDemoBundle/Resources/public/demo_variables_blue.scss',
        );
    }


//                    '@WorkshopDemoBundle/Resources/public/demo_fullscreen.css',
    /**
     * @inheritdoc
     */
    public function getAssets($type)
    {
        switch ($type) {
            case 'css':
                return array(
                    '@MapbenderCoreBundle/Resources/public/sass/template/fullscreen.scss',

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
