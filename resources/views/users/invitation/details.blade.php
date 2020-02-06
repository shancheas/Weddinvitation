@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.details_header', ['brideNames' => $invitation->bridegroom . ' & ' . $invitation->bride])

<div class="container-fluid mt--7">
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Kehadiran</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $attend['total'] }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart-area" width="300" height="350"></canvas>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="{{ $attend['color'] }} mr-2"><i class="fa fa-check"></i> {{ $attend['percentage'] }}%</span>
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
                            <h5 class="card-title text-uppercase text-muted mb-0">Undangan dilihat</h5>
                            <span class="h2 font-weight-bold mb-0">0</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="chart">
                        <canvas id="chart-sosmed" class="chart-canvas" width="300" height="350"></canvas>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 0%</span>
                        <span class="text-nowrap">Since last week</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('users/partials/guest_note', $details)
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
                data: [{{ $attend['not'] }}, {{ $attend['will'] }}, {{ $attend['maybe'] }}],
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


    // Init chart
    function initChart($chart) {

        // Create chart
        var ordersChart = new Chart($chart, {
            type: 'bar',
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            lineWidth: 1,
                            color: '#dfe2e6',
                            zeroLineColor: '#dfe2e6'
                        },
                        ticks: {
                            callback: function(value) {
                                if (!(value % 10)) {
                                    //return '$' + value + 'k'
                                    return value
                                }
                            }
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(item, data) {
                            var label = data.datasets[item.datasetIndex].label || '';
                            var yLabel = item.yLabel;
                            var content = '';

                            if (data.datasets.length > 1) {
                                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                            }

                            content += '<span class="popover-body-value">' + yLabel + '</span>';

                            return content;
                        }
                    }
                }
            },
            data: {
                labels: ['Facebook', 'Instagram', 'WhatsApp', 'Twiter', 'Lain-lain'],
                datasets: [{
                    label: 'Sosial Media',
                    data: [0, 0, 0, 0, 0]
                }]
            }
        });

        // Save to jQuery object
        $chart.data('chart', ordersChart);
    }

    window.onload = function () {
        var ctx = $('#chart-area');
        new Chart(ctx, config);
        var $chart = $('#chart-sosmed');
        initChart($chart)
    };
</script>
@endpush

