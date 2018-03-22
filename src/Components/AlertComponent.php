<?php

namespace Nicat\HtmlFactory\Components;

use Nicat\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Nicat\HtmlFactory\Components\Traits\HasContext;
use Nicat\HtmlFactory\Components\Traits\IsDismissible;
use Nicat\HtmlFactory\Elements\DivElement;

class AlertComponent extends DivElement implements RegisteredComponentInterface
{
    use HasContext,
        IsDismissible;

    /**
     * Alert constructor.
     *
     * @param string $context
     */
    public function __construct(string $context)
    {
        parent::__construct();
        $this->addRole('alert');
        $this->context($context);
    }

    /**
     * Returns the accessor, under which this component will be accessible.
     *
     * @return string
     */
    public static function getAccessor(): string
    {
        return 'alert';
    }
}