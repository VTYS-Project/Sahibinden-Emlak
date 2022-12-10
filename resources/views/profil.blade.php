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
<link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">

@endsection
<!--    css end  -->

@section("main")
<section
      class="profile-div u-clearfix u-custom-color-5 u-section-1"
      id="profile-main-div"
    >
      <h2 class="u-align-center u-text u-text-1">{{$_SESSION["kullaniciadi"]." ".$_SESSION["kullanicisoyadi"]}}</h2>
      <div
        class="u-border-3 u-border-black u-line u-line-horizontal u-line-1"
      ></div>

      <!-- isim end -->
      <a
        href="profil-bilgileri"
        class="u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-none u-text-active-custom-color-2 u-text-hover-grey-30 u-text-white u-btn-1"
        ><span class="u-icon u-icon-1"
          ><svg
            class="u-svg-content"
            viewBox="0 0 55 55"
            x="0px"
            y="0px"
            style="width: 1em; height: 1em"
          >
            <path
              d="M55,27.5C55,12.337,42.663,0,27.5,0S0,12.337,0,27.5c0,8.009,3.444,15.228,8.926,20.258l-0.026,0.023l0.892,0.752
	c0.058,0.049,0.121,0.089,0.179,0.137c0.474,0.393,0.965,0.766,1.465,1.127c0.162,0.117,0.324,0.234,0.489,0.348
	c0.534,0.368,1.082,0.717,1.642,1.048c0.122,0.072,0.245,0.142,0.368,0.212c0.613,0.349,1.239,0.678,1.88,0.98
	c0.047,0.022,0.095,0.042,0.142,0.064c2.089,0.971,4.319,1.684,6.651,2.105c0.061,0.011,0.122,0.022,0.184,0.033
	c0.724,0.125,1.456,0.225,2.197,0.292c0.09,0.008,0.18,0.013,0.271,0.021C25.998,54.961,26.744,55,27.5,55
	c0.749,0,1.488-0.039,2.222-0.098c0.093-0.008,0.186-0.013,0.279-0.021c0.735-0.067,1.461-0.164,2.178-0.287
	c0.062-0.011,0.125-0.022,0.187-0.034c2.297-0.412,4.495-1.109,6.557-2.055c0.076-0.035,0.153-0.068,0.229-0.104
	c0.617-0.29,1.22-0.603,1.811-0.936c0.147-0.083,0.293-0.167,0.439-0.253c0.538-0.317,1.067-0.648,1.581-1
	c0.185-0.126,0.366-0.259,0.549-0.391c0.439-0.316,0.87-0.642,1.289-0.983c0.093-0.075,0.193-0.14,0.284-0.217l0.915-0.764
	l-0.027-0.023C51.523,42.802,55,35.55,55,27.5z M2,27.5C2,13.439,13.439,2,27.5,2S53,13.439,53,27.5
	c0,7.577-3.325,14.389-8.589,19.063c-0.294-0.203-0.59-0.385-0.893-0.537l-8.467-4.233c-0.76-0.38-1.232-1.144-1.232-1.993v-2.957
	c0.196-0.242,0.403-0.516,0.617-0.817c1.096-1.548,1.975-3.27,2.616-5.123c1.267-0.602,2.085-1.864,2.085-3.289v-3.545
	c0-0.867-0.318-1.708-0.887-2.369v-4.667c0.052-0.519,0.236-3.448-1.883-5.864C34.524,9.065,31.541,8,27.5,8
	s-7.024,1.065-8.867,3.168c-2.119,2.416-1.935,5.345-1.883,5.864v4.667c-0.568,0.661-0.887,1.502-0.887,2.369v3.545
	c0,1.101,0.494,2.128,1.34,2.821c0.81,3.173,2.477,5.575,3.093,6.389v2.894c0,0.816-0.445,1.566-1.162,1.958l-7.907,4.313
	c-0.252,0.137-0.502,0.297-0.752,0.476C5.276,41.792,2,35.022,2,27.5z M42.459,48.132c-0.35,0.254-0.706,0.5-1.067,0.735
	c-0.166,0.108-0.331,0.216-0.5,0.321c-0.472,0.292-0.952,0.57-1.442,0.83c-0.108,0.057-0.217,0.111-0.326,0.167
	c-1.126,0.577-2.291,1.073-3.488,1.476c-0.042,0.014-0.084,0.029-0.127,0.043c-0.627,0.208-1.262,0.393-1.904,0.552
	c-0.002,0-0.004,0.001-0.006,0.001c-0.648,0.16-1.304,0.293-1.964,0.402c-0.018,0.003-0.036,0.007-0.054,0.01
	c-0.621,0.101-1.247,0.174-1.875,0.229c-0.111,0.01-0.222,0.017-0.334,0.025C28.751,52.97,28.127,53,27.5,53
	c-0.634,0-1.266-0.031-1.895-0.078c-0.109-0.008-0.218-0.015-0.326-0.025c-0.634-0.056-1.265-0.131-1.89-0.233
	c-0.028-0.005-0.056-0.01-0.084-0.015c-1.322-0.221-2.623-0.546-3.89-0.971c-0.039-0.013-0.079-0.027-0.118-0.04
	c-0.629-0.214-1.251-0.451-1.862-0.713c-0.004-0.002-0.009-0.004-0.013-0.006c-0.578-0.249-1.145-0.525-1.705-0.816
	c-0.073-0.038-0.147-0.074-0.219-0.113c-0.511-0.273-1.011-0.568-1.504-0.876c-0.146-0.092-0.291-0.185-0.435-0.279
	c-0.454-0.297-0.902-0.606-1.338-0.933c-0.045-0.034-0.088-0.07-0.133-0.104c0.032-0.018,0.064-0.036,0.096-0.054l7.907-4.313
	c1.36-0.742,2.205-2.165,2.205-3.714l-0.001-3.602l-0.23-0.278c-0.022-0.025-2.184-2.655-3.001-6.216l-0.091-0.396l-0.341-0.221
	c-0.481-0.311-0.769-0.831-0.769-1.392v-3.545c0-0.465,0.197-0.898,0.557-1.223l0.33-0.298v-5.57l-0.009-0.131
	c-0.003-0.024-0.298-2.429,1.396-4.36C21.583,10.837,24.061,10,27.5,10c3.426,0,5.896,0.83,7.346,2.466
	c1.692,1.911,1.415,4.361,1.413,4.381l-0.009,5.701l0.33,0.298c0.359,0.324,0.557,0.758,0.557,1.223v3.545
	c0,0.713-0.485,1.36-1.181,1.575l-0.497,0.153l-0.16,0.495c-0.59,1.833-1.43,3.526-2.496,5.032c-0.262,0.37-0.517,0.698-0.736,0.949
	l-0.248,0.283V39.8c0,1.612,0.896,3.062,2.338,3.782l8.467,4.233c0.054,0.027,0.107,0.055,0.16,0.083
	C42.677,47.979,42.567,48.054,42.459,48.132z"
            ></path></svg
          ><img /></span
        >&nbsp;Profil işlemleri
      </a>
      <!-- profi işlemleri end -->
      <a
        href="emlak-operation"
        class="u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-none u-text-active-custom-color-2 u-text-hover-grey-30 u-text-white u-btn-2"
        ><span class="u-file-icon u-icon u-text-white u-icon-2"
          ><img src="{{URL("images/house_icon.png")}}" alt="" /></span
        >&nbsp;Emlak işlemleri
      </a>
      <!-- emlak işlemleri end -->
      <div
        class="u-border-3 u-border-black u-line u-line-horizontal u-line-2"
      ></div>
      <div class="my-emlaks u-layout-horizontal u-list u-list-1">
        <div class="u-repeater u-repeater-1">
          <!-- kayar emlak liste start -->
         <!-- kayar emlak 1 start -->
         @php
             $i=1;
         @endphp
         @foreach ($ilans as $ilan )
                    @php
                      $id=$ilan["id"];
                    @endphp
                    <a href="emlak/{{$id}}">
                        <div
                        class="u-container-style u-custom-color-4 u-list-item u-opacity u-opacity-85 u-radius-50 u-repeater-item u-shape-round u-list-item-{{$i}}"
                    > 
                        <div
                            class="u-container-layout u-similar-container u-container-layout"
                        >
                        <img src='data:@php echo $ilan["resimid"];@endphp;base64,@php echo $ilan["resimdata"];@endphp'width="100%"  height="250px"/>
                        {{-- @php echo $ilan["resim"];@endphp --}}
                            {{-- <img
                                alt=""
                                class="u-expanded-width u-image u-image-round u-radius-25 u-image-1"
                                data-image-width="1200"
                                data-image-height="628"
                                src="images/Home_page_1.jpg"
                            /> --}}
                            <h3 class="u-text u-text-default u-text-2">{{$ilan["baslik"]}}</h3>
                            <p class="u-align-center u-text u-text-2">{{$ilan["adres"]}}</p>
                            <p class="u-align-center u-text u-text-3">{{$ilan["fiyat"]}} ₺</p>
                        </div>
                    </div>
                    </a>
                    @php
                    $i+=1;
                    @endphp
                  @endforeach
          <!-- kayar emlak 1 end -->
        </div>
        <a
          class="u-absolute-vcenter u-custom-color-6 u-gallery-nav u-gallery-nav-prev u-hover-custom-color-2 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-custom-color-5 u-text-hover-custom-color-6 u-gallery-nav-1"
          href="#"
          role="button"
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
          <span class="sr-only">
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
          class="u-absolute-vcenter u-custom-color-6 u-gallery-nav u-gallery-nav-next u-hover-custom-color-2 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-custom-color-5 u-text-hover-custom-color-6 u-gallery-nav-2"
          href="#"
          role="button"
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
          <span class="sr-only">
            <svg viewBox="0 0 451.846 451.847">
              <path
                d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"
              ></path>
            </svg>
          </span>
        </a>
      </div>
    </section>
@endsection