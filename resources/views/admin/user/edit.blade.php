
@extends('admin.master_file.header')
@section('title', 'Dashboard | Attributes')

@section('breadcrumb')

    <li class="breadcrumb-item">
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.user.index')}}"> Manage User </a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.attribute.create')}}"> Add User </a> 
    </li>
    <li class="breadcrumb-item active" aria-current="page">Edit User </li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')
   
   @include('admin/errormessage')
  <div class="card1 shadow">
  <div class="card-body">

  <form action="{{route('admin.user.update', $user->id)}}" method="post">
  
  @method('PUT')
  @csrf
  
    
    <div class="form-group">
      <label for="name"> User Name</label>
      <input type="text" name="user_name" class="form-control" value="{{$user->name}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="email"> Email</label>
      <input type="text" name="user_email" class="form-control" value="{{$user->email}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="password"> Password</label>
      <input type="text" name="password" required="" class="form-control" value="" id="keyup" autocomplete="off">

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
    
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Update User </button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')