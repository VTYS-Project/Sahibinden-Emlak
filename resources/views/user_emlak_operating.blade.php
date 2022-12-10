@extends("layout.layout")

{{-- php --}}
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    use App\Http\Controllers\ProfilController;
    $ilans=ProfilController::getMyEmlaks($_SESSION["K-id"]);
    ?>
{{-- end php --}}
<!--    title   -->
@section("title")
| {{$_SESSION["kullaniciadi"]." ".$_SESSION["kullanicisoyadi"]}}
@endsection
<!--    title end  -->

<!--    css   -->
@section("css")
<link rel="stylesheet" href="{{asset('assets/css/user_emlak_op.css')}}">

@endsection
<!--    css end  -->

@section("main")

<section class="u-clearfix u-white u-section-2" id="sec-2865">
    <div class="u-clearfix u-sheet u-sheet-1">
      <a
        href="emlak-add"
        class="emlak-ekle u-active-grey-60 u-border-none u-btn u-btn-round u-button-style u-hover-palette-4-dark-1 u-palette-1-base u-radius-50 u-btn-1"
        ><span class="u-file-icon u-icon u-text-white u-icon-1"
          ><img src="{{URL("images/plus.png")}}" alt=""
        /></span>
      </a>
      {{-- foreach ile çoğaltılacak div --}}
        @php
             $i=1;
        @endphp
        @foreach ($ilans as $ilan )
            @php
                $id=$ilan["id"];
            @endphp
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1 ilan-div">
                <div class="u-layout">
                <div class="u-layout-col">
                    <div class="u-size-60">
                    <div class="u-layout-row">
                        <div
                        class="u-container-style u-image u-layout-cell u-size-18 u-image-1"
                        data-image-width="1200"
                        data-image-height="628"
                        style="background-image: url('data:@php echo $ilan["resimid"];@endphp;base64,@php echo $ilan["resimdata"];@endphp')"
                        >
                        <div class="u-container-layout u-container-layout-1"></div>
                        </div>
                        <div
                        class="u-container-style u-layout-cell u-size-30 u-layout-cell-2"
                        >
                        <div class="u-container-layout u-container-layout-2">
                            <h3 class="u-align-justify u-text u-text-1">
                                {{$ilan["baslik"]}}
                            </h3>
                            <p
                            class="u-align-center u-text u-text-variant u-text-3"
                            >
                            {{$ilan["fiyat"]}} ₺
                            </p>
                            
                            <p
                            class="u-align-center u-text u-text-variant u-text-3"
                            >
                            {{$ilan["adres"]}}
                            </p>
                        </div>
                        </div>
                        <div
                        class="u-container-style u-layout-cell u-size-12 u-layout-cell-3"
                        >
                        <div
                            class="u-container-layout u-valign-top u-container-layout-3"
                        >
                            <a
                            href="emlak-edit/{{$id}}"
                            class="emlak-edit u-active-grey-70 u-border-none u-btn u-btn-round u-button-style u-hover-palette-3-base u-palette-3-light-1 u-radius-50 u-btn-2"
                            ><span class="u-file-icon u-icon u-text-white u-icon-2"
                                ><img src="{{URL("images/edit.png")}}" alt=""
                            /></span>
                            </a>
                            <a
                            href="emlak-delette/{{$id}}"
                            class="edit u-active-grey-60 u-btn u-btn-round u-button-style u-hover-palette-2-base u-palette-2-light-1 u-radius-50 u-text-active-white u-text-black u-text-hover-black u-btn-3"
                            ><span class="u-file-icon u-icon u-icon-3"
                                ><img src="{{URL("images/cop.png")}}" alt=""
                            /></span>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            @php
            $i+=1;
            @endphp
        @endforeach
    </div>
  </section>
  @endsection