<?php

namespace Webflorist\HtmlFactory\Decorators\Bootstrap\v4;

use Webflorist\HtmlFactory\Decorators\Bootstrap\v3\DecorateFieldsetElement as Bootstrap3DecorateFieldsetElement;

class DecorateFieldsetElement extends Bootstrap3DecorateFieldsetElement
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

}