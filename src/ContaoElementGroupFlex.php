<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupFlex;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ContaoElementGroupFlex extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        // Config verarbeiten
        $processedConfig = $this->processConfiguration(new \agenturkopfnuss\ContaoElementGroupFlex\DependencyInjection\Configuration(), $config);

        // Parameter in den Container schreiben
        $containerBuilder->setParameter('contao_element_group_flex.allowed_types', $processedConfig['allowed_types']);

        $services = $containerConfigurator->services();
        $services
            ->defaults()
            ->autoconfigure()
            ->autowire()
        ;

        $services
            ->load('agenturkopfnuss\\ContaoElementGroupFlex\\', './')
            ->exclude([
                'ContaoManager',
                'ContaoElementGroupFlex.php',
            ])
        ;

        // Explizit den Array-Parameter setzen
        $services
            ->set(\agenturkopfnuss\ContaoElementGroupFlex\Controller\ContentElement\ElementGroupFlex::class)
            ->arg('$allowedTypes', '%contao_element_group_flex.allowed_types%')
        ;
    }
}
