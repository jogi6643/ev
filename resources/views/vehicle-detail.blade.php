@extends('layout.customer')
@section('contents')
@if(count($data)>0)
@foreach($data as $key=>$d)
<?php

    $price_cal = floatval($d->price);
    $num_length = strlen((string)$price_cal);

    if($num_length>=4 && $num_length<=5)
    {
     $exshowroomprice = ($price_cal/1000)." K";
    }
    elseif($num_length>=6 && $num_length<=7) 
    {
       $exshowroomprice = ($price_cal/100000)." Lakh";
    }
    else
    {
      $exshowroomprice = ($price_cal/10000000)." Cr.";
    }

// dd(json_decode($d->image));

$image = json_decode($d->image)[0]; 

?>
<!--Vehicle Banner Slider-->
<div id="carouselExampleCaptions" class="carousel slide vehicle-detail-carousel" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    @if($d->image!='null')
        <?php 
          foreach(json_decode($d->image) as $key => $imageValue) {
        ?>
        @if($key==0)
    <div class="carousel-item active">
      <img src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" class="d-block w-100" alt="Banner 1">
      <div class="carousel-caption">
        <div  class="name">{{$d->name}}</div>
        <span class="badge bg-dark" style="line-height: 1.4;">4.3 <img src="{{asset('public/assets/img/star.png')}}" width="12"></span> (27 Reviews)
        
        <div class="price">INR {{$exshowroomprice}} <small>ExShowroom Price</small></div>
        <a href="#" class="btn btn-dark">Send Inquiry</a><br>
        <small>Don't miss the exclusive offer for this month.</small>
      </div>
    </div>
    @else
       <div class="carousel-item">
        <img class="d-block w-100" src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="Banner 1">
        <div class="carousel-caption">
        <div  class="name">{{$d->name}}</div>
        <span class="badge bg-dark" style="line-height: 1.4;">4.3 <img src="{{asset('public/assets/img/star.png')}}" width="12"></span> (27 Reviews)
        <div class="price">INR {{$exshowroomprice}} <small>ExShowroom Price</small></div>
        <a href="#" class="btn btn-dark">Send Inquiry</a><br>
        <small>Don't miss the exclusive offer for this month.</small>
      </div>
      </div>
       @endif
       <?php }?>
       @else
       <img src="{{url('public/assets/img/nocarimage.jpg')}}" class="card-img" alt="...">
       @endif
      </div>
    
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>


<!--Vehicle Banner Slider-->


