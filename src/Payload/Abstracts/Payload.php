<?php

namespace Webflorist\HtmlFactory\Payload\Abstracts;

class Payload
{

    /**
     * Payload constructor.
     *
     * Can take a payload in array-form
     * and populate this object with it.
     *
     * @param array|null $payloadArray
     */
    public function __construct(array $payloadArray = null)
    {
        if (!is_null($payloadArray)) {
            foreach ($payloadArray as $itemKey => $itemValue) {
                $this->$itemKey($itemValue);
            }
        }
    }

    /**
     * Magic setter to set payload-properties,
     * via a method named like the desired property.
     *
     * @param $name
     * @param $arguments
     * @return $this
     */
    public function __call($name, $arguments)
    {
        $this->$name = $arguments[0];
        return $this;
    }

}