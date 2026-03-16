<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupFlex\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'miscellaneous', template: 'content_element/element_group_flex')]
class ElementGroupFlex extends AbstractContentElementController
{
    public function __construct(
        private readonly array $allowedTypes
    ) {}
    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        return $template->getResponse();
    }
}
