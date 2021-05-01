
@extends('admin.master_file.header')
@section('title', 'Dashboard | Co-admins')

@section('breadcrumb')

    <li class="breadcrumb-item">
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.role.index')}}"> Manage Roles </a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('admin.role.create')}}"> Add Role </a> 
    </li>
    <li class="breadcrumb-item active" aria-current="page">Edit Role </li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

   @include('admin/message')
  <div class="card1 shadow">
  <div class="card-body">
         
<form  action="{{route('admin.role.update', $module['id'])}}" method="post">
@method('PUT')
 {{ csrf_field() }}

 <table class="table table-hover table-striped" id="transactionid">
     	<thead>
      <tr>
		<td>
		<label>Status :</label>
		<select class="form-control" name="status" id="status">			
			<option value="0" <?php if($module['status']==0){echo "selected";}?>>Inactive</option>
			<option value="1" <?php if($module['status']==1){echo "selected";}?>>Active</option>			
			</select>
			<input type="hidden" name="id" value="{{$module['id']}}"/>
		</td>
 	    </tr>
 
 		<tr>
 		    <th>---</th>
 			<th>Module</th>
 			<th>Function</th>
 		
 		</tr>
 		
 	</thead>
 	<tbody>
 	   

  <?php foreach($module['module'] as $dess):?>	 
		<tr>
			 <td>
				<label for="{{$dess->id}}">
				<input type="checkbox" onclick="test(this)" name="module_id[]" <?php if(in_array($dess->id,$module['selected'])){echo "checked"; } ?> value="{{$dess->id}}" id="{{$dess->id}}" />
						
					</label>
			</td>
			<td><span>{{$dess->modulename}}</span></td>
		  <td> 
		  @if(in_array($dess->id,$module['selected']))
		  <?php $x=(int)$dess->id;?>
		  <select class="form-control" name="{{$dess->id}}_function"  id="{{$dess->id}}_function" required>
	        @foreach((array)$dess->rights->name as $key=>$names)
		      <option  @if($key==$module['sel'][$x]['functions']) selected  @endif  value="{{$key}}">{{$names}}</option>
			 @endforeach   
		</select>
		 @else 
		 <select class="form-control" name="{{$dess->id}}_function" class="functions"  id="{{$dess->id}}_function" required>
		     <option>--Select Function</option>
		     @foreach((array)$dess->rights->name as $keys=>$names)
		      <option  value="{{$keys}}">{{$names}}</option>
			 @endforeach        
		</select>
		 @endif
		</td>		
		</tr>
		@endforeach
 		<tr>
         <td colspan="2">
		 <button type="submit" class="d-lg-inline-block btn btn-lg btn-primary shadow-sm">update </button>
        </td>
        </tr>
 	</tbody>
 </table>
</form>
  </div>
  </div>
  </div>
  <script type="text/javascript">
$(".area").hide();
$(".functions").hide();
   function test(ids){
	  if(ids.checked){ 
	   $("#"+ids.id+"_function").show();
	  }
	  else{
	   $("#"+ids.id+"_function").hide();
   }
   }
   </script>
@endsection
@include('admin/script-file/scriptFile')