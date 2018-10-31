<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-bind'
 *
 * Class BindDirective
 * @package Nicat\HtmlFactory
 */
class BindDirective extends VueDirective
{

    /**
     * BindDirective constructor.
     *
     * @param $attrOrProp
     */
    public function __construct($attrOrProp = null)
    {
        if (!is_null($attrOrProp)) {
            $this->setArgument($attrOrProp);
        }
    }

    public function getDirectiveName(): string
    {
        return 'v-bind';
    }

    protected function getAllowedModifiers()
    {
        return [
            'prop',
            'camel',
            'sync'
        ];
    }


}