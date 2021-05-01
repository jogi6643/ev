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


<!--Compare Listing Manager-->
  <div class="container">
    <div class="row compare-card-holder">
       <!--  <div class="col-sm-4">
          <div class="compare-card text-center">
            <img src="{{asset('public/assets/img/compare-car1.jpg')}}" width="100%">
            <h4 class="vehicle-name">Hyundai Creta</h4>
            <h5 class="vehicle-price">&#8377; 17.98 Lakh*</h5>
              <div class="d-grid gap-2 col-6 mx-auto"><button type="button" onclick="clear1()" class="btn btn-dark btn-justify center">Remove</button></div>
          </div>
        </div> -->

        <div class="col-sm-4" id="data1">
          <div class="compare-card text-center">
            <div class="mg3">
              <button type="button" onclick="button1()" class="comapre-add"><img src="{{asset('public/assets/img/plus.png')}}"></button>
              <h4>Add car to compare</h4>
              <!--Select vehicle to compare-->
                <div class="form-holder">
                  <select class="form-select" aria-label="Default select example" id="brand_id1">
                  @if( count($brands) > 0)
                    <option selected>Select Manufacturer</option>
                    @foreach($brands as $brand)
                      <option value="{{$brand->id}}"> {{$brand->name}} </option>
                    @endforeach
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                  <select class="form-select" aria-label="Default select example" id="vehicle_name1">
                    <option selected>Vehicle Name</option>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button type="button" onclick="button1()" class="btn btn-dark btn-justify center">Add to compare</button></div>
                <!--Select vehicle to compare END-->
            </div>
          </div>
        </div>

        <div  class="col-sm-4" style="display:none" id="dataremove">
        </div>


        <div class="col-sm-4" id="data2">
          <div class="compare-card text-center">
            <div class="mg3">
              <button type="button" onclick="button2()" class="comapre-add"><img src="{{asset('public/assets/img/plus.png')}}"></button>
              <h4>Add car to compare</h4>
              <!--Select vehicle to compare-->
                <div class="form-holder">
                  <select class="form-select" aria-label="Default select example" id="brand_id2">
                  @if( count($brands) > 0)
                    <option selected>Select Manufacturer</option>
                    @foreach($brands as $brand)
                      <option value="{{$brand->id}}"> {{$brand->name}} </option>
                    @endforeach
                    @endif
                  </select>
                </div>

                <div class="form-holder">
                <select class="form-select" aria-label="Default select example" id="vehicle_name2">
                    <option selected>Vehicle Name</option>
                  </select>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button onclick="button2()" type="button" class="btn btn-dark btn-justify center">Add to compare</button></div>
                <!--Select vehicle to compare END-->
            </div>
          </div>
        </div>
        <div  class="col-sm-4" style="display:none" id="dataremove1">

        </div>
        </div>
    </div>
  </div>
<!--Compare Listing Manager END-->

<!--Compare Content-->
<div class="container">
  <h1 class="a8">Compare at EV Bazaar</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
</div>
<!--Compare Content END-->  

