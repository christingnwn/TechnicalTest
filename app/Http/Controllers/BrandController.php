<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::all();
        return view("brand.index", compact("brand"));
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
        $lastId = Brand::max('id');
        if (!$lastId) {
            $nextId = 'B01';
        } else {
            // Ambil angka dari belakang ID, misal dari 'B04' ambil '04'
            $number = (int)substr($lastId, 1);
            // Tambah 1 lalu format jadi dua digit
            $newNumber = str_pad($number + 1, 2, '0', STR_PAD_LEFT);
            // Gabungkan dengan prefix "B"
            $nextId = 'B' . $newNumber;
        }
        $data = new Brand();
        $data->id = $nextId;
        $data->name = $request->get('name');
        $data->save();
        return redirect()->route("brand.index")->with("status", "Insert successful!");
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
    public function edit(Brand $brand)
    {
        return view('brand.edit', compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->name = $request->get('name');
        $brand->save();

        return redirect()->route("brand.index")->with("status", "Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
            return redirect()->route("brand.index")->with("status", "Delete successful!");
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route("brand.index")->with("status", $msg);
        }
    }
}
