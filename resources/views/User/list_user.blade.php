@extends('layout.master')
@section('title', 'Page Title')

@section('content')

    <div class="row">
    <div class="col-sm-12">
        <h3 class="text-left"> User List </h3>    
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Roles</th>
              <th scope="col">Create date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @if(count($users) > 0)
            @foreach($users as $user)

                <tr>
                  <th scope="row">{{ $i++ }}</th>
                  <td> {{ $user->name }} </td>
                  <td> {{ $user->email }} </td>
                  <td> 

                    @foreach($user->roles as $role)

                      <b> {{ $role->name }} </b> |

                    @endforeach

                  </td>
                  <td> {{ $user->created_at }} </td>
                  <td scope="col">
                    <a href="{{url('user/edit', $user->id)}}" class="btn btn-sm btn-info">Edit</a>
                  </td>
                </tr>

            @endforeach
            @endif

          </tbody>
        </table>

    </div>
    </div>
    


@stop