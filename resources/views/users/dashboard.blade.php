@extends('layouts.app')

@section('content')

<div class="container-fluid bg-gradient-main">
    @include('users.partials.welcome_header')
    @if($invitation->count() > 0)
    <div class="row mb-3">
        <div class="col-lg-8">
            <h2 class="display-3">Undangan-undangan Keren {{ auth()->user()->name }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row row-grid">
                <div class="col-lg-3">
                    <div class="card bg-white shadow border-0">

                        <div class="card-header-tabs">
                            <div class="text-right mb--3 mr-2">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">
                                            <i class="ni ni-ui-04 text-cyan"></i> Pengaturan
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="ni ni-palette text-success"></i> Ubah
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="ni ni-send text-blue"></i> Bagikan
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="ni ni-fat-remove text-danger"></i> Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-img-cover">
                            <img src="{{ asset('argon') }}/img/brand/sample.png"
                                 class="card-img-top" alt="first">
                        </div>
                        <div class="card-blockquote">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                 class="svg-bg">
                                <polygon points="0,52 583,95 0,95" class="fill-white"></polygon>
                                <polygon points="0,42 583,95 683,0 0,95" opacity=".2"
                                         class="fill-default"></polygon>
                            </svg>
                            <h3 class="font-weight-bold">Lorem & Ipsum</h3>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i> Lihat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <h1>Hai {{ auth()->user()->name }}</h1>
                <p class="text-lead">Sepertinya kamu belum mempunyai undangan sama sekali. Yuk buat undanganmu
                    sekarang.</p>
                <a class="btn btn-lg btn-round-lg btn-pink" href="{{ route('templates') }}">
                    <span class="nav-link-inner--text">{{ __('Buat Undangan') }}</span>
                </a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
