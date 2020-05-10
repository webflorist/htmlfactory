<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'download'
 *
 * Class DownloadAttribute
 * @package Webflorist\HtmlFactory
 */
class DownloadAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'download';
    }
}
