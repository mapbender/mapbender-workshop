<?php

/*
 * This file is part of the Mapbender 3 project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Workshop\DemoBundle;

use Mapbender\CoreBundle\Component\MapbenderBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Mapbender\CoreBundle\DependencyInjection\Compiler\MapbenderYamlCompilerPass;


/**
 * WorkshopDemo
 *
 * @author Astrid Emde
 */
class WorkshopDemoBundle extends MapbenderBundle
{
    
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new MapbenderYamlCompilerPass());
    }    


    /**
     * @inheritdoc
     */
    public function getTemplates()
    {
        return array('Workshop\DemoBundle\Template\DemoFullscreen');
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
