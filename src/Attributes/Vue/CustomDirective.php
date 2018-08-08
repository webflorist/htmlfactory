<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing a custom Vue-Directive.
 *
 * Class CustomDirective
 * @package Nicat\HtmlFactory
 */
class CustomDirective extends VueDirective
{

    /**
     * The name of the custom directive.
     *
     * @var string
     */
    private $directiveName;

    /**
     * CustomDirective constructor.
     *
     * @param string $directiveName
     */
    public function __construct(string $directiveName)
    {
        $this->directiveName = $directiveName;
    }

    /**
     * Returns the name of the attribute.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'v-'.$this->directiveName;
    }

    protected function getAllowedModifiers()
    {
        return true;
    }


}