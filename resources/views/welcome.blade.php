@extends('layouts.template', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body mt-9 mb-7 ml-5">
                <div class="row">
                    <div class="col-lg-5 col-md-6 mt-9">
                        <h1>{{ __('Buat Undanganmu') }}</h1>
                        <h1>{{ __('Dengan Cara Kekinian.') }}</h1>

                        @auth()
                            <a class="btn btn-lg btn-round-lg btn-pink" href="#">
                                <span class="nav-link-inner--text">{{ __('Buat Sekarang') }}</span>
                            </a>
                        @endguest

                        @guest()
                            <a class="btn btn-lg btn-round-lg btn-pink" href="{{ route('login') }}">
                                <span class="nav-link-inner--text">{{ __('Daftar Sekarang') }}</span>
                            </a>
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header bg-gradient-secondary py-7 py-lg-8">
        <div class="container">
            <div class="header-body mt-9 mb-7 ml-5">
                <div class="row text-right">
                    <div class="col-md-12">
                        <h1>{{ __('Tentukan Undangan') }}</h1>
                        <h1>{{ __('Sesuai Gayamu.') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
