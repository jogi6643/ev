@extends('layout.master')
@section('title', 'Page Title')

@section('content')

    <div class="row">
    <div class="col-sm-6 offset-sm-3">
        <h3 class="text-left"> Role List </h3>    
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Role</th>
              <th scope="col">Create date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            @if(count($roles) > 0)
            @foreach($roles as $role)

                <tr>
                  <th scope="row">1</th>
                  <td> {{ $role->name }} </td>
                  <td> {{ $role->created_at }} </td>
                  <td scope="col">
                    <a href="{{url('role/edit', $role->id)}}" class="btn btn-sm btn-info">Edit</a>
                  </td>
                </tr>

            @endforeach
            @endif

          </tbody>
        </table>

    </div>
    </div>
    
@stop