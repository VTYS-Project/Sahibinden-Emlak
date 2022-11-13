<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KullaniciController;
use App\Http\Controllers\GirisKayitController;
use App\Http\Controllers\HomeEmlakController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/',"/home");
Route::get('/home', function () {
    $GirKulAd=FALSE;
    $ilans=HomeEmlakController::readEmlak();
    //return $ilans;
    return view('welcome',compact("GirKulAd","ilans"));
});
Route::get('/home/GirKulAd={GirKulAd}%GirKulSoyad={GirKulSoyad}%GirKulTel={GirKulTel}%GirKulMail={GirKulMail}%GirKulPass={GirKulPass}', function ($GirKulAd,$GirKulSoyad,$GirKulTel,$GirKulMail,$GirKulPass) {
    $ilans=HomeEmlakController::readEmlak();
    return view('welcome',compact("GirKulAd","GirKulSoyad","GirKulTel","GirKulMail","GirKulPass","ilans"));
});
/**************************************************************************************************** */
//                      #   SIGN AND LOGİN  # 

Route::get('/giris', function () {return view('login_and_sign_page');});
Route::get('/kayit', function () {
    return view('login_and_sign_page')."<script href='{{asset('assets/js/giris.js')}}'>degis();degis(); </script>";
});
Route::get('/giris-kayit/kayit',[GirisKayitController::class,'create']);
Route::get('/giris-kayit/giris',[GirisKayitController::class,'login']);

/**************************************************************************************************** */
Route::get("/emlak-goruntule",[HomeEmlakController::class,"readEmlak"]);