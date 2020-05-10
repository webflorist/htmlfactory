<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\DownloadAttribute;
use Webflorist\HtmlFactory\Attributes\IdAttribute;

trait AllowsDownloadAttribute
{

    /**
     * Set value of HTML-attribute 'download'.
     *
     * @param bool|string|\Closure $download
     * @return $this
     */
    public function download($fileName=true)
    {
        $this->attributes->establish(DownloadAttribute::class)->setValue($fileName);
        return $this;
    }

}
