<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $table = 'rayon';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    //relasi sama salesman
    public function salesman()
    {
        return $this->hasMany(Salesman::class, 'rayon_id');
    }

    //relasi sama customer
    public function customer()
    {
        return $this->hasMany(Customer::class, 'rayon_id');
    }

    //relasi sama tabel salesorder
    public function salesOrder()
    {
        return $this->hasMany(SalesOrder::class, 'rayon_id');
    }
}
