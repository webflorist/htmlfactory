<?php

namespace Nicat\HtmlFactory\Decorators\Foundation\v6;

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
     * Returns the group-ID of this decorator.
     *
     * Returning null means this decorator will always be applied.
     *
     * @return string|null
     */
    public static function getGroupId()
    {
        return 'foundation:v6';
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

        $this->element->addClass('callout');

        if ($this->element->hasContext()) {
            $this->element->addClass($this->element->getContext());
        }

        if ($this->element->isDismissible()) {
            $this->element->data('closable',true);
            $this->element->appendContent(
                (new ButtonElement())
                    ->addClass('close-button')
                    ->data('close', true)
                    ->content(
                        (new SpanElement())->content('&times;')
                    )
            );
        }
    }
}