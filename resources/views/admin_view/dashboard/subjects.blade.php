<!DOCTYPE html>
<html lang="en">
<head>
    <title>Subject</title>
    <meta charset="utf-8">
      <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

    <style type="text/css">
      .media{
        display: flex;
    }
    .icon{
        cursor: pointer;
    }
    .container-fluid{
         background-color:#F2F2F2;
    }
    .navbar{
         border-color:white white black;
         border-width: 1px;
         margin-bottom: 0px;
    }
     .glyphicon{
         color: grey;
    }

    .center-block{
         padding: 20px;
         font-size: 130%;
    }  
    .col-md-8 >.panel >.panel-body {
         padding-left: 30px;
    }
    .checkbox-inline{
         padding-right: 15px;
         font-family:"ProximaNova-Regular";
         font-size: 16px;
         color:#808080;
         line-height:21px;
    }
    
    .form-group{
         padding-top: 8px;
         padding-bottom: -5px;
    }
    .form-group > .col-md-2{
       padding-bottom: 10px;
    }
    .form-group > .col-md-3> .btn{
         background-color:#29ABE2;
         color: #FFFFFF;
         width: 130px;
         margin-right: 10px;
         padding-bottom: 5px;
         border-radius: 0 !important;
         padding-top: 5px;
    }
    .form-group > .col-md-3{
         padding-bottom: 5px;
         font-family:"ProximaNova-Semibold";
         color: #666666;
         line-height: 35px;
    }
    .media-body h4{
         font-family:"ProximaNova-Semibold";
         color: #333333;
         line-height:18px;
         font-size: 20px;
    }
    .col-md-4 > .panel {
         min-height: 495px;
    }
    .col-md-4 > .panel> .panel-heading{
        background-color:#FFFFFF;
        padding-top: 15px;
    }
    .col-md-8 > .panel> .panel-heading{
         background-color:#FFFFFF;
         padding-top: 10px;
    }
    /*extra css for subject(used in courses too)*/
    .activea{
        background-color: #00A99D;
    }
    .panel-heading p{
         font-family:ProximaNova-Semibold;
         font-size: 16px;
         color:#60C1EA;
         line-height:8px;
         padding-top: 10px;
    }
    th{
         text-align:center;
    }
    thead{
         background-color: #F4F4F4;
    }
    td{
         text-align:center;
    }
    td+td{
         text-align:center;
    }
    /*exclusive for subject*/
    .glyphicon.glyphicon-plus{
         font-size: 25px;
    }
    .panel-title>.glyphicon.glyphicon-plus{
         font-size: 15px;
         color: black;
    }
     .col-md-4 > .panel> .panel-group>.panel>.panel-heading{
         background-color:#FFFFFF;
         padding-top: 15px; 
         margin-bottom: -1px;
    }
    .col-md-4 > .panel> .panel-group>.panel>.activea{
         background-color: #00A99D;
    }
    .col-md-4 > .panel> .panel-group{
         margin-top: 20px;
         margin-left: 5px;
         margin-right: 5px;
    }
    .panel-body>.extra{
         margin-left: 15px;
         border-style: solid;
         border-color: white white white #00A99D;
         padding-left: 8px;
    }
         <--sidebar-->
html {
overflow:hidden;
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
     height: 800px;
     margin-left: 190px;
     overflow-x:hidden; 
     overflow-y: none;

    }

 
