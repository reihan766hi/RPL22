<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Seat extends Model
{
    use HasFactory;
    protected $table = 'seat';


    public function produk(){
        return $this->belongsTo(Produk::class,'id_produk');
    }

    public function bus(){
        return $this->belongsTo(DaftarBus::class,'id_bus');
    }

    public function order(){
        return $this->belongsTo(Order::class,'id_order');
    }
}
