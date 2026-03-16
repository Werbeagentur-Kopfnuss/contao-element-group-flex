<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupFlex;

use agenturkopfnuss\ContaoElementGroupFlex\DependencyInjection\Compiler\AllowedTypesPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ContaoElementGroupFlex extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->arrayNode('allowed_types')
                    ->scalarPrototype()->end()
                    ->defaultValue(['image', 'text', 'player', 'table', 'headline', 'element_group', 'accordion'])
                ->end()
            ->end()
        ;
    }

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

        $containerBuilder->setParameter('contao_element_group_flex.allowed_types', $config['allowed_types']);
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->addCompilerPass(new AllowedTypesPass(), priority: 10);
    }
}
