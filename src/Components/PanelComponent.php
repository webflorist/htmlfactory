<?php

namespace Webflorist\HtmlFactory\Components;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Components\Traits\HasContext;
use Webflorist\HtmlFactory\Components\Traits\HasFooter;
use Webflorist\HtmlFactory\Components\Traits\HasHeader;
use Webflorist\HtmlFactory\Elements\DivElement;

class PanelComponent extends DivElement implements RegisteredComponentInterface
{
    use HasContext,
        HasHeader,
        HasFooter;

    /**
     * Wrapper for header.
     *
     * @var DivElement
     */
    public $headerWrapper;

    /**
     * Wrapper for footer.
     *
     * @var DivElement
     */
    public $footerWrapper;

    /**
     * Wrapper for content.
     *
     * @var DivElement
     */
    public $contentWrapper;

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        $this->headerWrapper = new DivElement();
        $this->footerWrapper = new DivElement();
        $this->contentWrapper = new DivElement();
    }

    /**
     * Gets called before applying decorators.
     * Overwrite to perform manipulations.
     */
    protected function beforeDecoration()
    {
        // Wrap content with $this->contentWrapper
        $this->contentWrapper->content( $this->content->get());
        $this->content->clear();
        $this->content($this->contentWrapper);

        // Prepend header, if defined.
        if ($this->hasHeader()) {
            $this->prependContent(
                $this->headerWrapper->content($this->getHeader())
            );
        }

        // Append footer, if defined.
        if ($this->hasFooter()) {
            $this->appendContent(
                $this->footerWrapper->content($this->getFooter())
            );
        }
    }


    /**
     * Returns the accessor, under which this component will be accessible.
     *
     * @return string
     */
    public static function getAccessor(): string
    {
        return 'panel';
    }
}