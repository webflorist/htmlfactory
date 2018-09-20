<?php

namespace Nicat\HtmlFactory\Decorators\Bootstrap\v4;

use Nicat\HtmlFactory\Decorators\Bootstrap\v3\DecorateFieldsetElement as Bootstrap3DecorateFieldsetElement;

class DecorateFieldsetElement extends Bootstrap3DecorateFieldsetElement
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