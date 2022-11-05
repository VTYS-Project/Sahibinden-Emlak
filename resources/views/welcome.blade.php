@extends("layout.layout")
<!--    title   -->
@section("title")
HOME
@endsection
<!--    title end  -->

<!--    css   -->
@section("css")
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<style>
    .section
    {
        position: absolute;
        width: 80%;
        height: 150px;
        left: 10%;
        top: 100%;

background: #FFFFFF;
border-radius: 50px;
    }
</style>
@endsection
<!--    css end  -->

@section("main")
    <section class="top_section">
        <div class="main_div">
            <img class="back_image" src="{{URL('images/Home_page_1.jpg')}}">
            <div class="banner"></div>
            <br><br><br>
            <h1 class="nav_H1">
                SİZE EV SATACAĞIZ
            </h1>
            <p class="nav_p">Doğru tercih her zaman karlıdır</p>
        </div>
        <div>
            <form action="#" method="get" >
            <input type="search" name="" id="" class="search">
        </form>
        </div>
    </section>

    <section class="section">
        <div >hazırlanıyor . . .</div>
        
    </section>
    
    
@endsection