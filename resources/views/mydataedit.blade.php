@extends("layout.layout")

{{-- php --}}
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    use App\Http\Controllers\ProfilEditController;
    $mydata=new ProfilEditController;
    $readmydata=$mydata->getData($_SESSION["K-id"]);

    $isimedit=null;
    $soyisimedit=null;
    $teledit=null;
    $passedit=null;
?>
{{-- end php --}}
<!--    title   -->
@section("title")
| {{$_SESSION["kullaniciadi"]." ".$_SESSION["kullanicisoyadi"]}}
@endsection
<!--    title end  -->

<!--    css   -->
@section("css")
<link rel="stylesheet" href="{{asset('assets/css/mydata.css')}}">

@endsection
<!--    css end  -->
{{-- js --}}
@section("js")
<script src="{{asset("assets/js/mydata.js")}}">
</script>
@endsection
{{-- js --}}
@section("main")
<!-- Modal -->
<div class="container">
  <div class="row profile_edit">
    <div class="col-md-3"></div>
    <div class="col-md-6 personal-info profile_edit_form">
      <h3>KULLANICI BİLGİLERİ</h3>
      
      <form class="form-horizontal" role="form" action="profil-edit">
        @csrf
        <input type="text" name="id" style="display: none" value="{{$_SESSION["K-id"]}}">
        <div class="form-group">
          <label class="col-lg-3 control-label">ADI:</label>
          <div class="col-lg-12">
            <input class="form-control" type="text" value="{{$_SESSION["kullaniciadi"]}}"name="editisim">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">SOYADI</label>
          <div class="col-lg-12">
            <input class="form-control" type="text" value="{{$_SESSION["kullanicisoyadi"]}}"name="editsoyisim">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">E-Mail:</label>
          <div class="col-lg-12">
            <input class="form-control" type="email" value="{{$readmydata["email"]}}"name="editmail">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Telefon:</label>
          <div class="col-lg-12">
            <input class="form-control" type="tel" value="{{$readmydata["telefon"]}}"name="edittel">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">ŞİFRE:</label>
          <div class="col-lg-12">
            <div class="ui-select">
             <input class="form-control" type="text" value="{{$readmydata["pass"]}}"name="editpass">
            </div>
          </div>
        </div>
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input type="submit" class="btn btn-primary" value="KAYDET">
            <span></span>
            {{-- <input type="reset" class="btn btn-default" value="Cancel"> --}}
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
@endsection