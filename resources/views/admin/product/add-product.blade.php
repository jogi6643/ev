
@extends('admin.master_file.header')
@section('title', 'Create Product | Dashboard')

@section('cssSection')
  <!-- <link href="{{url('public/css/style.min.css')}}" rel="stylesheet" type="text/css"/> -->
  <link href="{{url('public/css/style.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')

  <li class="breadcrumb-item" aria-current="page">
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('admin.product.index')}}"> Manage Product</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Add Product</li>

@endsection

@section('body_content')

  <!-- Content Row -->
  <div class="row1">

@if(Session::has('message'))
  <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Session::get('message') !!}
  </div>
@endif

  <div class="card1 shadow">
  <div class="card-body">


  <form action="{{route('admin.product.store')}}" method="post" enctype='multipart/form-data' class="imageloaderForm">

    @csrf

    <div align="right">
      <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create Product</button>
    </div>

    <div class="row">

      <div class="col-sm-4">
        <div class="form-group">
              <label for="pwd">Select Brand:</label>
              <select name="brand_id[]" class="form-control" id="brand">

                @if( count($brands) > 0)
                <option value=""> -- </option>
                option
                @foreach($brands as $brand)
                  <option value="{{$brand->id}}"> {{$brand->name}} </option>
                @endforeach
                @endif
                option
              </select>
              @if ($errors->has('brand_id'))
                  <span class="invalid-field" role="alert">
                      <strong>{{ $errors->first('brand_id') }}</strong>
                  </span>
              @endif
            </div>
      </div><!--col-sm-4-->

      <div class="col-sm-4">

            <div class="form-group">
              <label for="pwd">Select Type:</label>
              <select name="mastercategory_id[]" class="form-control" id="mastercategory_id">

                @if( count($mastercategories) > 0)
                <option value=""> -- </option>
                option
                @foreach($mastercategories as $category)
                  <option value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach
                @endif
                option
              </select>
            </div>
      </div><!--col-sm-4-->

      <div class="col-sm-4">
         <div class="form-group">
          <label for="pwd">Select category:</label>
          <select name="category_id[]" id="category_select" class="form-control"></select>  
            @if($errors->has('category_id'))
                <span class="invalid-field" role="alert">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>
      </div><!--col-sm-4-->

    </div><!-- row--><hr>



    <div class="row">

      <div class="col-sm-6">

         <div class="form-group">
          <div id="attribute_select"></div>  
        </div>

        <div id="select_file">
            <span class="btn btn-primary fileinput-button111">
            <i class="fa fa-plus"></i>
            <input id="fileupload" type="file" name="files[]" accept="image/x-png, image/gif, image/jpeg,image/jpg" multiple>
            </span>
            <div id="files" class="files"></div>     
        </div><!--select_file close--><br>
        
        <div id="uploaded_images"></div>

        <!-- <div id="popular_brand">
            <span class="btn btn-primary">Upload Brand Logo<br>
            <i class="fa fa-plus"></i>
            <input id="popular_button" type="file" name="popular_files" accept="image/x-png, image/gif, image/jpeg,image/jpg">
            </span>  
        </div> -->
        <!--select_file close--><br>

      </div><!--col-sm-6-->



      <div class="col-sm-6">
      <div class="form-group">
      <label for="pwd">Select Tags </label>
      <select name="tag_name[]" class="form-control" id="tag_name2" multiple="multiple"> 
          <option value="1"> Homepage </option>
          <option value="2" > Featured </option>
          <option value="3"> Latest </option>
          <option value="4"> Popular </option>

        </select>
        </div>
      <!-- on change get value -->
      <div class="form-group">
        <label for="pwd">Select Variant Type </label>
        <select name="product_type" class="form-control" id="product_type" required>
            <option value=""> -- </option>
            <option value="product"> Product </option>
            <option value="variance"> Variant </option>
        </select>
      </div>

        <fieldset id="fieldset1" disabled>
        <div class="form-group" id="targetDiv" style="display: none">
          <label for="pwd" class="text-primary">Select Product:</label>
          <select name="product_id" class="form-control" id="product_id" required>
            <option value=""> -- </option>
            @if( count($products) > 0)
            option
            @foreach($products as $product)
              <option value="{{$product->id}}"> {{$product->name}} </option>
            @endforeach
            @endif
            option
          </select>
        </div>
      </fieldset>

      <fieldset id="fieldset2" disabled>
        <div class="form-group" id="targetDiv1" style="display: none">
          <label for="pwd" class="text-primary">Select State:</label>
          <select name="state_id" class="form-control" id="state_id" required>
            <option value=""> -- </option>
            @if( count($state) > 0)
            option
            @foreach($state as $state)
              <option value="{{$state->id}}"> {{$state->name}} </option>
            @endforeach
            @endif
            option
          </select>
        </div>
      </fieldset>


      <div class="form-group">
            <label for="pwd">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="pwd">On Road Price</label>
            <input type="text" name="roadprice" class="form-control">
        </div>
        <div class="form-group">
            <label for="pwd">Price</label>
            <input type="text" name="price" class="form-control">
        </div>


    </div><!--col-sm-6-->
    </div><!-- row-->
 
  <div class="form-group">
  <label for="discription">Description</label>
    <textarea cols="20" id="editor" name="description" rows="2" data-sample-short>{{old('description')}}</textarea>
  </div>
    
  </form>


  </div>
  </div>

  </div>
  <!-- Content Row -->

