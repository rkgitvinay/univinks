<!DOCTYPE html>
<html lang="en">
<head>
    <title>Courses</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

<style type="text/css">
.icon{
    cursor: pointer;
}
.container-fluid{
     background-color:#F2F2F2;
}
.navbar{
     background-color: white;
     margin-bottom: 0px;
     border-bottom: 3px solid rgba(97, 85, 85, 0.11);
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
.tooltip-head{
     color: #fff;
     background: #000;
     padding: 1px 1px 1px;
     border-radius: 0px 0px 0 0;
     margin-bottom: -2px;
}
.tooltip-head h3{
     font-size: 12px;
     word-spacing: 65px;
     padding-right: 20px;
     padding-left: 20px;
     padding-bottom:0px;
     line-height: 10px;
}
.tooltip-head > label {
     padding-right: 15px;
     padding-top: :-10px;
     padding-bottom: 10px;
     padding-right: 60px;
     padding-left: 20px;
}
.tooltip{
  width: 300px;
  line-height:0px;
}
.list-group-item{
     padding-top: 15px;
     padding-bottom: 15px;
} 
/*extra css for courses*/
.activea{
     background-color: #F4F4F4;
}
.panel-heading p{
     font-family:ProximaNova-Semibold;
     font-size: 16px;
     color:#60C1EA;
     line-height:8px;
     padding-top: 10px;
}
th {
     text-align:left;
}
 th+th {
     text-align:center;
}
thead{
    background-color: #F4F4F4;
}
td{
    text-align:left;
}
td+td{
    text-align:center;
}
.glyphicon.glyphicon-plus-sign{
    font-size: 30px;
}
.media{
    display: flex;
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
    <div class="container-fluid" >
        <div class = "center-block" style = "width:500px; " >
           <span style="color:grey">Department</span> <span class = "glyphicon glyphicon-chevron-right icon"></span> <strong>Course</strong> <span class = "glyphicon glyphicon-chevron-right"></span> <span style="color:grey">Subject</span> <span class = "glyphicon glyphicon-chevron-right"></span><span style="color:grey"> Database</span> 
        </div>
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

              <ul class="list-group">
                 @foreach ($info as $dept)                        
                     <li data-department_id="{{$dept->id}}" data-department_name="{{$dept->name}}" id="department_{{$dept->id}}" class="list-group-item selectDepartment icon">
                        <div class="media">
                            <div class="media-left">
                                 <div id="myTooltips">
                                     <a href="#" data-toggle="tooltip" data-placement="left" title="a"><span class="glyphicon glyphicon-link"></span></a>
                                 </div>
                            </div>
                            <div class="media-body">
                                 <h5 class="media-heading ">{{$dept->name}}</h5>
                            </div>
                        </div>
                    </li>       
                @endforeach                                               
               </ul>
            </div>
        </div>        
        <div class="col-md-8">         
            <div class="panel panel-default" style="margin-left:-10px; margin-right:30px; ">
                <div class="panel-heading"><p id="dept_name"><?php echo $dept_info['dept_name'];?></p></div>
                <div class="panel-body">                    
                    <div class="panel panel-default" style="margin-right: 16px">
                    <table class="table" style="width: 100%">
                        <thead>
                          <tr>
                             <th class="head">Course</th>
                             <th>UG</th>
                             <th>PG</th>
                             <th>Dual Degree</th>
                          </tr>
                        </thead>
                        <tbody id="course_list"> 
                                <tr>
                                    <form id="addCourse">   
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                                       
                                         <input type="hidden" id="parent_id" name="parent_id" value="<?php echo $dept_info['dept_id']; ?>">
                                         <td> <input type="text" class="form-control" name="name" id="exampleInputAmount" placeholder="Enter Course Title" style="width: 60%" ></td>
                                         <td height="50"><input name="ug" value="1" type="radio"></td>
                                         <td><input name="pg" type="radio" value="1"></td>
                                         <td>&emsp;&emsp;<input name="dual_degree" value="1" type="radio"><span id="addCourseBtn" class="glyphicon glyphicon-plus-sign pull-right icon" style="color: green;"></span></td>
                                    </form>
                                </tr>                         
                          @foreach($courses as $course)
                                <tr id="course_row_{{$course->id}}">                                                                    
                                    <td width="30%">{{$course->name}}
                                        <span id="edit_course" data-id="{{$course->id}}" class="glyphicon glyphicon-pencil icon"></span>
                                        <span style="margin-left: 5px;" id="delete_course" data-id="{{$course->id}}" class="glyphicon glyphicon-trash icon"></span>
                                    </td>  
                                    @if($course->ug)                                 
                                    <td width="20%"><input type="radio" name="ug" checked></td>
                                    @else
                                    <td width="20%"><input type="radio" name="ug" ></td>
                                    @endif

                                    @if($course->pg)
                                    <td width="20%"><input type="radio" name="pg" checked></td>
                                    @else
                                    <td width="20%"><input type="radio" name="pg"></td>
                                    @endif

                                    @if($course->dual_degree)
                                    <td width="20%"><input type="radio" checked></td>
                                    @else
                                    <td width="20%"><input type="radio"></td>

                                    @endif
                                </tr>
                          @endforeach
                             
                        </tbody>
                    </table>
                    </div>
                    <button type="button" id="subjectBtn" class="btn btn-primary">Next</button>
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
                                 <th class="head">Course</th>
                                 <th>UG</th>
                                 <th>PG</th>
                                 <th>Dual Degree</th>
                              </tr>
                            </thead>
                            <tbody id="course_list"> 
                                    <tr>
                                        <form id="updateCourse">   
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">                                       
                                             <input type="hidden" id="course_id" name="course_id">
                                             <td> <input type="text" class="form-control" name="name" id="course_name" placeholder="Enter Course Title" style="width: 60%" ></td>
                                             <td height="50"><input id="ug" name="type" value="ug" type="radio"></td>
                                             <td><input id="pg" name="type" type="radio" value="pg"></td>
                                             <td>&emsp;&emsp;<input id="dual_degree" name="type" value="dual_degree" type="radio"></td>
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
$(document).ready(function(){
    $("#myTooltips a").tooltip({
           template: '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-head"><h3> UG PG Dual-Degree</h3> <hr/><label ><input type="checkbox" id="inlineCheckbox1" value="option1"></label><label> <input type="checkbox" id="inlineCheckbox2" value="option2"></label><label><input type="checkbox" id="inlineCheckbox3" value="option3"></label></div></div>'
    });
});

$(document).on("click",".selectDepartment",function(e){
    e.preventDefault();  
    var id = $(this).data('department_id');   
    var department_name = $(this).data('department_name'); 
    var base_url = {!! json_encode(url('/')) !!};
    var url   = base_url+"/getCourses/"+id;
    $('#dept_name').text(department_name);
    $('#parent_id').val(id);
    $.ajax({           
       url : url,
       type: 'GET'
    }).done(function(data){ 
        $('#course_list').find('tr').slice(1).remove();
        $.each(data.courses, function(i, row){                            
            var load =  '<tr id="course_row_'+row.id+'">'+
                        '<td width="30%">'+row.name+'<span id="edit_course" data-id="'+row.id+'" class="glyphicon glyphicon-pencil"></span><span style="margin-left: 5px;" id="delete_course" data-id="'+row.id+'" class="glyphicon glyphicon-trash icon"></span</td>';                                                          
                        if(row.ug == 1){
                            load = load + '<td width="20%"><input type="radio" checked></td>';    
                        }else{
                             load = load + '<td width="20%"><input type="radio"></td>';    
                        }
                        if(row.pg == 1){
                            load = load + '<td width="20%"><input type="radio" checked></td>';    
                        }else{
                             load = load + '<td width="20%"><input type="radio"></td>';    
                        }
                        if(row.dual_degree == 1){
                            load = load + '<td width="20%"><input type="radio" checked></td>';    
                        }else{
                             load = load + '<td width="20%"><input type="radio"></td>';    
                        }
                        load = load + '</tr>';                               
                        $("#course_list tr:first").after(load);
        });       
    });   
});

$(document).on("click","#addCourseBtn",function(e){
    e.preventDefault();   
    var ele   = $('#addCourse');
    var data  = ele.serialize();
    var url   = '{{url("/addDepartment")}}';//"http://localhost/production/addDepartment";
    $.ajax({
       data : data,
       url : url,
       type: 'POST'
    }).done(function(data){                   
        if(data.status == 'success'){
                var new_course = '<tr id="course_row_'+data.department.id+'">'+
                                    '<td width="30%">'+data.department.name+'<span id="edit_course" data-id="'+data.department.id+'" class="glyphicon glyphicon-pencil"></span><span style="margin-left: 5px;" id="delete_course" data-id="'+data.department.id+'" class="glyphicon glyphicon-trash icon"></span></td>';
                                    if(data.department.ug == 1){
                                        new_course = new_course + '<td width="20%"><input type="radio" checked></td>';    
                                    }else{
                                        new_course = new_course + '<td width="20%"><input type="radio"></td>';    
                                    }
                                    if(data.department.pg == 1){
                                        new_course = new_course + '<td width="20%"><input type="radio" checked></td>';    
                                    }else{
                                        new_course = new_course + '<td width="20%"><input type="radio"></td>';    
                                    }
                                    if(data.department.dual_degree == 1){
                                        new_course = new_course + '<td width="20%"><input type="radio" checked></td>';    
                                    }else{
                                        new_course = new_course + '<td width="20%"><input type="radio"></td>';    
                                    }                                    
                                new_course = new_course + '</tr>';                
                $("#course_list tr:first").after(new_course);
                $('#addCourse')[0].reset();
           }
    });
});

$(document).on("click","#subjectBtn",function(e){
    e.preventDefault();                   
        var url   = '{{url("/goToCourse/subject")}}';//"http://localhost/production/goToCourse/subject";
        $.ajax({           
           url : url,
           type: 'GET'
        }).done(function(data){                     
            if(data.status == 'success'){
                window.location.href = '{{url("/")}}';
            }
        });
  });

$(document).on('click', '#edit_course', function(){
    $('#updateCourse')[0].reset();
    var course_id = $(this).data('id');
    var url   = '{{url("/getCourseDetail")}}';
    $.ajax({           
           url : url,
           type: 'GET',
           data:{course_id:course_id},
        }).done(function(data){                     
            if(data.status == 'success'){
                $('#course_id').val(data.course.id);
                $('#course_name').val(data.course.name);
                if(data.course.ug == 1){
                    $('#ug').prop('checked',true);    
                }else if(data.course.pg == 1){
                    $('#pg').prop('checked',true);    
                }else{
                    $('#dual_degree').prop('checked',true);    
                }
                
            } 
            $('#myModal').modal();  
        });    
});

$(document).on('click', '#updateData', function(e){
    e.preventDefault();   
    var ele   = $('#updateCourse');
    var data  = ele.serialize();
    var url   = '{{url("/updateCourse")}}';//"http://localhost/production/addDepartment";
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


$(document).on('click', '#delete_course', function(){    
    var course_id = $(this).data('id');
    var url   = '{{url("/deleteCourse")}}';
    $.ajax({           
           url : url,
           type: 'GET',
           data:{course_id:course_id},
        }).done(function(data){                     
            if(data.status == 'success'){               
                $('#course_row_'+course_id).hide();
            }             
        });    
});
</script>     
</body>
</html>