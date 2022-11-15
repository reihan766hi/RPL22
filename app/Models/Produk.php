<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarBus;

class Produk extends Model
{
    public function produkbus(){
        return $this->belongsTo(DaftarBus::class,'kode_bus');
    }
}
