<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use App\Post;

class PostsHelpersController extends Controller
{
    public function requestAPI($user){
        $this->authorize('importPosts', $user);
        $response = Http::retry(4,100)->get('https://sq1-api-test.herokuapp.com/posts');

        if($response->successful()){
            return $response->json();
        }

    }

    public function getRandomImageCollection(){
        $arrCollections = [1118905,778914,494263,225,3106804,539527,3657445,764827];

        return 'https://source.unsplash.com/collection/'.Arr::random($arrCollections).'/570x570';
    }

    public function orderHomeByPublicationDate($order){
        if($order === "desc" || $order === "asc"){
            return Post::orderBy('publication_date', $order)->paginate(12);
        }

        return Post::paginate(12);
        
    }

    public function orderUserPostByPublicationDate($user,$order){
        if($order === "desc" || $order === "asc"){
            return $user->posts()->orderBy('publication_date', $order)->paginate(12);
        }

        return $user->posts()->paginate(12);
        
    }
}
