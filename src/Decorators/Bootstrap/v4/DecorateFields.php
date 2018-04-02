<?php

namespace Nicat\HtmlFactory\Decorators\Bootstrap\v4;

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
            InputElement::class,
            TextareaElement::class,
            SelectElement::class
        ];
    }

    /**
     * Perform decorations on $this->element.
     */
    public function decorate()
    {
        $this->element->addClass($this->getFormControlClass());
    }

    /**
     * Returns form-control-class to be used for $this->element.
     *
     * @return string
     */
    protected function getFormControlClass(): string
    {
		if ($this->element->is(CheckboxInputComponent::class) || $this->element->is(RadioInputComponent::class)) {
			return 'form-check-input';
		}
		
        if ($this->element->is(FileInputComponent::class)) {
            return 'form-control-file';
        }

        return 'form-control';
    }
}