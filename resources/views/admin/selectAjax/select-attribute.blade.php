<label>Set Attribute Value:</label>
<table class="table table">
	<tr>
	<th>Name</th>
	<th>Value</th>
	</tr>
@if(!empty($selectData))
@foreach($selectData as $key => $value)
	<tr>
	<td><input type="hidden" name="attributeId[]" value="{{ $value->id }}">{{ $value->name }}</td>
	<td><input name="attribute_value[]"></td>
	</tr>
@endforeach
@endif
</table>