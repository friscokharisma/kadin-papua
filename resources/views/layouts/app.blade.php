<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('KADIN Papua') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    {{-- Carousel --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

		<style>
			.carousel-open:checked + .carousel-item {
				position: static;
				opacity: 100;
			}
			.carousel-item {
				-webkit-transition: opacity 0.6s ease-out;
				transition: opacity 0.6s ease-out;
			}
			#carousel-1:checked ~ .control-1,
			#carousel-2:checked ~ .control-2,
			#carousel-3:checked ~ .control-3 {
				display: block;
			}
			.carousel-indicators {
				list-style: none;
				margin: 0;
				padding: 0;
				position: absolute;
				bottom: 2%;
				left: 0;
				right: 0;
				text-align: center;
				z-index: 10;
			}
			#carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
			#carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
			#carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
				color: #2b6cb0;  /*Set to match the Tailwind colour you want the active one to be */
			}
		</style>
    {{-- Carousel --}}
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-yellow-300 py-4">
            <div class="container mx-auto flex justify-between items-center px-6 sm:w-10/12">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-900 no-underline">
                        {{ __('KADIN Papua') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-800 text-sm sm:text-base">
                    {{-- added --}}
                    <a class="no-underline hover:underline" href="/">Home</a>
                    <a class="no-underline hover:underline" href="/article">Berita</a>
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        {{-- @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif --}}
                        {{-- Commented for show login only, with register inside the login --}}
                    @else
                        {{-- <span>{{ Auth::user()->name }}</span> --}}
                        <span>
                            <a class="no-underline hover:underline" href="/dashboard">{{ Auth::user()->name }}</a>
                        </span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @if ($errors->any())
        <div class="w-10/12 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-2/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 mx-auto">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
