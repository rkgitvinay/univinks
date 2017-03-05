<!DOCTYPE html>
<html lang="en">
<head>
    <title>Departments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ URL::asset('public/css/dropzone.css') }}" rel="stylesheet" type="text/css" media="all"/>    
    <script type="text/javascript" src="{{ URL::asset('public/js/dropzone.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

<style type="text/css">
     
  body{
         background-color:#F2F2F2;
    }
    .navbar{
        background-color: white;
         margin-bottom: 0px;
         border-bottom: 3px solid rgba(97, 85, 85, 0.11);
      }
    .glyphicon{
         color: grey
    }
    .container-fluid > .center-block{
         padding: 20px;
         font-size: 130%;
    }
    .panel-default > .panel-heading{
        background-color: #fff;
    }
    .panel-title{
        color: #60C1EA;
        font-weight: 600;
    }
    .panel-body > .text-center{
        color: #60C1EA;
        padding-bottom: 10px;
    }
    .well{
        border: 3px dashed #D8D3D3;
    }
    .well p{
        color: #60C1EA;
        font-weight: 600;
    }
    .row .btn-default{
        width: 120px;
        border-radius: 0px;
        color: white;
        background-color: #DFDFDF;
        border: 0px;
    }
    .well > .pull-right{
        color:#DFDFDF; /*Do not remove, Change the color of well to white */
    }
    .progress{
        height: 5px;
    }
    .progress>.progress-bar{
        background-color: #40A376;
    }
    .filename{
        padding-bottom: 10px;
    }
    .teal-text{
        color:#00A99D;
    }
     </style>
</head>
<body>
    <nav class="navbar navbar">
        <div>
          <div class="col-md-offset-5 col-md-3">
             <ul class="nav navbar-nav ">
                 <li><h3> <strong>Univ</strong><span style="color:grey">Inks</span></h3></li>
             </ul>
          </div>   
        </div>    
    </nav>
   
   <div class="container-fluid">
       <div class = "center-block" style = "width:500px; " >
           <span style="color:grey">Department</span>
           <span class = "glyphicon glyphicon-chevron-right"></span>
           <span style="color:grey">Course</span> <span class = "glyphicon glyphicon-chevron-right"></span>
           <span style="color:grey">Subject</span> <span class = "glyphicon glyphicon-chevron-right"></span>
           <strong>Database</strong>
        </div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Upload Student Database</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            Upload files in <span class="teal-text">.xls</span> or <span class="teal-text">.xlsx</span> format. The cells A1, B1, C1 should be named as 'Name',<br/> 
                            'Department' and 'ID' respectively.
                        </div>
                    </div>
                    <div class="text-center">See Guidelines</div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                             <div class="well">
                                <div class="text-center">
                                    <form id="myDropzone" style="margin-top: 15px;padding: 10px;" action="{{ URL::to('uploadStudentDatabase') }}" class="form-horizontal dropzone dz-clickable" method="post" enctype="multipart/form-data">
                                                                     
                                        <!-- <input type="file" name="import_file" /> -->
                                        <button type="submit" class="btn btn-primary">Upload File</button>

                                    </form>

                                   <!--  <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                      </div>
                                    </div> -->

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-10">
                            <button type="button" id="peopleBtn" class="btn btn-success">Next</button>
                        </div>
                    </div>                  

                </div>
            </div>
        </div>
   </div>
   <script type="text/javascript">
    Dropzone.options.myDropzone = { 
        autoProcessQueue: false,
        uploadMultiple: false,        
        

 
  init: function() {
    var myDropzone = this;

    // First change the button to actually tell Dropzone to process the queue.
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue();
    });

    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
    // of the sending event because uploadMultiple is set to true.
    this.on("sendingmultiple", function() {
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.
    });
    this.on("successmultiple", function(files, response) {
      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.
    });
    this.on("errormultiple", function(files, response) {
      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error
    });
  }

}

   
    $(document).on("click","#peopleBtn",function(e){
        e.preventDefault();                   
        var url   = '{{url("/goToCourse/people")}}';//"http://localhost/production/goToCourse/database";
        $.ajax({           
           url : url,
           type: 'GET'
        }).done(function(data){                     
            if(data.status == 'success'){
                window.location.href = '{{url("/admin")}}';
            }
        });
    });
   </script>

</body>

</html>