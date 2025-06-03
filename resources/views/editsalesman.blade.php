@extends('main')

@section('title', 'Update Data Salesman')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Edit Data Salesman
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Update Salesman</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('salesman.update', $salesman->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">Salesman ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $salesman->id }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="name">Salesman Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $salesman->name }}">
                </div>
                <div class="form-group">
                    <label for="tipe">Tipe:</label>
                    <select id="tipe" name="tipe" class="form-control">
                        <option value="grosir" {{ $salesman->tipe == 'grosir' ? 'selected' : '' }}>Grosir</option>
                        <option value="retail" {{ $salesman->tipe == 'retail' ? 'selected' : '' }}>Retail</option>
                    </select>
                </div>
                <label for="rayon_id">Rayon:</label>
                <select name="rayon_id" class="form-control">
                    @foreach ($rayon as $r)
                        <option value="{{ $r->id }}" {{ $r->id == $salesman->rayon_id ? 'selected' : '' }}>
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
