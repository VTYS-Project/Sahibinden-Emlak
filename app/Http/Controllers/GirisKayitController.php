<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kullanici;
use Illuminate\Support\Facades\DB;
// ********* session control ******************
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// ********* session control end **************

class GirisKayitController extends Controller
{
    public function create(Request $Kayit)
    {
        //return $Kayit;
        $kontrol=DB::select('select * from kullanici where email=?;',[$Kayit->sign_email]);

        if($kontrol)
        {
            return view("login_and_sign_page")."<script href='{{asset('assets/js/giris.js')}}'>degis();degis(); alert('e-mail adresi mevcut<br>Başka bir e-mail adresi kullanın')</script>";
        }

        $newKullanici=new Kullanici;
        $newKullanici->Kullaniciad=$Kayit->sign_ad;
        $newKullanici->Kullanicisoyad=$Kayit->sign_soyad;
        $newKullanici->email=$Kayit->sign_email;
        $newKullanici->Kullanicitel=$Kayit->sign_phone;
        $newKullanici->password=$Kayit->sign_sifre;
        $newKullanici->save();

        $kayittamam=DB::select('SELECT KullaniciID FROM kullanici WHERE email=?;',[$Kayit->sign_email]);
        session_regenerate_id(true);
        $_SESSION["login"]=true;
        $_SESSION["K-id"]=$kayittamam[0]->KullaniciID;
        $_SESSION["kullaniciadi"]=$Kayit->sign_ad;
        $_SESSION["kullanicisoyadi"]=$Kayit->sign_soyad;
        
        return header('Refresh: 0.1; url=/');
        //return view("welcome");
    }

    public function login(Request $giris){
        
        $giriskontrol=DB::select('SELECT KullaniciID,Kullaniciad,Kullanicisoyad FROM kullanici WHERE email=? AND password=?;',[$giris->login_email,$giris->login_sifre]);
        if($giriskontrol)
        {
            $giris_bilgi=[];
            foreach($giriskontrol as $parca)
            {
                session_regenerate_id(true);
                $_SESSION["login"]=true;
                $_SESSION["K-id"]=$parca->KullaniciID;
                $_SESSION["kullaniciadi"]=$parca->Kullaniciad;
                $_SESSION["kullanicisoyadi"]=$parca->Kullanicisoyad;
            }
            
            return view("welcome");
        }
        else{
            return view("/giris");
        }
    }

    public function log_out()
    {
        session_unset();
        session_destroy(); 
        return view("welcome");
    }
}
