
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ayaan Tech</title>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{asset('assets/backend/images/Ayaante.png')}}" alt="logo">
              </div>
              <form class="pt-3" action="{{ url('/admin')}}"  method="POST" >@csrf
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button  type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <!-- endinject -->
</body>

</html>
