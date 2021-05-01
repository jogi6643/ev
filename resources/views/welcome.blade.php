@extends('layout.customer')
@section('contents')
<!--TOP Search Banner-->
<script type="text/javascript">
  window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
</script>
<div class="home-banner" style="background-image:url({{asset('public/assets/img/Car-Header.png')}});">
  <div class="banner-tint">
    <div class="box-holder">
      <h1>Find the right match</h1>
      
      <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-4wheel" role="tab" aria-controls="pills-4wheel" aria-selected="true">4 Wheeler</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-2wheel" role="tab" aria-controls="pills-2wheel" aria-selected="false">2 Wheeler</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-rickshaw" role="tab" aria-controls="pills-rickshaw" aria-selected="false">Rickshaw</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact2-tab" data-bs-toggle="pill" href="#pills-commercial" role="tab" aria-controls="pills-commercial" aria-selected="false">Commercial</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-4wheel" role="tabpanel" aria-labelledby="pills-home-tab">
          
          <ul class="nav nav-specification justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-brand" role="tab" aria-controls="pills-brand" aria-selected="true">search by Brand</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-requirement" role="tab" aria-controls="pills-requirement" aria-selected="false">search by Requirement</a>
            </li>
          </ul>
          
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-brand" role="tabpanel" aria-labelledby="pills-home-tab">
              <!-- <form method="post" action="{{url('vehicle-detail')}}"> -->
                <form method="post" action="{{url('search-list')}}">
                {{ csrf_field() }}
                <!--Search 4wheeler by brand-->
                <div class="form-holder">
                  <input type="hidden" name="vehicle_type" value="1">
                  <select name="brand_id" class="form-select" aria-label="Default select example" id="brand_id">

                @if( count($brands) > 0)
                <option value=""> Select Manufacturer </option>
                @foreach($brands as $brand)
                  <option value="{{$brand->id}}"> {{$brand->name}} </option>
                @endforeach
                @endif
              
              </select>
              @if ($errors->has('brand_id'))
                  <span class="invalid-field" role="alert">
                      <strong>{{ $errors->first('brand_id') }}</strong>
                  </span>
              @endif
                </div>

                <div class="form-holder">
                  <select name="product_id" class="form-select" aria-label="Default select example" id="vehicle_name">
                    <option value="">Vehicle Name</option>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button type="submit" id="submitbtn" class="btn btn-dark btn-justify center">Search</button></div>
            </form>
                <!--Search 4wheeler by brand END-->

            </div>
            <div class="tab-pane fade" id="pills-requirement" role="tabpanel" aria-labelledby="pills-profile-tab">
              <!-- <form method="post" action="{{url('vehicle-detail-by-requirement')}}"> -->
                <form method="post" action="{{url('search-list')}}">
                {{ csrf_field() }}
              <!--Search 4wheeler by requirement-->
                <div class="form-holder">
                  <input type="hidden" name="vehicle_type" value="1">
                  <select name="battery" class="form-select" aria-label="Default select example">
                    <option value="">Select Battery Type</option>
                    <!-- <option value="Lead">Lead</option>
                    <option value="Acid Battery">Acid Battery</option>
                    <option value="Lithium Dense">Lithium Dense</option>
                    <option value="Lithium Small">Lithium Small</option> -->
                    @if(count($bettery_type)>0)
                    @foreach($bettery_type as $b)
                    <option value="{{$b->name}}">{{$b->name}}</option>
                    @endforeach
                    @else
                    <option value="">No Bettery Available</option>
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                  <select name="speed" class="form-select" aria-label="Default select example">
                    <option value="">Vehicle Top Speed</option>
                    <option value="100-150">100 - 150 kmph</option>
                    <option value="150-200">150 - 200 kmph</option>
                    <option value="200-250">200 - 250 kmph</option>
                    <option value="250-300">250 - 300 kmph</option>
                  </select>
                </div>

                <div class="form-holder">
                  <select name="power" class="form-select" aria-label="Default select example">
                    <option value="">Horse Power</option>
                    <option value="1000-5000">1000 - 5000rpm</option>
                    <option value="5000-10000">5000 - 10000rpm</option>
                    <option value="10000-15000">10000 - 15000rpm</option>
                  </select>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto"><input type="submit" value="Submit" class="btn btn-dark btn-justify center"></div>
                <!--Search 4wheeler by requirement END-->
              </form>
            </div>
          </div>
        </div>

        <!-- two wheeler tab start -->
        <div class="tab-pane fade show" id="pills-2wheel" role="tabpanel" aria-labelledby="pills-profile-tab">
          
          <ul class="nav nav-specification justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentations">
              <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-brands" role="tab" aria-controls="pills-brands" aria-selected="true">search by Brand</a>
            </li>
            <li class="nav-item" role="presentations">
              <a class="nav-link" id="pills-profiles-tab" data-bs-toggle="pill" href="#pills-requirements" role="tab" aria-controls="pills-requirements" aria-selected="false">search by  Requirement</a>
            </li>
          </ul>
          
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-brands" role="tabpanel" aria-labelledby="pills-profile-tab">
               <form method="post" action="{{url('search-list')}}">
                {{ csrf_field() }}
                <!--Search 2wheeler by brand-->
                <div class="form-holder">
                  <input type="hidden" name="vehicle_type" value="2">
                  
                  <select name="brand_id" class="form-select" aria-label="Default select example" id="brand_id2">

                @if( count($brands2) > 0)
                <option value=""> Select Manufacturer </option>
                option
                @foreach($brands2 as $brand)
                  <option value="{{$brand->id}}"> {{$brand->name}} </option>
                @endforeach
                @endif
                option
              </select>
              @if ($errors->has('brand_id'))
                  <span class="invalid-field" role="alert">
                      <strong>{{ $errors->first('brand_id') }}</strong>
                  </span>
              @endif
                </div>

                <div class="form-holder">
                  <select name="product_id" class="form-select" aria-label="Default select example" id="vehicle_name2">
                    <option value="">Vehicle Name</option>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button ype="submit" id="submitbtn" class="btn btn-dark btn-justify center">Search</button></div>
            </form>
                <!--Search 2wheeler by brand END-->

            </div>
            <div class="tab-pane fade" id="pills-requirements" role="tabpanel" aria-labelledby="pills-profiles-tab">
               <form method="post" action="{{url('search-list')}}">
                {{ csrf_field() }}
              <!--Search 2wheeler by requirement-->
                <div class="form-holder">
                  <input type="hidden" name="vehicle_type" value="2">
                  <select name="battery" class="form-select" aria-label="Default select example">
                    <option selected>Select Battery Type</option>
                    <!-- <option value="Lead">Lead</option>
                    <option value="Acid Battery">Acid Battery</option>
                    <option value="Lithium Dense">Lithium Dense</option>
                    <option value="Lithium Small">Lithium Small</option> -->
                    @if(count($bettery_type2)>0)
                    @foreach($bettery_type2 as $b)
                    <option value="{{$b->name}}">{{$b->name}}</option>
                    @endforeach
                    @else
                    <option value="">No Bettery Available</option>
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                  <select name="speed" class="form-select" aria-label="Default select example">
                    <option selected>Vehicle Top Speed</option>
                    @if(count($top_speed2)>0)
                    @foreach($top_speed2 as $t)
                    <option value="{{$t->name}}">{{$t->name}} kmph</option>
                    @endforeach
                    @else
                    <option value="">No Top Speed Available</option>
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                  <select name="power" class="form-select" aria-label="Default select example">
                    <option selected>Horse Power</option>
                    @if(count($horse_power2)>0)
                    @foreach($horse_power2 as $h)
                    <option value="{{$h->name}}">{{$h->name}}rpm</option>
                    @endforeach
                    @else
                    <option value="">No Top Speed Available</option>
                    @endif
                  </select>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto"><input type="submit" value="Submit" class="btn btn-dark btn-justify center"></div>
                <!--Search 4wheeler by requirement END-->
              </form>
            </div>
          </div>
        </div>
        <!-- two wheeler tab end -->


        <!-- rickshaw tab start -->
        <div class="tab-pane fade show" id="pills-rickshaw" role="tabpanel" aria-labelledby="pills-contact-tab">
          
          <ul class="nav nav-specification justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentations">
              <a class="nav-link active" id="pills-contact-tab" data-bs-toggle="pill" href="#pillsrickshaw-brands" role="tab" aria-controls="pillsrickshaw-brands" aria-selected="true">search by Brand</a>
            </li>
            <li class="nav-item" role="presentations">
              <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pillsrickshaw-requirements" role="tab" aria-controls="pillsrickshaw-requirements" aria-selected="false">search by  Requirement</a>
            </li>
          </ul>
          
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pillsrickshaw-brands" role="tabpanel" aria-labelledby="pills-contact-tab">
              <form method="post" action="{{url('search-list')}}">
                {{ csrf_field() }}
                <!--Search rikshaw by brand-->
                <div class="form-holder">
                <input type="hidden" name="vehicle_type" value="3">
                  
                  <select name="brand_id" class="form-select" aria-label="Default select example" id="brand_id3">

                @if( count($brands3) > 0)
                <option value=""> Select Manufacturer </option>
                option
                @foreach($brands3 as $brand)
                  <option value="{{$brand->id}}"> {{$brand->name}} </option>
                @endforeach
                @endif
                option
              </select>
              @if ($errors->has('brand_id'))
                  <span class="invalid-field" role="alert">
                      <strong>{{ $errors->first('brand_id') }}</strong>
                  </span>
              @endif
                </div>

                <div class="form-holder">
                  <select name="product_id" class="form-select" aria-label="Default select example" id="vehicle_name3">
                    <option value="">Vehicle Name</option>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button ype="submit" id="submitbtn" class="btn btn-dark btn-justify center">Search</button></div>
            </form>
                <!--Search rikshaw by brand END--> 

            </div>
            <div class="tab-pane fade" id="pillsrickshaw-requirements" role="tabpanel" aria-labelledby="pills-contact-tab">
              <form method="post" action="{{url('search-list')}}">
                {{ csrf_field() }}
              <!--Search rikshaw by requirement-->
                <div class="form-holder">
                <input type="hidden" name="vehicle_type" value="3">
                  <select name="battery" class="form-select" aria-label="Default select example">
                    <option selected>Select Battery Type</option>
                    <!-- <option value="Lead">Lead</option>
                    <option value="Acid Battery">Acid Battery</option>
                    <option value="Lithium Dense">Lithium Dense</option>
                    <option value="Lithium Small">Lithium Small</option> -->
                    @if(count($bettery_type3)>0)
                    @foreach($bettery_type3 as $b)
                    <option value="{{$b->name}}">{{$b->name}}</option>
                    @endforeach
                    @else
                    <option value="">No Bettery Available</option>
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                  <select name="speed" class="form-select" aria-label="Default select example">
                    <option selected>Vehicle Top Speed</option>
                    @if(count($top_speed3)>0)
                    @foreach($top_speed3 as $t)
                    <option value="{{$t->name}}">{{$t->name}} kmph</option>
                    @endforeach
                    @else
                    <option value="">No Top Speed Available</option>
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                  <select name="power" class="form-select" aria-label="Default select example">
                    <option selected>Horse Power</option>
                    @if(count($horse_power3)>0)
                    @foreach($horse_power3 as $h)
                    <option value="{{$h->name}}">{{$h->name}}rpm</option>
                    @endforeach
                    @else
                    <option value="">No Top Speed Available</option>
                    @endif
                  </select>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto"><input type="submit" value="Submit" class="btn btn-dark btn-justify center"></div>
                <!--Search rikshaw by requirement END-->
              </form>
            </div>
          </div>
        </div>
        <!-- rickshaw tab end -->


        <!-- commercial tab start -->
        <div class="tab-pane fade show" id="pills-commercial" role="tabpanel" aria-labelledby="pills-contact2-tab">
          
          <ul class="nav nav-specification justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentations">
              <a class="nav-link active" id="pills-contact2-tab" data-bs-toggle="pill" href="#pillscommercial-brands" role="tab" aria-controls="pillscommercial-brands" aria-selected="true">search by Brand</a>
            </li>
            <li class="nav-item" role="presentations">
              <a class="nav-link" id="pills-contact2-tab" data-bs-toggle="pill" href="#pillscommercial-requirements" role="tab" aria-controls="pillscommercial-requirements" aria-selected="false">search by  Requirement</a>
            </li>
          </ul>
          
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pillscommercial-brands" role="tabpanel" aria-labelledby="pills-contact2-tab">
              <form method="post" action="{{url('search-list')}}">
                {{ csrf_field() }}
                <!--Search commercial by brand-->
                <div class="form-holder">
                <input type="hidden" name="vehicle_type" value="4">
                  
                  <select name="brand_id" class="form-select" aria-label="Default select example" id="brand_id4">

                @if( count($brands4) > 0)
                <option value=""> Select Manufacturer </option>
                option
                @foreach($brands4 as $brand)
                  <option value="{{$brand->id}}"> {{$brand->name}} </option>
                @endforeach
                @endif
                option
              </select>
              @if ($errors->has('brand_id'))
                  <span class="invalid-field" role="alert">
                      <strong>{{ $errors->first('brand_id') }}</strong>
                  </span>
              @endif
                </div>

                <div class="form-holder">
                  <select name="product_id" class="form-select" aria-label="Default select example" id="vehicle_name4">
                    <option value="">Vehicle Name</option>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button ype="submit" id="submitbtn" class="btn btn-dark btn-justify center">Search</button></div>
            </form>
                <!--Search commercial by brand END--> 

            </div>
            <div class="tab-pane fade" id="pillscommercial-requirements" role="tabpanel" aria-labelledby="pills-contact2-tab">
              <form method="post" action="{{url('search-list')}}">
                {{ csrf_field() }}
              <!--Search commercial by requirement-->
                <div class="form-holder">
                <input type="hidden" name="vehicle_type" value="4">
                  <select name="battery" class="form-select" aria-label="Default select example">
                    <option selected>Select Battery Type</option>
                    <!-- <option value="Lead">Lead</option>
                    <option value="Acid Battery">Acid Battery</option>
                    <option value="Lithium Dense">Lithium Dense</option>
                    <option value="Lithium Small">Lithium Small</option> -->
                    @if(count($bettery_type4)>0)
                    @foreach($bettery_type4 as $b)
                    <option value="{{$b->name}}">{{$b->name}}</option>
                    @endforeach
                    @else
                    <option value="">No Bettery Available</option>
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                  <select name="speed" class="form-select" aria-label="Default select example">
                    <option selected>Vehicle Top Speed</option>
                    @if(count($top_speed4)>0)
                    @foreach($top_speed4 as $t)
                    <option value="{{$t->name}}">{{$t->name}} kmph</option>
                    @endforeach
                    @else
                    <option value="">No Top Speed Available</option>
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                  <select name="power" class="form-select" aria-label="Default select example">
                    <option selected>Horse Power</option>
                    @if(count($horse_power4)>0)
                    @foreach($horse_power4 as $h)
                    <option value="{{$h->name}}">{{$h->name}}rpm</option>
                    @endforeach
                    @else
                    <option value="">No Top Speed Available</option>
                    @endif
                  </select>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto"><input type="submit" value="Submit" class="btn btn-dark btn-justify center"></div>
                <!--Search 4wheeler by requirement END-->
              </form>
            </div>
          </div>
        </div>
        <!-- commercial tab end -->

        
        
        <div class="tab-pane fade" id="pills-commercial" role="tabpanel" aria-labelledby="pills-2-tab">
          <form method="post" action="{{url('vehicle-detail')}}">
                {{ csrf_field() }}
                <!--Search rikshaw by brand-->
                <div class="form-holder">
                  
                  <select name="brand_id" class="form-select" aria-label="Default select example" id="brand_id4">

                @if( count($brands4) > 0)
                <option value=""> Select Manufacturer </option>
                option
                @foreach($brands4 as $brand)
                  <option value="{{$brand->id}}"> {{$brand->name}} </option>
                @endforeach
                @endif
                option
              </select>
              @if ($errors->has('brand_id'))
                  <span class="invalid-field" role="alert">
                      <strong>{{ $errors->first('brand_id') }}</strong>
                  </span>
              @endif
                </div>

                <div class="form-holder">
                  <select name="product_id" class="form-select" aria-label="Default select example" id="vehicle_name4">
                    <option value="">Vehicle Name</option>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button ype="submit" id="submitbtn" class="btn btn-dark btn-justify center">Search</button></div>
            </form>
                <!--Search rikshaw by brand END--> 
        </div>
      </div>

    </div>
  </div>
