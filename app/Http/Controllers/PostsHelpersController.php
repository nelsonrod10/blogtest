<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use App\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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
            return Post::orderBy('publication_date', $order)->get();
        }

        return Post::all();
        
    }

    public function orderUserPostByPublicationDate($user,$order){
        if($order === "desc" || $order === "asc"){
            return $user->posts()->orderBy('publication_date', $order)->get();
        }

        return $user->posts;
        
    }

    public function renderPagination($posts){
        $arrPosts = [];
        foreach($posts as $post){
            array_push($arrPosts,[
                "title"            => $post->title,
                "description"      => $post->description,
                "publication_date" => $post->publication_date,         
                "image_url"        => $post->image_url,
                "slug"             => $post->slug,
            ]);
        }
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($posts);
        $perPage = 3;
        $currentPageSearchResults = $col->all();
        $test = array_slice($currentPageSearchResults, ($currentPage * $perPage) - $perPage, $perPage);
        $paginatedItems= new LengthAwarePaginator($test , count($col), $perPage,$currentPage);
        
        return response()->json($paginatedItems);
    }
}
