<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add People</title>
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
     padding-bottom: 120px;
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
     font-size: 115%;
}  
.form-control{
     padding-top: 8px;
     padding-bottom: -5px;
     margin-top: 10px;
}
.col-md-3> .btn{
     background-color:#29ABE2;
     color: #FFFFFF;
     width: 130px;
     margin-right: 10px;
     padding-bottom: 5px;
     border-radius: 0 !important;
     padding-top: 5px;
     margin-left: 100px;
     margin-top: 15px;
     margin-bottom: 15px;
}
.col-md-10 > .panel> .panel-heading{
     background-color:#FFFFFF;
     padding-top: 10px;
}
.panel-heading p{
     font-family:ProximaNova-Semibold;
     font-size: 16px;
     color:#60C1EA;
     line-height:8px;
     padding-top: 10px;
     padding-left: 15px;
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
.glyphicon.glyphicon-plus{
     padding-top: 16px;
}
.panel-body h4{
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 20px;
}
</style>
</head>

<body>
    <nav class="navbar navbar">
        <div>
          <div class="col-md-offset-5 col-md-2 pull-left">
             <ul class="nav navbar-nav ">
                 <li><h3> &emsp;<strong>Univ</strong><span style="color:grey">Inks</span></h3></li>
             </ul>
          </div>   
        </div>    
    </nav>
    <div class="container-fluid" >
        <div class = "center-block" style = "width:500px; " >
           <span style="color:grey">Department</span> <span class = "glyphicon glyphicon-chevron-right"></span><span style="color:grey">Course</span><span class = "glyphicon glyphicon-chevron-right"></span><span style="color:grey">Subject</span><span class = "glyphicon glyphicon-chevron-right"></span><span style="color:grey"> Database</span>  <span class = "glyphicon glyphicon-chevron-right"></span><span style="color:grey"><strong>People</strong></span> 
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id=""><p>Add People</p></div>
                <div class="panel-body">
                    <h4>Add details of people in your institute such as <span style="color: #00A99D"> Director, Dean, HOD, </span>etc.</h4>                    
                    <div class="panel panel-default" style="margin-right: 16px;margin-left: 16px;margin-bottom: 20px; margin-top: 20px;">
                        <table class="table" style="width: 100%">
                            <thead>
                                 <tr>
                                   <th>Name</th>
                                   <th>Designation</th>
                                   <th>Email</th>
                                </tr>
                            </thead>
                            <tbody id="peopleList">                                
                                 <tr>
                                    <form id="addPeople">                                 
                                       <td> <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" style="text-align: center;" ></td>
                                       <td> <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation" style="text-align: center;" ></td>
                                       <td>&emsp;<p style="display: inline-flex;"> <input type="text" name="email" id="email" class="form-control last" placeholder="Enter Email" style="width:300px;text-align: center;">&emsp;&emsp;<a href="" ><span class="glyphicon glyphicon-plus " id="addPeopleBtn" style="color: green;"></span></a></p></td>
                                    </form>                                
                                 </tr>                                 
                                @foreach($people as $row)
                                    <tr id="people_row_{{$row->id}}">
                                       <td width="30%">{{$row->name}}</td>
                                       <td width="30%">{{$row->designation}}</td>
                                       <td width="40%">&emsp;{{$row->email}}<span id="edit_people" data-id="{{$row->id}}" class="glyphicon glyphicon-pencil pull-right icon"></span>
                                        <span style="margin-right: 5px;" id="delete_people" data-id="{{$row->id}}" class="glyphicon glyphicon-trash pull-right icon"></span>
                                        </td>
                                    </tr>
                                 @endforeach   
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3 col-md-offset-9">
                         <button type="submit" id="complete" class="btn btn-info ">Next</button>
                    </div>
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
                        <h4 class="modal-title">Edit People</h4>
                      </div>
                      <div class="modal-body">
                           <table class="table" style="width: 100%">
                            <thead>
                                 <tr>
                                   <th>Name</th>
                                   <th>Designation</th>
                                   <th>Email</th>
                                </tr>
                            </thead>
                            <tbody id="peopleList">                                
                                 <tr>
                                    <form id="editPeople">  
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" id="people_id" name="people_id">                               
                                       <td> <input type="text" name="name" id="people_name" class="form-control" placeholder="Enter Name" style="text-align: center;" ></td>
                                       <td> <input type="text" class="form-control" name="designation" id="people_designation" placeholder="Enter Designation" style="text-align: center;" ></td>
                                       <td><input type="text" name="email" id="people_email" class="form-control last" placeholder="Enter Email" style="text-align: center;"></td>
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
    <script type="text/javascript">
        $(document).on("click","#addPeopleBtn",function(e){
            e.preventDefault();   
            var ele   = $('#addPeople');
            var data  = ele.serialize();
            var url   = '{{url("/addPeople")}}';//"http://localhost/production/addSubject";
            $.ajax({
               data : data,
               url : url,
               type: 'POST'
            }).done(function(data){                   
                if(data.status == 'success'){
                    var new_people = '<tr id="people_row_'+data.people.id+'">'+
                                         '<td width="30%">'+data.people.name+'</td>'+
                                         '<td width="30%">'+data.people.designation+'</td>'+
                                         '<td width="40%">'+data.people.email+'&emsp;<span id="edit_people" data-id="'+data.people.id+'" class="glyphicon glyphicon-pencil pull-right icon"></span>'+
                                          '<span style="margin-right: 5px;" id="delete_people" data-id="'+data.people.id+'" class="glyphicon glyphicon-trash pull-right icon"></span>'+
                                         '</td>'+
                                      '</tr>';
                    $("#peopleList tr:first").after(new_people);
                    $('#addPeople')[0].reset();
                }
                //console.log(data);
            });
        });

        $(document).on("click","#complete",function(e){
            e.preventDefault();                   
            var url   = '{{url("/goToCourse/complete")}}';//"http://localhost/production/goToCourse/database";
            $.ajax({           
               url : url,
               type: 'GET'
            }).done(function(data){                     
                if(data.status == 'success'){
                    window.location.href = '{{url("/admin")}}';
                }
            });
        });


        $(document).on('click', '#edit_people', function(){
            $('#editPeople')[0].reset();
            var people_id = $(this).data('id');
            var url   = '{{url("/getPeopleDetail")}}';
            $.ajax({           
                   url : url,
                   type: 'GET',
                   data:{people_id:people_id},
                }).done(function(data){                     
                    if(data.status == 'success'){
                        $('#people_id').val(people_id);
                        $('#people_name').val(data.people.name);
                        $('#people_designation').val(data.people.designation);
                        $('#people_email').val(data.people.email);
                    }
                    $('#myModal').modal();  
                });    
        });

        $(document).on('click','#delete_people', function(){
            var people_id = $(this).data('id');
            var url   = '{{url("/deletePeople")}}';
            $.ajax({           
                   url : url,
                   type: 'GET',
                   data:{people_id:people_id},
                }).done(function(data){                     
                    if(data.status == 'success'){               
                        $('#people_row_'+people_id).hide();
                    } 
                });    
        });

$(document).on('click', '#updateData', function(e){
    e.preventDefault();   
    var ele   = $('#editPeople');
    var data  = ele.serialize();
    var url   = '{{url("/updatePeople")}}';//"http://localhost/production/addDepartment";
    $.ajax({
       data : data,
       url : url,
       type: 'POST'
    }).done(function(response){                   
       if(response.status == 'success'){           
            $('#people_row_'+response.data.id+' td:nth-child(1)').text(response.data.name);
            $('#people_row_'+response.data.id+' td:nth-child(2)').text(response.data.designation);
            $('#people_row_'+response.data.id+' td:nth-child(3)').text(response.data.email);           
            $('#myModal').modal('hide');
       }
    });
});
    </script>
</body>   
</html>    
