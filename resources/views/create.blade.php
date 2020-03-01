@extends('template.default')

@section('title', 'Create User')

@section('content')
    <div class="page-header">
      <h4>Create user <a href="{{ url('/') }}" class="btn btn-warning pull-right">Back</a></h4>
    </div>

    @if(count($errors) > 0)
        <ul class="alert alert-danger">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    @endif

    <form method="post" action="{{ route('users.store') }}">
          @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">First Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="first_name" placeholder="First Name"
        value="{{old('first_name')}}">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput2">Last Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" name="last_name" placeholder="Last Name"
        value="{{old('last_name')}}">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput2">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput3" name="email" placeholder="Email"
        value="{{old('email')}}">
      </div>

      <div class="form-group">
        <label>Company</label>
        <select class="form-control" name="company_id">
          <option value="">Select</option>
          @foreach($companies as $company)
            <option value="{{$company->id}}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{$company->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Events (Multiple Select)</label><br/>
          @foreach($events as $event)
          <div class="form-check form-check-inline">
            <input {{ (is_array(old('events')) and in_array($event->id, old('events'))) ? ' checked' : '' }} class="form-check-input" type="checkbox" name="events[]" value="{{$event->id}}">
            <label class="form-check-label">{{$event->name}}</label>
             </div>
          @endforeach
      </div>

      <button type="submit" class="btn btn-primary">Create User</button>
    </form>
@endsection
