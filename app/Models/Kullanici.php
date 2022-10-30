<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kullanici extends Model
{
    protected $table="kullanici";
    protected $fillable=["Kullaniciad","Kullanicisoyad","Kullanicitel","email","password"];
}
