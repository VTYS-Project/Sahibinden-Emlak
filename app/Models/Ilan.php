<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilan extends Model
{
    protected $table="ilan";
    protected $fillable=[
        "Baslik",
        "Aciklama",
        "Boyut",
        "Fiyat",
        "MahalleID",
        "emlaktipID",
        "ilantipID",
        "Ilandurum",
        "KullaniciID",
        "Ilantarih"
    ];
}
