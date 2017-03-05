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
                margin-top: 30vh;
                margin-left: auto;
                margin-right: auto;
            }
            
            .content {
                margin-top: 25px;
                margin-left: 35px;
            }
            
            .content {
                color: #7c899a;
            }
            
            .innerform {
                display: none;
            }
            
            .btn {
                height: 40px;
                width: 75px;
                background-color: #29aae3;
                color: white;
                border-radius: 0px;
            }
            
            .NextBtn {
                text-align: right;
                margin-right: 20px;
                margin-top: 5px;
                margin-bottom: 20px;
            }
            
            .semList{
                width: 100px;
                margin-left: 20px;
                margin-top: -20px;
                border-radius: 0px;
                border-style: solid;
                border-width: 2px;
                color: #7c899a;
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
            <div class="panel center">
                <div class="content">
                    <h4><strong>>Select Semester:</strong></h4>
                    <form class="mainform">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        &emsp;<input name="type" value="ug" type="radio" id="radioUG" onclick="document.getElementById('UGsem').style.display='block'; document.getElementById('DDsem').style.display='none'; document.getElementById('PGsem').style.display='none';">&nbsp;UG</input>&emsp;
                        <input name="type" value="dd" type="radio" id="radioDD" onClick="document.getElementById('DDsem').style.display='block'; document.getElementById('UGsem').style.display='none'; document.getElementById('PGsem').style.display='none';">&nbsp;DD</input>&emsp;
                        <input name="type" value="pg" type="radio" id="radioPG" onClick="document.getElementById('PGsem').style.display='block'; document.getElementById('UGsem').style.display='none'; document.getElementById('DDsem').style.display='none';">&nbsp;PG</input>
                    <br /><br /><br>
                    <div class="innerform" id="UGsem">
                        <div class="form-group">
                            <select name="opt_ug" class="form-control semList" id="sel">
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                                <option value="8th">8th</option>
                            </select>
                        </div>       
                    </div>
                    <div class="innerform" id="DDsem">
                        <div class="form-group">
                            <select name="opt_dd" class="form-control semList" id="sel">
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                                <option value="8th">8th</option>
                                <option value="9th">9th</option>
                                <option value="10th">10th</option>
                            </select>
                        </div>    
                    </div>
                    <div class="innerform" id="PGsem">
                        <div class="form-group">
                            <select name="opt_pg" class="form-control semList" id="sel">
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                            </select>
                        </div>       
                    </div>
                    </form>
                </div>
                <div class="NextBtn">
                    <button type="button" class="btn btn-default" id="nextBtn" onclick="document.getElementById('nextBtn').style.background='#2585b1';"
                        onmouseover="document.getElementById('nextBtn').style.background='#2dbcff'; document.getElementById('nextBtn').style.color='white';"
                        onmouseout="document.getElementById('nextBtn').style.background='#29aae3';"><strong>Next</strong></button>
                </div>
            </div>
        </div>

        <script>
        $(document).on("click","#nextBtn",function(e){
            e.preventDefault();  
            // $('#error_msg').css({'display':'none'});
            var ele   = $('.mainform');
            var data  = ele.serialize();
            var url   = '{{url("/student/setStudentSem")}}';
            $.ajax({
               data : data,
               url : url,
               type: 'POST'
            }).done(function(data){            
               if(data.status=='success'){
                  window.location.href = '{{url("/")}}';
               }                      
            });
        });
    </script>
    </body>

    </html>