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
       
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'image' => $attributes['image']
        ]);

        return redirect()->route('home');
    }

    public function index()
    {
        
        return view('tweets.index', ['tweets' => current_user()->timeline()]);
    }
}
