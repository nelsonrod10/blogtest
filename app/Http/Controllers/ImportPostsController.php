<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ImportPostsController extends PostsHelpersController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $this->authorize('importPosts', $user);

        return view('admin.import_posts.index')->with(compact('user'));
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
        $user = Auth::user();

        $this->destroyAll();

        $importedPosts = $this->requestAPI($user);

        foreach($importedPosts as $importPost)
        {
            foreach($importPost as $post)
            {
                Post::create([
                    'user_id'           =>  $user->id,
                    'type'              =>  'Import',
                    'title'             =>  $post['title'],
                    'description'       =>  $post['description'],
                    'slug'              =>  Str::slug($post['title']),
                    'publication_date'  =>  $post['publication_date'],
                    'image_url'         =>  $this->getRandomImageCollection(),

                ]);
                
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        
        return $this->renderPagination($user->importedPosts);
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

    public function destroyAll(){
        $user = Auth::user();
        $importedPosts = $user->importedPosts;
        
        if($importedPosts->count() > 0){
            foreach($importedPosts as $post)
            {
                $post->delete();
            }
        }

        return;
    }
}
