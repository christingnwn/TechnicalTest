<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayon = Rayon::all();
        return view("rayon", compact("rayon"));
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
        $lastId = Rayon::max('id');
        if (!$lastId) {
            $nextId = 'S01';
        } else {
            // Ambil angka dari belakang ID, misal dari 'B04' ambil '04'
            $number = (int)substr($lastId, 1);
            // Tambah 1 lalu format jadi dua digit
            $newNumber = str_pad($number + 1, 2, '0', STR_PAD_LEFT);
            // Gabungkan dengan prefix "B"
            $nextId = 'R' . $newNumber;
        }
        $data = new Rayon();
        $data->id = $nextId;
        $data->name = $request->get('name');
        $data->sales_area = $request->get('sales_area');
        $data->regional = $request->get('regional');
        $data->save();
        return redirect()->route("rayon.index")->with("status", "Insert successful!");

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
    public function edit(Rayon $rayon)
    {
        return view('editrayon', compact("rayon"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rayon $rayon)
    {
        $rayon->name = $request->get('name');
        $rayon->sales_area = $request->get('sales_area');
        $rayon->regional = $request->get('regional');
        $rayon->save();
        return redirect()->route("rayon.index")->with("status", "Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();
        return redirect()->route('rayon.index')->with('status', 'Delete successful!');
    }
}
