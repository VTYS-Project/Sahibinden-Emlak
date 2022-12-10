<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
class ProfilEditController extends Controller
{
    public static function getData($id)
    {
        $kullaniciData=DB::select('SELECT Kullanicitel,password,email FROM kullanici WHERE KullaniciID = ?', [$id])[0];
        return ["telefon"=>$kullaniciData->Kullanicitel,"pass"=>$kullaniciData->password,"email"=>$kullaniciData->email];
    }
    public function Update(Request $new)
    {
        $kullaniciData=DB::select('SELECT Kullaniciad,Kullanicisoyad,password,email,Kullanicitel FROM kullanici WHERE KullaniciID = ?',[$new->id])[0];
        if($new->editisim!=$kullaniciData->Kullaniciad)
        {
          DB::update('UPDATE kullanici SET Kullaniciad=? where KullaniciID = ?', [$new->editisim,$new->id]);
          $_SESSION["kullaniciadi"]=$new->editisim;
        }

        if($new->editsoyisim!=$kullaniciData->Kullanicisoyad)
        {
          DB::update('UPDATE kullanici SET Kullanicisoyad=? where KullaniciID = ?', [$new->editsoyisim,$new->id]);  
          $_SESSION["kullanicisoyadi"]=$new->editsoyisim;
        }

        if($new->edittel!=$kullaniciData->Kullanicitel)
        {
          DB::update('UPDATE kullanici SET Kullanicitel=? where KullaniciID = ?', [$new->edittel,$new->id]);  
        }

        if($new->editmail!=$kullaniciData->email)
        {
          DB::update('UPDATE kullanici SET email=? where KullaniciID = ?', [$new->editmail,$new->id]);  
        }

        if($new->editpass!=$kullaniciData->password)
        {
          DB::update('UPDATE kullanici SET password=? where KullaniciID = ?', [$new->editpass,$new->id]);  
        }
        
        return view("profil");
    }
}
