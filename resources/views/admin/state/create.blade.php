
@extends('admin.master_file.header')
@section('title', 'Dashboard | States')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
      <a href="{{route('admin.states.index')}}"> Manage States </a></li>
    <li class="breadcrumb-item active" aria-current="page">Add States </li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">

  <form action="{{route('admin.states.store')}}" method="post" enctype='multipart/form-data'>
  @csrf
    <div class="form-group">
      <label for="catagory"> State Name</label>
      <input type="text" name="name" class="form-control" value="{{old('name')}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
    
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Create State </button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')