<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Attributes\TargetAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDownloadAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsHrefAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsHreflangAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsRelAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsTargetAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsTypeAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsValueAttribute;
use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<a></a>'
 *
 * Class AElement
 * @package Webflorist\HtmlFactory
 */
class AElement extends ContainerElement
{

    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsDownloadAttribute,
        AllowsHrefAttribute,
        AllowsHreflangAttribute,
        AllowsRelAttribute,
        AllowsTargetAttribute;

    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'a';

    /**
     * Set value of HTML-attribute
     * 'target' to '_blank'.
     *
     * @return $this
     */
    public function targetBlank()
    {
        $this->target('_blank');
        return $this;
    }

    /**
     * Set value of HTML-attribute
     * 'target' to '_parent'.
     *
     * @return $this
     */
    public function targetParent()
    {
        $this->target('_parent');
        return $this;
    }

    /**
     * Set value of HTML-attribute
     * 'target' to '_self'.
     *
     * @return $this
     */
    public function targetSelf()
    {
        $this->target('_self');
        return $this;
    }

    /**
     * Set value of HTML-attribute
     * 'target' to '_top'.
     *
     * @return $this
     */
    public function targetTop()
    {
        $this->target('_top');
        return $this;
    }

}
