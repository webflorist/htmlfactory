<?php

namespace Webflorist\HtmlFactory;

use Illuminate\Support\Facades\Facade;

class HtmlFactoryFacade extends Facade {

    /**
     * Static access-proxy for the HtmlFactory
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return HtmlFactory::class; }

}