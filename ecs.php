<?php

declare(strict_types=1);

use Contao\EasyCodingStandard\Set\SetList;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withSets([SetList::CONTAO])
    ->withPaths([
        __DIR__.'/contao',
        __DIR__.'/src',
    ])
    ->withSkip([
        MethodChainingIndentationFixer::class,
    ])
    ->withParallel()
    ->withSpacing(lineEnding: "\n")
    ->withCache(sys_get_temp_dir().'/ecs_default_cache')
;
