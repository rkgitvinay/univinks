<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="{{ URL::asset('public/css/dropzone.css') }}" rel="stylesheet" type="text/css" media="all"/>    
    <script type="text/javascript" src="{{ URL::asset('public/js/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

    <style type="text/css">
    html {
overflow:hidden;
}
 .media{
        display: flex;
    }

.sidebar-nav {
    position: fixed;
    width: 190px;
    padding: 0;
    height: 100%;
    overflow-y: auto;
    overflow-x: hidden;
    background: black;
}

.container-fluid{
     background-color:#f4f4f4;
     
     margin-left: 190px;
     overflow-x:hidden; 
     overflow-y: none;

    }
 
.navbar{
    border-bottom: 1px solid;
    margin-bottom: 0px;
    margin-left: -15px;
    margin-right:-16px;
    background-color: #ffffff
    
 }

.sidebar-nav li {
  
    line-height: 30px;
    text-align: center;
    font-size: 15px
}

.sidebar-nav li a {
    display: block;
    color: #ffffff;

    
}
.sidebar-nav li a img {
    width: 40px;
    height: 18px;
    margin-top: 10px;
    
    
}
.sidebar-nav >.child  a {
    background-color: #191a19;
    padding-bottom:10px;
   
    
}
li.child{
     border-bottom: 1px solid;
    border-color: black;
}

.sidebar-nav li.child a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
    border-right: 4px solid;
    border-color: #38e6f2;
}


.sidebar-nav > .sidebar-brand {
    
    font-size: 22px;
    line-height: 60px;
    text-align: center;
}

.sidebar-nav > .sidebar-brand  {
    color: #999999;
}
.active {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
    border-right: 4px solid;
    border-color: #38e6f2;
}
   <--after sidebar-->
  body{
         background-color:#F2F2F2;
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
        height: 2px;
    }
    .progress>.progress-bar{
        background-color: #40A376;
    }
    .filename{
        padding-bottom: 10px;
    }
    .teal-text{
        color:#40A376;
    }
    .col-md-10{
        margin-top: 15px;
    }
    .col-md-5>.panel>.panel-body>.well{
        border: 1px solid black;
    }


    </style>
</head>

<body>
  <div>
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                
                    
                        UnivInks
                        <img src="{{ URL::asset('public/images/billing.png') }}" class="img-circle" style="width:100px;height:100px; padding-bottom:10px;">
                        <h5>Welcome Admin </h5>
                    
                   
                </li>
                <li class="child">
                    <a href="{{ URL::to('/admin/departments') }}" ><img src="{{ URL::asset('public/images/billing.png' ) }}"><div>Departments</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/courses') }}" ><img src="{{ URL::asset('public/images/courses.png' ) }}"><div>Courses</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/subjects') }}" ><img src="{{ URL::asset('public/images/subjects.png' ) }}"><div>Subjects</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/database') }}" class="active"><img src="{{ URL::asset('public/images/database.png' ) }}"><div>Database</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/people') }}"><img src="{{ URL::asset('public/images/people.png' ) }}"><div>People</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/logout') }}"><img src="{{ URL::asset('public/images/billing.png' ) }}"><div>Logout</div> </a>
                </li>
             
                
            </ul>
        </div>
         
         
        <div class="container-fluid" >
        <nav class="navbar">
           <h4 style="line-height: 20px; padding-bottom:-5px;text-align: center;">Database</h4>     
       </nav>
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-5">
                       <p class="panel-title">Upload Faculty Database</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5 pull-right">
                     <select class="selectpicker" id="sel1" style="width:70%; height: 2.0em; text-align: center;">
                                                  <option>Faculty</option>
                                                  <option>Student</option>
                                                  
                     </select>
                   </div>
                  </div>
                </div>
                <div class="panel-body" id="upload_form">
                    <div id="Faculty_form">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                Upload files in <span class="teal-text">.xls</span> or <span class="teal-text">.xlsx</span> format. The cells A1, B1, C1 should be named as 'Name',<br/> 
                                'Department' and 'Email' respectively.
                            </div>
                        </div>
                        <div class="text-center">See Guidelines</div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="well">
                                    <div class="text-center">
                                        <form id="myFacultyDropzone" class="form-horizontal dropzone dz-clickable" style="margin-top: 15px;padding: 10px;" action="{{ URL::to('uploadFacultyDatabase') }}" method="post" enctype="multipart/form-data">
                                                                         
                                            <!-- <input type="file" name="import_file" /> -->
                                            <button type="submit" class="btn btn-primary">Upload File</button>

                                        </form>

                                        <!-- <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span class="sr-only">60% Complete</span>
                                          </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display: none;" id="Student_form">
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
                                    <form id="myStudentDropzone" style="margin-top: 15px;padding: 10px;" action="{{ URL::to('uploadStudentDatabase') }}" class="form-horizontal dropzone dz-clickable" method="post" enctype="multipart/form-data">
                                                                     
                                        <!-- <input type="file" name="import_file" /> -->
                                        <button type="submit" class="btn btn-primary">Upload File</button>

                                    </form>

                                    <!-- <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                      </div>
                                    </div> -->

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>


                </div>



            </div>
            </div>   
        <div class="col-md-5 col-md-offset-1">    
            <div class="panel panel-default">
              <div class="panel-heading" style="padding-bottom: 0px" >
             <h5 style="text-align: center;">Faculty Database List</h5>
              </div>
               <div class="panel-body " style="text-align: center; overflow: auto; height: 120px">  
                    <ul>
                       <li></li>
                       <li></li>
                   </ul>
                  </div>
            </div>    
        </div> 
         <div class="col-md-5">    
             <div class="panel panel-default">
                <div class="panel-heading" style="padding-bottom: 0px" >
                   <h5 style="text-align: center;">Student Database List </h5>
                </div>
             <div class="panel-body" style="text-align: center; overflow: auto; height: 120px">  
                    <ul>
                       <li></li>
                       <li></li>
                   </ul>
             </div>
             </div>    
        </div>    
        </div>

        <script> 

        Dropzone.options.myFacultyDropzone = { 
        autoProcessQueue: false,
        uploadMultiple: false,
        init: function() {
          var myFacultyDropzone = this;   
      this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();
      myFacultyDropzone.processQueue();
    });

   
    this.on("sendingmultiple", function() {
     
    });
    this.on("successmultiple", function(files, response) {
      
    });
    this.on("errormultiple", function(files, response) {
      
    });
  }

}         

Dropzone.options.myStudentDropzone = { 
        autoProcessQueue: false,
        uploadMultiple: false,
        init: function() {
          var myStudentDropzone = this;   
      this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();
      myStudentDropzone.processQueue();
    });

   
    this.on("sendingmultiple", function() {
     
    });
    this.on("successmultiple", function(files, response) {
      
    });
    this.on("errormultiple", function(files, response) {
      
    });
  }

}  

            $('select').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                if(valueSelected == 'Faculty'){
                    $('.panel-title').text('Upload Faculty Database');
                    $('#Student_form').hide();
                    $('#Faculty_form').show();
                }else{
                    $('.panel-title').text('Upload Student Database');
                    $('#Faculty_form').hide();
                    $('#Student_form').show();
                }
                
            });


        </script> 
</body>
</head>
