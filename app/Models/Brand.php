<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    //relasi sama tabel salesorder
    public function salesOrder()
    {
        return $this->hasMany(SalesOrder::class, 'brand_id');
    }
}
