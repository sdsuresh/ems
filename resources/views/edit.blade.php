@extends('template.emp')

@section('title', 'Edit Employee detail')

@section('content')
@if(count($errors) > 0)

<ul class="alert alert-danger">
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>

@endif
<form method="post" action = "{{ route('employee.update') }}">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $employee->name }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Age</label>
    <input type="text" class="form-control" placeholder="Enter Age" name="age" value="{{ $employee->age }}">
  </div>
  <input type="hidden" name="id" value="{{ $employee->id }}">
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection