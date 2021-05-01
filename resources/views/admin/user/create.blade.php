
@extends('admin.master_file.header')
@section('title', 'Dashboard | Brand')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashboard')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('admin.user.index')}}"> Manage User</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Add User</li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

    @include('admin/message')
    @include('admin/errormessage')

  <div class="card1 shadow">
  <div class="card-body">


  <form action="{{route('admin.user.store')}}" method="post" enctype='multipart/form-data'>
    @csrf

   <div class="form-group">
      <label for="user"> User Name</label>
      <input type="text" required="" name="user_name" class="form-control" value="{{old('user_name')}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="email"> Email</label>
      <input type="text" required="" name="user_email" class="form-control" value="{{old('user_email')}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="password"> Password</label>
      <input type="text" required="" name="password" class="form-control" value="" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>


      <div class="form-group">
      <label for="password">Confirm Password</label>
      <input type="text" required="" name="password_confirmation" class="form-control" value="" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    Create User</button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')