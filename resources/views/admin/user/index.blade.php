
@extends('admin.master_file.header')
@section('title', 'Dashboard | Catagory')

@section('breadcrumb')

	<li class="breadcrumb-item">
    	<a href="{{url('admin/dashbord')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">User Manage</li>

@endsection

@section('body_content')

 	<div class="btn-right">
  		<a href="{{ route('admin.user.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    		<i class="fas fa-plus fa-sm text-white-50"></i> Create User
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
          <th>E-Mail</th>
          <th>Created_at</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>E-Mail</th>
          <th>Created_at</th>
          <th>Action</th>
        </tr>
      </tfoot>

    <tbody>

@if(count($users) > 0)
<?php $i = 1;?>
@foreach($users as $user)
      <tr>
        <td>{{$i}}</td>
        <td> {{ $user->name }} </td>
        <td> {{ $user->email }} </td>
        <td> {{ $user->created_at->format('d-M-Y') }} </td>
        <td>

          <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

         <!--<a href="#" class="btn btn-sm btn-warning" title="Trash">Trash</a>-->
        <!--   <a href="javascript:void(0)" onclick="deleteItem('{{$user->id}}')" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a> -->

        <!--   <form id="delete-record-{{$user->id}}" action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display: none;"> 
            @csrf
            @method('DELETE');
          </form> -->

        </td>
      </tr>
      <?php $i = $i+1; ?>
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

 @endsection