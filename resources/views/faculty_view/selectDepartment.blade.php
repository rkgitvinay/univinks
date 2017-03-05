<DOCTYPE html>
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
            
            .innerform {
                border-width: thick;
                border-color: black;
                display: none;
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
            
            .Sec1 {
                display: inline-block;
                text-align: left;
                padding-left: 20px;
            }
            
            .Sec2 {
                display: inline-block;
                text-align: left;
                padding-left: 20px;
            }
            
            .Sec3 {
                display: inline-block;
                text-align: left;
                padding-left: 20px;
            }

        </style>
        <title>Select Department</title>
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
                        <h3><strong><?php echo $info->name;?></strong></h3>
                        <h4><?php echo $info->department; ?></h4>
                    </div>
                </div>
                <hr />
                <div class="content">
                    <h5><strong>> Are you a teaching faculty in any other department?</strong></h5>
                    <form class="mainform">
                        <input type="hidden" name="user_id" value="<?php echo $info->id ?>">
                        <input type="hidden" name="parent_dept" value="<?php echo $info->department ?>">
                        &emsp;<input name="yesno" value="yes" type="radio" id="radioYes">&nbsp;Yes</input>&emsp;
                        <input name="yesno" value="no" type="radio" id="radioNo" checked>&nbsp;No</input>
                    <br />
                    <div class="innerform" id="inForm">                        
                            <h5><strong>If Yes, then which Department(s) ?</strong></h5>
                            @foreach($dept as $list)                        
                                <input type="checkbox" value="{{$list->name}}" name="department[]">&nbsp;{{$list->name}}</input><br />
                            @endforeach
                        </form>
                    </div>
                </div>
                <div class="NextBtn">
                    <button type="button" class="btn btn-default selectDepartmentBtn" id="nextBtn" onclick="document.getElementById('nextBtn').style.background='#2585b1';"
                        onmouseover="document.getElementById('nextBtn').style.background='#2dbcff'; document.getElementById('nextBtn').style.color='white';"
                        onmouseout="document.getElementById('nextBtn').style.background='#29aae3';"><strong>Next</strong></button>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).on('click','#radioYes', function(){
                $('#inForm').css('display','block'); 
            });
            $(document).on('click','#radioNo', function(){
                $('#inForm').css('display','none');  
            });

            $(document).on('click','.selectDepartmentBtn', function(e){
                e.preventDefault();   
                var ele   = $('.mainform');
                var data  = ele.serialize();
                var url   = '{{url("/faculty/setDepartment")}}';//"http://localhost/production/addSubject";
                $.ajax({
                   data : data,
                   url : url,
                   type: 'POST'
                }).done(function(data){ 
                    if(data.status == 'success'){
                        window.location.href = '{{url("/admin")}}';      
                    }                 
                  
                });
            });
        </script>
    </body>

    </html>