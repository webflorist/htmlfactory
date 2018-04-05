<?php

namespace Nicat\HtmlFactory\Decorators\Bootstrap\v4;

use Nicat\HtmlFactory\Components\PanelComponent;
use Nicat\HtmlFactory\Decorators\Abstracts\Decorator;

class DecoratePanelComponent extends Decorator
{

    /**
     * The element to be decorated.
     *
     * @var PanelComponent
     */
    protected $element;

    /**
     * Returns an array of frontend-framework-ids, this decorator is specific for.
     *
     * @return string[]
     */
    public static function getSupportedFrameworks(): array
    {
        return [
            'bootstrap:4'
        ];
    }

    /**
     * Returns an array of class-names of elements, that should be decorated by this decorator.
     *
     * @return string[]
     */
    public static function getSupportedElements(): array
    {
        return [
            PanelComponent::class
        ];
    }

    /**
     * Perform decorations on $this->element.
     */
    public function decorate()
    {
        $this->element->addClass('card');

        $context = 'default';
        if ($this->element->hasContext()) {
            $context = $this->element->getContext();
        }

        $this->element->addClass('card-'.$context);

        $this->element->headerWrapper->addClass('card-header');
        $this->element->footerWrapper->addClass('card-footer');
        $this->element->contentWrapper->addClass('card-body');

    }
}