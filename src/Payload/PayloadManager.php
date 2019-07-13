<?php

namespace Webflorist\HtmlFactory\Payload;

use Illuminate\Support\Arr;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Exceptions\InvalidPayloadException;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;
use Webflorist\HtmlFactory\Payload\Abstracts\Payload;

class PayloadManager
{

    /**
     * Any custom data, that can be retrieved via $this->getPayload().
     *
     * @var Payload
     */
    private $payload;

    /**
     * PayloadManager constructor.
     */
    public function __construct()
    {
        $this->payload = new Payload();
    }

    /**
     * Set any payload.
     *
     * Can also set data at specific location
     * using "dot" notation via the $key
     * parameter.
     *
     * @param mixed|Payload $payload
     * @param string|null $key
     * @throws InvalidPayloadException
     */
    public function set($payload, string $key = null)
    {
        // Set complete payload.
        if (is_null($key) || strlen($key) == null) {
            if (is_a($payload, Payload::class)) {
                $this->payload = $payload;
            }
            else {
                throw new InvalidPayloadException("You can only set a Payload object as the root payload-element.");
            }
        }
        // Set specific data inside the payload
        else {
            dd($this->payload);
        }
    }

    /**
     * Returns payload set under specific key.
     *
     * Returns complete payload-object,
     * if called with no parameters.
     *
     * @param string|null $key
     * @param string|null $defaultValue
     * @return mixed|Payload
     * @throws PayloadNotFoundException
     */
    public function get(string $key = null, string $defaultValue = null)
    {
        // Return complete payload-array, if $key is null.
        if (is_null($key)) {
            return $this->payload;
        }

        if (!$this->hasPayload($key)) {
            if (!is_null($defaultValue)) {
                return $defaultValue;
            }
            throw new PayloadNotFoundException("No payload found for key '$key'. Either add the payload or state a default value.'");
        }
        return $this->payload->{$key};
    }

    /**
     * Is a specific payload-key set?.
     *
     * @param string $key
     * @return bool
     */
    public function hasPayload(string $key)
    {
        return property_exists($this->payload, $key);
    }

    /**
     * Clears all current payload.
     */
    public function clear()
    {
        $this->payload = [];
    }
}