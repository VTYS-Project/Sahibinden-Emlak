<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kullanici extends Model
{
    protected $table="kullanici";
    protected $fillable = [
        "Kullaniciad",
        "Kullanicisoyad",
        "Kullanicitel",
        "email",
        "password"
    ];
    /*protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
}