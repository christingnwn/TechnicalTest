@extends('main')

@section('title', 'Brand')
@section('menu-brand', 'active')

@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Brand
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/brand">Brand</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#form-modal">+ New Brand</a>
    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Insert New Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('brand.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Brand Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                placeholder="Enter your Brand Name">
                            <small id="name" class="form-text text-muted">Please write down Brand Name here.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="Save changes">Save Changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Brand ID</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (@session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                        <br>
                    @endif
                    @foreach ($brand as $b)
                        <tr>
                            <td> {{ $b->id }} </td>
                            <td> {{ $b->name }} </td>
                            <td>
                                <div style="display: inline-block;">

                                    <a class="btn btn-warning" href="{{ route('brand.edit', $b->id) }}">Edit</a>
                                </div>
                                <div style="display: inline-block; margin-left: 5px;">

                                    <form method="POST" action="{{ route('brand.destroy', $b->id) }}"
                                        onsubmit="return confirm('Are you sure to delete {{ $b->id }} - {{ $b->name }} ?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
