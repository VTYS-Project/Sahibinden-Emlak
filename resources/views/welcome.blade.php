@extends("layout.layout")
<!--    title   -->
@section("title")
| HOME
@endsection
<!--    title end  -->

<!--    css   -->
@section("css")
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

@endsection
<!--    css end  -->
@php
  use App\Http\Controllers\HomeEmlakController;
  $ilans=HomeEmlakController::HomeReadEmlak();

  //session_start();
@endphp
<!--    section 1   -->

@section("main")
  <section
      class="u-align-left u-clearfix u-image u-shading app-u-section-1"
      src=""
      data-image-width="1200"
      data-image-height="628"
      id="sec-2a80"
    >
      <div
        class="banner u-absolute-hcenter u-expanded u-gradient u-opacity u-opacity-70 u-shape u-shape-rectangle u-shape-1"
      ></div>
      <p class="u-align-left u-text u-text-white u-text-1">SİZE EV SATACAĞIZ</p>
      <p class="u-align-left u-text u-text-white u-text-2">DOĞRU YERDESİNİZ</p>
  </section>
  <main class="main">
    <section class="section-2">
        <!--    section 2   -->
        {{-- <div class="section-2_div container bg-secondary">
            <div class="section-2_div row row-cols-3">
                <div class="section-2_div col-4 position-relative">
                    <a href="#" class="nav_item-div_item section-2_div_item">ARSA</a>
                </div>
                <div class="section-2_div col-4 position-relative">
                    <div class="nav_item-div_item section-2_div_item">
                        <button class="btn btn-secondary dropdown-toggle text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            KONUT TİPİ
                        </button>            
                        <ul class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item " href="#">Daire</a></li>
                            <li><a class="dropdown-item " href="#">Müstakil</a></li>
                        </ul>
                    </div>
                </div>
                <div class="section-2_div col-4 position-relative">
                    <a href="#" class="nav_item-div_item section-2_div_item ">İŞYERİ</a>
                </div>
            </div>
        </div>--}}
        
        <section class="u-clearfix u-section-2" id="sec-c75c">
            <div class="u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
              <div class="u-layout" style="">
                <div class="u-layout-row" style="">
                  <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-shading u-size-36 u-size-xs-60 u-image-1" src="" data-image-width="1000" data-image-height="675">
                    <div class="u-container-layout u-valign-middle u-container-layout-1" src="">
                      
                    </div>
                  </div>
                  <div class="u-align-left u-container-style u-grey-5 u-layout-cell u-right-cell u-size-24 u-size-xs-60 u-layout-cell-2">
                    <div class="u-container-layout u-container-layout-2">
                      <h2 class="u-text u-text-default u-text-3">EMİN ELLERDESİNİZ</h2>
                      <p class="u-text u-text-4">GÜVEİLİR 7/24 HİZMET</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="u-clearfix u-custom-color-5 u-section-3" id="sec-5ba2">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
              <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">

                  @foreach ($ilans as $ilan )
                    @php
                      $id=$ilan["id"];
                    @endphp
                    <a href="emlak/{{$id}}">
                      <div class="u-container-style u-list-item u-radius-50 u-repeater-item u-shape-round u-video-cover u-white">
                        <div class="u-container-layout u-similar-container u-container-layout-1">
                          <h3 class="u-text u-text-default u-text-1">{{$ilan["baslik"]}}</h3>
                          <div class="u-border-4 u-border-palette-3-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
                          <img src='data:@php echo $ilan["resim"]->resimID;@endphp;base64,@php echo$ilan["resim"]->resim;@endphp'width="100%"  height="250px"/>
                          {{-- {{$ilan["resim"]}} --}}
                          <p class="u-align-center u-text u-text-2">{{$ilan["adres"]}}</p>
                          <p class="u-align-center u-text u-text-3">{{$ilan["fiyat"]}}</p>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
          </section>
  </main>
@endsection