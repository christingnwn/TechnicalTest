@extends('main')

@section('title', 'Sales Order')
@section('menu-salesorder', 'active')

@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Sales Order
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/salesorder">Sales Order</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#form-modal">+ New Sales Order</a>
    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Insert New Sales Order</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('salesorder.store') }}">
                    <div class="modal-body">
                        @csrf
                        <label for="salesman_id">Salesman </label><select name="salesman_id" class="form-control">
                            <br> <br> <br>
                            @foreach ($salesman as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                                <small id="name" class="form-text text-muted">Please pick the Salesman</small>
                            @endforeach
                        </select>
                        <br>
                        <label for="brand_id">Brand </label><select name="brand_id" class="form-control">
                            <br> <br> <br>
                            @foreach ($brand as $b)
                                <option value="{{ $b->id }}">{{ $b->name }}</option>
                                <small id="name" class="form-text text-muted">Please pick the Brand</small>
                            @endforeach
                        </select>
                        <br>
                        <div class="form-group">
                            <label for="Tipe">Tipe </label>
                            <select id="tipe" type="text" name="tipe" class="form-control">
                                <option value="cash">Cash</option>
                                <option value="kredit">Kredit</option>
                            </select>
                        </div>
                        <label for="customer_id">Customer </label><select name="customer_id" class="form-control">
                            <br> <br> <br>
                            @foreach ($customer as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                <small id="name" class="form-text text-muted">Please pick the Customer</small>
                            @endforeach
                        </select>
                        <br>
                        <label for="rayon_id">Rayon </label><select name="rayon_id" class="form-control">
                            <br> <br> <br>
                            @foreach ($rayon as $r)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                                <small id="name" class="form-text text-muted">Please pick the Rayon</small>
                            @endforeach
                        </select>
                        <br>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity"
                                aria-describedby="name" placeholder="Enter your Quantity">
                            <small id="name" class="form-text text-muted">Please write down Quantity here.</small>
                        </div>
                        <div class="form-group">
                            <label for="unit_qty">Unit of Quantity </label>
                            <select id="unit_qty" type="text" name="unit_qty" class="form-control">
                                <option value="pack">Pack</option>
                            </select>
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
                        <th>Sales ID</th>
                        <th>Date</th>
                        <th>Tipe</th>
                        <th>Brand</th>
                        <th>Customer Name</th>
                        <th>Rayon</th>
                        <th>Salesman</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (@session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                        <br>
                    @endif
                    @foreach ($salesorder as $s)
                        <tr>
                            <td> {{ $s->id }} </td>
                            <td> {{ \Carbon\Carbon::parse($s->date)->format('d-m-Y') }} </td>
                            <td> {{ $s->tipe }} </td>
                            <td> {{ $s->brand->name }} </td>
                            <td> {{ $s->customer->name }} </td>
                            <td> {{ $s->rayon->name }} </td>
                            <td> {{ $s->salesman->name }} </td>
                            <td> {{ $s->quantity }} {{ $s->unit_qty }} </td>
                            <td>
                                <div style="display: inline-block;">
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('salesorder.edit', $s->id) }}">Edit</a>
                                </div>
                                <div style="display: inline-block; margin-left: 5px;">
                                    <form method="POST" action="{{ route('salesorder.destroy', $s->id) }}"
                                        onsubmit="return confirm('Are you sure to delete {{ $s->id }} - {{ $s->customer->name }} ?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
