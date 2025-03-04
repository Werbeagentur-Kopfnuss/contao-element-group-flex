<?php
// src/ContaoManager/Plugin.php

declare(strict_types=1);

/*
 * Element Group Flex for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2025, Agentur KOPFNUSS
 * @author     Agentur KOPFNUSS <https://werbeagentur-kopfnuss.de>
 * @license    MIT
 * @link
 */

namespace agenturkopfnuss\ContaoElementGroupFlex\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Contao\CoreBundle\ContaoCoreBundle;
use agenturkopfnuss\ContaoElementGroupFlex\ContaoElementGroupFlex;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class Plugin implements BundlePluginInterface, RoutingPluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoElementGroupFlex::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }

    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        return $resolver
            ->resolve(__DIR__.'/../../config/routes.yaml')
            ->load(__DIR__.'/../../config/routes.yaml');
    }
}
