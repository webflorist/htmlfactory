<?php

namespace Webflorist\HtmlFactory\Decorators\Bulma\v0;

use Webflorist\HtmlFactory\Decorators\Abstracts\Decorator;
use Webflorist\HtmlFactory\Elements\InputElement;
use Webflorist\HtmlFactory\Components\CheckboxInputComponent;
use Webflorist\HtmlFactory\Components\FileInputComponent;
use Webflorist\HtmlFactory\Components\RadioInputComponent;
use Webflorist\HtmlFactory\Elements\SelectElement;
use Webflorist\HtmlFactory\Elements\TextareaElement;

class DecorateFields extends Decorator
{

    /**
     * Returns the group-ID of this decorator.
     *
     * Returning null means this decorator will always be applied.
     *
     * @return string|null
     */
    public static function getGroupId()
    {
        return 'bulma:v0';
    }

    /**
     * Returns an array of class-names of elements, that should be decorated by this decorator.
     *
     * @return string[]
     */
    public static function getSupportedElements(): array
    {
        return [
            InputElement::class,
            TextareaElement::class
        ];
    }

    /**
     * Perform decorations on $this->element.
     */
    public function decorate()
    {
        // Radios and checkboxes do not get a special class with bulma.
        if ($this->element->is(CheckboxInputComponent::class) || $this->element->is(RadioInputComponent::class)) {
            return;
        }
        $this->element->addClass($this->getFormControlClass());
    }

    /**
     * Returns form-control-class to be used for $this->element.
     *
     * @return string
     */
    protected function getFormControlClass(): string
    {
		
        if ($this->element->is(TextareaElement::class)) {
            return 'textarea';
        }

        return 'input';
    }
}