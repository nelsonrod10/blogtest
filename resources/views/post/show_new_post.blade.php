@extends('layouts.users')

@section('content')
    @include('post.show_layout')
    <div class="text-center">
        <a href="{{route('home')}}" class="text-center border border-teal-500 hover:border-teal-500 text-lg text-teal-900 hover:text-teal-500 font-bold py-2 px-4 rounded-full">My posts</a>        
    </div>
    <!--/Author-->
@endsection