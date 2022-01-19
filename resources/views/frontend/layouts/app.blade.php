<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/ajax.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="prefetch" href="https://i.pinimg.com/originals/c6/14/83/c6148387fe378e13ceeea7cb11f1855f.gif" />
    <title>Ayaan Tech</title>
</head>
<body>
     @include('frontend.layouts.header')
     @include('frontend.layouts.slider')
     @yield('content')
     @include('frontend.layouts.footer')
    <script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/script.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/fontawesome.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}

    <script>
        AOS.init();
    </script>
    <script>
        
    </script>
    <script>
       const checkbox = document.querySelector('.my-form input[type="checkbox"]');
        const btns = document.querySelectorAll(".my-form button");

        checkbox.addEventListener("change", function() {
        const checked = this.checked;
        for (const btn of btns) {
            checked ? (btn.disabled = false) : (btn.disabled = true);
        }
        });
    </script>
</body>
</html>