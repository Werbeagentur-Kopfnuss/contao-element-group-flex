<?php
// src/ContaoElementGroupFlex.php

declare(strict_types=1);

/*
 * Element Group Flex for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2025, Agentur KOPFNUSS
 * @author     Agentur KOPFNUSS <https://werbeagentur-kopfnuss.de>
 * @license    MIT
 * @link
 */

namespace agenturkopfnuss\ContaoElementGroupFlex;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ContaoElementGroupFlex extends AbstractBundle
{
    public function loadExtension(
        array $config,
        ContainerConfigurator $containerConfigurator,
        ContainerBuilder $containerBuilder,
    ): void
    {
        $containerConfigurator->import('../config/services.yaml');
    }
}