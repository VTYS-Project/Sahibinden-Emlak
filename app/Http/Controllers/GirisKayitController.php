<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kullanici;
use Illuminate\Support\Facades\DB;

class GirisKayitController extends Controller
{
    /*public function createForm(Request $request) {
        return view('login_and_sign_page');
      }*/
    public function create(Request $Kayit)
    {
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
        
        return view("/home");
    }

    public function login(Request $giris){
        
        $giriskontrol=DB::select('SELECT * FROM kullanici WHERE email=? AND password=?;',[$giris->login_email,$giris->login_sifre]);
        if($giriskontrol)
        {
            $giris_bilgi=[];
            foreach($giriskontrol as $parca)
            {
                $GirKulAd=$parca->Kullaniciad;
                $GirKulSoyad=$parca->Kullanicisoyad;
                $GirKulTel=$parca->Kullanicitel;
                $GirKulMail=$parca->email;
                $GirKulPass=$parca->password;
            }
            // view()->share('giris_kontrol', $giriskontrol);
            //return view("/home/$GirKulAd%$GirKulSoyad%$GirKulTel%$GirKulMail%$GirKulPass");
            return view("welcome",compact("GirKulAd","GirKulSoyad","GirKulTel","GirKulMail","GirKulPass"));
        }
        else{
            return view("/giris");
        }
        //return $giriskontrol;
    }
}
