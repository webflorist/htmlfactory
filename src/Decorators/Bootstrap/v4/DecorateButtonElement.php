<?php

namespace Webflorist\HtmlFactory\Decorators\Bootstrap\v4;

use Webflorist\HtmlFactory\Decorators\Bootstrap\v3\DecorateButtonElement as Bootstrap3DecorateButtonElement;

class DecorateButtonElement extends Bootstrap3DecorateButtonElement
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
        return 'bootstrap:v4';
    }
}