<DOCTYPE html>
<html lang="en-US">
  <head>
    <title>College Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="{{ URL::asset('public/css/style.css') }}">
	
  </head>
  <body>
		  <div class="container-fluid">
				  <div class="panel header">
						  <div class="univinks">
								  <h2><img src="{{ URL::asset('public/images/univ_logo.png') }}" height="40px"/>
									  <span style="color: #666666;">Univ</span>
                          <span style="color: #999999; margin-left: -9px;">inks</span></h2>
						  </div>
				  </div>
				  <div class="panel address">
					  <strong><h4><b>College</b> > Department > Courses > Subject > Database</h4></strong>
				  </div>
				  <div class="panel inputsection">
						  <h4 style="color: lightslategray; text-align:center; padding-top: 5px;">College</h4><hr />
				<form id="college">	
					<input type="hidden" name="_token" value="{{ csrf_token() }}">	 
					<input class="clgname" type="text" name="clgname" placeholder="Name here">
					<textarea class="clgadd" type="text" name="clgadd" placeholder="Address here"></textarea>
					<button type="submit" id="addCollegeBtn" class="btn btn-default submitbtn">Submit</button> 
				</div>
		  </div>

<script>
  $(document).on("click","#addCollegeBtn",function(e){
    e.preventDefault();   
    var ele   = $('#college');
        var data  = ele.serialize();
        var url   = '{{url("/addCollege")}}';//"http://localhost/production/addCollege";
        $.ajax({
           data : data,
           url : url,
           type: 'POST'
        }).done(function(data){
           if(data.status=='error'){
              $('#error').text(data.message);
           }else if(data.status == 'success'){
              window.location.href = '{{url("/")}}';
           }             
               
        });
  });
</script>



  </body>
</html>