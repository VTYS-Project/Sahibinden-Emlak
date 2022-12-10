<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ilan;
use Illuminate\Support\Facades\DB;
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
class EmlakController extends Controller
{
    public static function ReadEmlak($id)
    {
        $ilan_data=DB::select('select * from ilan where ilanID = ?', [$id]);
        $ilan_data=$ilan_data[0];
                
        $mahalle=DB::select('select Mahalle,IlceID from mahalle where MahalleID = ?', [$ilan_data->MahalleID]);
        $ilce=DB::select('select Ilce,IlID from ilce where IlceID = ?', [$mahalle[0]->IlceID]);
        $il=DB::select('select Il from il where IlID = ?', [$ilce[0]->IlID]);
        $mahalle=$mahalle[0]->Mahalle;
        $ilce=$ilce[0]->Ilce;
        $il=$il[0]->Il;
        $satici=DB::select('select Kullaniciad,Kullanicisoyad from kullanici where KullaniciID = ?', [$ilan_data->KullaniciID])[0];
        // resimler dizi içi dizi halinde alınıyor
        $resimler=DB::select('select resim,resimID from resim where ilanID = ?', [$id]);
        $tip=DB::select('select emlaktip from emlaktip where emlaktipID = ?', [$ilan_data->emlaktipID])[0];
        $i=0;
        foreach($resimler as $resim)
        {   
            $resimler[$i]=["resimid"=>$resim->resimID,"resimdata"=>$resim->resim];
            //$resimler[$i]="<img src='data:".$resim->resimID.";base64,".base64_encode($resim->resim)."'/>";
            $i+=1;
        } 
        //print_r($resimler);
        $ilan=
            [
            "satici"=>$satici->Kullaniciad." ".$satici->Kullanicisoyad,
            "baslik"=>$ilan_data->Baslik,
            "aciklama"=>$ilan_data->Aciklama,
            "fiyat"=>$ilan_data->Fiyat,
            "boyut"=>$ilan_data->Boyut,
            "adres"=>"$mahalle/ $ilce / $il",
            "emlaktip"=>$tip->emlaktip,
            "resimler"=>$resimler,
            ];
        return $ilan;

    }

    public static function Emlak_iller()
    {
        return DB::select("SELECT IlID,Il FROM il");
    }
    public static function Emlak_ilceler($id)
    {
        //return [["id"=>1,"ilce"=>"merkez"],["id"=>2,"ilce"=>"mutki"],["id"=>3,"ilce"=>"tatvan"]];
        return DB::select("SELECT IlceID,Ilce FROM ilce WHERE IlID=? ORDER BY Ilce", [$id]);
    }
    public static function Emlak_mahalleler($id)
    {
        return DB::select("SELECT MahalleID,Mahalle FROM mahalle WHERE IlceID=? ORDER BY Mahalle", [$id]);
    }


    public function EmlakEkle(Request $ekle)
    {
        date_default_timezone_set('Europe/Istanbul');
        $tarih=date('Y-m-d H:i:s');
        $resimler=$_FILES["image"]["tmp_name"];
        DB::insert("INSERT INTO ilan (Baslik,Aciklama,Boyut,Fiyat,MahalleID,
        emlaktipID,ilantipID,KullaniciID,Ilantarih) VALUE(?,?,?,?,?,?,?,?,?)",
        [$ekle->baslik,$ekle->aciklama,$ekle->boyut,$ekle->fiyat,$ekle->mahalle,
        $ekle->EmlakTip,$ekle->ilanTip,$_SESSION["K-id"],$tarih]);

        $newilanid=DB::select("SELECT ilanID FROM ilan WHERE KullaniciID=? AND Ilantarih=?", [$_SESSION["K-id"],$tarih])[0]->ilanID;

        foreach ($resimler as $resim){
            $image=base64_encode(file_get_contents($resim));
            DB::insert("INSERT INTO resim (resim , ilanID) VALUES ('$image',$newilanid)");
        }
        return header("Refresh: 0.1; url=/emlak/$newilanid");
    }


    
   
    public function EmlakDelette($id){
        DB::delete('DELETE FROM resim WHERE ilanID = ?', [$id]);
        DB::delete('DELETE FROM ilan WHERE ilanID = ?', [$id]);
        
        return view("user_emlak_operating");

    }

    public static function EditReadEmlak($id)
    {
        $ilan_data=DB::select('SELECT * FROM ilan WHERE ilanID = ?', [$id]);
        $ilan_data=$ilan_data[0];
                
        $mahalle=DB::select('SELECT Mahalle,IlceID FROM mahalle WHERE MahalleID = ?', [$ilan_data->MahalleID]);
        $ilce=DB::select('SELECT Ilce,IlID FROM ilce WHERE IlceID = ?', [$mahalle[0]->IlceID]);
        
        $il=$ilce[0]->IlID;
        $ilce=$mahalle[0]->IlceID;
        $mahalle=$ilan_data->MahalleID;

        // resimler dizi içi dizi halinde alınıyor
        $resimler=DB::select('SELECT resim,resimID FROM resim WHERE ilanID = ?', [$id]);
        $i=0;
        foreach($resimler as $resim)
        {   
            $resimler[$i]=["resimid"=>$resim->resimID,"resimdata"=>$resim->resim];
            //$resimler[$i]="<img src='data:".$resim->resimID.";base64,".base64_encode($resim->resim)."'/>";
            $i+=1;
        } 
        //print_r($resimler);
        $ilan=
            [
            "baslik"=>$ilan_data->Baslik,
            "aciklama"=>$ilan_data->Aciklama,
            "fiyat"=>$ilan_data->Fiyat,
            "boyut"=>$ilan_data->Boyut,
            "il"=>$il,
            "ilce"=>$ilce,
            "mahalle"=>$mahalle,
            "ilantip"=>$ilan_data->ilantipID,
            "emlaktip"=>$ilan_data->emlaktipID,
            "resimler"=>$resimler,
            ];
        return $ilan;

    }
    public function EmlakEdit(Request $edit)
    {
        $resimler=$_FILES["image"]["tmp_name"];
        DB::insert("UPDATE ilan SET Baslik=?,Aciklama=?,Boyut=?,Fiyat=?,MahalleID=?,
        emlaktipID=?,ilantipID=? WHERE ilanID=?",
        [$edit->baslik,$edit->aciklama,$edit->boyut,$edit->fiyat,$edit->mahalle,
        $edit->EmlakTip,$edit->ilanTip,$edit->id]);
        //return strlen($resimler[0]);
        if(strlen($resimler[0])!=0){
        foreach ($resimler as $resim){
            $image=base64_encode(file_get_contents($resim));
            DB::insert("INSERT INTO resim (resim , ilanID) VALUES ('$image',?)",[$edit->id]);
        }}
        return header("Refresh: 0.1; url=/emlak/$edit->id");
    }

    public function resimdelette($id ,Request $x)
    {
        DB::delete('DELETE FROM resim WHERE resimID = ?', [$id]);
        //return $x->id;
        return view("user_emlak_edit")->with("id",$x->id);
    }
}
