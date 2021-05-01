<option value="">Vehicle Name</option>
@if(!empty($data))
  @foreach($data as $key => $value)
    <option value="{{ $value->id }}">{{ $value->name }}</option>
  @endforeach
@endif