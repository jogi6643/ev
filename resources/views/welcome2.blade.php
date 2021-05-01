@extends('layout.customer')
@section('contents')

<div class="container image"   style="margin-top:30px">
  <div class="row">
    <div class="col-sm-8">
        <h2>Search Ev types</h2>
        <div class="btn-group btn-group-lg">
        <button type="button" style="background-color: #212529" class="btn btn-danger" id="1_selecttype" onclick="selecttype('1')">4 Wheeler</button>
        <button type="button" style="background-color: #212529" class="btn btn-danger" id="2_selecttype" onclick="selecttype('2')">2 Wheeler</button>
        <button type="button" style="background-color: #212529" class="btn btn-danger" id="3_selecttype" onclick="selecttype('3')">E-Riksha</button>
        <button type="button" style="background-color: #212529" class="btn btn-danger" id="4_selecttype" onclick="selecttype('4')">Commercial</button>
        </div>
        <br>
        <br>
        <form method="post" action="{{url('msearchresult')}}">
           {{ csrf_field() }}
        
        <div hidden="">
        <input class="form-control" name="producttype" type="text" id="selecttype1"  placeholder="select type id" aria-label="Search">
        <input class="form-control" name="producttype1" type="text" id="selecttypesearch1"  placeholder="select type id" aria-label="Search">
        </div>
         <div class="btn-group btn-group-lg">
        <button type="button" style="background-color: #212529" class="btn btn-danger" id="1_selecttypesearch" onclick="selecttypesearch('1')">Name</button>
        <button type="button" style="background-color: #212529" class="btn btn-danger" id="2_selecttypesearch" onclick="selecttypesearch('2')">Requirements</button>
        </div>
        <br>
        <br>

        <div class="row">
        <div class="col-sm-6">
        <input class="form-control"  style="display: none;" name="name" type="text" id="name"  placeholder="Manufacturer ,Product Name,Segment" aria-label="Search">

        <input class="form-control" style="display: none;"  name="requirements" type="text" id="requirements"  placeholder="Purpose,Motor,Battery,Horse Power
        " aria-label="Search">
        <div id="searchlistnameandreq" style="background-color:#fff;margin-top:2px;margin-left:1px;z-index: 1; width: 200px;"></div>

        <button  class="btn btn-outline-danger" style="margin-top:-71px;margin-left: 365px;display: none;" type="submit" id="submitbtn">Search</button>
        </div>


        </div>
       </form>

      
      <hr class="d-sm-none">
    </div>

    <div  class="col-sm-4">
      <h2>Cars</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg1">Fake Image</div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{url('public/images/car-1300629_640.png')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('public/images/car-5725332_640.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('public/images/buildings-1851246_640.jpg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <br>
      <h2>Cars</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg">
      <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{url('public/images/car-158202_640.png')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('public/images/ford-mustang-155132_640.png')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('public/images/old-car-1146597_640.png')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      </div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>

</div>
<script>
  function selecttype(id) {
switch (id) {
  case '1':
     $('#'+id+'_selecttype').css("background-color", "rgb(20 21 21)");
     $('#'+id+'_selecttype').css("color", "red"); 
     $('#2_selecttype').css("background-color", "#212529");
     $('#3_selecttype').css("background-color", "#212529"); 
     $('#4_selecttype').css("background-color", "#212529");
     $('#2_selecttype').css("color", "white");
     $('#3_selecttype').css("color", "white"); 
     $('#4_selecttype').css("color", "white");
     $('#selecttype1').val(id);
      
    break;
  case '2':
     $('#'+id+'_selecttype').css("background-color", "rgb(20 21 21)");
     $('#'+id+'_selecttype').css("color", "red");
     $('#1_selecttype').css("background-color", "#212529");
     $('#3_selecttype').css("background-color", "#212529"); 
     $('#4_selecttype').css("background-color", "#212529");

     $('#1_selecttype').css("color", "white");
     $('#3_selecttype').css("color", "white"); 
     $('#4_selecttype').css("color", "white"); 
     $('#selecttype1').val(id); 
    break;
  case '3':
    $('#'+id+'_selecttype').css("background-color", "rgb(20 21 21)");
    $('#'+id+'_selecttype').css("color", "red");

     $('#1_selecttype').css("background-color", "#212529");
     $('#2_selecttype').css("background-color", "#212529"); 
     $('#4_selecttype').css("background-color", "#212529");

     $('#1_selecttype').css("color", "white");
     $('#2_selecttype').css("color", "white"); 
     $('#4_selecttype').css("color", "white"); 
     $('#selecttype1').val(id);
    break;
  case '4':
    $('#'+id+'_selecttype').css("background-color", "rgb(20 21 21)");
    $('#'+id+'_selecttype').css("color", "red");

    $('#1_selecttype').css("background-color", "#212529");
    $('#3_selecttype').css("background-color", "#212529"); 
    $('#2_selecttype').css("background-color", "#212529");

    
    $('#1_selecttype').css("color", "white");
    $('#3_selecttype').css("color", "white"); 
    $('#2_selecttype').css("color", "white");
    $('#selecttype1').val(id); 
    break;
}
    
  }



   // SelectTypeSearch

function selecttypesearch(id) {
 var selecttype1 =  $('#selecttype1').val();
if(selecttype1!="")
{
 
switch (id) {
  case '1':
     $('#'+id+'_selecttypesearch').css("background-color", "rgb(20 21 21)");
     $('#'+id+'_selecttypesearch').css("color", "red"); 
     $('#2_selecttypesearch').css("background-color", "#212529");
     $('#2_selecttypesearch').css("color", "white");
     $('#selecttypesearch1').val(id); 
     $('#name').show(); 
     $('#requirements').val(""); 
     $('#requirements').hide(); 
     $('#submitbtn').show();
    break;
  case '2':
     $('#'+id+'_selecttypesearch').css("background-color", "rgb(20 21 21)");
     $('#'+id+'_selecttypesearch').css("color", "red");
     $('#1_selecttypesearch').css("background-color", "#212529");
     $('#1_selecttypesearch').css("color", "white");
     $('#selecttypesearch1').val(id); 
     $('#name').hide(); 
     $('#name').val(""); 
     $('#requirements').show();
     $('#submitbtn').show();
    break;
}
}else
{
 alert('Select EV Type First..');
}
    
}


</script>
@endsection
