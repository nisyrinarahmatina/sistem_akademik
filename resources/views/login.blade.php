<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<style>
    .main {
    height: 100vh;
    display: flex;
    box-sizing: border-box;
    align-items: center;
    padding: 20px; /* Ensures padding on smaller screens */
    justify-content: center;
    }
    .login-container {
    max-width: 600px; /* Prevents it from being too wide on large screens */
    width: 100%;
    }
    .login-box {
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .bg-custom-color {
    background-color:rgb(51, 173, 255) !important; /* Change to any color (e.g., orange) */
    }
    .btn-custom-color {
        background-color:rgb(51, 173, 255) !important;
        border-color:rgb(51, 173, 255) !important;
    }

    .btn-custom-color:hover {
        background-color:rgb(28, 93, 214) !important; /* Darker shade for hover effect */
        border-color:rgb(28, 93, 214) !important;
    }
    .rounded-left {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .rounded-right {
        border-top-right-radius: 10px;
         border-bottom-right-radius: 10px;
    }
    @media (max-width: 768px) {
        .rounded-left, .rounded-right {
            border-radius: 10px !important;
        }
    }


</style>
<body>
    <div class="main">
        <div class="login-container">
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error')}}
                </div>
            @endif
            <div class="row shadow-lg rounded bg-white overflow-hidden">
                <div class="col-md-5 text-center bg-custom-color text-white p-4 rounded left">
                    <img src="" alt="" class="img-fluid mb-3" style="max-width: 80px;">
                    <h4>Sistem Akademik</h4>
                    <p>Sistem Akademik dan Presensi <br> SMA 4 SEMARANG</p>
                </div>
                <div class=" col-lg-7 col-md-12 p-4 rounded-right login-box">
                    <h5 class="fw-bold">Login</h5>
                    <p class="text-muted">Sistem Akademik</p>
                    <form action="{{ route('authenticating') }}" method="post">
                        @csrf 
                        <div class="form-group mt-3">
                            <label for="inputUsername">Username</label>
                            <input type="username" name="username" id="inputUsername" placeholder="Masukkan NIS Anda" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="inputPassword">Password</label>
                            <input type="password" name="password" id="inputPassword" placeholder="Masukkan Password Anda" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-custom-color text-white">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>