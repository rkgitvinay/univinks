<DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                margin-top: 17.5vh;
                margin-left: auto;
                margin-right: auto;
                width: 450px;
                height: 450px;
            }
            
            .panelContent {
                text-align: center;
                padding-top: 20px;
            }
            
            .detailsText {
                display: inline-block;
                color: #7c899a;
            }
            
            .centerText {
                font-size: 20px;
                margin-top: 60px;
                color: #7c899a; 
            }

            .btn{
                background-color: #29aae3;
                color: white;
                height: 40px;
                width: 350px;
                margin-top: 75px;
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
                <div class="panelContent">
                    <div class="head">
                        <h2 style="color: #5ba985;"><strong>Welcome</strong></h2>
                        <div class="details">
                            <img src="{{ URL::asset('public/images/propic.png') }}" height="75px" style="margin-top: -55px;">
                            <div class="detailsText">
                                <h3>
                                    </img>&nbsp;&nbsp;<?php echo $info->name ?></h3>
                                <h4><?php echo $info->department ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="centerText">
                        Your Profile is now set up on Univinks.
                    </div>
                    <button type="button" class="btn btn-default" id="nextBtn" onclick="document.getElementById('nextBtn').style.background='#2585b1';"
                        onmouseover="document.getElementById('nextBtn').style.background='#2dbcff'; document.getElementById('nextBtn').style.color='white';"
                        onmouseout="document.getElementById('nextBtn').style.background='#29aae3';"><strong>Head to Dashboard</strong></button>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).on('click','#nextBtn', function(e){
                e.preventDefault();                   
                var url   = '{{url("/step/facultyDashboard")}}';
                $.ajax({                   
                   url : url,
                   type: 'GET'
                }).done(function(data){                                  
                   window.location.href = '{{url("/admin")}}';                   
                });
            });
        </script>
    </body>

    </html>