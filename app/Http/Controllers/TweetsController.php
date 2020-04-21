<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function store()
    {
        
        $attributes = request()->validate([
            'body' => ['required','max:255'], 
            'image' => ['image', 'nullable', 'mimes:jpeg,png,jpg,gif', 'max:3072']
        ]);

        if (request('image'))
        {
            $attributes['image'] = request('image')->store('images');
        }
       
       $attributes['user_id'] = auth()->id();

        Tweet::create($attributes);
    
        return redirect()
                ->route('home')
                ->with('flash_message','Tweet is succesfully published.');
    }

    public function index()
    {
        
        return view('tweets.index', ['tweets' => current_user()->timeline()]);
    }
}
