<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BlogPostsController extends PostsHelpersController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order = null)
    {
        $arrPosts = [];
        
        if($order === null){
            $posts= Post::all();
        }else{
            $posts = $this->orderHomeByPublicationDate($order);
        }
        
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        
        if($post){
            return view('post.show')->with(compact('post'));
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
