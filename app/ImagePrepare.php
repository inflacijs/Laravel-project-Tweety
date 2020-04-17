<?php

namespace App;

use Intervention\Image\Facades\Image;

class ImagePrepare 
{
    public static function profileBanner($imagePath)
    {
        
        $image = Image::make($imagePath)->fit(700,300);
        dd($image);
        
    }
}
