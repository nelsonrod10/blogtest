<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BlogPostsController extends Controller
{

    public function buscarPosts(){
        date_default_timezone_set('America/Bogota');
        $arrPosts = [];
        $posts= Post::all();
        
        foreach($posts as $post){
            array_push($arrPosts,[
                "title" => $post->title,
                "description"      => $post->description,
                "publication_date"       => $post->publication_date,         
                "image_url"         => $post->image_url,

            ]);
        }
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($posts);
        $perPage = 6;
        $currentPageSearchResults = $col->all();
        $test = array_slice($currentPageSearchResults, ($currentPage * $perPage) - $perPage, $perPage);
        $paginatedItems= new LengthAwarePaginator($test , count($col), $perPage,$currentPage);
        
        return response()->json($paginatedItems);
        
        //return response()->json($restaurantes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $posts = $post->user->posts()->paginate(6);
            return view('post.show')->with(compact('post','posts'));
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
