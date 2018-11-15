<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Attributes\Traits\AllowsAltAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsHeightAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsSrcAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsWidthAttribute;
use Nicat\HtmlFactory\Elements\Abstracts\EmptyElement;

/**
 * Class representing a HTML-element '<img />'.
 *
 * Class ImgElement
 * @package Nicat\HtmlFactory
 */
class ImgElement extends EmptyElement
{

    use AllowsAltAttribute,
        AllowsHeightAttribute,
        AllowsSrcAttribute,
        AllowsWidthAttribute;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'img';
    }
}