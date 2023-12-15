<!DOCTYPE html>
<html lang="en">
@include('partial.header')
<style>
    body{
        background-color: #2B2B2B
    }
    .jumbotron{
        padding-top: 5%;
    }
    h1{
        font-size: 80px;
        font-family: inter;
        font-weight: 600;
    }
    p{
        font-size: 16px;
        font-family: inter;
        color: #D5D5D5;
    }
    button{
        margin-top: 4%;
        margin-right: 4%;
        font-style: bold;
    }
    #hide{
        display: none !important;
    }
    .fitur{
        padding-top: 5%;
    }
    .manfaat{
        padding-top: 5%
    }
    .dikanan{
        top: 2700px;
    }
    .garis{
        height: 61px;
        width: 2px;
        background-color: #EBFF00;
        margin-left: 35px;
        position: absolute;
        margin-top: -45px;
    }
    .garis2{
        height: 72px;
        width: 2px;
        background-color: #EBFF00;
        margin-left: 35px;
        position: absolute;
        margin-top: -45px;
    }
</style>
<!-- ini bagian landing page -->
<body>
    <div class="app">
        @include('partial.navbar')
        <section class="jumbotron" >
            <div class="container d-flex align-content-center justify-content-between align-items-center"> 
                <div class="col-5">
                    <div class="row align-items-center home">
                    <div class="col w-100">
                        <h1 class="fw-bold">FloralRent</h1>
                        <p>Membantu setiap orang atau organisasi untuk <br> 
                            memberikan ucapan selamat maupun ucapan <br> 
                            belasungkawa untuk orang terdekat. <br> 
                            Dalam aplikasi ini, mereka dapat melakukan <br>
                            pemesanan karangan bunga dengan lebih mudah <br>
                            dan lebih cepat</p>
                        <a id="{{ auth()->check() ? 'hide' : ''}}" type="button" class="btn btn-warning" href="/register"
                            style="--bs-btn-padding-y: 10px; --bs-btn-padding-x: 20px; --bs-btn-font-size: 16px; margin-top:10px;margin-right:15px">
                            <b>Register Now</b>
                        </a>
                    </div>
                    </div>
                </div>
                <div>
                <img class="position-absolute bottom-0 end-0" style=" width: 400px" src="../../../asset/titik1.png" alt="">
                <img class="position-absolute top-0 start-50 translate-middleç-x" style=" width: 400px" src="../../../asset/titik.svg" alt="">
                <img class="position-absolute top-100 ml-5 start-0 translate-middle-y" style=" width: 100px" src="../../../asset/Frame 1063.png" alt="">
                </div>
                <div class="col-6">
                </div>
            </section>
            <br>
        </br>
    
    @include('partial.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>