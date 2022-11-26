<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarArea;

class DaftarBus extends Model
{
    public function area(){
        return $this->belongsTo(DaftarArea::class,'kode_area');
    }

    public function produk(){
        return $this->hasMany(Produk::class,'kode_bus');
    }

    public function seat(){
        return $this->hasMany(Seat::class);
    }
}
