@extends('layout.customer')
@section('contents')
<!--Right car full search Banner-->
<div class="search-banner1" style="background-image:url({{asset('public/assets/img/Find-Car.png')}});">
  <div class="banner-tint">
    <div  class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <h2 class="a1 text-center mg1">Find the right car</h2>
          <form method="post" action="{{url('search-list')}}">
          {{ csrf_field() }}
          <div class="input-group input-group-lg mb-3">
            <input type="text" name="searchtext" class="form-control" placeholder="Search by name" aria-label="Search by name" aria-describedby="button-addon2" required="">
            <div id="productList"></div>
            <button class="btn btn-dark" type="submit">Search</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Right car full search Banner-->

<!--Search-->
<div class="container">
  <div class="row">
    <!--Filters-->
    <div class="col-md-4">
      <div class="filter">

        <div class="heading">Filters</div>
        
        <!--Brand Filter-->
        <div class="title">Brands</div>
        <div class="filter-holder">
        @if( count($brands) > 0)
          @foreach($brands as $brand)
          <div class="form-check">
            <input class="form-check-input checkBoxClass" type="checkbox" value="{{$brand->id}}" id="{{$brand->id}}">
            <label class="form-check-label" for="flexCheckDefault">
              {{$brand->name}}
            </label>
          </div>
          @endforeach
         @endif
        </div>
        <!--Brand Filter END-->

        <!--Price Filter-->
        <div class="title">Price</div>
        <div class="filter-holder">
          <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Min Price" id="minPrice" aria-label="Username">
            <span class="input-group-text">to</span>
            <input type="number" class="form-control" placeholder="Max Price" id="maxPrice" aria-label="Server">
          </div>
        </div>
         <!--Price Filter END-->

        <!--Battery Type Filter-->
        <div class="title">Battery Type</div>
        <div class="filter-holder">

          <div class="form-check">
            <input class="form-check-input checkBoxClass2" type="checkbox" value="Lead" id="Lead">
            <label class="form-check-label" for="flexCheckDefault">
              Lead
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input checkBoxClass2" type="checkbox" value="Acid Battery" id="Acid Battery">
            <label class="form-check-label" for="flexCheckDefault">
              Acid Battery
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input checkBoxClass2" type="checkbox" value="Lithium Dense" id="Lithium Dense">
            <label class="form-check-label" for="flexCheckDefault">
              Lithium Dense
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input checkBoxClass2" type="checkbox" value="Lithium Small" id="Lithium Small">
            <label class="form-check-label" for="flexCheckDefault">
              Lithium Small
            </label>
          </div>

        </div>
        <!--Battery Type Filter END-->

      </div>

    </div>
    <!--Filters END-->
    <!--Listing-->
    
    <div class="col-md-8" style="margin-bottom: 45px;margin-top: 45px;" id="productchecklist">
      <div class="row">
      	
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

		// dd(json_decode($d->image));

		$image = json_decode($d->image)[0]; 

		?>
		@if($d->image!='null')
        <?php 
          foreach(json_decode($d->image) as $key => $imageValue) {
        ?>
        @if($key==0)

        <div class="col-sm-12 col-md-6" >
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
		@endif

      </div>
    </div>
    <!--Listing END-->
  </div>
</div>
<!--Search END-->

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

<script type="text/javascript">
var brands_id=[]; 
var battery_id=[];
 var product_id = [];
$(document).ready(function () {
	$(".checkBoxClass").click(function (e) {
		var arr=brands_id;
		var checkedId=parseInt($(this).attr('id'));
		  // alert(battery_id);
		if($(this).prop('checked')){
			brands_id.push(checkedId);
			arr=brands_id;
		}
		else
		{
			jQuery.each(brands_id,function(i,item){
				if(arr[i] == checkedId) {
					arr.splice(i, 1);
				}
			});
			brands_id =arr;
		}
		var ids="";
			jQuery.each(brands_id,function(i,item){
				if(ids=="")
				{
					ids= brands_id[i];
				}
				else
				{
					ids= ids+ ","+   brands_id[i];
				}
			});
		product_id = ids;
		//alert(ids);
		$.ajax({
            type:'POST',
            url: "{{url('product-checklist')}}",
            data: {ids: ids, battery_id: battery_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function() {
			    $('#response').show();
			  },
            success: function(data) {
            	 console.log(data);
              $("#productchecklist").html('');
              $("#productchecklist").html(data.options);
               $('#response').hide();
            }
        });
	});           
}); 

</script>

<script type="text/javascript">

$(document).ready(function () {
	$(".checkBoxClass2").click(function (e) {
		var arr=battery_id;
		var checkedId=$(this).attr('id');
		//alert(checkedId);
		
		if($(this).prop('checked')){
			battery_id.push(checkedId);
			arr=battery_id;
		}
		else
		{
			jQuery.each(battery_id,function(i,item){
				if(arr[i] == checkedId) {
					arr.splice(i, 1);
				}
			});
			battery_id =arr;
		}
		var ids="";
			jQuery.each(battery_id,function(i,item){
				if(ids=="")
				{
					ids= battery_id[i];
				}
				else
				{
					ids= ids+ ","+   battery_id[i];
				}
			});
		// alert(ids+"======="+product_id);
		$.ajax({
            type:'POST',
            url: "{{url('batteryproductchecklist')}}",
            data: {ids: ids, product_id: product_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function() {
			    $('#response').show();
			  },
            success: function(data) {
            	 console.log(data);
              $("#productchecklist").html('');
              $("#productchecklist").html(data.options);
               $('#response').hide();
            }
        });
	});           
}); 

</script>

<script>
$(document).ready(function(){

     $("#maxPrice").on("input", function(){
        // Print entered value in a div box
         var maxPrice = $("#maxPrice").val();
         var minPrice = $("#minPrice").val();
         var delay = 5000;
         // console.log(minPrice+  "=====" +maxPrice);
            // console.log(battery_id);
         $.ajax({
            type:'POST',
            url: "{{url('productbyprice')}}",
            data: {battery_id: battery_id, product_id: product_id, minPrice: minPrice, maxPrice: maxPrice},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function() {
			    $('#response').show();
			  },
            success: function(data) {
            	 console.log(data);
              $("#productchecklist").html('');
              $("#productchecklist").html(data.options);
               $('#response').hide();
            }
        });

    });

     
});
</script>

@endsection