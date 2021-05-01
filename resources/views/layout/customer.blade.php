<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="<p>Description</p>" />
    <meta name="keyword" content="Car, Two Wheeler" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/cover.css')}}" rel="stylesheet">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{asset('public/assets/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/owlcarousel/assets/owl.theme.default.min.css')}}">
    <!-- javascript -->
    <script src="{{asset('public/assets/vendors/jquery.min.js')}}"></script>
    <script src="{{asset('public/assets/owlcarousel/owl.carousel.js')}}"></script>
    
    <title>EV Bazaar | Under Development</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light banner-nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{url('compare-cars')}}">Compare</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
@yield('contents')


<!---FOOTER-->
<div class="footer" style="background-image:url({{asset('public/assets/img/footer.png')}});">
  <div class="container">
    <div class="row">
      <h2 class="a2">More about EV Bazaar</h2>
      <p class="a3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
      </p>
    </div>
    <div class="footer-break"></div>
    <div class="row">
      <div class="col-sm-4 col-md-3">
        <ul class="list-unstyled">
          <li class="a7">Overview</li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms & Condition</a></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-3">
        <ul class="list-unstyled">
          <li class="a7">Others</li>
          <li><a href="#">Advertise with us</a></li>
          <li><a href="#">Career</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
        
      </div>
      <div class="col-sm-4 col-md-3">
        <ul class="list-unstyled">
          <li class="a7">Connect  with us</li>
          <li><a href="#">About Us</a></li>
          <li><a href="mailto:hello@studiokrew.com">hello@studiokrew.com</a></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-3"></div>
    </div>
    <div class="text-center text-light">&copy; EV Bazaar 2020. All Rights Reserved.</div>
  </div>
</div>
<!---FOOTER END-->
     <script>
            $(document).ready(function() {
              $('#vehicle-detail-img').owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                dots: false,
                lazyLoad:true,
                loop:true,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 3
                  }
                }
              })
            })
          </script>

          <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                lazyLoad:true,
                loop:true,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 3
                  }
                }
              })
            })
          </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- vendors -->
    <script src="{{asset('public/assets/vendors/highlight.js')}}"></script>
    <script src="{{asset('public/assets/js/app.js')}}"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
     -->
     
  </body>
</html>