<?php

namespace Nicat\HtmlFactory\Elements\Abstracts;

use Nicat\HtmlFactory\Content\ContentManager;

/**
 * A HTML-element, that can contain content.
 * They have a start and an end-tag (e.g. '<p></p>').
 *
 * Class ContainerElement
 * @package Nicat\HtmlFactory
 */
abstract class ContainerElement extends Element
{

    /**
     * ContentManager
     *
     * @var ContentManager
     */
    public $content;

    /**
     * ContainerElement constructor.
     */
    public function __construct()
    {
        $this->content = new ContentManager($this);
        parent::__construct();
    }

    /**
     * Render the element to an HTML-string.
     *
     * @return string
     */
    public function renderHtml(): string
    {
        return
            '<' . $this->getName() . $this->attributes->render(true) . '>' .
            $this->generateContent() .
            '</' . $this->getName() . '>';
    }

    /**
     * Alias for appendContent().
     *
     * @param Element|string|array $content
     * @return $this
     */
    public function content($content)
    {
        return $this->appendContent($content);
    }

    /**
     * Append a single child or an array of children.
     *
     * @param Element|string|array $content
     * @return $this
     */
    public function appendContent($content)
    {
        $this->content->appendContent($content);
        return $this;
    }

    /**
     * Prepend a single child or an array of children.
     *
     * @param Element|string|array $content
     * @return $this
     */
    public function prependContent($content)
    {
        $this->content->prependContent($content);
        return $this;
    }

    /**
     *  Applies all decorators.
     *  Overwritten to apply decorators to all child-elements too.
     */
    public function applyDecorators()
    {

        if (!$this->wasDecorated) {

            parent::applyDecorators();

            foreach ($this->content->getChildrenByClassName(Element::class) as $childElement) {
                $childElement->applyDecorators();
            }

            $this->afterChildrenDecoration();

        }

    }

    /**
     * Gets called after applying decorators to the child-elements.
     * Overwrite to perform manipulations.
     */
    protected function afterChildrenDecoration()
    {
    }

    /**
     * Renders all content.
     *
     * @return string
     */
    public function generateContent()
    {
        $html = '';
        foreach ($this->content->get() as $child) {
            if (is_a($child, Element::class)) {
                /** @var Element $child */
                $child = $child->generate();
            }
            $html .= $child;
        }
        return $html;
    }
}