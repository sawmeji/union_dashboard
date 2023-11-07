@extends('app')
@section('content')
 <div class="container">
 <form method="post">
 @csrf
 <div class="mb-3">
 <label>Township</label>
 <select class="form-select" name="township">
        <option value="">Select Township</option>
         <option value="AMT">AMT</option>
        <option value="CAT">CAT</option>
        <option value="CMT">CMT</option>
        <option value="PTG">PTG</option>
        <option value="PGT">PGT</option>
        <option value="MHA">MHA</option>
 </select>
 </div>
 <div class="mb-3">
 <label>Name</label>
 <input type="text" name="name" class="form-control">
 </div>
  <div class="mb-3">
 <label>Age</label>
 <input type="text" name="age" class="form-control">
 </div>
  <div class="mb-3">
 <label>Sex</label>
 <select class="form-select" name="sex">
 @foreach($sexs as $sex)
 <option value="{{ $sex['name'] }}">
 {{ $sex['name'] }}
 </option>
 @endforeach
 </select>
 </div>
 <div class="mb-3">
 <label>Address</label>
 <textarea name="address" class="form-control"></textarea>
 </div>
  <div class="mb-3">
 <label>Treatment Start Date</label>
 <input type="date" class="form-control"/>
</div>
 
  <div class="mb-3">
 <label>VOT</label>
 <select class="form-select" name="vot">
 @foreach($VOTs as $vot)
 <option value="{{ $vot['name'] }}">
 {{ $vot['name'] }}
 </option>
 @endforeach
 </select>
 </div>
 <input type="submit" value="Add Patient"
 class="btn btn-primary">
 </form>
 </div>
@endsection