<?php

namespace Workshop\DemoBundle\Templates;

use Mapbender\ManagerBundle\Template\LoginTemplate;

/** @noinspection PhpUnused referenced in parameter mapbender.manager.login.template_class */

class DemoLoginTemplate extends LoginTemplate
{
    public function getAssets($type)
    {
        $parent = parent::getAssets($type);
        if ($type === 'css') {
            return [
                '@MapbenderCoreBundle/Resources/public/sass/libs/_variables.scss',
                '@MapbenderManagerBundle/Resources/public/sass/manager/variables.scss',
                '@WorkshopDemoBundle/Resources/public/demo_manager_variables.scss',
                '@WorkshopDemoBundle/Resources/public/demo_login_variables.scss',   
                '@MapbenderManagerBundle/Resources/public/sass/manager/login.scss',
            ];
        }
        return $parent;
    }
}
