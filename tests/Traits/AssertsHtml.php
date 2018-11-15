<?php

namespace HtmlFactoryTests\Traits;

use DOMDocument;
use DOMNode;
use Gajus\Dindent\Exception\InvalidArgumentException;
use Gajus\Dindent\Exception\RuntimeException;
use Gajus\Dindent\Indenter;
use PHPUnit\Framework\ExpectationFailedException;

trait AssertsHtml
{

    private $expectedHtml;
    private $actualHtml;


    /**
     * Asserts two HTML structures are equal.
     *
     * @param string $expected
     * @param string $actual
     * @param bool $checkHtmlSyntax
     */
    protected function assertHtmlEquals(string $expected, string $actual, $checkHtmlSyntax=false)
    {
        $this->expectedHtml = $expected;
        $this->actualHtml = $actual;

        try {
            $this->expectedHtml = (new Indenter())->indent($this->expectedHtml);
            $this->actualHtml = (new Indenter())->indent($this->actualHtml);
        } catch (RuntimeException $e) {
        } catch (InvalidArgumentException $e) {
        }

        $this->assertDomNodeEquals(
            $this->parseHtml2DomNode($this->expectedHtml, $checkHtmlSyntax),
            $this->parseHtml2DomNode($this->actualHtml, $checkHtmlSyntax)
        );
    }

    /**
     * Formats an Error for assertDomNodeEqualsStructure()
     *
     * @param string $message
     * @return string
     */
    private function generateHtmlStructureErrorMsg(string $message)
    {

        $headerBefore = "\n\n==================\n";
        $headerAfter = "\n==================\n";

        return
            $headerBefore .
            'Error:' .
            $headerAfter .
            $message .
            $headerBefore .
            'Actual HTML:' .
            $headerAfter .
            $this->actualHtml .
            $headerBefore .
            'Expected HTML:' .
            $headerAfter .
            $this->expectedHtml.
            "\n";
    }


