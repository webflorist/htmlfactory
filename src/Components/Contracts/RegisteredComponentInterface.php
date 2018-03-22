<?php

namespace Nicat\HtmlFactory\Components\Contracts;

interface RegisteredComponentInterface
{
    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor() : string;

}