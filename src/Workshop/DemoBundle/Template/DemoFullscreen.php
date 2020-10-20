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

// from FullscreenAlternative to place at the right side
    public function getRegionTemplateVars(\Mapbender\CoreBundle\Entity\Application $application, $regionName)
    {
        $vars = parent::getRegionTemplateVars($application, $regionName);
        switch ($regionName) {
            default:
                return $vars;
            case 'sidepane':
                $vars['alignment_class'] = str_replace('left', 'right', $vars['alignment_class']);
		// closed on start	
                    $vars['alignment_class'] .= ' closed';
                return $vars;
            case 'toolbar':
                return array_replace($vars, array(
                    'alignment_class' => 'itemsLeft',
                ));
        }
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
		    '@WorkshopDemoBundle/Resources/public/demo_fullscreen.scss',
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
