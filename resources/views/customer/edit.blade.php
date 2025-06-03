@extends('main')

@section('title', 'Update Data Customer')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Edit Data Customer
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Update Customer</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('customer.update', $customer->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">Customer ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $customer->id }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="name">Customer Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}">
                </div>
                <label for="rayon_id">Rayon:</label>
                <select name="rayon_id" class="form-control">
                    @foreach ($rayon as $r)
                        <option value="{{ $r->id }}" {{ $r->id == $r->name ? 'selected' : '' }}>
                            {{ $r->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
