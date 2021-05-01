<div class="row">
	<div id="response"><img src="{{asset('public/assets/img/preloader.gif')}}"></div>
@if(!empty($data))
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
		@if($d->image!='null')
        <?php 
          foreach(json_decode($d->image) as $key => $imageValue) {
        ?>
        @if($key==0)
        <div class="col-sm-12 col-md-6">
	        <a href="{{url('vehicle-details')}}/{{base64_encode($d->id)}}" style="text-decoration: none; color:#000">
	          <div class="vehicle-search-card" style="background-image:url({{url('public/server/uploads')}}/<?php echo $imageValue ?>);">
	            <div  class="card-tint">
	              <div class="content">
	                <div class="name">{{$d->name}}</div>
	                <div class="price">INR {{$exshowroomprice}}</div>
	                <div class="note">Ex. Showroom Price</div>
	              </div>
	            </div>
	          </div>
	        </a>
        </div>
       
        @endif
       <?php }?>
       @else
       <img src="{{url('public/assets/img/nocarimage.jpg')}}" class="card-img" alt="...">
       @endif
		@endforeach
		@else
		<div class="card mb-12" style="">
		  <div class="row no-gutters">
		    <div class="col-md-12">
		      <img src="{{url('public/assets/img/nocarimage.jpg')}}" class="card-img" alt="...">
		    </div>
		    </div>
		  </div>
		</div>
@endif
</div>