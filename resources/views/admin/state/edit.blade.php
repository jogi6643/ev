
@extends('admin.master_file.header')
@section('title', 'Dashboard | Attributes')

@section('breadcrumb')

    <li class="breadcrumb-item">
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.states.index')}}"> Manage State </a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.states.create')}}"> Add State </a> 
    </li>
    <li class="breadcrumb-item active" aria-current="page">Edit State </li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">

  <form action="{{route('admin.states.update', $states->id)}}" method="post">
  
  @method('PUT')
  @csrf
  
    <div class="form-group">
      <label for="catagory"> State Name</label>
      <input type="text" name="name" class="form-control" value="{{$states->name}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
    
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Update State </button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')