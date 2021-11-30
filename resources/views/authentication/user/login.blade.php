<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>MyCraftsy</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 bg-primary-color min-vh-100 p-3">
                <div class="text-center mt-4">
                    <img src="{{ asset('image/login_logo.png') }}" class="login-logo" alt="logo">
                </div>
                <p class="mt-5 caption-login">Orang mungkin berpikir bahwa uang dari hasil penemuan merupakan penghargaan terhadap seseorang yang mencintai pekerjaannya. Tapi aku terus menemukan kenikmatan terbesarku, dan begitu juga hadiahku, pada sebuah karya yang mengawali sesuatu yang dunia sebut sebagai kesuksesan. - Thomas Alva Edison</p>
            </div>
            <div class="col-md-7 min-vh-100 p-4">
                <div class="form">
                    <p class="title mb-5">Masuk ke dalam <i>MyCraftsy</i></p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                          <label for="email">Alamat Email</label>
                          <input type="email" name="email" id="email" class="form-control rounded-pill" placeholder="">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="">Password</label>
                                <a href="" class="text-decoration-none">Lupa Password?</a>
                            </div>
                          <input type="password" name="password" id="password" class="form-control rounded-pill" placeholder="">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="button-login rounded-pill mt-4">Masuk</button>
                        </div>
                    </form>
                    <div class="separator my-5">Atau</div>
                    <a href="{{ route('login.google') }}" class="btn-login-google w-100 rounded-pill text-decoration-none">
                        <img src="{{ asset('image/google.svg') }}" alt="">
                        <p class="d-inline text-button">Masuk dengan Google</p>
                    </a>
                </div>
                <p class="text-center mt-3">Belum memiliki akun? <a href="{{ route('register') }}">daftar</a></p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
    </script>
    @yield('script')
</body>

</html>