<!--Feature Compare-->
<div class="container">
<div id="table1"></div>
    <!-- <table   class="table table-responsive table-hover table-borderless table-striped table-compare">
     
      <thead>
        <tr>
          <th scope="col">Basic Info</th>
          <th scope="col">Hyundai Creta SX</th>
          <th scope="col">KIS Sonet IVT</th>
        </tr>
      </thead>

      <tbody>

        <tr>
          <td><strong>Konia EV s</strong><br>Manual</td>
          <td>INR 11.29 Lakh</td>
          <td><a type="button" class="btn btn-outline-dark">Contact Dealer</a></td>
        </tr>

        <tr>
          <td><strong>Konia EV E</strong><br>Manual</td>
          <td>INR 13.67 Lakh</td>
          <td><a type="button" class="btn btn-outline-dark">Contact Dealer</a></td>
        </tr>

        <tr>
          <td><strong>Konia EV L</strong><br>Automatic</td>
          <td>INR 16.1 Lakh</td>
          <td><a type="button" class="btn btn-outline-dark">Contact Dealer</a></td>
        </tr>

        <tr>
          <td class="title disable">Comfort and Convenience</td>
        </tr>

        <tr>
          <td><strong>Konia EV s</strong><br>Manual</td>
          <td><img src="{{asset('public/assets/img/tick.png')}}" height="30"></td>
          <td><img src="{{asset('public/assets/img/cross.png')}}" height="30"></td>
        </tr>

        <tr>
          <td><strong>Konia EV E</strong><br>Manual</td>
          <td><img src="{{asset('public/assets/img/tick.png')}}" height="30"></td>
          <td><img src="{{asset('public/assets/img/tick.png')}}" height="30"></td>
        </tr>

        <tr>
          <td><strong>Konia EV L</strong><br>Automatic</td>
          <td><img src="{{asset('public/assets/img/cross.png')}}" height="30"></td>
          <td><img src="{{asset('public/assets/img/tick.png')}}" height="30"></td>
        </tr>

       </tbody>
    </table> -->
  </div>
