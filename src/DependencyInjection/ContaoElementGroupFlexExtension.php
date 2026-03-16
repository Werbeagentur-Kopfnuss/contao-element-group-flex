<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupFlex\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ContaoElementGroupFlexExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // Wert als Container-Parameter bereitstellen
        $container->setParameter(
            'contao_element_group_flex.allowed_types',
            $config['allowed_types']
        );

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));
        $loader->load('services.yaml');
    }
}