@extends('main')

@section('title', 'Rayon')
@section('menu-rayon', 'active')

@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Rayon
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/rayon">Rayon</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#form-modal">+ New Rayon</a>
    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Insert New Rayon</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('rayon.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Rayon Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                placeholder="Enter your Rayon Name">
                            <small id="name" class="form-text text-muted">Please write down Rayon Name here.</small>
                        </div>
                        <div class="form-group">
                            <label for="sales_area">Sales Area Name</label>
                            <input type="text" class="form-control" id="sales_area" name="sales_area"
                                aria-describedby="name" placeholder="Enter your Rayon Name">
                            <small id="name" class="form-text text-muted">Please write down Sales Area here.</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Regional</label>
                            <input type="text" class="form-control" id="regional" name="regional"
                                aria-describedby="name" placeholder="Enter your Regional">
                            <small id="name" class="form-text text-muted">Please write down Regional here.</small>
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
                        <th>Rayon ID</th>
                        <th>Rayon Name</th>
                        <th> Sales Area</th>
                        <th> Regional </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (@session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                        <br>
                    @endif
                    @foreach ($rayon as $r)
                        <tr>
                            <td> {{ $r->id }} </td>
                            <td> {{ $r->name }} </td>
                            <td> {{ $r->sales_area}}</td>
                            <td> {{ $r->regional}} </td>
                            <td>
                                <div style="display: inline-block;">
                                    <a class="btn btn-warning" href="{{ route('rayon.edit', $r->id) }}">Edit</a>
                                </div>
                                <div style="display: inline-block; margin-left: 5px;">

                                    <form method="POST" action="{{ route('rayon.destroy', $r->id) }}"
                                        onsubmit="return confirm('Are you sure to delete {{ $r->id }} - {{ $r->name }} ?');">
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
