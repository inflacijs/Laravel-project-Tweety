<?php

namespace App;

trait Followable 
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }


    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }


    public function toggleFollow(User $user)
    {
        // if($this->following($user))
        // {
        //    return  $this->unFollow($user);
        // } 
        //    return $this->follow($user);  // Šī vietā izmantojam īsāku kodu

        $this->follows()->toggle($user);
        
    }
    

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }


    public function following(User $user)
        {
            // return $this->follows->contains($user); Šajā variantā katru reizi tiek pieprasīts collection ar 
            // visu following sarakstu,kas nebūtu pārāk resurssefektīvi.
            return $this->follows()->where('following_user_id', $user->id)->exists();
        }
    
}