<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetLikescontroller extends Controller
{
    public function store(Tweet $tweet) {
        $tweet->toggleLike(current_user());
        return back();
        
    }

    public function destroy(Tweet $tweet){
        $tweet->toggleDislike(current_user());
        return back();
    }
}
