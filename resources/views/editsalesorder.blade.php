@extends('main')

@section('title', 'Update Data Sales Order')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Edit Data Sales Order
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Update Sales Order</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('salesorder.update', $salesorder->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">Sales ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $salesorder->id }}"
                        disabled>
                </div>
                <label for="brand_id">Brand</label>
                <select name="brand_id" class="form-control">
                    @foreach ($brand as $b)
                        <option value="{{ $b->id }}" {{ $b->id == $b->name ? 'selected' : '' }}>
                            {{ $salesorder->brand->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <label for="salesman_id">Salesman</label>
                <select name="salesman_id" class="form-control">
                    @foreach ($salesman as $s)
                        <option value="{{ $s->id }}" {{ $s->id == $s->name ? 'selected' : '' }}>
                            {{ $salesorder->salesman->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <label for="customer_id">Customer</label>
                <select name="customer_id" class="form-control">
                    @foreach ($customer as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $c->name ? 'selected' : '' }}>
                            {{ $salesorder->customer->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <div class="form-group">
                    <label for="tipe">Tipe:</label>
                    <select id="tipe" name="tipe" class="form-control">
                        <option value="cash" {{ $salesorder->tipe == 'cash' ? 'selected' : '' }}>Cash</option>
                        <option value="kredit" {{ $salesorder->tipe == 'kredit' ? 'selected' : '' }}>Kredit</option>
                    </select>
                </div>
                <label for="rayon_id">Rayon</label>
                <select name="rayon_id" class="form-control">
                    @foreach ($rayon as $r)
                        <option value="{{ $r->id }}" {{ $r->id == $r->name ? 'selected' : '' }}>
                            {{ $salesorder->rayon->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity"
                        value="{{ $salesorder->quantity }}">
                </div>
                <div class="form-group">
                    <label for="unit_qty">Tipe:</label>
                    <select id="unit_qty" name="unit_qty" class="form-control">
                        <option value="pack" {{ $salesorder->unit_qty == 'pack' ? 'selected' : '' }}>Pack</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
