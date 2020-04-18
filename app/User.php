<?php

namespace App;

use App\Like;
use App\Tweet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'avatar', 'banner', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function getAvatarAttribute($value) // Izsaucot user->avatar, __getProperty maģiskā metode pārbauda vai mums nav šāda metode, kas koriģē value.
    {
        
        
        return $value ? 'http://localhost/tweety/public/imagecache/avatar/' . $value  : asset('/images/icon.png');
    }

    public function getBannerAttribute($value)
    {
        
        return $value ? 'http://localhost/tweety/public/imagecache/banner/' . $value  : asset('/images/no-image.png');
    }

    public function setPasswordAttribute($value) // Reģistrācijas brīdīt user->password pārvērš sālī.
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function timeline()
    {
        // include all of the user's tweets
        // as well as the tweets of everyone
        // they follow ... in descending order by date

        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);
        return Tweet::whereIn('user_id', $ids)->withLikes()->latest()->get();

    }


    public function tweets()
    {
        return $this->hasMany(Tweet::class)->withlikes(); 
        // Prieks profila lapas, kur vajadzēs parādīt tikai viņa tweetus
    }

    public function path($append = '')
    {
        $path =  route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;

    }

    public function likes()
    {

        return $this->hasMany(Like::class);
    }


}
