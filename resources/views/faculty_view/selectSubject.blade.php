<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Montserrat;
            background-color: rgb(230, 230, 230);
        }
        
        @font-face {
            font-family: Montserrat;
            src: url({{ URL::asset('public/fonts/Montserrat-Light.otf') }});
        }

            .panel {
                background-color: #fff;
                -webkit-border-radius: 2px;
                border-radius: 2px;
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                align-content: center;
            }
            
            .header {
                height: 52px;
                text-align: center;
                position: absolute;
                left: 0;
                right: 0;
            }
            
            .univinks {
                margin-top: -7px;
            }
            
            .center {
                width: 800px;
                margin-top: 10vw;
                margin-left: auto;
                margin-right: auto;
            }
            
            .head {
                margin-top: 30px;
                margin-left: 35px;
            }
            
            .detailsText {
                display: inline-block;
                margin-left: 20px;
            }
            
            .content {
                margin-top: 25px;
                margin-left: 35px;
            }
            
            hr {
                border-color: #7c899a;
            }
            
            .content {
                color: #7c899a;
            }
            
            .btn {
                height: 40px;
                width: 75px;
                background-color: #29aae3;
                color: white;
            }
            
            .NextBtn {
                text-align: right;
                margin-right: 20px;
                margin-top: 30px;
                margin-bottom: 20px;
            }
            
            .content > hr {
                width: 740px;
                margin-left: 0px;
            }
            
            .row2 {
                margin-top: 20px;
            }
            
            .row3 {
                margin-top: 20px;
            }
            
            .subList {
                width: 200px;
                height: 100px;
                border-color: #7c899a;
                border-style: solid;
                overflow: auto;
                display: inline-block;
            }
            
            .semLabel {
                text-align: center;
                width: 200px;
                padding-top: 5px;
            }
            
            .sem1 {
                display: inline-block;
                margin-left: 20px;
            }
            
            .sem2 {
                display: inline-block;
                margin-left: 30px;
            }
            
            .sem3 {
                display: inline-block;
                margin-left: 30px;
            }
            
            .sem4 {
                display: inline-block;
                margin-left: 20px;
            }
            
            .sem5 {
                display: inline-block;
                margin-left: 30px;
            }
            
            .sem6 {
                display: inline-block;
                margin-left: 30px;
            }
            
            .sem7 {
                display: inline-block;
                margin-left: 20px;
            }
            
            .sem8 {
                display: inline-block;
                margin-left: 30px;
            }

    </style>
    <title>Select Subjects</title>
</head>

