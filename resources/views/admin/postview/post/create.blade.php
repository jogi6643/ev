@extends('admin.master_file.header')
@section('title', 'Post Title')

@section('cssSection')
<link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section('body_content')

   <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="m-0 font-weight-bold text-primary">Create new post
          <div class="float-right">
            <a href="{{ route('admin.post') }}"> Post list </a>
          </div>
        </div>
      </div>

      <div class="card-body">
      <form action="{{route('admin.post.store') }}" method="post">
        @csrf

      <div class="row">
   
        <div class="col-sm-6">

          <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" id="title" class="form-control">
          <span id='linkUrl' class="text-danger"> </span>
          </div>

          <div class="form-group">
          <label>Sub Title</label>
          <input type="text" name="subtitle" class="form-control">
          </div>

        </div><!--col-sm-6-->

        <div class="col-sm-6">
          <div class="form-group">
          <label>Post Image</label>
          <input type="file" name="image" class="form-control">
          </div><br>

          <div class="form-group">
          <input type="checkbox" name="status">
          <label>Public</label>

            <div class="float-right">
              <input type="submit" value="Post Create" class="btn btn-danger">
            </div>

          </div>
        </div>

      </div><!-- row-->

      <textarea name="post-body" class="form-control"></textarea>
      </form>
    </div><!--card body-->
  </div>


@endsection

@section('scriptSection')

  <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

  <script>
      CKEDITOR.replace( 'post-body' );
</script>


<script>
    
  $('#title').keyup(function() { 
      
        var url = urlTitle($(this).val());             
        $('#linkUrl').html(url);       
  });

</script>


@endsection


