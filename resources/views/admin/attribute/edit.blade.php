
@extends('admin.master_file.header')
@section('title', 'Dashboard | Attributes')

@section('breadcrumb')

    <li class="breadcrumb-item">
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.attribute.index')}}"> Manage Attributes </a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.attribute.create')}}"> Add Attribute </a> 
    </li>
    <li class="breadcrumb-item active" aria-current="page">Edit Attribute </li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">

  <form action="{{route('admin.attribute.update', $attributes->id)}}" method="post">
  
  @method('PUT')
  @csrf
  
    <input type="hidden" name="slug" id="slugUlr" value="{{old('slug')}}">
    <div class="form-group">
      <label for="catagory"> Attribute Name</label>
      <input type="text" name="name" class="form-control" value="{{$attributes->name}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
    
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Update Attribute </button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')