<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;use App\Models\DaftarBus;
use App\Models\DaftarArea;

class DaftarBus extends Model
{
    public function area(){
        return $this->belongsTo(DaftarArea::class,'kode_area');
    }
}