@endsection

@section('extraScript')

<link href="{{url('public/css/styles.css')}}" rel="stylesheet">
<script src="{{url('public/dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js')}}"></script>
<script src="{{url('public/dist/assets/jquery-file-upload/js/jquery.iframe-transport.js')}}"></script>
<script src="{{url('public/dist/assets/jquery-file-upload/js/jquery.fileupload.js')}}"></script>



  <script type="text/javascript">
    $("#mastercategory_id").change(function(){
        var id = $(this).val();
        $.ajax({
            type:'POST',
            url: "{{url('admin/selectCategory')}}",
            data: {id:id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              $("#category_select").html('');
              $("#category_select").html(data.options);
            }
        });
    });
</script>

<script type="text/javascript">
    $("#category_select").change(function(){
        var id = $(this).val();
        $.ajax({
            type:'POST',
            url: "{{url('admin/selectAttribute')}}",
            data: {id:id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
              $("#attribute_select").html('');
              $("#attribute_select").html(data.options);
            }
        });
    });
</script>


<script>
  var baseUrl = "{{url('/')}}";
  var max_uploads = 5
  $(function () {
    'use strict';
    var url = "{{asset('public/server/upload.php')}}";
    var htmlData = '';
    $('#fileupload').fileupload({
      url: url,
      dataType: 'html',
      done: function (e, data) {
        if(data['result'] == 'FAILED'){
            alert('Invalid File');
        }else{

          console.log(data['result']);

          htmlData += '<div class="uploaded_image">';
          htmlData += '<input type="text" value="'+data['result']+'" name="uploaded_image_name[]" id="uploaded_image_name" hidden>';
          htmlData += '<img src="'+baseUrl+'/public/server/uploads/'+data['result']+'" />';
          htmlData += '<a href="javascript:void(0)" class="img_rmv" data-removed="'+data['result']+'"><i class="fa fa-times-circle" style="font-size:48px;"></i>remove</a>';
          htmlData += '</div>';

          $('#uploaded_images').html(htmlData);

          if($('.uploaded_image').length >= max_uploads){
              $('#select_file').hide();
          }else{
              $('#select_file').show();
          }
        }

        $.each(data.result.files, function (index, file) {
            $('<p>').text(file.name).appendTo('#files');
        });

      },
      
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});


   $( "#uploaded_images" ).on( "click", ".img_rmv", function() {

      var url = "{{asset('public/server/unlinkfile.php')}}";
      var fileValue = $(this).attr('data-removed');
      $.ajax({
        type: "POST",
        url:url,
        data:{status:'1',fileValue:fileValue },
        success:function(data){
          console.log(data);
        }
      });

        $(this).parent().remove();
        if($('.uploaded_image').length >= max_uploads){
            $('#select_file').hide();
        }else{
            $('#select_file').show();
        }
    });

</script>

<script>
  $("#product_type").change(function(){
    var value = $(this).val();
    if(value == 'variance'){
      $('#fieldset1').removeAttr('disabled');
      $('#targetDiv').css('display','block');
      $('#fieldset2').removeAttr('disabled');
      $('#targetDiv1').css('display','block');
    }else{
      $('#fieldset1').attr('disabled');
      $('#targetDiv').css('display','none');
      $('#fieldset2').attr('disabled');
      $('#targetDiv1').css('display','none');
    }
  });
</script>
<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#tag_name1').multiselect({
            includeSelectAllOption: true
        });
        $('#tag_name2').multiselect({
            includeSelectAllOption: true
        });
    });
</script>

@endsection

@include('admin/script-file/scriptFile')











