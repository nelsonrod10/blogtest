<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends PostsHelpersController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order = null)
    {   
        $user = Auth::user();
        if($order === null){
            $posts = $user->posts()->paginate(12);
        }else{
            $posts = $this->orderUserPostByPublicationDate($user,$order);
        }
        
        return view('home')->with(compact('posts'));
    }
}
