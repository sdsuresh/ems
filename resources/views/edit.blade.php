@extends('template.default')

@section('title', 'Create User')

@section('content')
    <div class="page-header">
      <h4>Edit user <a href="{{ url('/') }}" class="btn btn-warning pull-right">Back</a></h4>
    </div>

    @if(count($errors) > 0)
        <ul class="alert alert-danger">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    @endif

    <form method="post" action="{{ route('users.update') }}">
          @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">First Name</label>
        <input type="text" class="form-control" name="first_name" value={{ $user->first_name }}>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput2">Last Name</label>
        <input type="text" class="form-control" name="last_name" value={{ $user->last_name }}>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput2">Email</label>
        <input type="email" class="form-control" name="email" value={{ $user->email }}>
      </div>

      <div class="form-group">
        <label>Company</label>
        <select class="form-control" name="company_id">
          @foreach($companies as $company)
            <option @if($company->id == $user->company_id) {{ 'selected' }} @endif  value="{{$company->id}}">{{$company->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Events (Multiple Select)</label><br/>
          @foreach($events as $event)
          <div class="form-check form-check-inline">
            <input @if(in_array($event->id, $user->events->pluck('id')->toArray())) {{ 'checked' }} @endif
                class="form-check-input" type="checkbox" name="events[]" value="{{$event->id}}">
            <label class="form-check-label">{{$event->name}}</label>
          </div>
          @endforeach
      </div>
      <input type="hidden" name="id" value = "{{$user->id}}">
      <button type="submit" class="btn btn-primary">Update User</button>
    </form>
@endsection
