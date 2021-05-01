
@extends('admin.master_file.header')
@section('title', 'Dashboard | Catagory')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashboard')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('admin.category.index')}}">Catagory Manage</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Add Catagory</li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">


  <form action="{{route('admin.category.store')}}" method="post" enctype='multipart/form-data'>

    @csrf
   
    <input type="hidden" name="slug" id="slugUlr" value="{{old('slug')}}">
   
    <div class="form-group">
      <label for="pwd">Select Category:</label>
      <select name="master_cat_id[]" class="form-control" id="select222">

        @if( count($mastercategorys) > 0)
        <option value="0"> --select-- </option>
        option
        @foreach($mastercategorys as $mastercategory)
          <option value="{{$mastercategory->id}}"> {{$mastercategory->name}} </option>
        @endforeach
        @endif
        option
      </select>
    </div>

    <div class="form-group">
      <label for="catagory"> Catagory Name</label>
      <input type="text" name="name" class="form-control" value="{{old('name')}}" id="keyup" autocomplete="off">

      <sapn class="text-class"> {{url('/')}}/
          <sapn id="showUrl"> {{old('slug')}} </sapn>
      </sapn><br>
      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="pwd">Select Attribute:</label>
      <select name="attribute[]" class="form-control" id="select2" multiple>

        @if( count($attributes) > 0)
        <option value="0"> --select-- </option>
        option
        @foreach($attributes as $attribute)
          <option value="{{$attribute->id}}"> {{$attribute->name}} </option>
        @endforeach
        @endif
        option
      </select>
    </div>

    <div class="form-group">
      <label for="discription">Description</label>
       <textarea cols="80" id="editor" name="discription" rows="10" data-sample-short>{{old('discription')}}</textarea>
    </div>
    
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    Create catagory</button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')