<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;
use Webflorist\HtmlFactory\Elements\InputElement;
use Webflorist\HtmlFactory\Elements\ButtonElement;

/**
 * Class representing the HTML-attribute 'type'
 *
 * Class TypeAttribute
 * @package Webflorist\HtmlFactory
 */
class TypeAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'type';
    }

    protected function getAllowedValues() : array
    {
        if ($this->element->is(InputElement::class)) {
            return [
                'button',
                'checkbox',
                'color',
                'date',
                'datetime',
                'datetime-local',
                'email',
                'file',
                'hidden',
                'image',
                'month',
                'number',
                'password',
                'radio',
                'range',
                'reset',
                'search',
                'submit',
                'tel',
                'text',
                'time',
                'url',
                'week'
            ];
        }

        if ($this->element->is(ButtonElement::class)) {
            return [
                'button',
                'submit',
                'reset'
            ];
        }

        return [];
    }


}