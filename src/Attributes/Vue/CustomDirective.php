<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing a custom Vue-Directive.
 *
 * Class CustomDirective
 * @package Webflorist\HtmlFactory
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
     * @param null $argument
     */
    public function __construct(string $directiveName, $argument = null)
    {
        $this->directiveName = $directiveName;

        if (!is_null($argument)) {
            $this->setArgument($argument);
        }
    }

    /**
     * Returns the name of the attribute.
     *
     * @return string
     */
    public function getDirectiveName(): string
    {
        return 'v-'.$this->directiveName;
    }

    protected function getAllowedModifiers()
    {
        return true;
    }


}