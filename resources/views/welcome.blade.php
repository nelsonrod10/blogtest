@extends('layouts.app')

@section('content')
    <div class="text-center mb-10 text-gray-600">
        Order posts by publication date:
        <a href="{{url('/')}}" class="text-blue-600 hover:text-blue-900">Random</a>
        |
        <a href="{{route('order-posts', 'asc')}}" class="text-blue-600 hover:text-blue-900">Ascending</a>
        |
        <a href="{{route('order-posts','desc')}}" class="text-blue-600 hover:text-blue-900">Descending</a>
    </div>
    <div class="flex flex-wrap">
        @include('post.posts-card')
    </div>
@endsection