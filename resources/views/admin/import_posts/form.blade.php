<form action="{{route('import-posts.store')}}" method="post">
    @csrf
    <button type="submit" class="text-center border border-teal-500 hover:border-teal-500 text-xs text-teal-900 hover:text-teal-500 font-bold py-2 px-4 rounded-full">Import all posts</a>        
</form>