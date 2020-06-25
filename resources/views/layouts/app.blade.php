<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
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
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
            <a  href="{{url('/')}}" class="flex items-center flex-shrink-0 text-white mr-6">
                <svg class="fill-current h-6 w-6 mr-2" width="54" height="54" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M17.94 11H13V9h4.94A8 8 0 0 0 11 2.06V7H9V2.06A8 8 0 0 0 2.06 9H7v2H2.06A8 8 0 0 0 9 17.94V13h2v4.94A8 8 0 0 0 17.94 11zM10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"/></svg>
                <span class="font-semibold text-xl tracking-tight">Square Blog</span>
            </a>
            <div class="block lg:invisible">
              <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white" onclick="showMenuItems()">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
              </button>
            </div>
            <div id="menu-items" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden lg:visible">
              <div class="py-1 text-sm lg:flex-grow">
                @guest
                  <a href="{{url('/')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Home
                  </a>
                @else
                  
                @endguest
                
              </div>
              <div>
                @guest
                    <a class="inline-block text-sm py-2 leading-none text-teal-200 hover:text-white lg:mt-0" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <br class="md:hidden">
                    @if (Route::has('register'))
                        <a class="inline-block text-sm px-2 md:px-4 py-2 leading-none lg:mt-0 md:ml-4 border rounded text-white hover:border-transparent hover:text-teal-500 hover:bg-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                  <li class="flex-1 md:flex-none md:mr-3 px-4">
                      <div class="relative inline-block">
                          <button onclick="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none"> 
                              <span class="pr-2"><i class="em em-robot_face"></i></span> {{ Auth::user()->name }}
                              <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                          </button>
                          <div id="myDropdown" class="dropdownlist absolute bg-gray-900 text-white w-40 right-0 mt-3 py-2 overflow-auto z-30 invisible">
                              <a href="{{route('home')}}" class="w-full m-0 py-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"> 
                                <span class="ml-2">Home</span>
                              </a>
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
                @endguest
              </div>
            </div>
          </nav>
        <div class="mt-8 container mx-auto">
            @yield('content')
        </div>  
        
    </div>
</body>
</html>
