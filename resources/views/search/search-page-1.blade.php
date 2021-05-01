@extends('layout.customer')
@section('contents')
<div class="container" style="margin-top:30px">
@if(count($data)>0)
@foreach($data as $key=>$d)
<?php 
// dd(json_decode($d->image));

$image = json_decode($d->image)[0]; 

?>

<div class="card mb-12" style="">
  <div class="row no-gutters">

    <div class="col-md-3">
      <div id="carouselExampleControls{{$key+1}}" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

      @if($d->image!='null')
        <?php 
          foreach(json_decode($d->image) as $key => $imageValue) {
        ?>
        @if($key==0)
        <div class="carousel-item active">
        <img class="d-block w-100" src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="First slide">
       </div>
       @else
       <div class="carousel-item">
        <img class="d-block w-100" src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="Third slide">
      </div>
       @endif
       <?php }?>
       @else
       <img src="{{url('public/server/uploads/dummycar.jpg')}}" class="card-img" alt="...">
       @endif
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls{{$key+1}}" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls{{$key+1}}" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
      </div>

    </div>

    <div class="col-md-3">
      <div class="card-body">
        <h5>{{$d->name}}</h5>
        <p class="card-text">
          Product Type:{{$d->product_type}}
          <br>
          Price:{{$d->price}}
          <br>
          On Road Price:{{$d->on_roadprice}}
        </p>
      </div>
    </div>
     <div class="col-md-6">
      <div class="card-body">
        <?php 
        $count = strlen($d->description);
     
        if($count>100)
        {
          $dec = substr($d->description,0,100)."....";
          $dec1 = substr($d->description,100,100000);
        }
        
        else
        {
         $dec = substr($d->description,0,100);
          $dec1 = substr($d->description,100,100000);
        }

        ?>
        <details>
        <summary>{{$d->name}}</summary>
         <p class="card-text">
          {!!$d->description!!}   
        </p>
        </details>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<div class="card mb-12" style="">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{url('public/server/uploads/dummycar.jpg')}}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">No Car Found!</h5>
        <p class="card-text"></p>
        <p class="card-text"><small class="text-muted"></small></p>
      </div>
    </div>
  </div>
</div>
@endif
<br/>
</div>
@endsection
