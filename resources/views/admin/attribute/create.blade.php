
@extends('admin.master_file.header')
@section('title', 'Dashboard | Attributes')

@section('breadcrumb')

	<li class="breadcrumb-item" aria-current="page">
    	<a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
      <a href="{{route('admin.attribute.index')}}"> Manage Attributes </a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Attribute </li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">

  <form action="{{route('admin.attribute.store')}}" method="post" enctype='multipart/form-data'>

  @csrf

    <!-- <div class="form-group">
      <label for="pwd">Select Category</label>
      <select name="category_id[]" class="form-control" id="select2" multiple>

        @if( count($categories) > 0)
        <option value="0"> Root Parent </option>
        option
        @foreach($categories as $category)
          <option value="{{$category->id}}"> {{$category->name}} </option>
        @endforeach
        @endif
        option

      </select>

    </div> -->

    <input type="hidden" name="slug" id="slugUlr" value="{{old('slug')}}">
    <div class="form-group">
      <label for="catagory"> Attribute Name</label>
      <input type="text" name="name" class="form-control" value="{{old('name')}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
    
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Create Attribute </button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')