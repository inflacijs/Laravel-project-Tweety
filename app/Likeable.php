<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Builder;



trait Likeable {

    public function scopeWithLikes(Builder $query) // Strādas kā Tweet::withLikes()->all(); Sanāk ka pados tweetus kopā ar like un  dislike tabulu. Ja būtu Tweets::all(), tad padotu bez like un dislike tabulas.
    {
            // select * from tweets
            // left join (
            // 	    select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes
            // 	    group by tweet_id
            // 	) 
            // likes on likes.tweet_id = tweets.id

            $query->leftJoinSub(
                'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
                'likes', 
                'likes.tweet_id',
                'tweets.id'
            );
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
            'user_id' => $user ? $user->id : auth()->id(),
            ], 
            [
                'liked' => $liked
            ]);
    }

    public function dislike($user = null)
    {
       return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
      return (bool) $user->likes()   
        ->where('tweet_id', $this->id)
        ->where('liked', true)
        ->count();  
    }

    public function isDislikedBy(User $user)
    {
      return (bool) $user->likes()    
        ->where('tweet_id', $this->id)
        ->where('liked', false)
        ->count();  
    }

    public function deleteRow($user)
    {
        $user->likes()
            ->where('tweet_id', $this->id)
            ->delete();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    
    public function toggleLike(User $user)
    {
        if($this->isLikedBy($user))
        {
            $this->deleteRow($user);
        }else{
            $this->like($user);
        }
            
    }

    public function toggleDislike(User $user)
    {
        if($this->isDislikedBy($user))
        {
            $this->deleteRow($user);
        }else{
            $this->dislike($user);
        }
            
    }

    
}