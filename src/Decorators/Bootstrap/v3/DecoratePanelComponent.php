<?php

namespace Webflorist\HtmlFactory\Decorators\Bootstrap\v3;

use Webflorist\HtmlFactory\Components\PanelComponent;
use Webflorist\HtmlFactory\Decorators\Abstracts\Decorator;

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
            'bootstrap:3'
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
        $this->element->addClass('panel');

        $context = 'default';
        if ($this->element->hasContext()) {
            $context = $this->element->getContext();
        }

        $this->element->addClass('panel-'.$context);

        $this->element->headerWrapper->addClass('panel-heading');
        $this->element->footerWrapper->addClass('panel-footer');
        $this->element->contentWrapper->addClass('panel-body');

    }
}