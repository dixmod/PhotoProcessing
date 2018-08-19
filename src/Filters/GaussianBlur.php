<?php
declare(strict_types=1);

namespace Dixmod\Filters;

class GaussianBlur extends AbstractFilter
{
    /**
     * @param resource $image
     * @return resource
     */
    public function processing($image)
    {
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        return $image;
    }
}