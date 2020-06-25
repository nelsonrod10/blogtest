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

Route::get('/', function(){
  return view('welcome');
});
Route::get('posts-list/{order?}', 'BlogPostsController@index')->name('posts-list');
Route::get('/post/{slug}', 'BlogPostsController@show');
Route::get('/posts-by-author/{id}/{order?}', 'AuthorPostsController@index');

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

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', 'PostController');
    Route::resource('import-posts', 'ImportPostsController')->except(['show']);
    Route::get('imported-posts-list/{order?}', 'ImportPostsController@show');
});