<!--Feature Compare End--> 



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
  $(document).ready(function(){
    $("#brand_id1").change(function(){
        var id = $(this).val();
        $.ajax({
            type:'POST',
            url: "{{url('selectVehiclename')}}",
            data: {id:id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              $("#vehicle_name1").html('');
              $("#vehicle_name1").html(data.options);
            }
        });
    });
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#brand_id2").change(function(){
        var id = $(this).val();
        $.ajax({
            type:'POST',
            url: "{{url('selectVehiclename')}}",
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
<script>
       
        var headerdata =     ["Price"];
        var priceData =       ["Showroom Price"];
        var onroadpriceData = ["On Road Price"];
        var topspeed = ['Top Speed'];
        var seating = ['Seating'];
        var BHP    = ['BHP'];
        var airbag = ['Airbag'];
        var transmission = ['Transmission'];
        var batterytype = ['Battery Type'];
        var basicDataRemove = new Array();
function button1()
{
  
  var brand1 = document.getElementById("brand_id1").value;
  var vehicle1 = document.getElementById("vehicle_name1").value;
  $.ajax({
            type:'POST',
            url: "{{url('add-compere-product')}}",
            data: {brand1:brand1,vehicle1:vehicle1},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              var data = JSON.parse(data);
              var image = JSON.parse(data.product.image)[0];
              var htmlData;
              htmlData = "<div class='compare-card text-center'>";
              htmlData += "<img src='{{asset('public/server/uploads')}}/"+image+"' width='100%'>";
              htmlData += "<h4 class='vehicle-name'>"+data.product.name+"</h4>"; 
              htmlData += "<h5 class='vehicle-price'>&#8377;"+data.product.price+"*</h5>";
              htmlData += "<div class='d-grid gap-2 col-6 mx-auto'><button type='button' onclick = 'clearcontent1("+brand1+","+vehicle1+")' class='btn btn-dark btn-justify center'>Reomve</button></div>";
              htmlData += "</div>";
              $("#data1").hide();
              $("#dataremove").show();
              $("#dataremove").html(htmlData);
              /*Add Table in the table  */

              var basicData = new Array();
              headerdata.push(data.product.name);
              // alert(headerdata);
              priceData.push(data.product.price);
              onroadpriceData.push(data.product.on_roadprice);
              // basicData.push(headerdata);
              basicData.push(priceData);
              basicData.push(onroadpriceData);
              //Remove Basic Data
              // basicDataRemove
              basicDataRemove.push(priceData);
              basicDataRemove.push(onroadpriceData);
              //End Basic data

              basicDataLength = basicData.length;
              var headerCount = headerdata.length;
              // alert(headerCount);
              // alert(basicData);
              var table = ''; 
              for(var thead=0;thead<1;thead++)
              {
                  table += '<thead>';
                  table += '<tr>';
                  for(var thcol = 0;thcol<headerCount;thcol++)
                  {
                    table += '<th scope="col">'+headerdata[thcol]+'</th>';
                  }
                  table += '</thead>';
                  table += '</tr>';
              }
              table += '<tbody>';
              for(var rows=0;rows<1;rows++)
              {
                  for(col=0;col<basicDataLength;col++)
                  {
                    table += '<tr>';
                    table += '<td><strong>'+basicData[col][0]+'</strong></td>';
                    table += '<td>INR'+basicData[col][1]+'</td>';
                    if(basicData[col][2]!=undefined)
                    {
                      table += '<td>INR'+basicData[col][2]+'</td>';
                    }
                    table += '</tr>';
                  }
              }


              topspeed.push(data.attData[7].attr_name1);
              seating.push(data.attData[8].attr_name1);
              BHP.push(data.attData[9].attr_name1)
              airbag.push(data.attData[10].attr_name1)
              transmission.push(data.attData[11].attr_name1)
              batterytype.push(data.attData[12].attr_name1)
              console.log(seating);
              console.log(topspeed);
              // ["Top Speed",140]

              // console.log(data.attributValue);
              table += '<tr>';
              table += '<td class="title disable">Basic Information</td>';
              table += '</tr>';
              /*Start Seating  */
              table += '<tr>';
              table += '<td><strong>'+seating[0]+'</strong></td>';
              table += '<td>'+seating[1]+'</td>';
              if(seating[2]!=undefined)
                    {
              table += '<td>'+seating[2]+'</td>';
                    }
              table += '</tr>';
              /*End Seating  */

               /*Start Top Speed  */
               table += '<tr>';
              table += '<td><strong>'+topspeed[0]+'</strong></td>';
              table += '<td>'+topspeed[1]+'</td>';
              if(topspeed[2]!=undefined)
                    {
              table += '<td>'+topspeed[2]+'</td>';
                    }
              table += '</tr>';
              /*End Top Speed  */

               /*Start BHP  */
               table += '<tr>';
              table += '<td><strong>'+BHP[0]+'</strong></td>';
              table += '<td>'+BHP[1]+'</td>';
              if(BHP[2]!=undefined)
                    {
              table += '<td>'+BHP[2]+'</td>';
                    }
              table += '</tr>';
              /*End BHP  */

               /*Start airbag  */
               table += '<tr>';
              table += '<td><strong>'+airbag[0]+'</strong></td>';
              table += '<td>'+airbag[1]+'</td>';
              if(airbag[2]!=undefined)
                    {
              table += '<td>'+airbag[2]+'</td>';
                    }
              table += '</tr>';
              /*End airbag  */

               /*Start transmission  */
               table += '<tr>';
              table += '<td><strong>'+transmission[0]+'</strong></td>';
              table += '<td>'+transmission[1]+'</td>';
              if(transmission[2]!=undefined)
                    {
              table += '<td>'+transmission[2]+'</td>';
                    }
              table += '</tr>';
              /*End transmission  */

               /*Start batterytype  */
               table += '<tr>';
              table += '<td><strong>'+batterytype[0]+'</strong></td>';
              table += '<td>'+batterytype[1]+'</td>';
              if(batterytype[2]!=undefined)
                    {
              table += '<td>'+batterytype[2]+'</td>';
                    }
              table += '</tr>';
              /*End batterytype  */

              

              table += '</table>';
              $("#table1").html('<table class="table table-responsive table-hover table-borderless table-striped table-compare">' + table + '</table>');
            /*Add end Table*/

            }
        });
}
</script>

<script>
function button2()
{
  
  var brand1 = document.getElementById("brand_id2").value;
  var vehicle1 = document.getElementById("vehicle_name2").value;
  $.ajax({
            type:'POST',
            url: "{{url('add-compere-product')}}",
            data: {brand1:brand1,vehicle1:vehicle1},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              // alert(data);
              var data = JSON.parse(data);
              var image = JSON.parse(data.product.image)[0];
              var htmlData;
              htmlData = "<div class='compare-card text-center'>";
              htmlData += "<img src='{{asset('public/server/uploads')}}/"+image+"' width='100%'>";
              htmlData += "<h4 class='vehicle-name'>"+data.product.name+"</h4>"; 
              htmlData += "<h5 class='vehicle-price'>&#8377;"+data.product.price+"*</h5>";
              htmlData += "<div class='d-grid gap-2 col-6 mx-auto'><button type='button' onclick = 'clearcontent2("+brand1+","+vehicle1+")' class='btn btn-dark btn-justify center'>Remove</button></div>";
              htmlData += "</div>";
              $("#data2").hide();
              $("#dataremove1").show();
              $("#dataremove1").html(htmlData);

        
     /*Add Table in the table  */

              var basicData = new Array();
              headerdata.push(data.product.name);
              priceData.push(data.product.price);
              onroadpriceData.push(data.product.on_roadprice);
              basicData.push(priceData);
              basicData.push(onroadpriceData);
              basicDataLength = basicData.length;
              var headerCount = headerdata.length;
              var table = ''; 
              for(var thead=0;thead<1;thead++)
              {
                  table += '<thead>';
                  table += '<tr>';
                  for(var thcol = 0;thcol<headerCount;thcol++)
                  {
                    table += '<th scope="col">'+headerdata[thcol]+'</th>';
                  }
                  table += '</thead>';
                  table += '</tr>';
              }
              table += '<tbody>';
              for(var rows=0;rows<1;rows++)
              {
                  for(col=0;col<basicDataLength;col++)
                  {
                    table += '<tr>';
                    table += '<td><strong>'+basicData[col][0]+'</strong></td>';
                    table += '<td>INR'+basicData[col][1]+'</td>';
                    if(basicData[col][2]!=undefined)
                    {
                      table += '<td>INR'+basicData[col][2]+'</td>';
                    }
                    table += '</tr>';
                  }
              }
             
              table += '<tr>';
              table += '<td class="title disable">Comfort and Convenience</td>';
              table += '</tr>';

              topspeed.push(data.attData[7].attr_name1);              
              seating.push(data.attData[8].attr_name1);
              BHP.push(data.attData[9].attr_name1)
              airbag.push(data.attData[10].attr_name1)
              transmission.push(data.attData[11].attr_name1)
              batterytype.push(data.attData[12].attr_name1)
              console.log(seating[0]);
              console.log(topspeed);
              
              /*Start Seating  */
              table += '<tr>';
              table += '<td><strong>'+seating[0]+'</strong></td>';
              table += '<td>'+seating[1]+'</td>';
              if(seating[2]!=undefined)
                    {
              table += '<td>'+seating[2]+'</td>';
                    }
              table += '</tr>';
              /*End Seating  */

               /*Start Top Speed  */
               table += '<tr>';
              table += '<td><strong>'+topspeed[0]+'</strong></td>';
              table += '<td>'+topspeed[1]+'</td>';
              if(topspeed[2]!=undefined)
                    {
              table += '<td>'+topspeed[2]+'</td>';
                    }
              table += '</tr>';
              /*End Top Speed  */

               /*Start BHP  */
               table += '<tr>';
              table += '<td><strong>'+BHP[0]+'</strong></td>';
              table += '<td>'+BHP[1]+'</td>';
              if(BHP[2]!=undefined)
                    {
              table += '<td>'+BHP[2]+'</td>';
                    }
              table += '</tr>';
              /*End BHP  */

              
               /*Start Air Bag  */
               table += '<tr>';
              table += '<td><strong>'+airbag[0]+'</strong></td>';
              table += '<td>'+airbag[1]+'</td>';
              if(airbag[2]!=undefined)
                    {
              table += '<td>'+airbag[2]+'</td>';
                    }
              table += '</tr>';
              /*End Airbag  */

               /*Start transmission  */
               table += '<tr>';
              table += '<td><strong>'+transmission[0]+'</strong></td>';
              table += '<td>'+transmission[1]+'</td>';
              if(transmission[2]!=undefined)
                    {
              table += '<td>'+transmission[2]+'</td>';
                    }
              table += '</tr>';
              /*End transmission  */

               /*Start batterytype  */
               table += '<tr>';
              table += '<td><strong>'+batterytype[0]+'</strong></td>';
              table += '<td>'+batterytype[1]+'</td>';
              if(batterytype[2]!=undefined)
                    {
              table += '<td>'+batterytype[2]+'</td>';
                    }
              table += '</tr>';
              /*End batterytype  */




              table += '</table>';
              $("#table1").html('<table class="table table-responsive table-hover table-borderless table-striped table-compare">' + table + '</table>');
            /*Add end Table*/

            }
        });
}
</script>

<script>
function clearcontent1(brand1,vehicle1){

  var dropDown = document.getElementById("brand_id1");
  dropDown.selectedIndex = 0;

  var dropDown = document.getElementById("vehicle_name1");
  dropDown.selectedIndex = 0;
    
  var brand1 = brand1;
  var vehicle1 = vehicle1;
  $.ajax({
            type:'POST',
            url: "{{url('add-compere-product')}}",
            data: {brand1:brand1,vehicle1:vehicle1},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              var data = JSON.parse(data);
              var image = JSON.parse(data.product.image)[0];
              var htmlData;
              htmlData += "<div class='compare-card text-center dataremove'>";
              htmlData += "<img src='{{asset('public/server/uploads')}}/"+image+"' width='100%'>";
              htmlData += "<h4 class='vehicle-name'>"+data.product.name+"</h4>"; 
              htmlData += "<h5 class='vehicle-price'>&#8377;"+data.product.on_roadprice+"*</h5>";
              htmlData += "<div class='d-grid gap-2 col-6 mx-auto'><button type='button' onclick = 'clearcontent1()' class='btn btn-dark btn-justify center'>Remove</button></div>";
              htmlData += "</div>";
              $("#data1").show();
              $("#dataremove").hide();
              $("#dataremove").html(htmlData);

              /*Add Table in the table  */
              
             
              // alert(headerdata);
              // alert(data.product.name);
              const index = headerdata.indexOf(data.product.name);
              if (index > -1) {
                headerdata.splice(index, 1);
              }
              // headerdata.pop(data.product.name);
              // alert(headerdata);
             
              
              const index1 = priceData.indexOf(data.product.price);
              if (index1 > -1) {
                priceData.splice(index1, 1);
              }
              
              const index2 = onroadpriceData.indexOf(data.product.on_roadprice);
              if (index2 > -1) {
                onroadpriceData.splice(index2, 1);
              }
              // basicData.push(headerdata);
              // alert(basicDataRemove);
               // basicDataRemove.pop(priceData);
              // const index3 = basicDataRemove.indexOf(priceData);
              // if (index3 > -1) {
              //   basicDataRemove.splice(index3, 1);
              // }
               // basicDataRemove.pop(onroadpriceData);

              // const index4 = basicDataRemove.indexOf(onroadpriceData);
              // if (index4 > -1) {
              //   basicDataRemove.splice(index4, 1);
              // }

              basicDataLength = basicDataRemove.length;

              // alert(basicDataRemove);
              var headerCount = headerdata.length;
               // alert(headerCount);
            
              var table = ''; 
              if(headerCount>1){
              for(var thead=0;thead<1;thead++)
              {
                  table += '<thead>';
                  table += '<tr>';
                  for(var thcol = 0;thcol<headerCount;thcol++)
                  {
                    table += '<th scope="col">'+headerdata[thcol]+'</th>';
                  }
                  table += '</thead>';
                  table += '</tr>';
              }
              table += '<tbody>';

              for(var rows=0;rows<1;rows++)
              {
                  for(col=0;col<2;col++)
                  {
                    
                    table += '<tr>';
                    table += '<td><strong>'+basicDataRemove[col][0]+'</strong></td>';
                    table += '<td>INR'+basicDataRemove[col][1]+'</td>';
                    if(basicDataRemove[col][2]!=undefined)
                    {
                      table += '<td>INR'+basicDataRemove[col][2]+'</td>';
                    }
                    table += '</tr>';
                  }
              }
              }
              


              // topspeed.pop(data.attData[7].attr_name1);
              
              const att_index = topspeed.indexOf(data.attData[7].attr_name1);
              if (att_index > -1) {
                topspeed.splice(att_index, 1);
              }

              const att_index1 = seating.indexOf(data.attData[8].attr_name1);
              if (att_index1 > -1) {
                seating.splice(att_index1, 1);
              }

              const att_index2 = BHP.indexOf(data.attData[9].attr_name1);
              if (att_index2 > -1) {
                BHP.splice(att_index2, 1);
              }

              const att_index3 = airbag.indexOf(data.attData[10].attr_name1);
              if (att_index3 > -1) {
                airbag.splice(att_index3, 1);
              }

              const att_index4 = transmission.indexOf(data.attData[11].attr_name1);
              if (att_index4 > -1) {
                transmission.splice(att_index4, 1);
              }

              const att_index5 = batterytype.indexOf(data.attData[12].attr_name1);
              if (att_index5 > -1) {
                batterytype.splice(att_index5, 1);
              }

              
              // ["Top Speed",140]
              if(seating[0]!=undefined && seating[1]!=undefined ){
              if(seating[0]!=undefined){
              // console.log(data.attributValue);
              table += '<tr>';
              table += '<td class="title disable">Basic Information</td>';
              table += '</tr>';
              /*Start Seating  */
              table += '<tr>';
              table += '<td><strong>'+seating[0]+'</strong></td>';
              table += '<td>'+seating[1]+'</td>';
              if(seating[2]!=undefined)
                    {
              table += '<td>'+seating[2]+'</td>';
                    }
              table += '</tr>';
              /*End Seating  */
              }

              if(topspeed[0]!=undefined){
               /*Start Top Speed  */
               table += '<tr>';
              table += '<td><strong>'+topspeed[0]+'</strong></td>';
              table += '<td>'+topspeed[1]+'</td>';
              if(topspeed[2]!=undefined)
                    {
              table += '<td>'+topspeed[2]+'</td>';
                    }
              table += '</tr>';
              /*End Top Speed  */
              }

              if(BHP[0]!=undefined){
               /*Start BHP  */
               table += '<tr>';
              table += '<td><strong>'+BHP[0]+'</strong></td>';
              table += '<td>'+BHP[1]+'</td>';
              if(BHP[2]!=undefined)
                    {
              table += '<td>'+BHP[2]+'</td>';
                    }
              table += '</tr>';
              /*End BHP  */
              }

              if(airbag[0]!=undefined){
               /*Start airbag  */
               table += '<tr>';
              table += '<td><strong>'+airbag[0]+'</strong></td>';
              table += '<td>'+airbag[1]+'</td>';
              if(airbag[2]!=undefined)
                    {
              table += '<td>'+airbag[2]+'</td>';
                    }
              table += '</tr>';
              /*End airbag  */
              }

              if(transmission[0]!=undefined){
               /*Start transmission  */
               table += '<tr>';
              table += '<td><strong>'+transmission[0]+'</strong></td>';
              table += '<td>'+transmission[1]+'</td>';
              if(transmission[2]!=undefined)
                    {
              table += '<td>'+transmission[2]+'</td>';
                    }
              table += '</tr>';
              /*End transmission  */
              }

              if(batterytype[0]!=undefined){
               /*Start batterytype  */
               table += '<tr>';
              table += '<td><strong>'+batterytype[0]+'</strong></td>';
              table += '<td>'+batterytype[1]+'</td>';
              if(batterytype[2]!=undefined)
                    {
              table += '<td>'+batterytype[2]+'</td>';
                    }
              table += '</tr>';
              /*End batterytype  */
              }
            }
              
              table += '</table>';
              $("#table1").html('<table class="table table-responsive table-hover table-borderless table-striped table-compare">' + table + '</table>');
            /*Add end Table*/

            }
        });
       
}
</script>



<script>
function clearcontent2(brand1,vehicle1){
  
  var dropDown = document.getElementById("brand_id2");
  dropDown.selectedIndex = 0;

  var dropDown = document.getElementById("vehicle_name2");
  dropDown.selectedIndex = 0;
  
  var brand1 = brand1;
  var vehicle1 = vehicle1;
  $.ajax({
            type:'POST',
            url: "{{url('add-compere-product')}}",
            data: {brand1:brand1,vehicle1:vehicle1},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              var data = JSON.parse(data);
              var image = JSON.parse(data.product.image)[0];
              var htmlData;
              htmlData += "<div class='compare-card text-center'>";
              htmlData += "<img src='{{asset('public/server/uploads')}}/"+image+"' width='100%'>";
              htmlData += "<h4 class='vehicle-name'>"+data.product.name+"</h4>"; 
              htmlData += "<h5 class='vehicle-price'>&#8377;"+data.product.on_roadprice+"*</h5>";
              htmlData += "<div class='d-grid gap-2 col-6 mx-auto'><button type='button' onclick = 'clearcontent1()' class='btn btn-dark btn-justify center'>Remove</button></div>";
              htmlData += "</div>";
              $("#data2").show();
              $("#dataremove1").hide();
              $("#dataremove1").html(htmlData);
              /*Add Table in the table  */
              var basicData = new Array();
              // headerdata.pop(data.product.name);

              const content_index = headerdata.indexOf(data.product.name);
              if (content_index > -1) {
                headerdata.splice(content_index, 1);
              }
              // alert(headerdata);
              const content_index1 = priceData.indexOf(data.product.price);
              if (content_index1 > -1) {
                priceData.splice(content_index1, 1);
              }
              
              const content_index2 = onroadpriceData.indexOf(data.product.on_roadprice);
              if (content_index2 > -1) {
                onroadpriceData.splice(content_index2, 1);
              }
              // basicData.push(headerdata);
              // alert(basicDataRemove);
              // basicDataRemove.pop(priceData);
              // basicDataRemove.pop(onroadpriceData);
              basicDataLength = basicDataRemove.length;
              // alert(basicDataRemove);
              var headerCount = headerdata.length;
              // alert(basicData);
              var table = '';
              if(headerCount>1){ 

              for(var thead=0;thead<1;thead++)
              {
                  table += '<thead>';
                  table += '<tr>';
                  for(var thcol = 0;thcol<headerCount;thcol++)
                  {
                    table += '<th scope="col">'+headerdata[thcol]+'</th>';
                  }
                  table += '</thead>';
                  table += '</tr>';
              }
              table += '<tbody>';
              for(var rows=0;rows<1;rows++)
              {
                  for(col=0;col<2;col++)
                  {
                    table += '<tr>';
                    table += '<td><strong>'+basicDataRemove[col][0]+'</strong></td>';
                    table += '<td>INR'+basicDataRemove[col][1]+'</td>';
                    if(basicDataRemove[col][2]!=undefined)
                    {
                      table += '<td>INR'+basicDataRemove[col][2]+'</td>';
                    }
                    table += '</tr>';
                  }
              }
              }

          
              const att_index = topspeed.indexOf(data.attData[7].attr_name1);
              if (att_index > -1) {
                topspeed.splice(att_index, 1);
              }

              const att_index1 = seating.indexOf(data.attData[8].attr_name1);
              if (att_index1 > -1) {
                seating.splice(att_index1, 1);
              }

              const att_index2 = BHP.indexOf(data.attData[9].attr_name1);
              if (att_index2 > -1) {
                BHP.splice(att_index2, 1);
              }

              const att_index3 = airbag.indexOf(data.attData[10].attr_name1);
              if (att_index3 > -1) {
                airbag.splice(att_index3, 1);
              }

              const att_index4 = transmission.indexOf(data.attData[11].attr_name1);
              if (att_index4 > -1) {
                transmission.splice(att_index4, 1);
              }

              const att_index5 = batterytype.indexOf(data.attData[12].attr_name1);
              if (att_index5 > -1) {
                batterytype.splice(att_index5, 1);
              }

              // topspeed.pop(data.attData[7].attr_name1);
              // seating.pop(data.attData[8].attr_name1);
              // BHP.pop(data.attData[9].attr_name1)
              // airbag.pop(data.attData[10].attr_name1)
              // transmission.pop(data.attData[11].attr_name1)
              // batterytype.pop(data.attData[12].attr_name1)
              // console.log(seating);
              // console.log(topspeed);


              // ["Top Speed",140]
              if(seating[0]!=undefined && seating[1]!=undefined ){
              if(seating[0]!=undefined){
              // console.log(data.attributValue);
              table += '<tr>';
              table += '<td class="title disable">Basic Information</td>';
              table += '</tr>';
              /*Start Seating  */
              table += '<tr>';
              table += '<td><strong>'+seating[0]+'</strong></td>';
              table += '<td>'+seating[1]+'</td>';
              if(seating[2]!=undefined)
                    {
              table += '<td>'+seating[2]+'</td>';
                    }
              table += '</tr>';
              /*End Seating  */
               }

               if(topspeed[0]!=undefined){
               /*Start Top Speed  */
               table += '<tr>';
              table += '<td><strong>'+topspeed[0]+'</strong></td>';
              table += '<td>'+topspeed[1]+'</td>';
              if(topspeed[2]!=undefined)
                    {
              table += '<td>'+topspeed[2]+'</td>';
                    }
              table += '</tr>';
              /*End Top Speed  */
                }

                if(BHP[0]!=undefined){
               /*Start BHP  */
               table += '<tr>';
              table += '<td><strong>'+BHP[0]+'</strong></td>';
              table += '<td>'+BHP[1]+'</td>';
              if(BHP[2]!=undefined)
                    {
              table += '<td>'+BHP[2]+'</td>';
                    }
              table += '</tr>';
              /*End BHP  */
                }

              if(airbag[0]!=undefined){
               /*Start airbag  */
               table += '<tr>';
              table += '<td><strong>'+airbag[0]+'</strong></td>';
              table += '<td>'+airbag[1]+'</td>';
              if(airbag[2]!=undefined)
                    {
              table += '<td>'+airbag[2]+'</td>';
                    }
              table += '</tr>';
              /*End airbag  */
              }

              if(transmission[0]!=undefined){
               /*Start transmission  */
               table += '<tr>';
              table += '<td><strong>'+transmission[0]+'</strong></td>';
              table += '<td>'+transmission[1]+'</td>';
              if(transmission[2]!=undefined)
                    {
              table += '<td>'+transmission[2]+'</td>';
                    }
              table += '</tr>';
              /*End transmission  */
              }

              if(batterytype[0]!=undefined){
               /*Start batterytype  */
               table += '<tr>';
              table += '<td><strong>'+batterytype[0]+'</strong></td>';
              table += '<td>'+batterytype[1]+'</td>';
              if(batterytype[2]!=undefined)
                    {
              table += '<td>'+batterytype[2]+'</td>';
                    }
              table += '</tr>';
              /*End batterytype  */
              }
              }



              table += '</table>';
              $("#table1").html('<table class="table table-responsive table-hover table-borderless table-striped table-compare">' + table + '</table>');
            /*Add end Table*/

            }
        });

}
</script>
@endsection

