@extends('main')

@section('title', 'Report')
@section('menu-report', 'active')

@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Report
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
            <div class="list-group">
                <a href="/report/showBrand" class="list-group-item list-group-item-action">
                    <i class="fa fa-money"></i> Penjualan Brand per Bulan
                </a>
                <a href="/report/salesArea" class="list-group-item list-group-item-action">
                    <i class="fa fa-globe"></i> Top 3 Sales Area - Penjualan Tertinggi
                </a>
                <a href="/report/brandYear" class="list-group-item list-group-item-action">
                    <i class="fa fa-archive"></i> Top 3 Brand of The Year
                </a>
                <a href="/report/trenBrand" class="list-group-item list-group-item-action">
                    <i class="fa fa-envelope"></i> Trend Penjualan (per brand/bulan)
                </a>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
