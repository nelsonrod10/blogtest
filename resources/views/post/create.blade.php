@extends('layouts.users')

@section('content')
<div class="text-center">
    <h1 class="mt-6 font-bold break-normal text-center text-3xl mb-2">New post</h1>
</div>
<div class="md:mx-12 my-2 ">
    <form method="post" action="{{route('posts.store')}}" class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">
        @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
          Title
        </label>
        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="Post title" value="{{old('title')}}">
        @if ($errors->has('title'))
            @foreach ($errors->get('title') as $message)
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @endforeach    
        @endif
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
          Description
        </label>
        <textarea maxlength="400" required class="shadow appearance-none border rounded h-20 w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" placeholder="Post description">{{old('description')}}</textarea>
        @if ($errors->has('description'))
            @foreach ($errors->get('description') as $message)
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @endforeach    
        @endif
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Create post
        </button>
      </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
      The system assign a random image for this post
    </p>
  </div>
@endsection