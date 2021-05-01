<!DOCTYPE html>
<html lang="en">

<head>
  <title>EV</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{url('public/css/open.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-light bg-light" style="background-color: #adb5b1!important">
    <a href="{{url('')}}" class="navbar-brand">Home</a>
    <form method="post" action="{{url('searchresult')}}">
      {{ csrf_field() }}
      <!-- style="position: relative;z-index: 20;" -->
      <!-- style="display:none;background-color:#fff;margin-bottom:-153px;margin-left:-200px;z-index: 35; width: 200px;border: 1px solid #adb5b1;position: relative;" -->
      <div class="form-inline">
        <input type="text" name="searchtext" id="livesearchdata" class="form-control" placeholder="Search" />
        <div id="searchlist"></div>
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
      </div>

    </form>

    @if (Route::has('login'))
    <div class="form-inline">
      @auth
      <a class="btn btn-outline-danger my-2 my-sm-0" href="{{ url('/home') }}">Home</a>
      @else
      <a class="btn btn-outline-danger my-2 my-sm-0" href="{{ route('login') }}">Login</a>
      <a class="btn btn-outline-danger my-2 my-sm-0" href="{{ route('register') }}">Register</a>
      @endauth
    </div>
    @endif
  </nav>

  <nav class="navbar navbar-light bg-light" style="background-color: #4f5d56!important">
    <a href="{{url('compare-cars')}}" class="navbar-brand">compare Car</a>
  </nav>


  @yield('contents')


  <div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
  </div>

</body>

</html>

<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });


  // Live Data

  // $(document).ready(function(){
  $('#livesearchdata').keyup(function () {

    var query = $(this).val();
    if (query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{url('livesearchdata')}}",
        method: "POST",
        data: { query: query, _token: _token },
        success: function (data) { //alert(data);
          console.log(data);
          $('#searchlist').fadeIn();
          $('#searchlist').html(data);
        }

      })
    }
  });

  //End of livesearchdata list

  //Search product By Name
  $('#name').keyup(function () {
    var selecttype1 = $('#selecttype1').val();
    if (selecttype1 == 1) {
      ev = '4 Wheeler';
    }
    else if (selecttype1 == 2) {
      ev = '2 Wheeler';
    }
    else if (selecttype1 == 3) {
      ev = 'Commercial';
    }
    else {
      ev = 'E-Riksha';
    }

    var selecttype2 = $('#selecttypesearch1').val();
    if (selecttype2 == 1) {
      ev1 = 'name';
    }
    else {
      ev1 = 'requirements';
    }

    var query = $(this).val();

    if (query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{url('livesearchnamedata')}}",
        method: "POST",
        data: { query: query, ev: ev, ev1: ev1, _token: _token },
        success: function (data) { //alert(data);
          console.log(data);
          $('#searchlistnameandreq').fadeIn();
          $('#searchlistnameandreq').html(data);
        }

      })
    }
  });
  // End Product by Name

  //Search product By Name
  $('#requirements').keyup(function () {
    var selecttype1 = $('#selecttype1').val();
    if (selecttype1 == 1) {
      ev = '4 Wheeler';
    }
    else if (selecttype1 == 2) {
      ev = '2 Wheeler';
    }
    else if (selecttype1 == 3) {
      ev = 'Commercial';
    }
    else {
      ev = 'E-Riksha';
    }
    var selecttype2 = $('#selecttypesearch1').val();
    if (selecttype2 == 1) {
      ev1 = 'name';
    }
    else {
      ev1 = 'requirements';
    }
    // alert(ev+"...................."+ev1);
    var query = $(this).val();
    if (query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{url('livesearchrequirementsdata')}}",
        method: "POST",
        data: { query: query, ev: ev, ev1: ev1, _token: _token },
        success: function (data) { //alert(data);
          console.log(data);
          $('#searchlistnameandreq').fadeIn();
          $('#searchlistnameandreq').html(data);
        }

      })
    }
  });
 // End Product by Name
</script>