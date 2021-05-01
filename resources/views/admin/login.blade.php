<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{url('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <style type="text/css">
    
      .invalid-field{
        color:red;
        font-size: small;
      }

  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image1"></div>

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome to admin login</h1>

                     @if(Session::has('msg'))
                        <div class="alert alert-danger">
                          {!! Session::get('msg') !!}
                        </div>
                    @endif

                  </div>

                  <form class="user" action="{{ url('/admin/login') }}" method="post">

                    @csrf

                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('email') }}" >

                       @if ($errors->has('email'))
                            <span class="invalid-field" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">

                       @if ($errors->has('password'))
                          <span class="invalid-field" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>


                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                    
                  </form><br>
            
                  <div class="text-center">
                    <a class="small" href="#">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="#">Create an Account!</a>
                    <?php

                      //echo bcrypt('india');

                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <script src="{{url('public/admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('public/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('public/admin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>



