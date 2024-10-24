<?php

namespace Workshop\DemoBundle\Templates;

use Mapbender\CoreBundle\Template\Fullscreen;
use Mapbender\CoreBundle\Entity\Application;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Template DemoFullscreen
 * 
 * @author Astrid Emde
 */
#[AutoconfigureTag('mapbender.application_template')]
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
            '@WorkshopDemoBundle/Resources/public/css/demo_variables_blue.scss'
        );
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
                    '@WorkshopDemoBundle/Resources/public/css/demo_fullscreen.scss',
                );
            case 'js':
                return array(
                    '@FOMCoreBundle/Resources/public/js/frontend/sidepane.js',
                    '@FOMCoreBundle/Resources/public/js/frontend/tabcontainer.js',
                    '@MapbenderCoreBundle/Resources/public/mapbender.container.info.js'
                );
            case 'trans':
            default:
                return parent::getAssets($type);
        }
    }

    public function getTwigTemplate()
    {
        return '@WorkshopDemoBundle/Resources/views/Template/demo_fullscreen.html.twig';
    }

    public function getBodyClass(\Mapbender\CoreBundle\Entity\Application $application)
    {
        return 'desktop-template';
    }
}
