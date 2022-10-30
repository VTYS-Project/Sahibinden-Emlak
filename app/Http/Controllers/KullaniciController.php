<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kullanici;

class KullaniciController extends Controller
{
    /*public function index()
    {
        
    }*/
    public function create()
    {
        $newUser =new Kullanici;
        $newUser->KullaniciID=1;
        $newUser->Kullaniciad="adam";
        $newUser->Kullanicisoyad="kral";
        $newUser->Kullanicitel="5555666677";
        $newUser->email="hacciabi@gmail.com";
        $newUser->password="123456";
        $newUser->save();
        /*try
        {
            
        }
        catch(\Illuminate\Database\QueryException $exception)
        {
            dd(get_class($exception));
            return  "kullanıcı adı zaten mevcut";
        }*/
        return "kullanıcı kaydedildi";
    }
   /* public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        
    }*/
}
