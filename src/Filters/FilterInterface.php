<?php
declare(strict_types=1);

namespace Dixmod\Filters;

interface FilterInterface
{

    /**
     * @param $image
     * @return mixed
     */
    public function processing($image);
}