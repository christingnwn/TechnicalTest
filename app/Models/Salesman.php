<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;

    protected $table = 'salesman';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    //relasi sama tabel rayon
    public function rayon()
    {
        return $this->belongsTo(Rayon::class, 'rayon_id', 'id');
    }

    //relasi sama tabel salesorder
    public function salesOrder()
    {
        return $this->hasMany(SalesOrder::class, 'salesman_id');
    }
}
