
@extends('layout.master')
@section('title', 'Page Title')

@section('content')

    <div class="row">
    <div class="col-sm-6 offset-sm-3">

    @if (Session::has('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{ Session::get('message') }}</li>
            </ul>
        </div>
    @endif

    <h2> Add Role </h2><br>
            <form action="{{url('role/create')}}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter Role Here..">
            <div><br>
            <button type="submit" class="btn btn-primary">Add Role</button>
            </form>

    </div>
    </div>
    
@stop