
@extends('admin.master_file.header')
@section('title', 'Dashboard | Co-admin')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashbord')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"> Manage Co-admins </li>

@endsection

@section('body_content')

 	<div class="btn-right">
  		<a href="{{ route('admin.role.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    		<i class="fas fa-plus fa-sm text-white-50"></i> Create Co-admin
    	</a>
    </div>

  <!-- Content Row -->
  <div class="row1">

    <div class="card1 shadow">
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

      <thead>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Role</th>
          <th>Created_at</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Role</th>
          <th>Created_at</th>
          <th>Action</th>
        </tr>
      </tfoot>

    <tbody>
@if(count($label) > 0)
<?php $i = 1; ?>
@foreach($label as $label)
      <tr>
        <td>{{$i}}</td>
        <td>{{$label->name}}</td>
        <td>{{$label->label}}</td>
        <td>{{$label->created_at}}</td>
        <td>
        <a href="{{ route('admin.role.edit', $label->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
        <a href="javascript::void(0)" class="btn btn-sm btn-{{($label->status)==1?'success':'warning'}}" title="Active" onclick="active('{{$label->id}}','{{$label->status}}')">{{($label->status)==1?'Active':'In-active'}}</a>
        </td>
      </tr>
      <?php $i = $i+1;?>
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
  <script>
    function deleteItem(id){
       var choice = confirm("Are you want sure DELETE this item..");
       if(choice){
         var ck =  document.getElementById('delete-record-'+id).submit();
       }
    }
  </script>

  <script type="text/javascript">
  function active(co_id,status)
  {
    $.ajax({
            type:'POST',
            url: "{{url('admin/role-status')}}",
            data: {co_id:co_id,status:status},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              // alert(data.status);
              if(confirm("Do you really want to change status.."))
               window.location.href='{{url("/admin/coadmin")}}';
            }
        });

  }
</script>
@endsection