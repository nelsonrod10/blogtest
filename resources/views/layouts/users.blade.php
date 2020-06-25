<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Scripts -->
    <script src="{{ asset('js/partials.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-900 font-sans leading-normal tracking-normal mt-12">
    <div id="app">
        <!--Nav-->
        <nav class="bg-teal-500 pt-4 pb-4 px-1 mt-0 h-auto fixed w-full z-20 top-0">
        <div class="flex flex-wrap items-center">
            <div class="flex flex-1 md:w-1/3 text-right md:justify-start text-white px-2">
                <a  href="{{url('/')}}" class="flex items-center flex-shrink-0 text-white mr-6">
                    <svg class="fill-current h-6 w-6 mr-2" width="54" height="54" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M17.94 11H13V9h4.94A8 8 0 0 0 11 2.06V7H9V2.06A8 8 0 0 0 2.06 9H7v2H2.06A8 8 0 0 0 9 17.94V13h2v4.94A8 8 0 0 0 17.94 11zM10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"/></svg>
                    <span class="font-semibold text-xl tracking-tight">Square Blog</span>
                </a>    
            </div>
            <div class="block lg:invisible">
                <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white" onclick="showMenuItemsUsers()">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div id="menu-items" class="flex mt-3 w-full content-center justify-between md:w-1/3 md:justify-end invisible lg:visible">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3 px-4">
                        <div class="relative inline-block">
                            <button onclick="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none"> 
                                <span class="pr-2"><i class="em em-robot_face"></i></span> {{ Auth::user()->name }}
                                <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </button>
                            <div id="myDropdown" class="dropdownlist absolute bg-gray-900 text-white w-40 right-0 mt-3 py-2 overflow-auto z-30 invisible">
                                <a href="{{ route('logout') }}" class="w-full m-0 py-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                > <span class="ml-2">Logout</span></a>
                                        
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </nav>

        <div class="flex flex-col md:flex-row">
            <div class="bg-gray-900 shadow-lg h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
                <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="{{route('home')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-teal-500">
                            <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">My posts</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{route('posts.create')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-teal-500">
                            <i class="fa fa-envelope pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">New post</span>
                        </a>
                    </li>
                    @can('importPosts', Auth::user())
                        <li class="mr-3 flex-1">
                            <a href="{{route('import-posts.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-teal-500">
                                <i class="fa fa-envelope pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Imported posts</span>
                            </a>
                        </li>
                    @endcan
                </ul>
                </div>
            </div>

            <div class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
                
                @yield('content')
            
            </div>
        </div>
    </div>
</body>

</html>