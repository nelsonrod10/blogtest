@extends('layouts.users')

@section('content')
    <div class="text-center">
        <h1 class="mt-6 font-bold break-normal text-center text-3xl mb-2">My posts</h1>
        @if($user->posts->count() > 0)
        <a href="{{route('posts.create')}}" class="text-center border border-teal-500 hover:border-teal-500 text-xs text-teal-900 hover:text-teal-500 font-bold py-2 px-4 rounded-full">New post</a>        
        @endif
    </div>
    <br>
    @if($user->posts->count() > 0)
        <user-posts :author="{{$user}}" ></user-posts>
    @else
        <div class="max-w-md mx-auto flex py-6 px-10 text-center">
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-6 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold">You don't have any post, for start</p>
                        <p class="text-sm mb-6">Create your first post now!.</p>
                        @can('importPosts', Auth::user())
                        <a href="{{route('import-posts.index')}}" class="mt-10 mr-2 border border-teal-500 bg-teal-500 text-white text-xs hover:border-teal-500 hover:bg-teal-100 hover:text-teal-900 font-bold py-2 px-4 rounded-full">Import </a>        
                        @endcan
                        <a href="{{route('posts.create')}}" class="mt-10 border border-teal-500 hover:border-teal-500 text-xs text-teal-900 hover:text-teal-500 font-bold py-2 px-4 rounded-full">Create </a>        
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
        </div> 
    @endif          
@endsection