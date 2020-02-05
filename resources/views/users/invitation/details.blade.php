@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.details_header')

<div class="container-fluid mt--7">
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Kehadiran</h5>
                            <span class="h2 font-weight-bold mb-0">350</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart-area" width="300" height="300"></canvas>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><i class="fa fa-check"></i> 83.48%</span>
                        <span class="text-nowrap">Orang akan hadir</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                            <span class="h2 font-weight-bold mb-0">2,356</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                        <span class="text-nowrap">Since last week</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('users/partials/guest_note')
</div>
@endsection


@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script>
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [13, 77, 10],
                backgroundColor: [
                    '#fd5e53',
                    '#21bf73',
                    '#d8b5b5',
                ],
                label: 'Kehadiran'
            }],
            labels: [
                'Tidak Akan Hadir',
                'Akan Hadir',
                'Mungkin Hadir'
            ]
        },
        options: {
            responsive: true,
            legend: {
                display: true
            }
        }
    };

    window.onload = function () {
        var ctx = $('#chart-area');
        new Chart(ctx, config);
    };
</script>
@endpush

