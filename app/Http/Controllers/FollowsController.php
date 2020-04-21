<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        // have the auth'd user follow the given user
        current_user()->toggleFollow($user);

        if(current_user()->following($user))
        {
            return redirect()
                ->back()
                ->with('follow', 'Now you are following ' . $user->name);

        }

        return redirect()
                ->back()
                ->with('unfollow', 'You stopped following ' . $user->name);
        
       
    }
}
