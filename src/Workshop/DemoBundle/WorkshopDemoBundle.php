<?php

/*
 * This file is part of the Mapbender project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Workshop\DemoBundle;

use Mapbender\CoreBundle\DependencyInjection\Compiler\AutodetectSasscBinaryPass;
use Mapbender\CoreBundle\DependencyInjection\Compiler\ContainerUpdateTimestampPass;
use Mapbender\CoreBundle\DependencyInjection\Compiler\MapbenderYamlCompilerPass;
use Mapbender\CoreBundle\DependencyInjection\Compiler\ProvideBrandingPass;
use Mapbender\CoreBundle\DependencyInjection\Compiler\ProvideCookieConsentGlobalPass;
use Mapbender\CoreBundle\DependencyInjection\Compiler\RebuildElementInventoryPass;
use Mapbender\CoreBundle\DependencyInjection\Compiler\RewriteFormThemeCompilerPass;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;


/**
 * WorkshopDemo
 *
 * @author Astrid Emde
 */
class WorkshopDemoBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $configLocator = new FileLocator(__DIR__ . '/Resources/config');
        $xmlLoader = new XmlFileLoader($container, $configLocator);
        $xmlLoader->load('elements.xml');
        //$xmlLoader->load('services.xml');        
        $xmlLoader->load('templates.xml');
        // Auto-rebuild on config change
        $container->addResource(new FileResource($xmlLoader->getLocator()->locate('elements.xml')));
        //$container->addResource(new FileResource($xmlLoader->getLocator()->locate('services.xml')));
        $container->addResource(new FileResource($xmlLoader->getLocator()->locate('templates.xml')));
    }
}