</div>
<!--TOP Search Banner END-->

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

<!--Vehicle Options-->
<div class="container">
  <div class="row">

    <div class="quick-vehicle">
      <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-quick4wheel" role="tab" aria-controls="pills-quick4wheel" aria-selected="true">4 Wheeler</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-quick2wheel" role="tab" aria-controls="pills-quick2wheel" aria-selected="false">2 Wheeler</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-quickrickshaw" role="tab" aria-controls="pills-quickrickshaw" aria-selected="false">Rickshaw</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact2-tab" data-bs-toggle="pill" href="#pills-quickcommercial" role="tab" aria-controls="pills-quickcommercial" aria-selected="false">Commercial</a>
        </li>
      </ul>
      <div class="tab-content quick-vehicle-holder" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-quick4wheel" role="tabpanel" aria-labelledby="pills-home-tab">
          
          <div class="row">
            @if(count($data)>0)
            @foreach($data as $key=>$d)
            <?php 
            // dd(json_decode($d->image));

            $image = json_decode($d->image)[0]; 

            ?>
            @if($d->image!='null')
            <?php 
              foreach(json_decode($d->image) as $key => $imageValue) {
            ?>
        @if($key==0 && $d->home==1)
            <div class="col-md-3 col-sm-4 text-center quick-vehicle-btn">
            
              <a href="{{url('vehicle-details')}}/{{base64_encode($d->id)}}" style="text-decoration: none; color:#000">
                <img src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="vehicle name">
                <div class="vehicle-name">{{$d->name}}</div>
              </a>
            </div>
            @endif
            <?php }?> 
            @else
            <div class="col-md-3 col-sm-4 text-center quick-vehicle-btn">
              <img src="{{url('public/server/uploads/dummycar.jpg')}}" alt="vehicle name">
              <div class="vehicle-name">No Data Found</div>
            </div>
            @endif
            @endforeach
            @endif
          </div>

        </div>
        <div class="tab-pane fade" id="pills-quick2wheel" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="row">
            @if(count($data2)>0)
            @foreach($data2 as $key=>$d)
            <?php 
            // dd(json_decode($d->image));

            $image = json_decode($d->image)[0]; 

            ?>
            @if($d->image!='null')
            <?php 
              foreach(json_decode($d->image) as $key => $imageValue) {
            ?>
        @if($key==0 && $d->home==1)
            <div class="col-md-3 col-sm-4 text-center quick-vehicle-btn">
            
              <a href="{{url('vehicle-details')}}/{{base64_encode($d->id)}}" style="text-decoration: none; color:#000">
                <img src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="vehicle name">
                <div class="vehicle-name">{{$d->name}}</div>
              </a>
            </div>
            @endif
            <?php }?> 
            @else
            <div class="col-md-3 col-sm-4 text-center quick-vehicle-btn">
              <img src="{{url('public/server/uploads/dummycar.jpg')}}" alt="vehicle name">
              <div class="vehicle-name">No Data Found</div>
            </div>
            @endif
            @endforeach
            @endif
          </div>
        </div>
        <div class="tab-pane fade" id="pills-quickrickshaw" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="row">
            @if(count($data3)>0)
            @foreach($data3 as $key=>$d)
            <?php 
            // dd(json_decode($d->image));

            $image = json_decode($d->image)[0]; 

            ?>
            @if($d->image!='null')
            <?php 
              foreach(json_decode($d->image) as $key => $imageValue) {
            ?>
        @if($key==0 && $d->home==1)
            <div class="col-md-3 col-sm-4 text-center quick-vehicle-btn">
            
              <a href="{{url('vehicle-details')}}/{{base64_encode($d->id)}}" style="text-decoration: none; color:#000">
                <img src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="vehicle name">
                <div class="vehicle-name">{{$d->name}}</div>
              </a>
            </div>
            @endif
            <?php }?> 
            @else
            <div class="col-md-3 col-sm-4 text-center quick-vehicle-btn">
              <img src="{{url('public/server/uploads/dummycar.jpg')}}" alt="vehicle name">
              <div class="vehicle-name">No Data Found</div>
            </div>
            @endif
            @endforeach
            @endif
          </div> 
        </div>
        <div class="tab-pane fade" id="pills-quickcommercial" role="tabpanel" aria-labelledby="pills-2-tab">
        <div class="row">
            @if(count($data4)>0)
            @foreach($data4 as $key=>$d)
            <?php 
            // dd(json_decode($d->image));

            $image = json_decode($d->image)[0]; 

            ?>
            @if($d->image!='null')
            <?php 
              foreach(json_decode($d->image) as $key => $imageValue) {
            ?>
        @if($key==0 && $d->home==1)
            <div class="col-md-3 col-sm-4 text-center quick-vehicle-btn">
            
              <a href="{{url('vehicle-details')}}/{{base64_encode($d->id)}}" style="text-decoration: none; color:#000">
                <img src="{{url('public/server/uploads')}}/<?php echo $imageValue ?>" alt="vehicle name">
                <div class="vehicle-name">{{$d->name}}</div>
              </a>
            </div>
            @endif
            <?php }?> 
            @else
            <div class="col-md-3 col-sm-4 text-center quick-vehicle-btn">
              <img src="{{url('public/server/uploads/dummycar.jpg')}}" alt="vehicle name">
              <div class="vehicle-name">No Data Found</div>
            </div>
            @endif
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!--Vehicle Options END-->

