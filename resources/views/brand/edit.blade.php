@extends('main')

@section('title', 'Update Data Brand')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Edit Data Brand
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Update Brand</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('brand.update', $brand->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">Brand ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $brand->id }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="name">Brand Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
