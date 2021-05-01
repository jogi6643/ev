
@extends('admin.master_file.header')
@section('title', 'Dashboard | Co-admins')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
      <a href="{{route('admin.role.index')}}"> Manage Roles </a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Role </li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">

  <form action="{{route('admin.role.store')}}" method="post" enctype='multipart/form-data'>
  @csrf
    <div class="form-group">
      <label for="catagory">  Role</label>
      <input type="text" name="name" class="form-control" value="{{old('name')}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

  
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Create Role </button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')