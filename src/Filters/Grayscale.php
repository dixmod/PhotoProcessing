<?php
declare(strict_types=1);

namespace Dixmod\Filters;

class Grayscale extends AbstractFilter
{
    /**
     * @param resource $image
     * @return bool
     */
    public function processing($image)
    {
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        return $image;
    }
}