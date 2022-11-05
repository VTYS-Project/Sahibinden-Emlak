<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sahibinden Emlak | @yield("title")</title>
        <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" ></script>
        @yield("css")
    </head>
    <body>
        <nav class="navbar navbar-expand-lg nav">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="/"><!--<img src="{{URL('/images/Logo.png')}}" width="120" height="70">-->BİZİM EMLAK</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end mt-3" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav_item-div_item" href="#">link</a>
                        <a class="nav_item-div_item" href="#">link</a>   
                        <a class="nav_item-div_item nav_item-div_item-2 justify-content-end" href="#">Giriş yap</a>
                        <a class="nav_item-div_item nav_item-div_item-2 "  href="#">Kayıt ol</a>
                    </div>
                </div>
            </div>
            @yield("nav")
        </nav>
        @yield("main")
        @yield("fotter")
        @yield("js")
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>