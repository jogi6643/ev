
@section('cssSection')
  
  <link href="{{url('public/admin/select2/select2.min.css')}}" rel="stylesheet">
@endsection()

 @section('scriptSection')

  <script src="https://cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
  <script src="{{url('public/admin/select2/select2.min.js')}}"></script> 

  <script>
    CKEDITOR.replace('editor', {
      height: 400,
      baseFloatZIndex: 10005
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#select2').select2();
    });

     $(document).ready(function() {
      $('#select-second').select2();
    });

  </script>

  <script>
      $(document).ready(function(){

        $('#keyup').keyup(function(){

          var value = $(this).val();
          var returnValue =  urlTitle(value);
          $('#showUrl').text(returnValue);
          $('#slugUlr').val(returnValue);

        });
      });

  </script>

  <script>
    function urlTitle(text) { 
       
      var spac = /[`~!@#$%^&*()_|+\=?;:'",.<>\{\}\[\]\\\/]/gi;

      var textVal = text.toLowerCase();
         
      var filterStr = textVal.replace(spac, '-');
      var spaceRemove = filterStr.replace(/ +/g, '-'); // sapce replace
      var hypenRemove = spaceRemove.replace(/[-]+/g, '-'); // multiple hypen replac
      var hypenRemove = hypenRemove.replace(/^-+/g, ''); // remove start space
      var hypenRemove = hypenRemove.replace(/-+$/g, ''); // remove end space

      return hypenRemove;
    }
  </script>

 @endsection