@extends('layout.layout')

@section('content')

<!-- Card -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="flaticon-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total User</p>
                                        <h4 class="card-title">{{$user}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="flaticon-success"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Container</p>
                                        <h4 class="card-title">{{$cont_msk + $cont_keluar}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Booking Masuk</p>
                                        <h4 class="card-title">{{ $book_cont_msk }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-share-square"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Booking Keluar</p>
                                        <h4 class="card-title">{{ $book_cont_keluar }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Container Masuk</p>
                                        <h4 class="card-title">{{$cont_msk}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Container Keluar</p>
                                        <h4 class="card-title">{{$cont_keluar}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Total Container Masuk & Keluar</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Container Masuk & Keluar Perbulan</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


</div>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="/assets/js/plugin/chart.js/chart.min.js"></script>


<script>
    var doughnutChart = document.getElementById('doughnutChart').getContext('2d')

    var myDoughnutChart = new Chart(doughnutChart, {
        type: 'doughnut',
        data: {
            datasets: [{

                data: ['{{$cont_msk}}', '{{$cont_keluar}}'],
                backgroundColor: ['#1d7af3', '#f3545d']
            }],

            labels: [
                'Container Masuk',
                'Container Keluar'
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom'
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            }
        }
    });
</script>

<script>
    var barChart = document.getElementById('barChart').getContext('2d')
    var barChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: "Container Masuk",
                data: [
                    '{{$masuk_jan}}',
                    '{{$masuk_feb}}',
                    '{{$masuk_mar}}',
                    '{{$masuk_apr}}',
                    '{{$masuk_mei}}',
                    '{{$masuk_jun}}',
                    '{{$masuk_jul}}',
                    '{{$masuk_agu}}',
                    '{{$masuk_sep}}',
                    '{{$masuk_okt}}',
                    '{{$masuk_nov}}',
                    '{{$masuk_des}}'
                ],
                backgroundColor: '#1d7af3',
            }, {
                label: "Container Keluar",
                data: [
                    '{{$keluar_jan}}',
                    '{{$keluar_feb}}',
                    '{{$keluar_mar}}',
                    '{{$keluar_apr}}',
                    '{{$keluar_mei}}',
                    '{{$keluar_jun}}',
                    '{{$keluar_jul}}',
                    '{{$keluar_agu}}',
                    '{{$keluar_sep}}',
                    '{{$keluar_okt}}',
                    '{{$keluar_nov}}',
                    '{{$keluar_des}}'
                ],
                backgroundColor: '#f3545d',
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });
</script>


@endsection