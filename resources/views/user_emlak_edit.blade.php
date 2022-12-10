@extends("layout.layout")

{{-- php --}}
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    use App\Http\Controllers\EmlakController;
    $iller=EmlakController::Emlak_iller();

    $ilan=EmlakController::EditReadEmlak($id)

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
<link rel="stylesheet" href="{{asset('assets/css/emlak_edit.css')}}">
@endsection
<!--    css end  -->


@section("main")
<section class="emlak-ekle-main">
    <div class="main-div">
        <div class="form-div">
            <form action="/emlak-update" class="form" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$id}}">
                <input class="form-control form-control-lg main-input" type="text" name="baslik"    placeholder="Başlık"    required value="{{$ilan["baslik"]}}">
                <input class="form-control form-control-lg main-input" type="text" name="aciklama"  placeholder="Açıklama"  required value="{{$ilan["aciklama"]}}">
                <input class="form-control form-control-lg main-input" type="number" name="boyut"   placeholder="Boyut"     required value="{{$ilan["boyut"]}}">
                <input class="form-control form-control-lg main-input" type="number" name="fiyat"   placeholder="Fiyat"     required value="{{$ilan["fiyat"]}}">

                <div>
                    <label for="il" class="select"  >İL</label>
                    <label for="ilce" class="select">İLCE</label>
                    <label for="mahalle" class="select">MAHALLE</label><br>
                    <select name="il" id="il" class="select"onchange="ilcelerigetir()" placeholder="lütfen il seçiniz" required >
                        <option>Lütfen il seçiniz</option>
                        @foreach ($iller as $il)
                            <option value="{{$il->IlID}}">{{$il->Il}}</option>
                        @endforeach
                    </select>
                    <select name="ilce" id="ilce" class="select" onchange="mahallelerigetir()" required>
                        <option>Lütfen önce il seçiniz</option>
                    </select>
                    <select name="mahalle" id="mahalle" class="select" required >
                        <option>Lütfen önce il seçiniz</option>
                    </select>
                </div>
                <br>
                <div>
                    <div class="tips">
                        <label style="margin-right: 25px" >Emlak tipi</label>
                        <select name="EmlakTip" id="EmlakTip" class="tip-selected" required>
                            <option disabled hidden selected>seçiniz</option>
                            <option value="1">Konut</option>
                            <option value="2">Arsa</option>
                            <option value="3">İşyeri</option>
                        </select>
                    </div>
                    <div class="tips">
                        <label style="margin-right: 43.5px">İlan tipi</label>
                        <select name="ilanTip" id ="ilanTip" class="tip-selected" required>
                            <option disabled hidden selected>seçiniz</option>
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

    {{-- <div class="image_table_up_div">
        <table class="table table-bordered table">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Action</th>
                <th>No</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @php
                $i=0;
            @endphp
            @foreach ($ilan["resimler"] as $resim)
                @if ($i %2==0)
                <tr>
                @endif
                <td class="no">{{ $i%2 }}</td>
                <td class="image">
                    <img src='data:@php echo $resim["resimid"];@endphp;base64,@php echo $resim["resimdata"];@endphp'>
                </td>
                <td>
                    <div class="action">
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$resim["resimid"]}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
                @php
                 $i++;   
                @endphp
            @endforeach
        </table>
    </div> --}}

    <div class="image_card_up_div">
        <div class="row row-cols-1 row-cols-md-3 g-4 mycard">
            @php
                $i=0;
            @endphp
            @foreach ($ilan["resimler"] as $resim)
                @if ($i %2==0)
                <tr>
                @endif
                <div class="col">
                    <div class="card h-100 text-bg-dark">
                        <img src='data:@php echo $resim["resimid"];@endphp;base64,@php echo $resim["resimdata"];@endphp' class="card-img-top img" alt="...">
                        <div class="card-body">
                            <div class="action">
                                <form action="/edit-image-delette/{{$resim["resimid"]}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>   
                        </div>
                    </div>
                </div>
                @php
                    $i++;   
                @endphp
            @endforeach
        </div>
    </div>

</section>
@endsection
@section("ex-js")
    <script>
        // function resimyazidegis()
        // {
        //     var yazi=document.getElementById("image").text;
        //     document.getElementById("images_label").innerHTML=yazi;
        // }

        function ilcelerigetir()
        {
            $("#ilce").find("option").remove().end().append(
            '<option>lütfen ilce seçiniz</option>');
            $("#mahalle").find("option").remove().end().append(
            '<option>lütfen önce ilçe seçiniz</option>');
            var il_id =document.getElementById("il").value;
            //var il_id =il.options[il.selectedIndex].index;
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
        function mahallelerigetir()
        {
            $("#mahalle").find("option").remove().end().append(
            '<option>lütfen mahalle seçiniz</option>');

            var ilce_id =document.getElementById("ilce").value;
            //var ilce_id =ilce.options[ilce.selectedIndex].value;
            //console.log(ilce_id);
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
        // setTimeout("()", 500);
        // setTimeout("mahallelerigetir($('#ilce'))", 600);
        
    </script>
    @php echo
    '<script>
        /*ilanin adresi */
        document.getElementById("il").selectedIndex="'.$ilan['il'].'";
        document.getElementById("EmlakTip").selectedIndex="'.$ilan['emlaktip'].'";
        document.getElementById("ilanTip").selectedIndex="'.$ilan['ilantip'].'";

        function getilce(){
            var temp = '.$ilan['ilce'].';
            var mySelect = document.getElementById("ilce").options
            var d = document.getElementById("ilce").length;
            console.log(d+"\n"+mySelect);
            
            for(j = 0;j<=d; j++) {
                
                x=mySelect[j];
                console.log(x +" j:"+ j);

                if(x && x.value == temp) {
                    mySelect.selectedIndex = j;
                    break;
                }
            }
            mahallelerigetir();
            
            //document.getElementById("ilce").selectedIndex="'.$ilan['ilce'].'";
        }


        function getmahalle(){
            var temp = '.$ilan['mahalle'].';
            var mySelect = document.getElementById("mahalle").options
            var d = document.getElementById("mahalle").length;
            //console.log(d+"\n"+mySelect);
            
            for(j = 0;j<=d; j++) {
                
                x=mySelect[j];
                console.log(x +" mahalle:"+ j);

                if(x && x.value == temp) {
                    mySelect.selectedIndex = j;
                    break;
                }
            }
            //document.getElementById("mahalle").selectedIndex="'.$ilan['mahalle'].'";
        }
    </script>'
    @endphp
@endsection
@section("js")
    <script>
    window.onload = function() {

                ilcelerigetir();
                setTimeout(getilce, 800);
                setTimeout(mahallelerigetir, 1000);
                setTimeout(getmahalle, 2000);
            };
       
    </script>
@endsection    
