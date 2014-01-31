<?php

/*
 * This file is part of the Mapbender 3 project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Workshop\DemoBundle;

use Mapbender\CoreBundle\Component\MapbenderBundle;

/**
 * WorkshopDemo
 *
 * @author Astrid Emde
 */
class WorkshopDemoBundle extends MapbenderBundle
{


    /**
     * @inheritdoc
     */
    public function getTemplates()
    {
        return array('Workshop\DemoBundle\Template\Fullscreen');
    }

    /**
     * @inheritdoc
     */
    public function getElements()
    {
        return array(
            
        );
    }
}
