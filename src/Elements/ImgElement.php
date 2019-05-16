<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Attributes\Traits\AllowsAltAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsHeightAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsSrcAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsWidthAttribute;
use Webflorist\HtmlFactory\Elements\Abstracts\EmptyElement;

/**
 * Class representing a HTML-element '<img />'.
 *
 * Class ImgElement
 * @package Webflorist\HtmlFactory
 */
class ImgElement extends EmptyElement
{

    use AllowsAltAttribute,
        AllowsHeightAttribute,
        AllowsSrcAttribute,
        AllowsWidthAttribute;

    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'img';
}