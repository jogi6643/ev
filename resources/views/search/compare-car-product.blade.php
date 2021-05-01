@extends('layout.customer')
@section('contents')

<div class="container" style="margin-top:30px; height:500px">
<form method="post" action="{{url('comparepost')}}">
           {{ csrf_field() }}
  <div class="row">
      <div class="col-md-3">
      <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Product</h5>

        <div class="input-group">
        <select class="custom-select" required id="brand_id" name="brandid1">
        @if( count($brand) > 0)
            <option value="">Select Brand/Model:</option>
            @foreach($brand as $brand)
                  <option value="{{$brand->id}}" {{($brand->id)==$brandid1?'selected':''}}>{{$brand->name}} </option>
            @endforeach
            @endif
        </select>
        </div>

        <div class="input-group">
        <select required class="custom-select" id="variant1" name="variant1"> 
        @if( count($variant1) > 0)
            @foreach($variant1 as $variant1)
                  <option value="{{$variant1->id}}" {{($variant1->id)==$product_id1?'selected':''}}> {{$variant1->name}} </option>
            @endforeach
            @endif
        </select>
        </div>

        </div>
      </div>
      </div>

      <div class="col-md-3">
       <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Product</h5>
        <div class="input-group">
        <select class="custom-select" id="brand_id1" name="brandid2">
           @if( count($brand1) > 0)
            <option selected>Select Brand/Model:</option>
            @foreach($brand1 as $brand)
                  <option value="{{$brand->id}}" {{($brand->id)==$brandid2?'selected':''}} > {{$brand->name}} </option>
            @endforeach
            @endif
        </select>
        </div>

        <div class="input-group">
        <select class="custom-select" required id="variant2" name="variant2">
            <option selected>Select Variant:</option>
            @if( count($variant2) > 0)
            @foreach($variant2 as $variant2)
                  <option value="{{$variant2->id}}" {{($variant2->id)==$product_id2?'selected':''}}> {{$variant2->name}} </option>
            @endforeach
            @endif
        </select>
        </div>

        </div>
      </div>
      </div>

      <div class="col-md-3">
       <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Product</h5>
        <div class="input-group">
        <select class="custom-select" id="brand_id2" name="brandid3">
        @if( count($brand2) > 0)
            <option selected>Select Brand/Model:</option>
            @foreach($brand2 as $brand)
                  <option value="{{$brand->id}}" {{($brand->id)==$brandid3?'selected':''}}> {{$brand->name}} </option>
            @endforeach
            @endif
        </select>
        </div>

        <div class="input-group">
        <select class="custom-select" required id="variant3" name="variant3">
            <option value="">Select Variant:</option>
            @if( count($variant3) > 0)
            @foreach($variant3 as $variant3)
                  <option value="{{$variant3->id}}" {{($variant3->id)==$product_id3?'selected':''}}> {{$variant3->name}} </option>
            @endforeach
            @endif
        </select>
        </div>

        </div>
      </div>
      </div>

      <div class="col-md-3">
       <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add product</h5>
        <div class="input-group">
        <select class="custom-select" id="brand_id3" name="brandid4">
        @if( count($brand3) > 0)
            <option selected>Select Brand/Model:</option>
            @foreach($brand3 as $brand)
                  <option value="{{$brand->id}}" {{($brand->id)==$brandid4?'selected':''}}> {{$brand->name}} </option>
            @endforeach
            @endif
        </select>
        </div>

        <div class="input-group">
        <select class="custom-select" required id="variant4" name="variant4">
            <option value="">Select Variant:</option>
            @if( count($variant4) > 0)
            @foreach($variant4 as $variant4)
                  <option value="{{$variant4->id}}" {{($variant4->id)==$product_id4?'selected':''}}> {{$variant3->name}} </option>
            @endforeach
            @endif
        </select>
        </div>

        </div>
      </div>
      </div>
  </div>
  <div class="comparecarbtn">
      <button type="submit" class="btn btn-danger btn-lg">Compare Car</button>
  </div>
  </form>
<div class="container" style="margin-top:30px">
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Basic Information</th>
        @if($productdet1!='No')
        <th>{{$productdet1->name}}</th>
        @endif
        @if($productdet2!='No')
        <th>{{$productdet2->name}}</th>
         @endif
        @if($productdet3!='No')
        <th>{{$productdet3->name}}</th>
        @endif
        @if($productdet4!='No')
        <th>{{$productdet4->name}}</th>
        @endif

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>On Road price</td>
        @if($productdet1!='No')
        <td>{{$productdet1->on_roadprice}}</td>
        @endif
        @if($productdet2!='No')
        <td>{{$productdet2->on_roadprice}}</td>
        @endif
        @if($productdet3!='No')
        <td>{{$productdet3->on_roadprice}}</td>
        @endif
        @if($productdet4!='No')
        <td>{{$productdet4->on_roadprice}}</td>
        @endif
      </tr>
      <tr>
        <td>Price</td>
        @if($productdet1!='No')
        <td>{{$productdet1->price}}</td>
        @endif
        @if($productdet2!='No')
        <td>{{$productdet2->price}}</td>
        @endif
        @if($productdet3!='No')
        <td>{{$productdet3->price}}</td>
        @endif
        @if($productdet4!='No')
        <td>{{$productdet4->price}}</td>
        @endif
      </tr>
    </tbody>
  </table>
</div>

</div>

@endsection

