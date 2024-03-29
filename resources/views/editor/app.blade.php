<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/vendor/owlCarousel/owl.carousel.min.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/vendor/owlCarousel/owl.theme.default.min.css" rel="stylesheet">
        <!-- Vendor CSS -->
        <link href="{{ asset('argon') }}/vendor/grapesjs/grapes.min.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/grapesjs/grapesjs-preset-webpage.min.css" rel="stylesheet">
        <link type="text/css" href="https://demos.creative-tim.com/argon-design-system/assets/css/argon.min.css?v=1.0.1" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/custom.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/editor.css" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <input type="hidden" value="{{ $invitation->id }}" id="inv-id" />
            @include('editor.sidebar')
        @endauth

        <div class="main-content">
            @yield('content')
        </div>

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="{{ asset('argon') }}/vendor/grapesjs/grapes.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-preset-webpage.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-preset-newsletter.min.js"></script>
<!--        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-lory-slider.min.js?0.1.5"></script>-->
<!--        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-tabs.min.js?0.1.1"></script>-->
<!--        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-custom-code.min.js?0.1.2"></script>-->
<!--        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-touch.min.js?0.1.1"></script>-->
<!--        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-parser-postcss.min.js?0.1.1"></script>-->
<!--        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-tooltip.min.js?0.1.1"></script>-->
<!--        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-tui-image-editor.min.js?0.1.2"></script>-->
<!--        <script src="{{ asset('argon') }}/vendor/grapesjs/grapesjs-typed.min.js?1.0.5"></script>-->

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script src="{{ asset('argon') }}/js/templates.js?v=1.0.0"></script>
    </body>
</html>
