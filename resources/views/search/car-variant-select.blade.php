<option value="">--- Select Variant ---</option>
@if(!empty($selectData))
  @foreach($selectData as $key => $value)
    <option value="{{ $value->id }}">{{ $value->name }}</option>
  @endforeach
@endif