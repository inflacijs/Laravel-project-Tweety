<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class avatarFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
       $img = $image->fit(300,300);
       return $img;
    }
}