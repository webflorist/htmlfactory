<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<fieldset></fieldset>'
 *
 * Class FieldsetElement
 * @package Webflorist\HtmlFactory
 */
class FieldsetElement extends ContainerElement
{

    public $legend = null;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    protected function getName(): string
    {
        return 'fieldset';
    }

    /**
     * Set content to be used for the legend-tag.
     *
     * @param string|false $legend
     * @return $this
     */
    public function legend($legend) {
        $this->legend = $legend;
        return $this;
    }

    /**
     * Gets called after applying decorators.
     * Overwrite to perform manipulations.
     */
    protected function afterDecoration()
    {
        if (!is_null($this->legend) && ($this->legend !== false)) {
            $this->prependContent((new LegendElement())->content($this->legend));
        }
    }


}