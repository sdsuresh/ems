@extends('template.emp')

@section('title', 'Create User')

@section('content')

@if(\Session::has('success'))

<div class="alert alert-success">
  {{ \Session::get('success') }}
</div>

@endif

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sl. No</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Age</th>
      <th scope="col">Date of Joining</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($employees as $key=>$emp)
    @php $i = 1; @endphp
    <tr>
      <th scope="row">@php echo $key+1 @endphp</th>
      <td>{{ $emp->name }}</td>
      <td>{{ $emp->age }}</td>
      <td>{{ date('d M Y', strtotime($emp->created_at)) }}</td>
      <td><a href="{{ route('employee.edit', ['id' => $emp->id]) }}"><span>&#x270f;</span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection