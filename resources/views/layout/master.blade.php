<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> @yield('title') </title>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-light bg-faded">
  <div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>

    <ul class="navbar-nav">
      <li class="nav-item">

         <div class="dropdown mr-1">
          <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
            User
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
            <a class="nav-link" href="{{ url('/user/create') }}">User Create</a>
            <a class="nav-link" href="{{ url('/user/') }}">User List</a>
          </div>
        </div>

      </li>
      <li class="nav-item">
        <div class="dropdown mr-1">
          <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
            Role
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
            <a class="nav-link" href="{{ url('role/create') }}">Role Create</a>
            <a class="nav-link" href="{{ url('role/') }}">Role List</a>
          </div>
        </div>

      </li>
    </ul>

  </div>
  </div>
</nav><br><br>
    
  <div class="container">
  <div class="jumbotron">
            @yield('content')
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>