<div class="container">

  <div class="row">

    <div class="col-md-9">
      <nav id="navbar-example2" class="navbar navbar-light bg-white px-3 sticky-top">
        <div class="nav nav-pills">
            <a class="nav-link active" href="#item1">Car Name</a>
            <a class="nav-link" href="#item2">Price</a>
            <a class="nav-link" href="#item3">Images</a>
          </div>
      </nav>
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
        
        <!--KEY FEATURES-->
        <h4 id="item1" class="a8 mg2">Key Features</h4>
        <p>{!!$d->description!!}</p>

        <div class="row feature-list">

          @foreach($attributValue as $key=>$attr) 
          @if($attr->attr_name=='Seating')
          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft1.png')}}">
            <div class="spec">Seating</div>
            <div class="detail">{{$attr->name}} </div>
          </div>
          @elseif($attr->attr_name=='BHP')
          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft2.png')}}">
            <div class="spec">BHP</div>
            <div class="detail">{{$attr->name}} </div>
          </div>
          @elseif($attr->attr_name=='Airbag')
          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft3.png')}}">
            <div class="spec">Airbag</div>
            <div class="detail">{{$attr->name}} </div>
          </div>
          @elseif($attr->attr_name=='Transmission')
          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft4.png')}}">
            <div class="spec">Transmission</div>
            <div class="detail">{{$attr->name}} </div>
          </div>
          @elseif($attr->attr_name=='Battery Type')
          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft4.png')}}">
            <div class="spec">Bettery</div>
            <div class="detail">{{$attr->name}} </div>
          </div>
          @elseif($attr->attr_name=='Top Speed')
          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft4.png')}}">
            <div class="spec">Speed</div>
            <div class="detail">{{$attr->name}} kmph </div>
          </div>
          @elseif($attr->attr_name=='Horse Power')
          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft4.png')}}">
            <div class="spec">Horse Power</div>
            <div class="detail">{{$attr->name}}rpm </div>
          </div>
          @endif
        @endforeach
          <!-- <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft2.png')}}">
            <div class="spec">BHP</div>
            <div class="detail">13.4</div>
          </div>

          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft3.png')}}">
            <div class="spec">Airbag</div>
            <div class="detail">3</div>
          </div>

          <div class="col-sm-4 col-md-2">
            <img src="{{asset('public/assets/img/ft4.png')}}">
            <div class="spec">Transmission</div>
            <div class="detail">Automatic</div>
          </div> -->

          <div class="col-sm-4 col-md-2"></div>
          <div class="col-sm-4 col-md-2"></div>

        </div>

        <!--KEY FEATURES END-->


        <h4 id="item2" class="a8 mg2">Price List (Variant)</h4>
        <div>
          <table class="table table-responsive table-hover table-borderless">
            <thead>
              <tr>
                <th scope="col">Variant</th>
                <th scope="col">Ex-Showrrom Price</th>
                <th scope="col"></th>
                <th scope="col">Compare</th>
              </tr>
            </thead>
            <tbody>
              @if(count($data_varient)>0)
              @foreach($data_varient as $key=>$d)
              <?php 
              $price_cal = floatval($d->price);
              $num_length = strlen((string)$price_cal);

              if($num_length>=4 && $num_length<=5)
              {
               $exshowroomprice = ($price_cal/1000)." K";
              }
              elseif($num_length>=6 && $num_length<=7) 
              {
                 $exshowroomprice = ($price_cal/100000)." Lakh";
              }
              else
              {
                $exshowroomprice = ($price_cal/10000000)." Cr.";
              }

              ?>
                <tr>
                  <td><strong>{{$d->name}}</strong><br>
                  </td>
                  <td>INR {{$exshowroomprice}}</td>
                  <td><a type="button" class="btn btn-outline-dark">Contact Dealer</a></td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                  </td>
                </tr> 
              @endforeach
              @endif
            </tbody>
          </table>
        </div>

        <h4 id="item3" class="a8 mg2">Images</h4>
        
        <div class="">

          <div class="owl-carousel owl-theme" id="vehicle-detail-img">
            @if($d->image!='null')
            <?php 
              foreach(json_decode($d->image) as $key => $imageValue) {
            ?>
            @if($key==0)
            <div class="item">
              <img src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="<?php echo $imageValue ?>">
            </div>
            @else
            <div class="item">
              <img class="d-block w-100" src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="<?php echo $imageValue ?>">
            </div>
            @endif
            <?php }?> 
            @endif
          </div>

        </div>

      </div>
    </div> 

    <div class="col-md-3"></div>

  </div>

</div>

@endforeach
@else

<div id="carouselExampleCaptions" class="carousel slide vehicle-detail-carousel" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{url('public/server/uploads/dummycar.jpg')}}" class="d-block w-100" alt="Banner 1">
      <div class="carousel-caption">
        <span style="line-height: 1.4;"><img src="{{url('public/server/uploads/dummycar.jpg')}}" width="12"></span> 
        <div class="price">No Car Found!</div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
@endif
<!--Vehicle Listing-->
<div class="container">
  <div class="row">
    <h4 class="a5">Latest EV Automobiles</h4>
    <div class="owl-carousel owl-theme">
      @if(count($data5)>0)
          @foreach($data5 as $key=>$d)
          <?php 
          $price_cal = floatval($d->price);
          $num_length = strlen((string)$price_cal);

          if($num_length>=4 && $num_length<=5)
          {
           $exshowroomprice = ($price_cal/1000)." K";
          }
          elseif($num_length>=6 && $num_length<=7) 
          {
             $exshowroomprice = ($price_cal/100000)." Lakh";
          }
          else
          {
            $exshowroomprice = ($price_cal/10000000)." Cr.";
          } 

          // dd(json_decode($d->image));

          $image = json_decode($d->image)[0]; 

          ?>
          @if($d->image!='null')
          <?php 
            foreach(json_decode($d->image) as $key => $imageValue) {
          ?>
        @if($key==0 && $d->home==3)
        <a href="{{url('vehicle-details')}}/{{base64_encode($d->id)}}" style="text-decoration: none; color:#000">
          <div class="item vehicle-slide-card" style="background-image:url({{url('public/server/uploads')}}/<?php echo $imageValue ?>);">
            <div  class="card-tint">
              <div class="content">
                <div class="name">{{$d->name}}</div>
                <div class="price">INR {{$exshowroomprice}}</div>
                <div class="note">Ex. Showroom Price</div>
              </div>
            </div>
          </div>
        </a>
        @endif
        <?php }?> 
        @else
        <div class="item vehicle-slide-card" style="background-image:url({{asset('public/assets/img/nocarimage.jpg')}});">
          <div  class="card-tint">
            <div class="content">
              <div class="name">No Data Found</div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        @endif
        
      </div>
  </div>
</div>
<!--Vehicle Listing END-->

@endsection