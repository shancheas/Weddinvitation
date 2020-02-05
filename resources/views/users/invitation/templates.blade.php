@extends('layouts.template', ['class' => 'bg-default'])

@section('content')
<div class="header py-7 py-lg-8">
    <section class="section">
        <div class="container">

            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Informasi Undangan</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">Informasi mempelai</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Nama Mempelai
                                            Pria</label>
                                        <input type="text" id="input-male-name"
                                               class="form-control form-control-alternative"
                                               placeholder="contoh: Ricardo Milos">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Nama Mempelai
                                            Wanita</label>
                                        <input type="text" id="input-female-name"
                                               class="form-control form-control-alternative"
                                               placeholder="contoh: Ai Kayano">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Waktu & Tempat</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-location">Tempat</label>
                                        <input id="input-location" class="form-control form-control-alternative"
                                               placeholder="contoh: Hotel, Gedung Serbaguna" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Alamat</label>
                                        <input id="input-address" class="form-control form-control-alternative"
                                               placeholder="Alamat tempat resepsi" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-city">Tanggal</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" placeholder="Tanggal Resepsi"
                                                   type="text" value="06/20/2019">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Jam</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Waktu mulai" type="time"
                                                   value="09:00:00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">Lokasi</h6>
                        <div class="pl-lg-4">
                            <div id="map-canvas" class="map-canvas" data-lat="-6.8880563" data-lng="107.6291544" style="height: 400px;"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-pink btn-round-lg my-4">{{ __('Simpan') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('js')
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaWG5cfOZH_-sRh1r3YJMTH9a3BSMtssg"></script>
<script src="{{ asset('js') }}/location-picker.min.js"></script>
@endpush
