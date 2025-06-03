<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Rayon;
use App\Models\Salesman;
use App\Models\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesorder = SalesOrder::all();
        $salesman = Salesman::all();
        $customer = Customer::all();
        $rayon = Rayon::all();
        $brand = Brand::all();
        return view("salesorder", compact("salesorder", "brand", "rayon", "salesman", "customer"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lastId = SalesOrder::max('id');
        $nextId = str_pad(((int) $lastId + 1), 3, '0', STR_PAD_LEFT);
        $data = new SalesOrder();
        $data->id = $nextId;
        $data->date = now();
        $data->tipe = $request->get('tipe');
        $data->customer_id = $request->get('customer_id');
        $data->salesman_id = $request->get('salesman_id');
        $data->brand_id = $request->get('brand_id');
        $data->rayon_id = $request->get('rayon_id');
        $data->quantity = $request->get('quantity');
        $data->unit_qty = $request->get('unit_qty');
        $data->save();
        return redirect()->route("salesorder.index")->with("status", "Insert successful!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesOrder $salesorder)
    {
        $salesman = Salesman::all();
        $customer = Customer::all();
        $rayon = Rayon::all();
        $brand = Brand::all();
        return view("editSalesOrder", compact("salesorder", "brand", "rayon", "salesman", "customer"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesOrder $salesorder)
    {
        $salesorder->tipe = $request->get('tipe');
        $salesorder->customer_id = $request->get('customer_id');
        $salesorder->salesman_id = $request->get('salesman_id');
        $salesorder->brand_id = $request->get('brand_id');
        $salesorder->rayon_id = $request->get('rayon_id');
        $salesorder->quantity = $request->get('quantity');
        $salesorder->unit_qty = $request->get('unit_qty');
        $salesorder->save();

        return redirect()->route("salesorder.index")->with("status", "Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesOrder $salesorder)
    {
        $salesorder->delete();
        return redirect()->route('salesorder.index')->with('status', 'Delete successful!');
    }

    public function showReport()
    {
        return view('report');
    }

    public function reportBrand()
    {
        $data = DB::table('brand as b')
            ->join('salesorder as s', 's.brand_id', '=', 'b.id')
            ->select(
                'b.id',
                'b.name',
                DB::raw('MONTH(s.date) as bulan'),
                DB::raw('SUM(s.quantity) as total')
            )
            ->groupBy('b.id', 'b.name', DB::raw('MONTH(s.date)'))
            ->get();
        return view('reportBrand', compact('data'));
    }

    public function salesArea()
    {
        $data = DB::table('salesorder as so')
            ->join('rayon as r', 'r.id', '=', 'so.rayon_id')
            ->select(
                'r.sales_area',
                DB::raw('YEAR(so.date) as tahun'),
                DB::raw('SUM(so.quantity) as total')
            )
            ->groupBy('r.sales_area', DB::raw('YEAR(so.date)'))
            ->orderByDesc('total')
            ->limit(3)
            ->get();

        return view('reportSalesArea', compact('data'));
    }

    public function brandYear()
    {
        $data = DB::table('brand as b')
            ->join('salesorder as so', 'so.brand_id', '=', 'b.id')
            ->select(
                'b.name',
                DB::raw('SUM(so.quantity) as total')
            )
            ->groupBy('b.id', 'b.name')
            ->orderByDesc('total')
            ->limit(3)
            ->get();

        return view('reportBrandYear', compact('data'));
    }

    public function trendBrand()
    {
        $data = DB::table('brand as b')
            ->join('salesorder as s', 's.brand_id', '=', 'b.id')
            ->select(
                'b.name',
                DB::raw('MONTH(s.date) as bulan'),
                DB::raw('SUM(s.quantity) as total')
            )
            ->groupBy('b.name', DB::raw('MONTH(s.date)'))
            ->get();

        $brands = [];
        foreach ($data as $item) {
            $brands[$item->name][(int)$item->bulan] = $item->total;
        }

        $months = range(1, 12);
        $datasets = [];
        foreach ($brands as $brand => $bulanData) {
            $dataPerMonth = [];
            foreach ($months as $bulan) {
                $dataPerMonth[] = $bulanData[$bulan] ?? 0;
            }

            $datasets[] = [
                'label' => $brand,
                'data' => $dataPerMonth,
            ];
        }

        return view('reportTrendBrand', compact('months', 'datasets'));
    }
}
