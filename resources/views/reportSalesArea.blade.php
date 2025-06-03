@extends('main')

@section('title', 'Top 3 Sales Area')
@section('menu-report', 'active')

@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Top 3 Sales Area
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sales Area</th>
                        <th>Tahun</th>
                        <th>Total Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->sales_area }}</td>
                            <td>{{ $d->tahun }}</td>
                            <td>{{ $d->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
