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
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/vendor/owlCarousel/owl.carousel.min.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/vendor/owlCarousel/owl.theme.default.min.css" rel="stylesheet">
        <!-- Vendor CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/custom.css" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        
        <div class="main-content" style="background-image: url('{{ asset('argon') }}/img/theme/header_theme_one.png');">            
            <div style="widht: 100%; height: 100%;">
                <div class="header py-7 py-lg-8">            
                    <div class="container">
                        <div class="header-body mt-6 mb-4 ml-5">
                            <div class="owl-carousel text-center">                       
                                <div>
                                    <h1 style="font-family: 'Lobster', cursive; font-size: 64px;"> Michael & Julia<br>Wedding </h1>                                    
                                    <br><br>
                                    <h4 style="font-family: 'Lobster', cursive; font-size: 18px;"> 20/02/2020 </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>        
        </div>

        <div class="header py-3 py-lg-4">
            <div class="container">
                <div class="header-body text-center">
                    <h1 style="font-family: 'Lobster'">Michael & Julia<h1>
                </div>
            </div>
        </div>

        <div class="row" style="background-color:#FBE1B6;">
            <div class="col-md-5 p-6 mt-8 mb-8">
                <div class="row">
                    <div class="col-md-3"><br></div> 
                    <div class="col-md-6 text-center">
                        <h2 text-center>20 February 2020 <br>11:00 AM</h2>
                    </div>            
                    <div class="col-md-3">
                        <img src="{{ asset('argon') }}/img/theme/ic_calendar.png" class="templates-img"/>
                    </div>
                </div>                
            </div>
            <div class="col-md-2">
                <div style="border-left: 2px solid #000; height: 50%; top:25%; left: 50%; position: absolute;"></div>
            </div>
            <div class="col-md-5 p-6 mt-8 mb-8">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('argon') }}/img/theme/ic_marker.png" class="templates-img"/>
                    </div> 
                    <div class="col-md-6 text-center">
                        <h2 text-center>Ibis Southampton Centre Hotel<br>Southampton, England</h2>
                    </div>            
                    <div class="col-md-3"></div>
                </div>             
            </div>
        </div>
        
        <div class="header py-3 py-lg-4" style="background-color:#FBAC91;">
            <div class="text-center">
                <h1 style="font-family: 'Lobster'; font-size: 32px;">Gallery</h1>

                <div class="row mt-5 mb-7">
                    <div class="col-md-4">
                        <img alt="Awesome template" src="{{ asset('argon') }}/img/theme/template-1.png" style="width: 75%; height: 240px;">
                    </div>

                    <div class="col-md-4">
                        <img alt="Awesome template" src="{{ asset('argon') }}/img/theme/template-1.png" style="width: 75%; height: 240px;">
                    </div>

                    <div class="col-md-4">
                        <img alt="Awesome template" src="{{ asset('argon') }}/img/theme/template-1.png" style="width: 75%; height: 240px;">
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.feedback')

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </body>

    <script src="{{ asset('argon') }}/vendor/owlCarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('argon') }}/js/templates.js?v=1.0.0"></script>
</html>