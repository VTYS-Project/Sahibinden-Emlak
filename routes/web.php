<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KullaniciController;
use App\Http\Controllers\GirisKayitController;
use App\Http\Controllers\HomeEmlakController;
use App\Http\Controllers\EmlakController;
use App\Http\Controllers\ProfilEditController;

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


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
Route::get('/', function () {
return view('welcome'/*,compact("GirKulAd")*/);
});

/**************************************************************************************************** */
//                      #   SIGN AND LOGİN  # 

Route::get('/giris', function () {return view('login_and_sign_page')."<script href='{{asset('assets/js/giris.js')}}'>degis();</script>";});
Route::get('/kayit', function () {
    return view('login_and_sign_page')."<script href='{{asset('assets/js/giris.js')}}'>degis();degis(); </script>";
});
Route::get('/kayit-yap',[GirisKayitController::class,'create']);
Route::post('/giris-yap',[GirisKayitController::class,'login']);

Route::get('/cikis',[GirisKayitController::class,'log_out']);


/**************************************************************************************************** */
Route::get('/emlak/{id}', function ($id) {
return view("emlak_page",compact("id"));
});

Route::get("emlak-operation",function(){
    return view("user_emlak_operating");
 });

 Route::get('emlak-add', function () {
    return view("user_emlak_ekle");
    });
Route::get("emlak-edit/{id}",function($id){return view("user_emlak_edit",compact("id"));});
Route::get("emlak-ilceler/il={id}",function($id){
    return EmlakController::Emlak_ilceler($id);
});
Route::get("emlak-mahaleler/ilce={id}",function($id){
    return EmlakController::Emlak_mahalleler($id);
});

Route::post("emlak-ekle",[EmlakController::class ,"EmlakEkle"]);
Route::post("emlak-update",[EmlakController::class ,"EmlakEdit"]);

Route::get("emlak-delette/{id}",[EmlakController::class ,"EmlakDelette"]);

Route::post("edit-image-delette/{id}",[EmlakController::class,"resimdelette"]);
/**************************************************************************************************** */
Route::get("profil",function()
{   
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if($_SESSION){return view("profil");}
    else {return view("welcome");}
    
});

Route::get("profil-bilgileri",function()
{
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if($_SESSION){return view("mydataedit");}
    else {return view("welcome");}
    
});
Route::get('profil-edit',[ProfilEditController::class,'Update']);
