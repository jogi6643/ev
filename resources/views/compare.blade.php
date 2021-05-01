@extends('layout.customer')
@section('contents')

<!--COMPARE NAV END-->

<!--Right car full search Banner-->
<div class="search-banner1" style="background-image:url(assets/img/Find-Car.png);">
  <div class="banner-tint">
    <div  class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <h2 class="a1 text-center mg1">Find the the right car</h2>
          <div class="input-group input-group-lg mb-3">
            <input type="text" class="form-control" placeholder="Search by name" aria-label="Search by name" aria-describedby="button-addon2">
            <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Right car full search Banner-->

<!--Compare Listing Manager-->
  <div class="container">
    <div class="row compare-card-holder">
        <div class="col-sm-4">
          <div class="compare-card text-center">
            <img src="assets/img/compare-car1.jpg" width="100%">
            <h4 class="vehicle-name">Hyundai Creta</h4>
            <h5 class="vehicle-price">&#8377; 17.98 Lakh*</h5>
            <!--Select vehicle to compare-->
              <div class="d-grid gap-2 col-6 mx-auto"><button type="button" class="btn btn-dark btn-justify center">Remove</button></div>
              <!--Select vehicle to compare END-->
          </div>
        </div>
        <div class="col-sm-4">
          <div class="compare-card text-center">
            <div class="mg3">
              <a href="#" class="comapre-add"><img src="assets/img/plus.png"></a>
              <h4>Add car to compare</h4>
              <!--Select vehicle to compare-->
                <div class="form-holder">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select Manufacturer</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="form-holder">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Vehicle Name</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button type="button" class="btn btn-dark btn-justify center">Add to compare</button></div>
                <!--Select vehicle to compare END-->
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="compare-card text-center">
            <div class="mg3">
              <a href="#" class="comapre-add"><img src="assets/img/plus.png"></a>
              <h4>Add car to compare</h4>
              <!--Select vehicle to compare-->
                <div class="form-holder">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select Manufacturer</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="form-holder">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Vehicle Name</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"><button type="button" class="btn btn-dark btn-justify center">Add to compare</button></div>
                <!--Select vehicle to compare END-->
            </div>
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

<!--Vehicle Listing-->
<div class="container">
  <div class="row">
    <h4 class="a5">Latest EV Automobiles</h4>
    <div class="owl-carousel owl-theme">
        
        <div class="item vehicle-slide-card" style="background-image:url(assets/img/Altroz.png);">
          <div  class="card-tint">
            <div class="content">
              <div class="name">Altroz EV</div>
              <div class="price">INR 6.79-11 Lakh</div>
              <div class="note">Ex. Showroom Price</div>
            </div>
          </div>
        </div>

        <div class="item vehicle-slide-card" style="background-image:url(assets/img/Scooter.png);">
          <div  class="card-tint">
            <div class="content">
              <div class="name">Scooter EV</div>
              <div class="price">INR 1.79-2 Lakh</div>
              <div class="note">Ex. Showroom Price</div>
            </div>
          </div>
        </div>

        <div class="item vehicle-slide-card" style="background-image:url(assets/img/Kia.png);">
          <div  class="card-tint">
            <div class="content">
              <div class="name">KIA EV</div>
              <div class="price">INR 11.79-14 Lakh</div>
              <div class="note">Ex. Showroom Price</div>
            </div>
          </div>
        </div>

        <div class="item vehicle-slide-card" style="background-image:url(assets/img/Scooter.png);">
          <div  class="card-tint">
            <div class="content">
              <div class="name">Scooter EV</div>
              <div class="price">INR 1.79-2 Lakh</div>
              <div class="note">Ex. Showroom Price</div>
            </div>
          </div>
        </div>

        <div class="item vehicle-slide-card" style="background-image:url(assets/img/Altroz.png);">
          <div  class="card-tint">
            <div class="content">
              <div class="name">Altroz EV</div>
              <div class="price">INR 6.79-11 Lakh</div>
              <div class="note">Ex. Showroom Price</div>
            </div>
          </div>
        </div>

      </div>
  </div>
</div>
<!--Vehicle Listing END-->

@endsection