<!--Featured Story-->
<div class="featured-banner1" style="background-image:url({{asset('public/assets/img/feature.png')}});">
  <div  class="featured-banner1-holder">
    <h3 class="a2">Featured Story</h3>
    <p class="a3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <a class="btn btn-light" href="#">Watch Now</a>
  </div>
</div>
<!--Featured Story END-->

<!--Vehicle Story-->
<div class="featured-banner2" style="background-image:url({{asset('public/assets/img/Vehicle.png')}});">
  <div  class="featured-banner2-holder" style="margin-bottom: 12%;">
    <h3 class="a2">Featured Story</h3>
    <p class="a4">EV Bazaar, discover the future of automobile.</p>
    <a class="btn btn-light" href="#">Watch Now</a>
  </div>
</div>
<!--Vehicle Story END-->

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


<!--Brand Listing-->
<div class="container" style="margin-top: 45px;margin-bottom: 45px;">
  <div class="row text-center">
    <h4 class="a6">Popular Brands</h4>
    @if(count($popular_brands)>0)
          @foreach($popular_brands as $key=>$d)
        <div class="col-sm-3 col-md"><img  src="{{url('public/server/logo')}}/<?php echo $d->logo ?>" width="80%"></div>
        @endforeach
        @endif

  </div>
  <div class="text-center" style="width: 100%; margin-top: 45px;"><a class="btn btn-dark" href="#">View All Brands</a></div>
