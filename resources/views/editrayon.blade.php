@extends('main')

@section('title', 'Update Data Rayon')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Edit Data Rayon
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Update Rayon</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('rayon.update', $rayon->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">Rayon ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $rayon->id }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="name">Rayon Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $rayon->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Sales Area</label>
                    <input type="text" class="form-control" id="sales_area" name="sales_area"
                        value="{{ $rayon->sales_area }}">
                </div>
                <div class="form-group">
                    <label for="name">Regional</label>
                    <input type="text" class="form-control" id="regional" name="regional"
                        value="{{ $rayon->regional }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
