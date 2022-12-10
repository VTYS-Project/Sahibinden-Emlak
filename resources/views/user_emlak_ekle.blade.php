@extends("layout.layout")

{{-- php --}}
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    use App\Http\Controllers\EmlakController;
    $iller=EmlakController::Emlak_iller();


?>

{{-- end php --}}
<!--    title   -->
@section("title")
| {{$_SESSION["kullaniciadi"]." ".$_SESSION["kullanicisoyadi"]}}
@endsection
<!--    title end  -->

<!--    css   -->
@section("css")
<link rel="stylesheet" href="{{asset('assets/css/emlak_add.css')}}">
@endsection
<!--    css end  -->
@section("js")
    <script>
        function ilcelerigetir(il)
        {
            $("#ilce").find("option").remove().end().append(
            '<option>lütfen ilce seçiniz</option>');
            $("#mahalle").find("option").remove().end().append(
            '<option>lütfen önce ilçe seçiniz</option>');
            var il_id =il.options[il.selectedIndex].index;
            //console.log(il_id);
             $.ajax({
                 url:"{{url('emlak-ilceler/il=')}}"+il_id,
                 //method:"POST",
                 success:function(ilce){
                  ilce.forEach(ilceleriayir);
                 }
             });
        }
        function ilceleriayir(item,index,arr)
        {
            addop=document.createElement("option");
            document.getElementById("ilce").options.add(addop);
            addop.text = item["Ilce"];
            addop.value = item["IlceID"];
        }
        
/*          burdasın */
        function mahallelerigetir(ilce)
        {
            $("#mahalle").find("option").remove().end().append(
            '<option>lütfen mahalle seçiniz</option>');

            var ilce_id =ilce.options[ilce.selectedIndex].value;
            console.log(ilce_id);
             $.ajax({
                 url:"{{url('emlak-mahaleler/ilce=')}}"+ilce_id,
                 //method:"POST",
                 success:function(mahalle){
                  mahalle.forEach(mahalleleriayir);
                 }
             });
        }
        function mahalleleriayir(item,index,arr)
        {
            addop=document.createElement("option");
            document.getElementById("mahalle").options.add(addop);
            addop.text = item["Mahalle"];
            addop.value = item["MahalleID"];
        }
    </script>
@endsection

@section("main")
<section class="emlak-ekle-main">
    <div class="main-div">
        <div class="form-div">
            <form action="emlak-ekle" class="form" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$_SESSION["K-id"]}}">
                <input class="form-control form-control-lg main-input" type="text" name="baslik"    placeholder="Başlık"    required>
                <input class="form-control form-control-lg main-input" type="text" name="aciklama"  placeholder="Açıklama"  required>
                <input class="form-control form-control-lg main-input" type="number" name="boyut"   placeholder="Boyut"     required>
                <input class="form-control form-control-lg main-input" type="number" name="fiyat"   placeholder="Fiyat"     required>

                <div>
                    <label for="il" class="select"  >İL</label>
                    <label for="ilce" class="select">İLCE</label>
                    <label for="mahalle" class="select">MAHALLE</label><br>
                    <select name="il" id="il" class="select" onchange="ilcelerigetir(this)" placeholder="lütfen il seçiniz" required>
                        <option>Lütfen il seçiniz</option>
                        @foreach ($iller as $il)
                            <option value="{{$il->IlID}}">{{$il->Il}}</option>
                        @endforeach
                    </select>
                    <select name="ilce" id="ilce" class="select" onchange="mahallelerigetir(this)" required>
                        <option>Lütfen önce il seçiniz</option>
                    </select>
                    <select name="mahalle" id="mahalle" class="select" required>
                        <option>Lütfen önce il seçiniz</option>
                    </select>
                </div>
                <br>
                <div>
                    <div class="tips">
                        <label style="margin-right: 25px" >Emlak tipi</label>
                        <select name="EmlakTip" class="tip-selected" required>
                            <option value="1">Konut</option>
                            <option value="2">Arsa</option>
                            <option value="3">İşyeri</option>
                        </select>
                    </div>
                    <div class="tips">
                        <label style="margin-right: 43.5px">İlan tipi</label>
                        <select name="ilanTip" class="tip-selected" required>
                            <option value="1">Satılık</option>
                            <option value="2">Kiralık</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="end_div">
                    <div class="images_label_up_div">
                        <label for="image" class="images_label" id="images_label">RESİM EKLE</label>
                    </div>
                    <input type="submit" value="KAYDET" class="kaydet">
                </div>
                <input type="file" name="image[]" id="image" multiple class="images" accept="image/png, image/jpeg"> 
                
            </form>
        </div>
    </div>  
</section>
@endsection