.navbar{
    border-bottom: 1px solid;
    margin-bottom: 20px;
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
                    <a href="{{ URL::to('/admin/subjects') }}" class="active"><img src="{{ URL::asset('public/images/subjects.png' ) }}"><div>Subjects</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/database') }}"><img src="{{ URL::asset('public/images/database.png' ) }}"><div>Database</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/people') }}"><img src="{{ URL::asset('public/images/people.png' ) }}"><div>People</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/logout') }}"><img src="{{ URL::asset('public/images/billing.png' ) }}"><div>Logout</div></a>
                </li>
             
                
            </ul>
        </div>
         
         
        <div class="container-fluid" >
        <nav class="navbar">
           <h4 style="line-height: 20px; padding-bottom:-5px;text-align: center;">Subject</h4>     
       </nav>

        <div class="col-md-4">
            <div class="panel panel-default" style="margin-left: 30px">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-5">
                            <div class="media">
                                <div class="media-left">
                                    <span class = "glyphicon glyphicon-pushpin"></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Departments</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                           
                <div class="panel-group" id="accordion">
                @foreach($info as $dept)    
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <h4 class="panel-title ">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$dept->id}}">{{$dept->name}}</a><span class="glyphicon glyphicon-plus pull-right"></span>
                            </h4> 
                        </div>
                        <div id="collapse{{$dept->id}}" class="panel-collapse collapse in">
                            <div class="panel-body">
                                @foreach($courses as $course)
                                    @if($course->parent_id == $dept->id)
                                        <div  class="extra">
                                           <a class="selectCourse icon" data-course_id="{{$course->id}}" data-course_name="{{$course->name}}" id="course_{{$course->id}}">{{$course->name}}</a>
                                        </div>
                                    @endif                    
                                @endforeach            
                            </div>
                        </div>
                    </div>
                @endforeach                  
                </div>
            </div>
        </div> 
        <div class="col-md-8">    
            <div class="panel panel-default" style="margin-left:-10px; margin-right:30px; ">
                <div class="panel-heading" id=""><p id="course_name"><?php echo $dept_info['courses_name']; ?></p></div>
                <div class="panel-body">                    
                    <div class="panel panel-default" style="margin-right: 16px">
                          <table class="table" style="width: 100%">
                            <thead>
                              <tr>
                                 <th>Subject</th>
                                 <th>Subject Code</th>
                                 <th>Semester</th>
                              </tr>
                            </thead>
                            <tbody id="subject_list">                            
                              <tr>
                                <form id="addSubject">
                                    <input type="hidden" id="course_id" name="course_id" value="<?php echo $dept_info['courses_id']; ?>">
                                     <td> <input type="text" name="subject_name" class="form-control" id="exampleInputAmount" placeholder="Enter Subject Title" style="width: 60% margin-left 20px; text-align: center;" ></td>
                                     <td> <input type="text" name="subject_code" class="form-control" id="exampleInputAmount" placeholder="Enter Subject Title" style="width: 50% margin-left 20px; text-align: center;" ></td>
                                     <td>&emsp;&emsp;<select name="semester" class="selectpicker" id="sel1" style="width:40%; height: 2.4em; text-align: center;">
                                                          <option>1st</option>
                                                          <option>2nd</option>
                                                          <option>3rd</option>
                                                          <option>4th</option>
                                                          <option>5th</option>
                                                          <option>6th</option>
                                                          <option>7th</option>
                                                          <option>8th</option>
                                                     </select>
                                     <a href=""><span id="addSubjectBtn" class="glyphicon glyphicon-plus pull-right icon" style="color: green;"></span></a></td>
                                </form>
                              </tr>
                              @foreach($subjects as $subject)
                                <tr id="subject_row_{{$subject->id}}">
                                    <td width="40%">{{$subject->subject_name}}&emsp;&emsp;&emsp;    <span id="edit_subject" data-id="{{$subject->id}}" class="glyphicon glyphicon-pencil icon"></span>
                                        <span style="margin-left: 5px;" id="delete_subject" data-id="{{$subject->id}}" class="glyphicon glyphicon-trash icon"></span>
                                     </td>
                                    <td width="30%">{{$subject->subject_code}}</td>
                                    <td width="30%">{{$subject->semester}}</td>
                                </tr>
                              @endforeach                                                            
                            </tbody>
                          </table>
                    </div>
                    <!-- <div class="col-md-3 col-md-offset-9">
                         <button id="databaseBtn" class="btn btn-info btn btn-block ">Next</button>
                    </div> -->
                </div>  
            </div>     
        </div>  
    </div>  

    <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Course</h4>
                      </div>
                      <div class="modal-body">
                           <table class="table" style="width: 100%">
                            <thead>
                              <tr>
                                 <th class="head">Subject</th>
                                 <th>Subject Code</th>                                 
                                 <th>Semester</th>
                              </tr>
                            </thead>
                            <tbody id="course_list"> 
                                    <tr>
                                         <form id="editSubject">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="subject_id" name="subject_id">
                                     <td> <input type="text" name="subject_name" class="form-control" id="subject_name" placeholder="Enter Subject Title" style="width: 60% margin-left 20px; text-align: center;" ></td>
                                     <td> <input type="text" name="subject_code" class="form-control" id="subject_code" placeholder="Enter Subject Title" style="width: 50% margin-left 20px; text-align: center;" ></td>
                                     <td>&emsp;&emsp;<select name="semester" class="selectpicker" id="semester" style="width:40%; height: 2.4em; text-align: center;">
                                                          <option>1st</option>
                                                          <option>2nd</option>
                                                          <option>3rd</option>
                                                          <option>4th</option>
                                                          <option>5th</option>
                                                          <option>6th</option>
                                                          <option>7th</option>
                                                          <option>8th</option>
                                                     </select>
                                     </td>
                                </form>
                                    </tr>
                            </tbody>
                    </table>
                            
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="updateData" class="btn btn-primary">Save</button>
                      </div>
                    </div>

                  </div>
                </div>
            <!-- Model end -->

    <script>
    $(document).on("click","#databaseBtn",function(e){
    e.preventDefault();                   
        var url   = '{{url("/goToCourse/database")}}';//"http://localhost/production/goToCourse/database";
        $.ajax({           
           url : url,
           type: 'GET'
        }).done(function(data){                     
            if(data.status == 'success'){
                window.location.href = '{{url("/")}}';
            }
        });
  });

     $(document).on("click",".selectCourse",function(e){
    e.preventDefault();  
    var id = $(this).data('course_id');   
    var course_name = $(this).data('course_name');              
    var base_url = {!! json_encode(url('/')) !!};
    var url   = base_url+"/getSubjects/"+id;    
    $('#course_name').text(course_name);
    $('#course_id').val(id);
    $.ajax({           
       url : url,
       type: 'GET'
    }).done(function(data){ 
        $('#subject_list').find('tr').slice(1).remove();
        $.each(data.subject, function(i, row){

            var load = '<tr id="subject_row_'+row.id+'">'+
                         '<td width="40%">'+row.subject_name+'&emsp;&emsp;&emsp;<span id="edit_subject" data-id="'+row.id+'" class="glyphicon glyphicon-pencil icon"></span>'+
                            '<span data-id="'+row.id+'" style="margin-left: 5px;" id="delete_subject" data-id="'+row.id+'" class="glyphicon glyphicon-trash icon"></span>'+
                         '</td>'+
                         '<td width="30%">'+row.subject_code+'</td>'+
                         '<td width="30%">'+row.semester+'</td>'+
                      '</tr>';                                                                       
            $("#subject_list tr:first").after(load);
        });        
    });   
});

    $(document).on("click","#addSubjectBtn",function(e){
    e.preventDefault();   
    var ele   = $('#addSubject');
    var data  = ele.serialize();
    var url   = '{{url("/addSubject")}}';//"http://localhost/production/addSubject";
    $.ajax({
       data : data,
       url : url,
       type: 'POST'
    }).done(function(data){                   
        if(data.status == 'success'){
            var new_sub = '<tr id="subject_row_'+data.subject.id+'">'+
                                 '<td width="40%">'+data.subject.subject_name+'&emsp;&emsp;&emsp;<span id="edit_subject" data-id="'+data.subject.id+'" class="glyphicon glyphicon-pencil icon"></span>'+
                                    '<span data-id="'+data.subject.id+'" style="margin-left: 5px;" id="delete_subject" data-id="{{$course->id}}" class="glyphicon glyphicon-trash icon"></span>'+
                                 '</td>'+
                                 '<td width="30%">'+data.subject.subject_code+'</td>'+
                                 '<td width="30%">'+data.subject.semester+'</td>'+
                              '</tr>';
            $("#subject_list tr:first").after(new_sub);
            $('#addSubject')[0].reset();
        }
        //console.log(data);
    });
});

