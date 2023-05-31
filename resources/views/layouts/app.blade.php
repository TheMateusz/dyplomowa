<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <audio id="messageSound" src="{{ asset('sounds/message.mp3') }}"></audio>
    <link rel="icon" href="{{ asset('images/favi.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
    <meta name="user-id" content="{{ Auth::user()->id }}">
    @endauth

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
</head>
<body class="body" style="background-image: url('{{ asset('images/background.png') }}')">
    @auth
    <header>
        <nav class="menu d-flex align-items-center gap-2">
            <div class="menu__item menu__activation">{!! file_get_contents('images/Menu.svg') !!}</div>
            <div class="menu__item menu__separator"></div>
            <div class="menu__item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{__('main.Moje konto')}}" ><a href="{{ route('user.index') }}" class="menu__link">{!! file_get_contents('images/User_alt_light.svg') !!}</a></div>
            <div class="menu__item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{__('main.Strona główna')}}" ><a href="{{ route('home') }}" class="menu__link">{!! file_get_contents('images/Home_light.svg') !!}</a></div>
{{--            <div class="menu__item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{__('main.Ustawienia')}}"><a href="" class="menu__link">{!! file_get_contents('images/Setting_line_light.svg') !!}</a></div>--}}
            <div class="menu__item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{__('main.Wyloguj')}}">
                <a href="{{ route('logout') }}" class="menu__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {!! file_get_contents('images/Sign_out_squre_light.svg') !!}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </nav>
    </header>
    @endauth
    <div class="language d-flex align-items-center gap-2">

        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                <a class="language__item" href="{{ route('lang.switch', $lang) }}">{{$lang}}</a>
                <div class="language__item language__separator"></div>
            @else
                <div class="language__item language__item--active">{{$lang}}</div>
                <div class="language__item language__separator"></div>
            @endif
        @endforeach
        <div class="language__item language__activation">{!! file_get_contents('images/world_2_light.svg') !!}</div>
    </div>

    @include('helpers.flash-messages')
    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        fetch('/translations')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const additionalTranslations = {
                    greeting: 'Hello',
                    farewell: 'Goodbye'
                };
                window.translations = Object.assign({}, data, additionalTranslations);
            })
            .catch(error => console.error(error));
    </script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @yield('javascript')
        }, false);
    </script>
    @yield('js-files')
    @vite(['resources/js/chat.js'])
    <footer>
        <a href="{{ route('author') }}"> Mateusz Matusiak</a>
    </footer>
</body>
</html>
