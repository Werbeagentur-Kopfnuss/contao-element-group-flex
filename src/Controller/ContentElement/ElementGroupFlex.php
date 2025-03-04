<?php
// src/Controller/ContentElement/ElementGroupFlex.php
namespace agenturkopfnuss\ContaoElementGroupFlex\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Contao\CoreBundle\Twig\FragmentTemplate;

#[AsContentElement(category: 'miscellaneous', nestedFragments: ['allowedTypes' => ['image', 'text', 'player', 'table', 'headline', 'element_group']], template:'content_element/element_group_flex')]
class ElementGroupFlex extends AbstractContentElementController
{
    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        return $template->getResponse();
    }
}
