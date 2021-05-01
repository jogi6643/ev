
@extends('admin.master_file.header')
@section('title', 'Dashboard | Catagory')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashboard')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('admin.category.index')}}">Catagory Manage</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('admin.category.create')}}">Add Catagory</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Edit Catagory</li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">


  <form action="{{route('admin.category.update',$catagorys->id)}}" method="post" enctype='multipart/form-data'>

    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="pwd">Select Category:</label>
      <select name="master_cat_id[]" class="form-control" id="select222">

        @if( count($mastercategorys) > 0)
        <option value="0"> --select-- </option>
        option
        @foreach($mastercategorys as $mastercategory)
          <option value="{{$mastercategory->id}}" {{($mastercategory->id)==$catagorys->mastercategories[0]->id ? 'selected':''}}> {{$mastercategory->name}} </option>
        @endforeach
        @endif
        option
      </select>
    </div>


    <div class="form-group">
      <label for="catagory"> Catagory Name</label>
      <input type="text" name="name" class="form-control" value="{{$catagorys->name}}" id="keyup" autocomplete="off">
      <input type="hidden" name="slug" id="slugUlr" value="{{old('slug')}}">

      <sapn class="text-class"> {{url('/')}}/
          <sapn id="showUrl"> {{old('slug')}} </sapn>
      </sapn><br>
      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <?php
        $ids = (isset($catagorys->attribute) && $catagorys->attribute->count() > 0) ? array_pluck($catagorys->attribute, 'id') : null;
    ?>

    <div class="form-group">
      <label for="pwd">Select Attribute:</label>
      <select name="attribute[]" class="form-control" id="select2" multiple>

        @if( count($attributes) > 0)
        <option value="0"> --select-- </option>
        option
        @foreach($attributes as $attribute)
          <option value="{{$attribute->id}}" @if(!is_null($ids) && in_array($attribute->id, $ids)) {{'selected'}} @endif> {{$attribute->name}} </option>
        @endforeach
        @endif
        option
      </select>
    </div>

    <div class="form-group">
      <label for="discription">Description</label>
       <textarea cols="80" id="editor" name="discription" rows="10" data-sample-short>{{$catagorys->name}}</textarea>
    </div>
    
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
     Catagory Update</button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')