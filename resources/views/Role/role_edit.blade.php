
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

    <h2> Edit Role </h2><br>
            <form action="{{url('role/update', $roleEdit->id)}}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{$roleEdit->name}}">
            <div><br>
            <button type="submit" class="btn btn-primary">Add Role</button>
            </form>
    </div>
    </div>
@stop