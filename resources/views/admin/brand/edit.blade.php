
@extends('admin.master_file.header')
@section('title', 'Dashboard | Brand')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashboard')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('admin.brand.index')}}"> Manage Brand</a>
  </li>
   <li class="breadcrumb-item">
    <a href="{{route('admin.brand.create')}}"> Add Brand</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">


  <form action="{{route('admin.brand.update', $brands->id)}}" method="post" enctype='multipart/form-data'>
    @csrf
    @method('PUT')
   
    <input hidden="" name="slug" id="slugUlr" value="{{$brands->slug}}">

    <div class="form-group">
      <label for="catagory"> Brand Name</label>
      <input type="text" name="name" class="form-control" value="{{$brands->name}}" id="keyup" autocomplete="off">
      <br><div>
            <span >Update Brand Logo<br>
            <i class="fa fa-plus"></i>
            <input id="popular_button" type="file" name="popular_files" accept="image/x-png, image/gif, image/jpeg,image/jpg">
            <input type="text" value="{{$brands->logo}}" name="popular_files" id="popular_button" hidden="">
            <img src="{{asset('public/server/logo')}}/<?php echo $brands->logo ?>"  width="10%"/>
            </span>  
        </div><br>
 <!--      <sapn class="text-class"> {{url('/')}}/
          <sapn id="showUrl"> {{old('slug')}} </sapn>
      </sapn><br> -->
      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>


    <!-- <div class="form-group">
      <label for="discription">Description</label>
       <textarea cols="80" id="editor" name="discription" rows="10" data-sample-short>{{old('discription')}}</textarea>
    </div>
     -->
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    Update Brand</button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')