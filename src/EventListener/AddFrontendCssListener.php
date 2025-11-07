<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupFlex\EventListener;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\Asset\Packages;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;

#[AsEventListener]
class AddFrontendCssListener
{
    public function __construct(
        private readonly ScopeMatcher $scopeMatcher,
        private readonly Packages $packages,
    ) {
    }

    public function __invoke(RequestEvent $event): void
    {
        if (!$this->scopeMatcher->isFrontendMainRequest($event)) {
            return;
        }

        $GLOBALS['TL_CSS'][] = $this->packages->getUrl('content-element-group-flex.css', 'contao_element_group_flex');
    }
}
