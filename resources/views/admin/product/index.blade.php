
@extends('admin.master_file.header')
@section('title', 'Dashboard | Catagory')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashbord')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Product Manage</li>

@endsection

@section('body_content')

  <div class="btn-right">
      <a href="{{ route('admin.product.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Product
      </a>
    </div>

  <!-- Content Row -->
  <div class="row1">
     @include('admin/errormessage')
 <!-- DataTales Example -->
          <div class="card1 shadow">
            <div class="card-header1 py-2">
              <div class="m0 font-weight-bold text-primary" align="right">
                <form action="product" method="get" accept-charset="utf-8">
                 <input type="text" name="query">
                  
                </form>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr.</th>
                      <th>Brand</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Category</th>
                      <th>Product Type</th>
                      <th>Price</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sr.</th>
                      <th>Brand</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Category</th>
                      <th>Product Type</th>
                      <th>Price</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>


                  @if(count($products) > 0)  
                  @foreach($products as $product)
                    <tr data-index='{{$product->id}}' data-position='{{$product->position}}' data-table='product' class="ui-state-default" style="background:#4238ea; color:white;">
                      <td class="ui-cursor">{{$product->position}}</td>
                      <td>{{$product->getBrandName()}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->getMasterCategoryName()}}</td>
                      <td>{{$product->getCategoryName()}} </td>
                      <td>{{ ucwords($product->product_type)}} </td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->created_at->format('d-M-Y')}}</td>
                      <td>
                          <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                          <a href="javascript::void(0)" class="btn btn-sm btn-{{($product->status)==1?'success':'warning'}}" title="Active" onclick="active('{{$product->id}}','product')">{{($product->status)==1?'Active':'In-active'}}</a>

                          <img src="{{url('public/tenor.gif')}}" id="positioLoding" class="loading" style="display:none;" />
                     </td>

                    @foreach($product->productChildren as $child)

                      <tr data-index='{{$child->id}}' data-position='{{$child->position}}' data-table='product' class="ui-state-default">

                      <td class="ui-cursor">{{$child->position}}</td>
                      <td>{{$product->getBrandName()}}</td>
                      <td>{{$child->name}}</td>
                      <td>{{$child->getMasterCategoryName()}}</td>
                      <td>{{$child->getCategoryName()}} </td>
                      <td>{{ ucwords($child->product_type)}} </td>
                      <td>{{$child->price}}</td>
                      <td>{{$child->created_at->format('d-M-Y')}}</td>
                      <td>
                          <a href="{{ route('admin.product.edit', $child->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                          <a href="javascript::void(0)" class="btn btn-sm btn-{{($child->status)==1?'success':'warning'}}" title="Active" onclick="active('{{$child->id}}','product')">{{($child->status)==1?'Active':'In-active'}}</a>

                          <img src="{{url('public/tenor.gif')}}" id="positioLoding" class="loading" style="display:none;" />
                     </td>

                    </tr>
                    @endforeach

                    </tr>

                  @endforeach 
                  @else
                    <h5>No Record..</h5> 
                  @endif

                  </tbody>
                </table>
              </div>
            </div>
          </div>


  </div>
  <!-- Content Row -->


 @endsection

 @section('scriptSection')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{url('public/js/custom.js')}}"></script>
@endsection
