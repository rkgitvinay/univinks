<!DOCTYPE html>
<html lang="en">
<head>
    <title>Departments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

    <style type="text/css">
     
     .glyphicon{
         color: grey
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
    .media-body p{
         font-family:ProximaNova-Semibold;
         font-size: 16px;
         color:#60C1EA;
         line-height:18px;
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
         padding-top: 15px;
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
         padding-top: 20px;
         padding-bottom: 15px;
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
.media{
    display: flex;
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
                    <a href="{{ URL::to('/admin/departments') }}" class="active"><img src="{{ URL::asset('public/images/billing.png' ) }}"><div>Departments</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/courses') }}"><img src="{{ URL::asset('public/images/courses.png' ) }}"><div>Courses</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/subjects') }}"><img src="{{ URL::asset('public/images/subjects.png' ) }}"><div>Subjects</div> </a>
                </li>
                 <li class="child">
                    <a href="{{ URL::to('/admin/database') }}"><img src="{{ URL::asset('public/images/database.png' ) }}"><div>Database</div> </a>
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
           <h4 style="line-height: 20px; padding-bottom:-5px;text-align: center;"> Department</h4>     
       </nav>
    
	    <div class="col-md-8">    
            <div class="panel panel-default" style="margin-left:30px; margin-right:-15px; ">
              <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                           <span class = "glyphicon glyphicon-plus"></span>
                        </div>
                        <div class="media-body">
                           <p class="media-heading">Add Department</p>                           
                        </div>                             
                    </div>                    
              </div>
                <div class="panel-body">                    
                    <form class="form-horizontal" id="department">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                        <div class="form-group">
                             <label class="col-md-2 control-label"><span class="pull-left">Title</span></label>
                             <div class="col-md-offset-1 col-md-4">
                                 <input type="text" name="name" class="form-control">
                             </div>
                        </div>
                        <div class="form-group">
                             <label class="col-md-3"><span class="pull-left">Courses Offered </span></label>
                             <div class="col-md-6">
                                 <label class="checkbox-inline">
                                    <input type="checkbox" name="ug" id="inlineCheckbox1" value="1"> UG
                                 </label>
                                 <label class="checkbox-inline">
                                    <input type="checkbox" name="pg" id="inlineCheckbox2" value="1"> PG
                                 </label>
                                 <label class="checkbox-inline">
                                    <input type="checkbox" name="dual_degree" id="inlineCheckbox3" value="1"> Dual Degree 
                                 </label>
                             </div> 
                        </div>
                        <div class="form-group">                    
                             <div class="col-md-3 col-md-offset-9">
                                 <button type="submit" id="addDepartmentBtn" class="btn btn-info">Add</button>
                             </div>
                        </div>
                    </form>
                </div>  
            </div>     
        </div>   
       <div class="col-md-4">
           <div class="panel panel-default" style="margin-right: 20px;">
                <div class="panel-heading">
              <div class="row">
                        <div class="col-md-offset-3 col-md-9">
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
                
                <ul class="list-group" id="department_list">
                    @foreach ($info as $dept)                        
                        <li class="list-group-item" id="dept_row_{{$dept->id}}">
                            <div class="media">
                                <div class="media-left">
                                     <div id="myTooltips">
                                         <a href="#" data-toggle="tooltip" data-placement="left" title="a"><span class="glyphicon glyphicon-link"></span></a>
                                     </div>
                                </div>
                                <div class="media-body">
                                     <h5 class="media-heading" id="dept_name_{{$dept->id}}">{{$dept->name}}</h5>
                                     <span id="edit_dept" data-id="{{$dept->id}}" class="glyphicon glyphicon-pencil icon"></span>
                                        <span style="margin-left: 5px;" id="delete_dept" data-id="{{$dept->id}}" class="glyphicon glyphicon-trash icon"></span>
                                </div>
                            </div>
                        </li>
                    @endforeach                  
                    
                </ul>
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

                           <div class="panel-body">                    
                            <form class="form-horizontal" id="departmentUpdate">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                <input type="hidden" name="dept_id" id="dept_id">   
                                <div class="form-group">
                                     <label class="col-md-2 control-label"><span class="pull-left">Title</span></label>
                                     <div class="col-md-offset-1 col-md-6">
                                         <input type="text" name="name" id="deptTitle" class="form-control">
                                     </div>
                                </div>
                                <div class="form-group">
                                     <label class="col-md-3"><span class="pull-left">Courses Offered </span></label>
                                     <div class="col-md-9">
                                         <label class="checkbox-inline">
                                            <input type="checkbox" name="ug" id="ug" value="1"> UG
                                         </label>
                                         <label class="checkbox-inline">
                                            <input type="checkbox" name="pg" id="pg" value="1"> PG
                                         </label>
                                         <label class="checkbox-inline">
                                            <input type="checkbox" name="dual_degree" id="dual_degree" value="1"> Dual Degree 
                                         </label>
                                     </div> 
                                </div>
                                <div class="form-group">                    
                                     <div class="col-md-3 col-md-offset-9">
                                         <button type="submit" id="updateDepartmentBtn" class="btn btn-info">UPDATE</button>
                                     </div>
                                </div>
                            </form>
                        </div> 
                            
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

  $(document).on("click","#addDepartmentBtn",function(e){
    e.preventDefault();   
    var ele   = $('#department');
        var data  = ele.serialize();
        var url   = '{{url("/addDepartment")}}';//"http://localhost/production/addDepartment";
        $.ajax({
           data : data,
           url : url,
           type: 'POST'
        }).done(function(data){
           if(data.status == 'success'){
                var new_dept = '<li class="list-group-item">'+
                                    '<div class="media">'+
                                        '<div class="media-left">'+
                                            '<div id="myTooltips">'+
                                                 '<a href="#" data-toggle="tooltip" data-placement="left" title="a"><span class="glyphicon glyphicon-link"></span></a>'+
                                             '</div>'+
                                        '</div>'+
                                        '<div class="media-body">'+
                                             '<h5 class="media-heading">'+data.department.name+'</h5>'+
                                        '</div>'+
                                    '</div>'+
                                '</li>';
                $('#department_list').prepend(new_dept);
                $('#department')[0].reset();
           }             
            
        });
  });

    $(document).on("click","#updateDepartmentBtn",function(e){
        e.preventDefault();   
        var ele   = $('#departmentUpdate');
        var data  = ele.serialize();
        var url   = '{{url("/updateDepartment")}}';//"http://localhost/production/addDepartment";
        $.ajax({
           data : data,
           url : url,
           type: 'POST'
        }).done(function(data){
            if(data.status == 'success'){
                $('#dept_name_'+data.id).text(data.name);
                $('#departmentUpdate')[0].reset();
                $('#myModal').modal('hide');
            }             
            
        });
    });

  $(document).on("click","#courseBtn",function(e){
    e.preventDefault();                   
        var url   = '{{url("/goToCourse/courses")}}';//"http://localhost/production/goToCourse";
        $.ajax({           
           url : url,
           type: 'GET'
        }).done(function(data){                     
            if(data.status == 'success'){
                window.location.href = '{{url("/")}}';
            }
        });
  });

  $(document).on('click', '#delete_dept', function(){    
    var dept_id = $(this).data('id');
    var url   = '{{url("/deleteDept")}}';
    $.ajax({           
           url : url,
           type: 'GET',
           data:{dept_id:dept_id},
        }).done(function(data){                     
            if(data.status == 'success'){               
                $('#dept_row_'+dept_id).hide();
            }             
        });    
});

  $(document).on('click', '#edit_dept', function(){
    var dept_id = $(this).data('id');
    var url   = '{{url("/getDeptDetail")}}';
    $.ajax({           
           url : url,
           type: 'GET',
           data:{dept_id:dept_id},
        }).done(function(data){                     
            if(data.status == 'success'){
                $('#dept_id').val(data.dept.id);
                $('#deptTitle').val(data.dept.name);
                if(data.dept.ug == 1){
                    $('#ug').prop('checked',true);    
                }
                if(data.dept.pg == 1){
                    $('#pg').prop('checked',true);    
                }
                if(data.dept.dual_degree == 1){
                    $('#dual_degree').prop('checked',true);    
                }
                //console.log(data);
                
            } 
            $('#myModal').modal();  
        });    
});
</script>     

</body>
</html>