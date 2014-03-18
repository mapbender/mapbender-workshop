<?php
namespace Workshop\DemoBundle\Template;

use Mapbender\CoreBundle\Component\Template;

/**
 * Template DemoFullscreen
 * 
 * @author Astrid Emde
 */
class DemoFullscreen extends Template
{
    /**
     * @inheritdoc
     */
    public static function getRegionsProperties()
    {
        return array(
            'sidepane' => array(
                'tabs' => array(
                    'state' => false,
                    'options' => array('icon' => 'XXX')
                )
            )
        );
    }

    /**
     * @inheritdoc
     */
    public static function getTitle()
    {
        return 'DemoFullscreen';
    }

    /**
     * @inheritdoc
     */
    static public function listAssets()
    {
        $assets = array(
            'css' => array('@MapbenderCoreBundle/Resources/public/sass/theme/mapbender3.scss',
                           '@MapbenderCoreBundle/Resources/public/sass/template/fullscreen.scss','@WorkshopDemoBundle/Resources/public/demo_fullscreen.css'),
            'js' => array('@FOMCoreBundle/Resources/public/js/widgets/popup.js',
                          '@FOMCoreBundle/Resources/public/js/frontend/sidepane.js',
                          '@FOMCoreBundle/Resources/public/js/frontend/tabcontainer.js'),
            'trans' => array()
        );
        return $assets;
    }

    /**
     * @inheritdoc
     */
    public function getAssets($type)
    {
        $assets = $this::listAssets();
        return $assets[$type];
    }

    /**
     * @inheritdoc
     */
    public static function getRegions()
    {
        return array('toolbar', 'sidepane', 'content', 'footer');
    }

    /**
     * @inheritdoc
     */
    public function render($format = 'html', $html = true, $css = true,
        $js = true)
    {
        $region_props = $this->application->getEntity()->getNamedRegionProperties();
        $default_region_props = $this->getRegionsProperties();

        $templating = $this->container->get('templating');
        return $templating
                ->render('WorkshopDemoBundle:Template:demo_fullscreen.html.twig',
                    array(
                    'html' => $html,
                    'css' => $css,
                    'js' => $js,
                    'application' => $this->application,
                    'region_props' => $region_props,
                    'default_region_props' => $default_region_props));
    }

}
