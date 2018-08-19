<?php
declare(strict_types=1);

namespace Dixmod\Filters;

class Emboss extends AbstractFilter
{
    /**
     * @param resource $image
     * @return resource
     */
    public function processing($image)
    {
        imagefilter($image, IMG_FILTER_EMBOSS);
        return $image;
    }
}