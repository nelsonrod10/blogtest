<?php

use Illuminate\Support\Facades\Route;
use App\Post;

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

Route::get('/', 'WelcomeController@index');
Route::get('order-posts/{order?}', 'WelcomeController@index')->name('order-posts');

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Registration Routes...
Route::get('register', function(){
  return view('auth.register');
})->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/{slug}', 'BlogPostsController@show')->name('post');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', 'PostController');
    Route::resource('import-posts', 'ImportPostsController');
    Route::get('order-user-posts/{order?}', 'HomeController@index')->name('order-user-posts');
});

