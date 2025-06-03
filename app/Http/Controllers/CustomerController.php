<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rayon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        $rayon = Rayon::all();
        return view("customer.index", compact("customer", "rayon"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //pakai modal aja
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lastId = Customer::max('id');
        if (!$lastId) {
            $nextId = 'C01';
        } else {
            // Ambil angka dari belakang ID, misal dari 'B04' ambil '04'
            $number = (int)substr($lastId, 1);
            // Tambah 1 lalu format jadi dua digit
            $newNumber = str_pad($number + 1, 2, '0', STR_PAD_LEFT);
            // Gabungkan dengan prefix "B"
            $nextId = 'C' . $newNumber;
        }
        $data = new Customer();
        $data->id = $nextId;
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->rayon_id = $request->get('rayon_id');
        $data->save();
        return redirect()->route("customer.index")->with("status", "Insert successful!");
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
    public function edit(Customer $customer)
    {
        $rayon = Rayon::all();
        return view('customer.edit', compact("customer", "rayon"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->get('name');
        $customer->address = $request->get('address');
        $customer->rayon_id = $request->get('rayon_id');
        $customer->save();

        return redirect()->route("customer.index")->with("status", "Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //mau tambah pengecekannya (nanti)
        $customer->delete();
        return redirect()->route('customer.index')->with('status', 'Delete successful!');
    }
}
