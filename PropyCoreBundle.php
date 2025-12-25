<?php

namespace Propy\CoreBundle;

use Propy\CoreBundle\DependencyInjection\PropyCoreExtension;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class PropyCoreBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
    }

    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new PropyCoreExtension();
    }
}
