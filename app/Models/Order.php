<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderproduk(){
        return $this->belongsTo(Produk::class,'id_produks');
    }

    public function seat(){
        return $this->hasMany(Seat::class,'id_order');
    }

}
