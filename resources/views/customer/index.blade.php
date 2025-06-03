@extends('main')

@section('title', 'Customer')
@section('menu-customer', 'active')

@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Customer
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/customer">Customer</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#form-modal">+ New Customer</a>
    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Insert New Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('customer.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                placeholder="Enter your Customer Name">
                            <small id="name" class="form-text text-muted">Please write down Customer Name here.</small>
                        </div>
                        <div class="form-group">
                            <label for="address"> Address </label>
                            <textarea class="form-control" id="qty" name="address" rows="4" placeholder="Enter your Address"
                                aria-describedby="name"></textarea>
                            <small id="name" class="form-text text-muted">Please write down Address
                                here.</small>
                        </div>
                        <label for="rayon_id">Rayon </label><select name="rayon_id" class="form-control">
                            <br> <br> <br>
                            @foreach ($rayon as $r)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                                <small id="name" class="form-text text-muted">Please pick the Rayon</small>
                            @endforeach
                        </select>
                        <br>
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
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th> Rayon </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (@session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                        <br>
                    @endif
                    @foreach ($customer as $c)
                        <tr>
                            <td> {{ $c->id }} </td>
                            <td> {{ $c->name }} </td>
                            <td> {{ $c->address }} </td>
                            <td> {{ $c->rayon->name }}</td>
                            <td>
                                <div style="display: inline-block;">

                                    <a class="btn btn-warning" href="{{ route('customer.edit', $c->id) }}">Edit</a>
                                </div>
                                <div style="display: inline-block; margin-left: 5px;">
                                    <form method="POST" action="{{ route('customer.destroy', $c->id) }}"
                                        onsubmit="return confirm('Are you sure to delete {{ $c->id }} - {{ $c->name }} ?');">
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
