<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {

        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)], // Beigās neļauj nomainīt username uz jau esošu, bet, ja maina kko citu nevis username, tad ignorē jau esošu username un nemet error, ka tāds jau ir.
            'email' => ['string', 'required', 'max:255', 'email', Rule::unique('users')->ignore($user)],
            'avatar' => ['image'],
            'banner' => ['image'],
            'description' => ['string', 'max:5000', 'nullable'],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],

        ]);
        
        if (request('avatar'))
        {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        if (request('banner'))
        {
            $attributes['banner'] = request('banner')->store('banners');
        }
        
        // Šis izveido "avatars/eXM0RkQoos0hoOiP30jZQdoqntR6zLJhclvQelzP.jpeg"/
        // URL piekoriģējam pie getAvatarAttribute metodes User instancē
        
        $user->update($attributes);

        return redirect($user->path());
    }
}
