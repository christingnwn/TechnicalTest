<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $table = 'salesorder';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    // relasi tabel customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    //relasi tabel rayon
    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    //relasi tabel salesman
    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }

    //relasi tabel brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
