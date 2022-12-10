@extends('layout.layout')
{{-- php --}}
@php
    use App\Http\Controllers\EmlakController;
    $ilan=EmlakController::ReadEmlak($id);
@endphp
@section("title")
  | {{$ilan["baslik"]}}
@endsection

@section("css")
<link rel="stylesheet" href="{{asset('assets/css/emlak.css')}}">
@endsection

@section("main")
<section
class="u-clearfix u-container-align-center u-section-1"
id="sec-2180"
>
<div class="u-clearfix u-sheet u-sheet-1">
  <div
    class="u-container-align-center u-container-style u-custom-color-4 u-expanded-width u-group u-radius-50 u-shape-round u-group-1"
  >
  <!-- slider kısmı -->
    <div class="u-container-layout u-gallery-1">
      <div
        class="u-carousel u-carousel-duration-1000 u-expanded-width u-gallery u-layout-thumbnails u-lightbox u-no-transition u-show-text-always u-gallery-1"
        id="carousel-e131"
        data-interval="5000"
        data-u-ride="carousel"
        data-pause="false"
      >
        <div class="u-carousel-inner u-gallery-inner" role="listbox">
            @php
                $i=1;
            @endphp
            @foreach ($ilan["resimler"] as $resim)
            <div
            class="@if ($i==1){{"u-active"}}@endif  u-carousel-item u-gallery-item u-shape-rectangle u-carousel-item-{{$i}}"
          >
            <div
              class="u-back-slide"
              data-image-width="1200"
              data-image-height="628"
            >
              <img
                class="u-back-image u-expanded"
                src="data:@php echo $resim['resimid'].";base64,".$resim["resimdata"];@endphp"/>
            </div>
          </div>
          @php
                $i+=1;
            @endphp
            @endforeach
        </div>
        <!-- slider butonlar -->
        <a
          class="colorr u-absolute-vcenter u-carousel-control u-carousel-control-prev u-custom-color-3 u-hover-custom-color-5 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-hover-custom-color-4 u-carousel-control-1"
          href="#carousel-e131"
          role="button"
          data-u-slide="prev"
        >
          <span aria-hidden="true">
            <svg viewBox="0 0 451.847 451.847">
              <path
                d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"
              ></path>
            </svg>
          </span>
        </a>
        <a
          class="colorr u-absolute-vcenter u-carousel-control u-carousel-control-next u-custom-color-3 u-hover-custom-color-5 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-hover-custom-color-4 u-carousel-control-2"
          href="#carousel-e131"
          role="button"
          data-u-slide="next"
        >
          <span aria-hidden="true">
            <svg viewBox="0 0 451.846 451.847">
              <path
                d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"
              ></path>
            </svg>
          </span>
        </a>
        <!-- slider altındaki küçük resimler -->
        <ol
          class="u-carousel-thumbnails u-spacing-15 u-carousel-thumbnails-1"
        >
            @php
                $i=1;
            @endphp
            @foreach ($ilan["resimler"] as $resim)
            <li
            class="@if ($i==1){{"u-active"}}@endif u-border-2 u-border-grey-75 u-carousel-thumbnail u-radius-24 u-carousel-thumbnail-{{$i}}"
            data-u-target="#carousel-e131"
            data-u-slide-to="{{$i-1}}"
          >
            <img
              class="u-carousel-thumbnail-image u-image"
              src="data:@php echo $resim['resimid'].";base64,".$resim["resimdata"];@endphp"
              width="100%"  height="250px"/>
          </li>
            @php
                $i+=1;
            @endphp
            @endforeach
          
        </ol>
      </div>
      <!-- ilan detayları -->
      <h4 class="u-align-center u-text u-text-body-color u-text-1">
        {{$ilan["baslik"]}}
      </h4>
      <div class="u-list u-list-1">
        <div class="u-repeater u-repeater-1">
          <div class="u-container-style u-list-item u-repeater-item">
            <div
              class="u-container-layout u-similar-container u-container-layout-2"
            >
              <p
                class="u-align-right u-custom-item u-text u-text-body-color u-text-2"
              >
                Satıcı :
              </p>
              <p
                class="u-align-center u-custom-item u-text u-text-body-color u-text-3"
              >
              {{$ilan["satici"]}}<br />
              </p>
            </div>
          </div>
          <div class="u-container-style u-list-item u-repeater-item">
            <div
              class="u-container-layout u-similar-container u-container-layout-2"
            >
              <p
                class="u-align-right u-custom-item u-text u-text-body-color u-text-2"
              >
                Fiyat :
              </p>
              <p
                class="u-align-center u-custom-item u-text u-text-body-color u-text-3"
              >
              {{$ilan["fiyat"]}} ₺<br />
              </p>
            </div>
          </div>
          <div class="u-container-style u-list-item u-repeater-item">
            <div
              class="u-container-layout u-similar-container u-container-layout-3"
            >
              <p
                class="u-align-right u-custom-item u-text u-text-body-color u-text-4"
              >
                Adres :
              </p>
              <p
                class="u-align-center u-custom-item u-text u-text-body-color u-text-5"
              >
                {{$ilan["adres"]}}
              </p>
            </div>
          </div>
          <div class="u-container-style u-list-item u-repeater-item">
            <div
              class="u-container-layout u-similar-container u-container-layout-4"
            >
              <p
                class="u-align-right u-custom-item u-text u-text-body-color u-text-6"
              >
                Boyut:
              </p>
              <p
                class="u-align-center u-custom-item u-text u-text-body-color u-text-7"
              >
              {{$ilan["boyut"]}} m<sup>2</sup><br />
              </p>
            </div>
          </div>
          <div class="u-container-style u-list-item u-repeater-item">
            <div
              class="u-container-layout u-similar-container u-container-layout-5"
            >
              <p
                class="u-align-right u-custom-item u-text u-text-body-color u-text-8"
              >
                Emlak tipi :
              </p>
              <p
                class="u-align-center u-custom-item u-text u-text-body-color u-text-9"
              >
              {{$ilan["emlaktip"]}}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div
        class="fr-view u-align-center u-clearfix u-rich-text u-text u-text-10"
      >
        <h1 style="text-align: center">AÇIKLAMA</h1>
        <p style="text-align: center"> {{$ilan["aciklama"]}}</p>
      </div>
    </div>
  </div>
</div>
</section>
@endsection