<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public static function getMyEmlaks($id)
    {
        $myEmlaks=DB::select('SELECT ilanID,Baslik,Fiyat,MahalleID FROM ilan WHERE KullaniciID = ?', [$id]);
        $myEmlakList=[];
        $i=0;
        foreach($myEmlaks as $myEmlak)
        {
            $mahalle=DB::select('select Mahalle,IlceID from mahalle where MahalleID = ?', [$myEmlak->MahalleID]);
            $ilce=DB::select('select Ilce,IlID from ilce where IlceID = ?', [$mahalle[0]->IlceID]);
            $il=DB::select('select Il from il where IlID = ?', [$ilce[0]->IlID]);
            $mahalle=$mahalle[0]->Mahalle;
            $ilce=$ilce[0]->Ilce;
            $il=$il[0]->Il;
            $anaresim=DB::select('select resim,resimID from resim where ilanID = ?', [$myEmlak->ilanID])[0];
            //$anaresim="<img src='data:".$anaresim->resimID.";base64,".base64_encode($anaresim->resim)."' width='100%'  height='250px'/>";
            //$temp=array("id"=>$myEmlak->ilanID,"baslik"=>$myEmlak->Baslik,"fiyat"=>$myEmlak->Fiyat,"resim"=>$anaresim,"adres"=>"$mahalle mahallesi / $ilce / $il");
            $temp=array("id"=>$myEmlak->ilanID,"baslik"=>$myEmlak->Baslik,"fiyat"=>$myEmlak->Fiyat,"resimid"=>$anaresim->resimID,"resimdata"=>$anaresim->resim,"adres"=>"$mahalle / $ilce / $il");
            $myEmlakList[$i]=$temp;
            $i+=1;
        }
        return $myEmlakList;
    }
}
