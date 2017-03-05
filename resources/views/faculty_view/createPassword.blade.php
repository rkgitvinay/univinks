<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Univinks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
   <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>    
    <style>
        body {
            font-family: Montserrat;
        }
        
        @font-face {
            font-family: Montserrat;
            src: url({{ URL::asset('public/fonts/Montserrat-Light.otf') }});
        }        
        .list {
            width: 250px;
            text-align: left;
        }
                        .panel{
                    background-color: #fff;
                    -webkit-border-radius: 2px;
                    border-radius: 2px;
                    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    margin-top: 30px;
                    margin: 0 auto;
                    max-width: 900px;
                    padding: 40px 40px;
                    align-content: center;
                    min-height: 350px;
                }
                .container-fluid{
                    padding-top: 25vh;
                }
                .right{
                    text-align: center;
                    padding-top: 5%;
                }
                .left{
                    border-right: 2px solid rgb(230, 230, 230);
                    
                }
                body{
                    background-color: rgb(230, 230, 230);
                }
                .univinks{
                    margin-top: -25px;
                }
                .leftHead{
                    text-align: center;
                }
                .leftText{
                    padding-left: 6vh;
                    color: #999999;
                    font-size: 15px;
                }
                .pwdBox{
                    width: 235px;
                    height: 35px;
                    border-width: 2px;
                    border-style: solid;
                    border-color: #d6dfee;
                    background-image: url(key.png);
                    background-repeat: no-repeat;
                    background-position: right;
                    text-indent: 10px;
                }
                .startButton{
                    width: 235px;
                    background-color: #29aae3;
                    color: white;
                }
                .panel{
                    background-color: #fff;
                    -webkit-border-radius: 2px;
                    border-radius: 2px;
                    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    margin-top: 30px;
                    margin: 0 auto;
                    max-width: 900px;
                    padding: 40px 40px;
                    align-content: center;
                }
                .container-fluid{
                    padding-top: 15%;
                }
                .left{
                    text-align: center;
                }
                .right{
                    text-align: center;
                }
                body{
                    background-color: rgb(245, 245, 245);
                }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="panel">
            <div class="panel-body">
                <div class="left col-md-6">
                    <div class="leftHead">
                        <img src="{{ URL::asset('public/images/logo.png') }}" height="100" />
                        <div class="univinks">
                            <h1>
                                <span style="color: #666666;">Univ</span>
                                <span style="color: #999999; margin-left: -9px;">inks</span>
                            </h1>
                        </div>
                    </div><br />
                    <div class="leftText">
                        <div class="list">
                            <ul style="list-style-type: circle">
                                <li>Create a Virtual Classroom.</li>
                                <li>Easy Communication.</li>
                                <li>Deeper Interaction.</li>
                            </ul>
                        </div>
                    </div>
                </div>                
                <div class="col-md-offset-6">
                    <div class="right">
                        <h3 style="color: #999999"><strong>Welcome</strong></h3>
                        <h3 style="color: #5cc897; margin-top: -5px;"><strong><?php echo $info->name; ?></strong></h3><br />
                        <form id="setPassword">
                            <input value="<?php print_r($info->id) ?>" type="hidden" name="user_id">
                            <input class="pwdBox" type="password" name="pwd" placeholder="Set Password"><br /><br />
                        </form>

                        <button type="button" class="startButton btn btn-default">
                                    Get Started
                                </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).on('click','.startButton', function(e){
            e.preventDefault();   
            var ele   = $('#setPassword');
            var data  = ele.serialize();
            var url   = '{{url("/faculty/setPassword")}}';//"http://localhost/production/addSubject";
            $.ajax({
               data : data,
               url : url,
               type: 'POST'
            }).done(function(data){                                  
               window.location.href = '{{url("/admin")}}';
            });
        });
    </script>

</body>

</html>