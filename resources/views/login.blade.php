<!doctype html>
<html lang="en">
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
        font-size: 14px;
        font-family: inter;
        color: #D5D5D5;
    }
    button{
        margin-top: 4%;
        margin-right: 4%;
        font-style: bold;
    }

</style>
<head>
    @include("partial.header")
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
/* body {
    background: url(asset/loginbackground.png);
    background-attachment: fixed;
    background-position: center;
    background-size: 100%;
    background-position-y: 85%;

} */
</style>
<!-- ini bagian login untuk pelajar -->
<body>
<section id="loginn">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5 min-vh-100 d-flex align-items-center bagianKiri">
                <div class="login-form shadow-lg rounded border-3 border rounded-5">
                    <h1 style="color: black; font-size: 31px;">Login</h1>
                    <h2 style="color: #939393; font-size: 16px; margin-top: 8px;">Login dengan menggunakan data diri yang sesuai</h2>
        
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show fs-5" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
        
                    <form action="/login" class="form-login w-50" method="post">
                        @csrf
                        <label for="email">Email</label>
                        <input style="padding-left: 16px; border-radius: 10px" name="email" type="text" placeholder="enter your email" required>
                        <label for="password">Password</label>
                        <input style="padding-left: 16px; border-radius: 10px;" name="password" type="password" placeholder="enter your password" required>
                        <button type="submit" name="login">Login</button>
        
                    </form>
                    <p style="color: #9F9F9F; margin-top: 10px;" class="sign_up">Anda belum memiliki akun ?<span
                                style="color: #7aa60b;"><a href="/register"> Daftar</a></span></p>
                </div>
            </div>
        </div>
    </div>
</section>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
</body>

</html>