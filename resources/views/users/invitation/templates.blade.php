@extends('layouts.template', ['class' => 'bg-default'])

@section('content')
<div class="header py-7 py-lg-8">
    <div class="container">
        <div class="header-body mt-9 mb-4 ml-5">
            <div class="owl-carousel">
                <div>
                    <div class="row justify-content-center text-center">
                        <div class="col col-12 text-center mb-5">
                            <h1>{{ __('Pilih Template') }}</h1>
                        </div>
                        <div class="col col-md-4">
                            <img alt="Awesome template" src="{{ asset('argon') }}/img/theme/template-1.png" class="templates-img">
                        </div>
                        <div class="col col-md-4">
                            <img alt="Elegant template" src="{{ asset('argon') }}/img/theme/template-2.png" class="templates-img">
                        </div>
                    </div>
                </div>
                <div>
                    @include('components.templates.bride_card')
                </div>
                <div>
                    @include('components.templates.location_card')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/owlCarousel/owl.carousel.min.js"></script>
<script src="{{ asset('argon') }}/js/templates.js?v=1.0.0"></script>
@endpush
