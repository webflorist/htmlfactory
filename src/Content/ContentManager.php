<?php

namespace Webflorist\HtmlFactory\Content;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\HtmlFactoryTools;

class ContentManager
{

    /**
     * Array of contained elements.
     *
     * @var Element[]
     */
    protected $content = [];

    /**
     * The HTML-element this ContentManager manages content for.
     *
     * @var Element
     */
    protected $element;
    
    /**
     * ContentManager constructor.
     *
     * @param Element $element
     */
    public function __construct(Element $element)
    {
        $this->element = $element;
    }

    /**
     * Append a single child or an array of children.
     *
     * @param Element|string|array $content
     */
    public function appendContent($content)
    {
        if (!is_array($content)) {
            $content = [$content];
        }
        foreach ($content as $child) {
            $this->appendChild($child);
        }
    }

    /**
     * Prepend a single child or an array of children.
     *
     * @param Element|string|array $content
     */
    public function prependContent($content)
    {
        if (!is_array($content)) {
            $content = [$content];
        }
        foreach (array_reverse($content) as $child) {
            $this->prependChild($child);
        }
    }

    /**
     * Returns array of contents of this element.
     *
     * @return array
     */
    public function get() : array
    {
        return $this->content;
    }

    /**
     * Does this element have any content?
     *
     * @return bool
     */
    public function hasContent() : bool
    {
        return count($this->content)>0;
    }

    /**
     * Clears all current content.
     */
    public function clear()
    {
        $this->content = [];
    }

    /**
     * Appends a single child within this element.
     * $child either be another 'Element' object or a string.
     *
     * @param Element|string $child
     */
    public function appendChild($child)
    {
        $this->content[] = $child;
    }

    /**
     * Prepends a single child within this element.
     * $child can be either be another 'Element' object or a string.
     *
     * @param Element|string $child
     */
    public function prependChild($child)
    {
        array_unshift($this->content, $child);
    }

    /**
     * Inserts a child after an existing child of this element.
     * $child can be either another 'Element' object or a string.
     *
     * @param Element|string $child
     * @param Element $afterThis
     */
    public function insertChildAfter($child, Element $afterThis)
    {
        foreach ($this->content as $childKey => $childElement) {
            if ($childElement === $afterThis) {
                array_splice($this->content,$childKey+1,0,[$child]);
            }
        }
    }

    /**
     * Inserts a child before an existing child of this element.
     * $child can be either another 'Element' object or a string.
     *
     * @param Element|string $child
     * @param Element $beforeThis
     */
    public function insertChildBefore($child, Element $beforeThis)
    {
        foreach ($this->content as $childKey => $childElement) {
            if ($childElement === $beforeThis) {
                array_splice($this->content,$childKey,0,[$child]);
            }
        }
    }

    /**
     * Replaces a certain child-element with another content.
     *
     * @param Element $child
     * @param Element|string $newChild
     */
    public function replaceChild(Element $child, $newChild)
    {
        foreach ($this->content as $childKey => $childElement) {
            if ($childElement === $child) {
                $this->content[$childKey] = $newChild;
            }
        }
    }

    /**
     * Searches this element for any children of class $className
     * and returns them in an array.
     * $className can also be an Interface.
     *
     * @param string $className
     * @param bool $recursive
     * @return Element[]
     */
    public function getChildrenByClassName(string $className, $recursive=true) : array
    {
        $foundElements = [];
        foreach ($this->content as $childElement) {
            if (is_object($childElement)) {
                if ($childElement->is($className)) {
                    $foundElements[] = $childElement;
                }
                if ($recursive && $childElement->is(ContainerElement::class)) {
                    /** @var ContainerElement $childElement */
                    $foundElements = array_merge($foundElements,$childElement->content->getChildrenByClassName($className,true));
                }

            }
        }
        return $foundElements;
    }
}