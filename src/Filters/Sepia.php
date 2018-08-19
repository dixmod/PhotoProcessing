<?php
declare(strict_types=1);

namespace Dixmod\Filters;

class Sepia extends AbstractFilter
{
    /**
     * @param resource $image
     * @return resource
     */
    public function processing($image)
    {
        imagefilter($image,IMG_FILTER_GRAYSCALE);
        imagefilter($image,IMG_FILTER_BRIGHTNESS,-30);
        imagefilter($image,IMG_FILTER_COLORIZE, 90, 55, 30);
        return $image;
    }
}