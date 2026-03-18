<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupFlex\DependencyInjection\Compiler;

use agenturkopfnuss\ContaoElementGroupFlex\Controller\ContentElement\ElementGroupFlex;
use Contao\CoreBundle\Fragment\Reference\ContentElementReference;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AllowedTypesPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has(ElementGroupFlex::class)) {
            return;
        }

        $allowedTypes = $container->getParameter('contao_element_group_flex.allowed_types');
        $definition = $container->findDefinition(ElementGroupFlex::class);
        $tags = $definition->getTag(ContentElementReference::TAG_NAME);

        if (empty($tags)) {
            return;
        }

        $tags[0]['nestedFragments'] = ['allowedTypes' => $allowedTypes];

        $definition->clearTag(ContentElementReference::TAG_NAME);

        foreach ($tags as $tag) {
            $definition->addTag(ContentElementReference::TAG_NAME, $tag);
        }
    }
}
