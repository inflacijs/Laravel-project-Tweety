<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');

    Route::post('/profiles/{user:username}/follow', 'FollowsController@store')->name('follow');
    Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit')
                ->middleware('can:edit,user'); // Šis atsaucās uz UserPolicy edit metodi

    Route::patch('/profiles/{user:username}', 'ProfilesController@update')
                ->middleware('can:edit,user');
    Route::get('/explore', 'ExploreController')->name('explore');
});

Route::get('/profiles/{user:username}', 'ProfilesController@show')->name('profile');

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/image', function()
{
    // $img = Image::make('http://localhost/tweety/public/storage/banners/fqMXpuYCPAOT4W9rArDhgwGxaNu4aGIwsjnq0Rqp.jpeg')->fit(300,300);
    
    // return $img->response('jpg');

     $img = Image::cache(function($image) {
        $image->make('http://localhost/tweety/public/storage/banners/fqMXpuYCPAOT4W9rArDhgwGxaNu4aGIwsjnq0Rqp.jpeg')->resize(300, 200)->greyscale();
        
    });
    return $img->response('jpg');
});




Auth::routes();