</div>
<!--Brand Listing END-->

<script type="text/javascript">
  $(document).ready(function(){
    $("#brand_id").change(function(){
        var id = $(this).val();
        // alert(id);
        $.ajax({
            type:'POST',
            url: "{{url('selectVehiclename')}}",
            data: {id:id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              $("#vehicle_name").html('');
              $("#vehicle_name").html(data.options);
            }
        });
    });
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#brand_id2").change(function(){
        var id = $(this).val();
        // alert(id);
        $.ajax({
            type:'POST',
            url: "{{url('selectVehiclename2')}}",
            data: {id:id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              $("#vehicle_name2").html('');
              $("#vehicle_name2").html(data.options);
            }
        });
    });
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#brand_id3").change(function(){
        var id = $(this).val();
        // alert(id);
        $.ajax({
            type:'POST',
            url: "{{url('selectVehiclename3')}}",
            data: {id:id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              $("#vehicle_name3").html('');
              $("#vehicle_name3").html(data.options);
            }
        });
    });
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#brand_id4").change(function(){
        var id = $(this).val();
        // alert(id);
        $.ajax({
            type:'POST',
            url: "{{url('selectVehiclename4')}}",
            data: {id:id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              $("#vehicle_name4").html('');
              $("#vehicle_name4").html(data.options);
            }
        });
    });
    });
</script>

@endsection