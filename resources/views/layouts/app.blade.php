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
            <div class="block lg:hidden">
              <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
              </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
              <div class="text-sm lg:flex-grow">
                @guest
                  <a href="{{url('/')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Home
                  </a>
                @else
                <a href="{{route('home')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                  Home
                </a>
                @endguest
                
              </div>
              <div>
                @guest
                    <a class="inline-block text-sm py-1 leading-none text-teal-200 hover:text-white lg:mt-0" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <br class="md:hidden">
                    @if (Route::has('register'))
                        <a class="inline-block text-sm px-2 md:px-4 py-2 leading-none lg:mt-0 md:ml-4 border rounded text-white hover:border-transparent hover:text-teal-500 hover:bg-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="{{route('home')}}" class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</a>

                    <a href="{{ route('logout') }}"
                        class="no-underline hover:underline text-gray-300 text-sm p-3"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
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
