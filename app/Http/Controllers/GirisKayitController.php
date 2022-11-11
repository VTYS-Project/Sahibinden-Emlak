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
        $kontrol=DB::select('select * from kullanici where email=?;', [$Kayit->sign_email]);

        if($kontrol)
        {
            return view("login_and_sign_page")."<script href='{{asset('assets/js/giris.js')}}'>degis();degis(); alert('e mail adresi mevcut başka bir e mail kullanın')</script>";
        }
        $newKullanici=new Kullanici;
        $newKullanici->Kullaniciad=$Kayit->sign_ad;
        $newKullanici->Kullanicisoyad=$Kayit->sign_soyad;


        $newKullanici->email=$Kayit->sign_email;

        $newKullanici->Kullanicitel=$Kayit->sign_phone;
        $newKullanici->password=$Kayit->sign_sifre;
        $newKullanici->save();
        return view("welcome");
    }
}
