<?php

namespace Nicat\HtmlFactory\Decorators\Bootstrap\v3;

use Nicat\HtmlFactory\Components\AlertComponent;
use Nicat\HtmlFactory\Decorators\Abstracts\Decorator;
use Nicat\HtmlFactory\Elements\ButtonElement;
use Nicat\HtmlFactory\Elements\SpanElement;

class DecorateAlertComponent extends Decorator
{

    /**
     * The element to be decorated.
     *
     * @var AlertComponent
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
            AlertComponent::class
        ];
    }

    /**
     * Perform decorations on $this->element.
     */
    public function decorate()
    {
        $this->element->addClass('alert');
        $this->element->addClass('m-b-1');

        if ($this->element->hasContext()) {
            $this->element->addClass('alert-' . $this->element->getContext());
        }

        if ($this->element->isDismissible()) {
            $this->element->addClass('alert-' . $this->element->getContext());
            $this->element->prependContent(
                (new ButtonElement())
                    ->addClass('close')
                    ->data('dismiss', 'alert')
                    ->content(
                        (new SpanElement())->content('&times;')
                    )
            );
        }
    }
}