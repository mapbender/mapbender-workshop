<?php

namespace Workshop\DemoBundle;

use Mapbender\CoreBundle\Component\MapbenderBundle;

class WorkshopDemoBundle extends MapbenderBundle
{
    /**
     * Return list of element classes provided by this bundle.
     * Each entry in the array is a fully qualified class name.
     *
     * @return string[]
     */
    public function getElements()
    {
        return array(
//    'Workshop\DemoBundle\Element\MapKlick',
       );
    }

    /**
     * Return list of template classes provided by this bundle.
     * Each entry in the array is a fully qualified class name.
     *
     * @return string[]
     */
    public function getTemplates()
    {
        return array('Workshop\DemoBundle\Template\DemoFullscreen');
    }

}
