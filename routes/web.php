<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KullaniciController;
use App\Http\Controllers\GirisKayitController;

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
 Route::redirect('/', '/home');
Route::get('/home', function () {
    $GirKulAd=FALSE;
    $GirKulSoyad=FALSE;
    return view('welcome',compact("GirKulAd","GirKulSoyad"));
});
Route::get('/home/{GirKulAd}/{GirKulSoyad}', function ($GirKulAd,$GirKulSoyad) {
    return view('welcome',compact("GirKulAd","GirKulSoyad"));
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