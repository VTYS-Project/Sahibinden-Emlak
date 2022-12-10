<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ilan;
use Illuminate\Support\Facades\DB;

class HomeEmlakController extends Controller
{
    public static function HomeReadEmlak()
    {
        $rastgele=DB::select('SELECT ilanID FROM ilan ORDER BY RAND() LIMIT 6'); // rastglele 6 ilan id
        $anasayfa_ilanlar=[];
        $i=0;
        //echo count($anasayfa_ilanlar);
        foreach($rastgele as $rastgel)
        {
            $newReadilan=DB::select('select Baslik,Fiyat,MahalleID from ilan where ilanID = ?', [$rastgel->ilanID]);
            //id ile resmin tüm bilgileri
            // V aşagıdaki yeni foreach dizi içerisindeki diziyi okumak için açıldı V
            foreach($newReadilan as $ilan)
            {
                $mahalle=DB::select('select Mahalle,IlceID from mahalle where MahalleID = ?', [$ilan->MahalleID]);
                $ilce=DB::select('select Ilce,IlID from ilce where IlceID = ?', [$mahalle[0]->IlceID]);
                $il=DB::select('select Il from il where IlID = ?', [$ilce[0]->IlID]);
                $mahalle=$mahalle[0]->Mahalle;
                $ilce=$ilce[0]->Ilce;
                $il=$il[0]->Il;
                $anaresim=DB::select('select resim,resimID from resim where ilanID = ?', [$rastgel->ilanID])[0];
                //$anaresim="<img src='data:".$anaresim->resimID.";base64,".base64_encode($anaresim->resim)."' width='100%'  height='250px'/>";
                $temp=array("id"=>$rastgel->ilanID,"baslik"=>$ilan->Baslik,"fiyat"=>$ilan->Fiyat,"resim"=>$anaresim,"adres"=>"$mahalle mahallesi / $ilce / $il");
                $anasayfa_ilanlar[$i]=$temp;
                $i+=1;
            }
            
        }
        return $anasayfa_ilanlar;
    }
}
/*  veritabanından rast gele 5 resim alma


    $rastgele=DB::select('SELECT resimID FROM resim ORDER BY RAND() LIMIT 5'); // rastglele 5 id
        foreach($rastgele as $rastgel)
        {
            $resimler=[];
            $newReadEmlak=DB::select('select * from resim where resimID = ?', [$rastgel->resimID]);
            //id ile resmin tüm bilgileri
            foreach($newReadEmlak as $a)
            {
             echo $resimler="<img src='data:".$a->resimID.";base64,".base64_encode($a->resim)."'/>";
             // resim yazdırma
            }
            
        }
*/