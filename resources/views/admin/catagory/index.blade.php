
@extends('admin.master_file.header')
@section('title', 'Dashboard | Catagory')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashbord')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Catagory Manage</li>

@endsection

@section('body_content')

 	<div class="btn-right">
  		<a href="{{ route('admin.category.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    		<i class="fas fa-plus fa-sm text-white-50"></i> Create Catagory
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
          <th>Type</th>
          <th>Description</th>
          <th>Created_at</th>
          <th width="150px;" style="text-align: center !important;">Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sr.</th>
          <th>Name</th>
          <th>Type</th>
          <th>Description</th>
          <th>Created_at</th>
          <th width="150px;" style="text-align: center !important;">Action</th>
        </tr>
      </tfoot>

    <tbody>
@if(count($categories) > 0)
@foreach($categories as $category)
      <tr data-index='{{$category->id}}' data-position='{{$category->position}}' data-table='category' class="ui-state-default">
        <td class="ui-cursor"> {{ $category->position}}</td>
        <td>{{$category->name}}</td>
        <td>
            <?php
            if(count($category->mastercategories)>0){
              foreach($category->mastercategories as $child){
                echo '&nbsp; -'.$child->name .'<br>';
              }
            }else{echo '<b>Parent Category</b>';}
            ?>
        </td>
        <td>{!! $category->discription !!}</td>
        <td>{{$category->created_at->format('d-M-Y')}} </td>
        <td width="150px;" style="text-align: center !important;">

          <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

          <a href="javascript::void(0)" class="btn btn-sm btn-{{($category->status)==1?'success':'warning'}}" title="Active" onclick="active('{{$category->id}}','{{$category->status}}')">{{($category->status)==1?'Active':'In-active'}}</a>

          <img src="{{url('public/tenor.gif')}}" id="positioLoding" class="loading" style="display:none;" />

          <!-- <a href="javascript:void(0)" onclick="deleteItem({{$category->id}})" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>

          <form id="delete-record-{{$category->id}}" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: none;"> 
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

<script src="{{url('public/admin/js/custom.js')}}"></script>
@endsection

<!--Start  Active Button  -->
<script type="text/javascript">
  function active(cat_id,status)
  {
    
    $.ajax({
            type:'POST',
            url: "{{url('admin/category-status')}}",
            data: {cat_id:cat_id,status:status},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              // alert(data.status);
              if(confirm("Do you really want to change status.."))
               window.location.href='{{url("/admin/category")}}';
            }
        });

  }
</script>
<!-- End Active Button -->