
@extends('admin.master_file.header')
@section('title', 'Dashboard | Co-admins')

@section('breadcrumb')

    <li class="breadcrumb-item">
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.attribute.index')}}"> Manage Co-admins </a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.attribute.create')}}"> Add Co-admin </a> 
    </li>
    <li class="breadcrumb-item active" aria-current="page">Edit Co-admin </li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')

  <div class="card1 shadow">
  <div class="card-body">

  <form action="{{route('admin.coadmin.update', $coadmin->id)}}" method="post">
  
  @method('PUT')
  @csrf

    <div class="form-group">
      <label for="catagory">Email</label>
      <input type="text" name="name" class="form-control" value="{{$coadmin->name}}" id="keyup" autocomplete="off">

      @if ($errors->has('name'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
 
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" class="form-control" value="{{$coadmin->phone}}" id="keyup" autocomplete="off">

      @if ($errors->has('phone'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="pwd">Select Type:</label>
      <select name="roleid" class="form-control" id="roleid">

        @if( count($label) > 0)
        <option value=""> -- </option>
        option
        @foreach($label as $label)
          <option value="{{$label->id}}" {{($label->id)==$coadmin->role ? 'selected':''}}> {{$label->name}} </option>
        @endforeach
        @endif
        option
      </select>
     </div>
    
   
    <div class="form-group">
      <label for="catagory">Email</label>
      <input disabled type="text" name="email1" class="form-control" value="{{$coadmin->email}}" id="keyup" autocomplete="off">

      @if ($errors->has('email'))
          <span class="invalid-field" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>
    
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Update Co-admin </button>

  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@include('admin/script-file/scriptFile')