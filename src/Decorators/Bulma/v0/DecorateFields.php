<?php

namespace Nicat\HtmlFactory\Decorators\Bulma\v0;

use Nicat\HtmlFactory\Decorators\Abstracts\Decorator;
use Nicat\HtmlFactory\Elements\InputElement;
use Nicat\HtmlFactory\Components\CheckboxInputComponent;
use Nicat\HtmlFactory\Components\FileInputComponent;
use Nicat\HtmlFactory\Components\RadioInputComponent;
use Nicat\HtmlFactory\Elements\SelectElement;
use Nicat\HtmlFactory\Elements\TextareaElement;

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