    /**
     * Asserts two DOMNodes are equal.
     *
     * @param DOMNode $expected
     * @param DOMNode $actual
     */
    protected function assertDomNodeEquals(DOMNode $expected, DOMNode $actual)
    {
        // Remove any children only consisting of linefeeds and spaces.
        $this->removeIrrelevantChildren($expected);
        $this->removeIrrelevantChildren($actual);

        $actualNodePath = str_replace('/html/body','',$actual->getNodePath());

        // The human readable representation of the tested node - used in error messages.
        if (isset($structure['text'])) {
            $humanReadableNode = 'Plain Text "' . 'blafasel'. '" (child-node at path "' . $actualNodePath . '")';
            $structure['tag'] = '#text';
        } else {
            $humanReadableNode = 'Tag of type "' . $expected->nodeName . '" (child-node at path "' . $actualNodePath . '")';
        }

        // Assert, that the tag-type is the desired one.
        $this->assertEquals(
            $expected->nodeName,
            $actual->nodeName,
            $this->generateHtmlStructureErrorMsg($humanReadableNode . ' could not be found. A "' . $actual->nodeName . '" was found at this location instead.')
        );

        // Check Attributes.
        $actualAttributes = $this->getAttributesFromDomNode($actual);
        $expectedAttributes = $this->getAttributesFromDomNode($expected);
        if (count($expectedAttributes)>0) {

            foreach ($expectedAttributes as $attributeName => $attributeValue) {

                // Assert, that the node indeed has the attribute.
                $this->assertArrayHasKey(
                    $attributeName,
                    $actualAttributes,
                    $this->generateHtmlStructureErrorMsg($humanReadableNode . ' should have the attribute "' . $attributeName . '". But it has not.')
                );

                if (array_search($attributeName, ['class','aria-describedby']) !== false) {

                    $desiredValues = explode(' ', $attributeValue);

                    $presentValues = explode(' ', $actualAttributes[$attributeName]);

                    foreach ($desiredValues as $key => $desiredValue) {

                        // Assert, that the desired class is indeed present.
                        $this->assertNotFalse(
                            array_search($desiredValue, $presentValues),
                            $this->generateHtmlStructureErrorMsg($humanReadableNode . " should have an attribute '$attributeName' containing the value called '$desiredValue'. But it has not.")
                        );

                        unset($presentValues[array_search($desiredValue, $presentValues)]);
                    }

                    // Assert, that the node has no superfluous classes.
                    $this->assertEmpty(
                        $presentValues,
                        $this->generateHtmlStructureErrorMsg($humanReadableNode . ' should not have an attribute "' . $attributeName . '" with the value "' . current($presentValues) . '". But it has.')
                    );

                } else if ($attributeValue !== true) {
                    // Assert, that the attribute has the desired value (only if $attributeValue is not true = boolean attribute).
                    $this->assertEquals(
                        $attributeValue,
                        $actualAttributes[$attributeName],
                        $this->generateHtmlStructureErrorMsg($humanReadableNode . ' should have an attribute "' . $attributeName . '" with the value "' . $attributeValue . '". But the value is "' . $actualAttributes[$attributeName] . '" instead.')
                    );
                }


                // Unset the successfully checked attribute from $actualAttributes,
                // so we can later check for superfluous attributes.
                unset($actualAttributes[$attributeName]);
            }

            // Assert, that the node has no superfluous attributes.
            $this->assertEmpty(
                $actualAttributes,
                $this->generateHtmlStructureErrorMsg($humanReadableNode . ' should not have the attribute "' . key($actualAttributes) . '". But it has.')
            );

        }

        // Assert, that the node has no attributes at all, if this should be the case.
        if (count($expectedAttributes) === 0) {
            $this->assertFalse(
                count($actualAttributes) > 0,
                $this->generateHtmlStructureErrorMsg($humanReadableNode . ' should have no attributes at all, but it has.')
            );
        }

        // Assert, that the plain text is identical (only for nodes which contain plain-text and no tags..
        if (isset($expected->wholeText)) {
            $this->assertEquals(
                trim($expected->wholeText),
                trim($actual->wholeText),
                $this->generateHtmlStructureErrorMsg($humanReadableNode . ' has an unexpected text: "' . $actual->wholeText . '".')
            );
        }

        // Assert, that the child-count is the desired one.
        $expectedChildCount = ($expected->hasChildNodes()?$expected->childNodes->length:0);
        $actualChildCount = ($actual->hasChildNodes()?$actual->childNodes->length:0);
        $this->assertEquals(
            $expectedChildCount,
            $actualChildCount,
            $this->generateHtmlStructureErrorMsg($humanReadableNode . ' should have ' . $expectedChildCount . ' children, but it has ' . $actualChildCount . ' instead.')
        );

        // If the node should have children, we assert those also recursively.
        if ($expected->hasChildNodes()) {
            foreach ($expected->childNodes as $childKey => $expectedChild) {

                $actualChild = $actual->childNodes->item($childKey);

                // Assert, that the child-node is present at all at the desired location.
                $this->assertNotNull(
                    $actualChild,
                    $this->generateHtmlStructureErrorMsg($humanReadableNode.' has no child with key '.$childKey.'.')
                );

                $this->assertDomNodeEquals($expectedChild,$actualChild);
            }
        }

    }

    /**
     * Parses HTML into a DOMNode
     *
     * @param string $html
     * @param bool $checkHtmlSyntax
     * @return DOMNode
     */
    protected function parseHtml2DomNode(string $html, $checkHtmlSyntax=false): DOMNode
    {
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($html);
        if ($checkHtmlSyntax && (count(libxml_get_errors()) > 0)) {
            foreach (libxml_get_errors() as $error) {
                throw new ExpectationFailedException(
                    'HTML-Syntax Error:\n' . $error->message . "in: \n" . $html
                );
            }

            libxml_clear_errors();
        }

        return $dom->getElementsByTagName('body')->item(0);
    }

    /**
     * @param DOMNode $domNode
     * @return array
     */
    protected function getAttributesFromDomNode(DOMNode $domNode): array
    {
        $attributes = [];
        if ($domNode->hasAttributes()) {
            $attributeCount = $domNode->attributes->length;
            for ($i = 0; $i < $attributeCount; ++$i) {
                $attributes[$domNode->attributes->item($i)->name] = $domNode->attributes->item($i)->value;
            }
        }
        return $attributes;
    }

    /**
     * Remove any children only consisting of linefeeds and spaces.
     *
     * @param DOMNode $node
     */
    private function removeIrrelevantChildren(\DOMNode $node)
    {
        if ($node->hasChildNodes()) {
            foreach ($node->childNodes as $child) {
                if (is_a($child, \DOMText::class) && strlen(trim($child->wholeText)) === 0) {
                    $node->removeChild($child);
                    $this->removeIrrelevantChildren($node);
                }
            }
        }
    }
}