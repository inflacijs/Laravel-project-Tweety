<?php

namespace App;




class ImagePrepare 
{
    public static function profileBanner($imagePath)
    {
        
        $image = \Image::make($imagePath)->fit(300,300);
        // dd($image->response('jpg'));
        return $image->response('jpg');
        
        
    }
}
