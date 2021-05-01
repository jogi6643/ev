<select id="mySelect"  onchange="test()" class="form-control" name="producttype">
 <option value="0">------</option>
@if(!empty($selectData) && count($selectData)!=0)
  @foreach($selectData as $key => $value)
    <option  value="{{ $value->id }}">{{ $value->name }}</option>
  @endforeach
  @else
   <option value="0">No Result found</option>
@endif
</select>