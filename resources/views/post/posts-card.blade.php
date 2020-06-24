@foreach ($posts as $post)
    <div class="w-full sm:w-1/2 md:w-1/3 mb-4 px-8">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full h-54 h-auto max-h-2" src="{{$post->image_url}}" alt="{{$post->slug}}">
            <div class="px-6 py-4">
                <a href="{{route('post',$post->slug)}}" class="font-bold text-xl mb-2">{{$post->title}}</a>
                <div>
                    <p class="text-gray-700 text-base break-words">
                        {{$post->description}}
                    </p>
                    <span class="text-xs text-gray-500">Publication date {{$post->publication_date}}</span>
                </div>
                <div class="mt-4">
                    <a href="{{route('post',$post->slug)}}" class="bg-transparent mt-4 border border-gray-500 hover:border-teal-500 text-xs text-gray-500 hover:text-teal-500 font-bold py-2 px-4 rounded-full">Read More</a>        
                </div>
            </div>
        </div>
    </div>    
@endforeach

    {{$posts->links()}}