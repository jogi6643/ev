
<html>
<head>
<title>EV Bazaar| oops Something Went Wrong</title>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
	.error-template {padding: 160px 15px;text-align: center;}
	.error-actions {margin-top:15px;margin-bottom:15px;}
	.error-actions .btn { margin-right:10px; }
</style>
</head>
<div class="container">
    <div class="row">
    <div class="error-template">
	    <h1>Oops!</h1>
	    <h2>Something Went Wrong</h2>
	    <div class="error-details">
		<div class="btn btn-danger">Sorry, an error has occured, {{$errormessage}}!</div><br>
	
	    </div>
	    <div class="error-actions">
		<a href="{{url('admin/dashboard')}}" class="btn btn-primary">
		    <i class="icon-home icon-white"></i> Take Me Home </a>
		<a href="mailto:me@null-byte.info" class="btn btn-default">
		    <i class="icon-envelope"></i> Contact Support </a>
	    </div>
	</div>
    </div>
</div>
</body>
</html>