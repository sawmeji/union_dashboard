 @extends('app')

@section('content')
 <div class="mb-3">
            <label for="townshipSelect" class="form-label">Select a Township:</label>
            <select class="form-select" aria-label="Select a Township">
    <option value="">Select a Township</option>
    @foreach ($townships as $township)
        <option value="{{ $township->id }}">{{ $township->name }}</option>
    @endforeach
</select>

        </div>
@endsection