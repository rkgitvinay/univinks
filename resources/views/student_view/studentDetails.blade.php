<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Student Login : Univinks</title>
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
            height: 45px;
            text-align: center;
            position: absolute;
            left: 0;
            right: 0;
        }
            
        .univinks {
            margin-top: -12px;
        }
        
        .mid{
            margin-top: 30vh;
            padding-top: 25px;
            padding-right: 30px;
            color: #666666;
            font-weight: 600;
            height: 100%;
            text-align: right;
        }
        
        .left-input{
            height: 100%;
            text-align: right;
        }
        
        .nameInput{
            width: 70%;
            display: inline;
            border-style: solid;
            border-width: 2px;
            border-radius: 0;
            border-color: #999999;
        }
        
        .deptInput{
            width: 70%;
            display: inline;
            border-style: solid;
            border-width: 2px;
            border-radius: 0;
            border-color: #999999;
        }
        
        .right-input{
            height: 100%;
            text-align: right;
        }
        
        .emailInput{
            width: 70%;
            display: inline;
            border-style: solid;
            border-width: 2px;
            border-radius: 0;
            border-color: #999999;
        }
        
        .pwdInput{
            width: 70%;
            display: inline;
            border-style: solid;
            border-width: 2px;
            border-radius: 0;
            border-color: #999999;
        }
        
        .mnoInput{
            width: 70%;
            display: inline;
            border-style: solid;
            border-width: 2px;
            border-radius: 0;
            border-color: #999999;
        }
        
        .submBtn{
            font-weight: 600;
            border-radius: 0;
            width: 125px;
            margin-right: 15px;
            margin-bottom: 15px;
        }

        
    </style>
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
        <div class="panel mid col-sm-8 col-sm-offset-2">
            <div class="left-input col-sm-6">
                <form role="form">
                    <div class="form-group">
                        Name:&nbsp;&nbsp;
                        <input type="text" class="form-control nameInput" id="nameInput" placeholder="<?php print_r($details[0]->name); ?>            " disabled>
                    </div>
                    <div class="form-group">
                        Department:&nbsp;&nbsp;
                        <input type="text" class="form-control deptInput" id="deptInput" placeholder="<?php print_r($details[0]->department); ?>" disabled>
                    </div>
                </form>
            </div>
            <div class="right-input col-sm-6">                   
                <form role="form" id="std_form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="<?php print_r($details[0]->user_id); ?>            ">
                    <div class="form-group">
                        Email:&nbsp;&nbsp;
                        <input type="email" value="<?php print_r($details[0]->email); ?>" name="email" class="form-control emailInput" id="emailInput">
                    </div>
                    <div class="form-group">
                        Password:&nbsp;&nbsp;
                        <input type="password" name="password" class="form-control pwdInput" id="pwdInput">
                    </div>
                    <div class="form-group">
                        Mobile:&nbsp;&nbsp;
                        <input type="tel" value="<?php print_r($details[0]->mobile); ?>" name="mobile" class="form-control mnoInput" id="mnoInput">
                    </div>
                </form>    
            </div>
            <button class="btn btn-success submBtn">Submit</button>
        </div>
    </div>

    <script>
        $(document).on("click",".submBtn",function(e){
            e.preventDefault();  
            // $('#error_msg').css({'display':'none'});
            var ele   = $('#std_form');
            var data  = ele.serialize();
            var url   = '{{url("/student/setStudentDetails")}}';
            $.ajax({
               data : data,
               url : url,
               type: 'POST'
            }).done(function(data){            
               if(data.status=='success'){
                  window.location.href = '{{url("/student/getStudentSem")}}';
               }
                      
            });
        });
    </script>
</body>

</html>
