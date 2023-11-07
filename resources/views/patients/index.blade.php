@extends('app')

@section('content')
    <div class="container">



<div class="row">
  <form action="{{ route('filter-patients') }}" method="GET">
    
    <label for="townshipFilter">Filter by Township:</label>
    <select name="township" id="townshipFilter">
        <option value="">All Township</option>
         <option value="AMT">AMT</option>
        <option value="CAT">CAT</option>
        <option value="CMT">CMT</option>
        <option value="PTG">PTG</option>
        <option value="PGT">PGT</option>
        <option value="MHA">MHA</option>
    </select>
 
    <label for="genderFilter">Filter by Sex:</label>
    <select name="sex" id="genderFilter">
        <option value="">All Genders</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <label for="votFilter">Filter by VOT:</label>
    <select name="vot" id="votFilter">
        <option value="">All VOTs</option>
        <option value="1">YES</option>
        <option value="0">NO</option>
    </select>
    <button type="submit">Apply Filter</button>
</form></div>
</div>


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


