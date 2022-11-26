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
    public function produk(){
        return $this->hasMany(Order::class,'id');
    }

    public function order(){
        return $this->hasMany(Order::class,'id_produks');
    }

    public function seat(){
        return $this->hasMany(Seat::class);
    }
}
