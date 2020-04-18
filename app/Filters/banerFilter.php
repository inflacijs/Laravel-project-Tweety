<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class banerFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
       $img = $image->fit(700,230);
        return $img;
    }
}