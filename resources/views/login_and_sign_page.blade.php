<!DOCTYPE html>
<html style="font-size: 16px" lang="tr">
  <head>
    <meta charset="utf-8" />
    <title>Sahibinden Emlak | Giriş</title>
    <link rel="stylesheet" href="{{asset("assets/css/nicepage.css")}}" media="screen" />
    <link rel="stylesheet" href="{{asset("assets/css/login.css")}}" media="screen" />
    <script class="u-script" type="text/javascript" src="{{asset("assets/js/jquery.js")}}"></script>
    <script class="u-script" type="text/javascript" src="{{asset("assets/js/nicepage.js")}}"></script>

    <meta name="theme-color" content="#478ac9" />
    <meta property="og:title" content="Giriş" />
    <meta property="og:type" content="website" />
  </head>
  <body class="u-body u-xl-mode" data-lang="tr">
    <section
      class="u-clearfix u-custom-color-5 u-valign-middle u-section-1"
      id="sec-4cad"
    >
      <div
        class="u-container-style u-grey-10 u-group u-radius-50 u-shape-round u-group-1"
      >
        <div class="u-container-layout u-container-layout-1">
          <div class="u-custom-color-4 u-form u-form-1 sign_div">
            <form action="/giris-kayit/kayit" method="get" class="sign_form">
              <input
                  type="text"
                  name="sign_ad"
                  placeholder="Adınızı girin"
                  class="sign_form_ad sign_form_item"
              />
              <input
                  type="text"
                  name="sign_soyad"
                  placeholder="Soy adınızı girin"
                  class="sign_form_soyad sign_form_item"
              />
              <input
                  type="email"
                  name="sign_email"
                  placeholder="Geçerli bir e-posta adresi girin"
                  class="sign_form_mail sign_form_item"
              />
              <input
                  type="tel"
                  pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                  name="sign_phone"
                  placeholder="Telefonunuzu girin (örn. 5xx xxx xx xx)"
                  class="sign_form_tel sign_form_item"
              />
              <input
                  type="text"
                  name="sign_sifre"
                  placeholder="Şifre"
                  class="sign_form_sifre sign_form_item"
              />

              <button type="submit" class="sign_form_gonder sign_form_item">
                  KAYIT OL
              </button>
            </form> 
            <br>
          </div>
          <div class=" u-form u-form-2">
            <form action="/giris-kayit/giris" method="get" class="sign_form">
            @csrf
            <input
              type="email"
              name="login_email"
              placeholder="Geçerli bir e-posta adresi girin"
              class="sign_form_mail sign_form_item"
            />
            <input
            type="password"
            name="login_sifre"
            placeholder="Şifre"
            class="sign_form_sifre sign_form_item"
            />
        <button type="submit" class="sign_form_gonder sign_form_item">
            Giris yap
        </button>
            </form>
            
          </div>
          <div
            class="u-container-style u-group u-image u-image-1 degis_resim"
            id="hareket_resim"
          >
            <div class="u-container-layout u-container-layout-2">
              <input
                type="button"
                onclick="degis()"
                id="degis_button"
                name="kayıt"
                class="u-active-grey-70 u-border-none u-btn u-btn-round u-button-style u-custom-color-6 u-hover-custom-color-2 u-radius-50 u-btn-3"
                value="KAYIT OL"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="{{asset("assets/js/giris.js")}}"></script>
  </body>
</html>
