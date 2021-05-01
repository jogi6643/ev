
@extends('admin.master_file.header')
@section('title', 'Dashboard | Manage Brand')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashbord')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"> Manage Brand</li>

@endsection

@section('body_content')

 	<div class="btn-right">
  		<a href="{{ route('admin.brand.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    		<i class="fas fa-plus fa-sm text-white-50"></i> Create Brand
    	</a>
    </div>

  <!-- Content Row -->
  <div class="row1">

    <div class="card1 shadow">
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered sortable" id="dataTable" width="100%" cellspacing="0">

      <thead>
        <tr>
          <th>Sr.</th>
          <th>Name</th>
          <th>Created_at</th>
          <th width="150px;" style="text-align: center !important;">Featured</th>
          <th width="150px;" style="text-align: center !important;">Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sr.</th>
          <th>Name</th>
          <th>Created_at</th>
          <th width="150px;" style="text-align: center !important;">Featured</th>
          <th width="150px;" style="text-align: center !important;">Action</th>
        </tr>
      </tfoot>

    <tbody>
@if(count($brands) > 0)
@foreach($brands as $brand)
      <tr data-index='{{$brand->id}}' data-position='{{$brand->position}}' data-table='brand' class="ui-state-default">
        <td class="ui-cursor"> {{ $brand->position }}</td>
        <td>{{$brand->name}}</td>

        <td>{{$brand->created_at->format('d-M-Y')}} </td>
        <td width="150px;" style="text-align: center !important;">

          <a href="javascript::void(0)" class="btn btn-sm btn-{{($brand->featured)==1?'success':'warning'}}" title="Active" onclick="active2('{{$brand->id}}','{{$brand->featured}}')">{{($brand->featured)==1?'Yes':'No'}}</a>

          <img src="{{url('public/tenor.gif')}}" id="positioLoding" class="loading" style="display:none;" />

          <!-- <a href="javascript:void(0)" onclick="deleteItem({{$brand->id}})" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>

          <form id="delete-record-{{$brand->id}}" action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST" style="display: none;"> 
            @csrf
            @method('DELETE');
          </form> -->

        </td>
        <td width="150px;" style="text-align: center !important;">

          <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

          <a href="javascript::void(0)" class="btn btn-sm btn-{{($brand->status)==1?'success':'warning'}}" title="Active" onclick="active1('{{$brand->id}}','{{$brand->status}}')">{{($brand->status)==1?'Active':'In-active'}}</a>

          <img src="{{url('public/tenor.gif')}}" id="positioLoding" class="loading" style="display:none;" />

          <!-- <a href="javascript:void(0)" onclick="deleteItem({{$brand->id}})" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>

          <form id="delete-record-{{$brand->id}}" action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST" style="display: none;"> 
            @csrf
            @method('DELETE');
          </form> -->

        </td>
      </tr>
@endforeach
@else 
  <h4 class="text-center"> No Record Avilable </h4>
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

  <script type="text/javascript">
  function active1(brand_id,status)
  {
   // alert(brand_id);
    $.ajax({
            type:'POST',
            url: "{{url('admin/brand-status')}}",
            data: {brand_id:brand_id,status:status},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              // alert(data.status);
              if(confirm("Do you really want to change status.."))
               window.location.href='{{url("/admin/brand")}}';
            }
        });

  }
</script>
<script type="text/javascript">
  function active2(brand_id,featured)
  {
   // alert(brand_id);
    $.ajax({
            type:'POST',
            url: "{{url('admin/brand-featured')}}",
            data: {brand_id:brand_id,featured:featured},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              // alert(data.status);
              if(confirm("Do you really want to change status.."))
               window.location.href='{{url("/admin/brand")}}';
            }
        });

  }
</script>