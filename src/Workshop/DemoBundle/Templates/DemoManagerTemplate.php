<?php

namespace Workshop\DemoBundle\Templates;

use Mapbender\ManagerBundle\Template\ManagerTemplate;

/** @noinspection PhpUnused referenced in parameter mapbender.manager.manager.template_class */

class DemoManagerTemplate extends ManagerTemplate
{
    public function getAssets($type)
    {
        $parent = parent::getAssets($type);
        if ($type === 'css') {
            return [
                '@MapbenderCoreBundle/Resources/public/sass/libs/_variables.scss',
                '@MapbenderManagerBundle/Resources/public/sass/manager/variables.scss',
                '@WorkshopDemoBundle/Resources/public/demo_manager_variables.scss',
                '@MapbenderManagerBundle/Resources/public/sass/manager/applications.scss',            
            ];
        }
        return $parent;
    }
}

