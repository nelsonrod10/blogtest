@extends('layouts.users')

@section('content')
    <div class="text-center">
        <h1 class="mt-6 font-bold break-normal text-center text-3xl mb-2">My imported posts</h1>
        @include('admin.import_posts.form')
    </div>
    <br>    
    @if($user->importedPosts->count() > 0)
        <imported-posts :author="{{$user}}" ></imported-posts>
    @else
        <div class="max-w-md mx-auto flex py-6 px-10 text-center">
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-6 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold">You don't imported any post yet</p>
                        <p class="text-sm mb-6">Start your automatic import.</p>
                        @can('importPosts', Auth::user())
                            @include('admin.import_posts.form')
                        @endcan
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
        </div> 
    @endif          
@endsection