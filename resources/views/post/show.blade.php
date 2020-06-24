@extends('layouts.app')

@section('content')
@include('post.show_layout')
<!--Author-->
<div class="mt-6">
    <h1 class="font-bold break-normal text-center text-3xl md:text-5xl">Other posts</h1>
</div>
<div class="p-4 md:p-4 text-center">
    <p class="text-base font-bold text-base md:text-2xl leading-none">by {{$post->user->name}}</p>
</div>
<div class="flex flex-wrap mt-4">
    @include('post.posts-card')
</div>
<!--/Author-->
@endsection