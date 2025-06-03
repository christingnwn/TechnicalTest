@extends('main')

@section('title', 'Trend Brand')
@section('menu-report', 'active')

@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Trend Brand (Penjualan per Bulan)
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/report">Report</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <canvas id="topBrand"></canvas>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection

@section('javascript')
<script>
    const ctx = document.getElementById('topBrand').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_map(fn($m) => DateTime::createFromFormat('!m', $m)->format('M'), $months)) !!},
            datasets: {!! json_encode($datasets) !!}
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                },
                title: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

