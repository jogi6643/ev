
@extends('layout.master')
@section('title', 'Page Title')

@section('content')

    <div class="row">
    <div class="col-sm-6"1>

         @if (Session::has('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{ Session::get('message') }}</li>
            </ul>
        </div>
        @endif

            <form action="{{url('user/store')}}" method="post">
                @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1">
            <div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1">
            <div><br>

            <div class="form-group form-check">
             <div class="row">   
                @if(count($roles) > 0)
                @foreach($roles as $role)

               <div class="col-sm-3">
                <input type="checkbox" class="form-check-input" name="role[]" value="{{$role->id}}">
                <label class="form-check-label" for="exampleCheck1">{{ $role->name }}</label>
                </div>

                @endforeach
                @endif
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>


    </div>
    </div>
    


@stop