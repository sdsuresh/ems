@extends('template.default')

@section('title', 'Users List')

@section('content')
    <div class="page-header">
      <h4>Users List <a href="{{ url('user/create') }}" class="btn btn-primary pull-right">Add User</a></h4>
    </div>

    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif

    <table class="table table-striped">
       <thead>
       <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Company</th>
          <th>Event List</th>
          <th>Action</th>
       </tr>
       </thead>
       <tbody>
          @foreach($users as $user)
          <tr>
             <td>{{ $user->first_name }}</td>
             <td>{{ $user->email }}</td>
             <td>{{ $user->company->name }}</td>
             <td>
              @if(count($user->events) > 0 )
                {{ $user->events->pluck('name')->implode(', ') }}
              @else
                {{ 'No events' }}
              @endif
             </td>
             <td><a href="{{route('users.edit',['id'=>$user->id])}}"><span class="">&#x270f;</span></a></td>
          </tr>
          @endforeach

          {{ $users->links() }}
       </tbody>
    </table>
@endsection
