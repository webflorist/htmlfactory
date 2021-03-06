<?php

namespace Webflorist\HtmlFactory\Decorators\Bootstrap\v3;

use Webflorist\HtmlFactory\Components\AlertComponent;
use Webflorist\HtmlFactory\Decorators\Abstracts\Decorator;
use Webflorist\HtmlFactory\Elements\ButtonElement;
use Webflorist\HtmlFactory\Elements\SpanElement;

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
        return 'bootstrap:v3';
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