$(document).on('click', '#edit_subject', function(){
    $('#editSubject')[0].reset();
    var subject_id = $(this).data('id');
    var url   = '{{url("/getSubjectDetail")}}';
    $.ajax({           
           url : url,
           type: 'GET',
           data:{subject_id:subject_id},
        }).done(function(data){                     
            if(data.status == 'success'){
                $('#subject_id').val(data.subject.id);
                $('#subject_name').val(data.subject.subject_name);                
                $('#subject_code').val(data.subject.subject_code);
                $('#semester').val(data.subject.semester);
            } 
            $('#myModal').modal();  
        });    
});

$(document).on('click', '#updateData', function(e){
    e.preventDefault();   
    var ele   = $('#editSubject');
    var data  = ele.serialize();
    var url   = '{{url("/updateSubject")}}';//"http://localhost/production/addDepartment";
    $.ajax({
       data : data,
       url : url,
       type: 'POST'
    }).done(function(data){                   
       if(data.status == 'success'){
            location.reload();
       }
    });
});

$(document).on('click', '#delete_subject', function(){    
    var subject_id = $(this).data('id');
    var url   = '{{url("/deleteSubject")}}';
    $.ajax({           
           url : url,
           type: 'GET',
           data:{subject_id:subject_id},
        }).done(function(data){                     
            if(data.status == 'success'){               
                $('#subject_row_'+subject_id).hide();
            }             
        });    
});

    </script>
</body>
</html>