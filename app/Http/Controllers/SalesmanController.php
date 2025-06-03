<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Salesman;
use Illuminate\Http\Request;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesman = Salesman::all();
        $rayon = Rayon::all();
        return view("salesman", compact("salesman", "rayon"));
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
        $lastId = Salesman::max('id');
        if (!$lastId) {
            $nextId = 'S01';
        } else {
            // Ambil angka dari belakang ID, misal dari 'B04' ambil '04'
            $number = (int)substr($lastId, 1);
            // Tambah 1 lalu format jadi dua digit
            $newNumber = str_pad($number + 1, 2, '0', STR_PAD_LEFT);
            // Gabungkan dengan prefix "B"
            $nextId = 'S' . $newNumber;
        }
        $data = new Salesman();
        $data->id = $nextId;
        $data->name = $request->get('name');
        $data->tipe = $request->get('tipe');
        $data->rayon_id = $request->get('rayon_id');
        $data->save();
        return redirect()->route("salesman.index")->with("status", "Insert successful!");
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
    public function edit(Salesman $salesman)
    {
        $rayon = Rayon::all();
        return view('editsalesman', compact("salesman", "rayon"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salesman $salesman)
    {
        $salesman->name = $request->get('name');
        $salesman->tipe = $request->get('tipe');
        $salesman->rayon_id = $request->get('rayon_id');
        $salesman->save();

        return redirect()->route("salesman.index")->with("status", "Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salesman $salesman)
    {
        $salesman->delete();
        return redirect()->route('salesman.index')->with('status', 'Delete successful!');
    }
}
