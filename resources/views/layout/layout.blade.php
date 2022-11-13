<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <title>Sahibinden Emlak @yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset("assets/css/nicepage.css")}}" media="screen" />
    <link rel="stylesheet" href="{{asset("assets/css/app.css")}}" media="screen" />
    <script src="https://kit.fontawesome.com/8c0421717c.js" crossorigin="anonymous"></script>
    <script
      class="u-script"
      type="text/javascript"
      src="{{asset("assets/js/jquery.js")}}"
      defer=""
    ></script>
    <script
      class="u-script"
      type="text/javascript"
      src="{{asset("assets/js/nicepage.js")}}"
      defer=""
    ></script>

    @yield("css")
    @yield("js")
    </head>
    <body
    class="u-body u-custom-color-5 u-overlap u-overlap-transparent u-xl-mode"
    data-lang="tr"
  >
  <header class="u-clearfix u-header u-header" id="sec-e458">
    <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
      <div
        class="menu-collapse"
        style="font-size: 1rem; letter-spacing: 0px; font-weight: 700"
      >
        <a
          class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link"
          href="#"
          style="padding: 1px 0px; font-size: calc(1em + 2px)"
        >
          <svg class="u-svg-link" viewBox="0 0 24 24">
            <use
              xmlns:xlink="http://www.w3.org/1999/xlink"
              xlink:href="#svg-e46b"
            ></use>
          </svg>
          <svg
            class="u-svg-content"
            version="1.1"
            id="svg-e46b"
            viewBox="0 0 16 16"
            x="0px"
            y="0px"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g>
              <rect y="1" width="16" height="2"></rect>
              <rect y="7" width="16" height="2"></rect>
              <rect y="13" width="16" height="2"></rect>
            </g>
          </svg>
        </a>
      </div>
      <div class="u-custom-menu u-nav-container">
        <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
          <li class="u-nav-item">
            <a
              href="#"
              class="u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-white"
              style="padding: 10px"
              >LİNK</a
            >
          </li>
          <li class="u-nav-item">
            <a
              href="#"
              class="u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-white"
              style="padding: 10px"
              >LİNK</a
            >
          </li>
          @if ($GirKulAd)
            <li class="u-nav-item">
                <a
                  class="u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-white"
                  href="/profil"
                  style="padding: 10px"
                >{{"$GirKulAd $GirKulSoyad"}}</a>
              </li>
          @else
            <li class='u-nav-item'>
            <a
              class='u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-white'
              href='/giris'
              style='padding: 10px'
              >Giriş</a
            >
          </li>
          <li class='u-nav-item'>
            <a
              class='u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-white'
              style='padding: 10px'
              href='/kayit'
              >Kayıt</a
            >
          </li>
          @endif
        </ul>
      </div>
      
    </nav>
    @if ($GirKulAd)
    <a
    href="/home/GirKulAd=<?php echo $GirKulAd ?>%GirKulSoyad=<?php echo $GirKulSoyad?>%GirKulTel=<?php echo $GirKulTel?>%GirKulMail=<?php echo $GirKulMail?>%GirKulPass=<?php echo $GirKulPass?>"
    class="u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-none u-text-black u-btn-1"
    >BİZİM EVİM<br />
    </a>
    @else
    <a
      href="/home"
      class="u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-none u-text-black u-btn-1"
      >EMLAK 365<br />
    </a>
    @endif
  </header>
    

    <!--
        ***********************************************************************************************
        ***********************************************************************************************
        ***********************************************************************************************
        ***********************************************************************************************
    -->
    @yield("main")

    <!--
        ***********************************************************************************************
        ***********************************************************************************************
        ***********************************************************************************************
        ***********************************************************************************************
    -->
    <footer
      class="u-align-center-sm u-align-center-xs u-clearfix u-custom-color-4 u-footer"
      id="sec-51eb"
    >
      <div
        class="u-clearfix u-sheet u-valign-middle-sm u-valign-middle-xl u-valign-middle-xs u-sheet-1"
      >
        <a
          href="/"
          class="u-image u-logo u-image-1"
          data-image-width="80px"
          data-image-height="40px"
        >
          <img
            src="{{URL('images/Logo.png')}}"
            class="u-logo-image u-logo-image-1"
            style="align-items: center; margin: auto"
          />
        </a>
          <div style="align-items: center; margin: auto ; display: flex; height:80px;width:80%">
            <div style="align-items: center; margin: auto ; display: flex; height:100%;width:40%">
              <div style="width:100%">grup</div>
              <div style="width:100%">likler</div>
            </div>
            <div style="align-items: center; margin: auto ; display: flex; height:100%;width:40%">
              <div>grup</div>
              <div>linkler</div>
            </div>
          </div>
        <div class="socal_div">
          <a href="/" class="social_icons"><i class="social fa-brands fa-facebook fa-2xl"></i></a>
          <a href="/" class="social_icons"><i class="social fa-brands fa-square-instagram fa-2xl"></i></a>
          <a href="/" class="social_icons"><i class="social fa-brands fa-twitter fa-2xl"></i></a>
        </div>
      </div>
    </footer>
    
    <!--
        ***********************************************************************************************
        ***********************************************************************************************
        ***********************************************************************************************
        ***********************************************************************************************
    -->
        @yield("ex-js")
    <!--
        ***********************************************************************************************
        ***********************************************************************************************
        ***********************************************************************************************
        ***********************************************************************************************
    -->

  </body>
</html>