<body>
    <div class="container-fluid">
        <div class="panel header">
            <div class="univinks">
                <h3>
                    <img src="{{ URL::asset('public/images/logo.png') }}" height="30" />
                    <span style="color: #666666;">Univ</span>
                    <span style="color: #999999; margin-left: -6px;">inks</span>
                </h3>
            </div>
        </div>
        <div class="panel center">
            <div class="head">
                <img id="propic" src="{{ URL::asset('public/images/propic.png') }}" height="75px;" style="margin-top: -35px;" onmouseover=document.getElementById(
                    "propic").src='img/propicupload.png' onmouseout=document.getElementById( "propic").src='img/propic.png'>
                <div class="detailsText">
                    <h3><strong><?php echo $info->name ?></strong></h3>
                    <h4><?php echo $info->department ?></h4>
                </div>
            </div>
            <hr />
            <div class="content">
                <h4><strong>Select your Subjects :</strong></h4>
                <hr />
            <form id="subject_list">
                <input type="hidden" name="user_id" value="<?php echo $info->id ?>">
                @foreach($data as $k => $dept)

                        @foreach($dept['courses'] as $temp)
                        

                        <div class="Dept1">
                            <strong>{{$dept['department_name']}} : {{$temp['course_name']}} </strong>
                            <br />                                  
                               
                                <div class="sem1">
                                    <div class="semLabel"> Semester 1</div>
                                    <div class="subList">
                                        @foreach($temp['subjects'] as $row)                                            
                                            @if($row->semester == '1st')
                                                &nbsp;&nbsp;<input class="subject" type="checkbox" name="subjects[]" value="{{$row->subject_id}}">&nbsp;{{$row->subject_name}}</input><br/> 
                                            @endif
                                         @endforeach                                      
                                        
                                    </div>
                                    
                                </div>
                                <div class="sem2">
                                    <div class="semLabel"> Semester 2</div>
                                    <div class="subList">
                                         @foreach($temp['subjects'] as $row)                                            
                                            @if($row->semester == '2nd')
                                                &nbsp;&nbsp;<input class="subject" type="checkbox" name="subjects[]" value="{{$row->subject_id}}">&nbsp;{{$row->subject_name}}</input><br/> 
                                            @endif
                                         @endforeach 
                                    </div>
                                    
                                </div>
                                <div class="sem3">
                                    <div class="semLabel"> Semester 3</div>
                                    <div class="subList">
                                        @foreach($temp['subjects'] as $row)                                            
                                            @if($row->semester == '3rd')
                                                &nbsp;&nbsp;<input class="subject" type="checkbox" name="subjects[]" value="{{$row->subject_id}}">&nbsp;{{$row->subject_name}}</input><br/> 
                                            @endif
                                         @endforeach
                                    </div>
                                    
                                </div>
                           
                                <div class="sem4">
                                    <div class="semLabel"> Semester 4</div>
                                    <div class="subList">
                                        @foreach($temp['subjects'] as $row)                                            
                                            @if($row->semester == '4th')
                                                &nbsp;&nbsp;<input class="subject" type="checkbox" name="subjects[]" value="{{$row->subject_id}}">&nbsp;{{$row->subject_name}}</input><br/> 
                                            @endif
                                         @endforeach
                                    </div>
                                    
                                </div>
                                <div class="sem5">
                                    <div class="semLabel"> Semester 5</div>
                                    <div class="subList">
                                        @foreach($temp['subjects'] as $row)                                            
                                            @if($row->semester == '5th')
                                                &nbsp;&nbsp;<input class="subject" type="checkbox" name="subjects[]" value="{{$row->subject_id}}">&nbsp;{{$row->subject_name}}</input><br/> 
                                            @endif
                                         @endforeach
                                    </div>
                                    
                                </div>
                                <div class="sem6">
                                    <div class="semLabel"> Semester 6</div>
                                    <div class="subList">
                                        @foreach($temp['subjects'] as $row)                                            
                                            @if($row->semester == '6th')
                                                &nbsp;&nbsp;<input class="subject" type="checkbox" name="subjects[]" value="{{$row->subject_id}}">&nbsp;{{$row->subject_name}}</input><br/> 
                                            @endif
                                         @endforeach
                                    </div>
                                    
                                </div>
                           
                                <div class="sem7">
                                    <div class="semLabel"> Semester 7</div>
                                    <div class="subList">
                                        @foreach($temp['subjects'] as $row)                                            
                                            @if($row->semester == '7th')
                                                &nbsp;&nbsp;<input class="subject" type="checkbox" name="subjects[]" value="{{$row->subject_id}}">&nbsp;{{$row->subject_name}}</input><br/> 
                                            @endif
                                         @endforeach
                                    </div>
                                    
                                </div>
                                <div class="sem8">
                                    <div class="semLabel"> Semester 8</div>
                                    <div class="subList">
                                        @foreach($temp['subjects'] as $row)                                            
                                            @if($row->semester == '8th')
                                                &nbsp;&nbsp;<input class="subject" type="checkbox" name="subjects[]" value="{{$row->subject_id}}">&nbsp;{{$row->subject_name}}</input><br/> 
                                            @endif
                                         @endforeach
                                    </div>
                                    
                                </div>                          
                           
                        </div> 
                     
                        <hr />
                    @endforeach

                @endforeach
               </form>
                <div class="NextBtn">
                    <button type="button" class="btn btn-default" id="nextBtn" onclick="document.getElementById('nextBtn').style.background='#2585b1';"
                        onmouseover="document.getElementById('nextBtn').style.background='#2dbcff'; document.getElementById('nextBtn').style.color='white';"
                        onmouseout="document.getElementById('nextBtn').style.background='#29aae3';"><strong>Next</strong></button>
                </div>
            </div>
        </div>

        <script type="text/javascript">
           
            $('.Dept1').each(function(j,obj){
                for(var i=1;i<=8;i++){                        
                    var subjects = $(obj).find('.sem'+i).find('.subject'); 
                    if(subjects.length == 0){
                        $(obj).find('.sem'+i).hide();
                    }                 
                }
            });

            $(document).on('click','#nextBtn', function(e){
                e.preventDefault();   
                var ele   = $('#subject_list');
                var data  = ele.serialize();
                var url   = '{{url("/faculty/setSubject")}}';
                $.ajax({
                   data : data,
                   url : url,
                   type: 'POST'
                }).done(function(data){                                  
                   window.location.href = '{{url("/admin")}}';
                   //console.log(data);
                });
            });

               
        </script>
</body>

</html>