@extends('app')

@section('content')
    <div class="container">



<div class="row">
  <form action="{{ route('filter-patients') }}" method="GET">

<table class="table table-striped table-bordered mr-5">
    <thead class="table-dark">
        <tr>
            <th>Township</th>
            <th>Serial Number</th>
            <th>Registration Date</th>
            <th>Name</th>
            <th>Sex</th>
            <th>Age</th>
            <th>Address</th>
            <th>Treatment Start Date</th>
            <th>VOT</th>
            <th>username</th>
            <th>password</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->township }}</td>
                <td>{{ $patient->serial_number }}</td>
                <td>{{ $patient->registration_date }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->sex }}</td>
                <td>{{ $patient->age }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->treatment_start_date }}</td>
                <td>{{ $patient->vot ? 'Yes' : 'No' }}</td>
                <td>{{ $patient->username }}</td>
                <td>{{ $patient->password }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection


