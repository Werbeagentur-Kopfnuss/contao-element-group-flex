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
    }
}
