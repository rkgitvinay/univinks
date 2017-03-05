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
.media{
    display: flex;
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
     color: grey
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
	       <strong>Department</strong> <span class = "glyphicon glyphicon-chevron-right"></span> <span style="color:grey">Course</span> <span class = "glyphicon glyphicon-chevron-right"></span> <span style="color:grey">Subject</span> <span class = "glyphicon glyphicon-chevron-right"></span><span style="color:grey"> Database</span>                      
	    </div>
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
                        <div class="form-group" style="display: flex;">
                            <div>
                                <a href="javascript:void(0);" id="courseBtn">
                                    <button class="btn btn-success">Add Course</button>
                                </a>
                            </div>
                             <div class="col-md-3 col-md-offset-8">
                                 <button type="submit" id="addDepartmentBtn" class="btn btn-info">Add</button>
                             </div>
                        </div>
                    </form>
                </div>  
            </div>     
        </div>    
        <div class="col-md-4">
           <div class="panel panel-default" style="margin-right: 30px;">
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
                
                <ul class="list-group" id="department_list">
                    @foreach ($info as $dept)                        
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                     <div id="myTooltips">
                                         <a href="#" data-toggle="tooltip" data-placement="left" title="a"><span class="glyphicon glyphicon-link"></span></a>
                                     </div>
                                </div>
                                <div class="media-body">
                                     <h5 class="media-heading">{{$dept->name}}</h5>
                                </div>
                            </div>
                        </li>
                    @endforeach                  
                    
                </ul>
            </div>
        </div>
    </div>
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

  $(document).on("click","#courseBtn",function(e){
    e.preventDefault();                   
        var url   = '{{url("/goToCourse/courses")}}';//"http://localhost/production/goToCourse";
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