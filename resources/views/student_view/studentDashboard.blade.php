<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Student Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Montserrat;
            background-color: #f2f2f2;
        }
        
        @font-face {
            font-family: Montserrat;
            src: url({{ URL::asset('public/fonts/Montserrat-Light.otf') }});
        }
        .header{
                height: 52px;
                text-align: center;
                position: absolute;
                left: 0;
                right: 0;
                height: 51px;
            }
            
            .panel{
                background-color: #ffffff;
                box-shadow: 0 0 3px 0 rgba(175, 175, 175, 0.5);
            }
            
            .univinks{
                margin-top: -8px;
            }
            
            .details{
                height: 107px;
                width: 794px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 65px;
            }
            
            .detailsText{
                display: inline-block;
                margin-left: 10px;
                margin-top: 10px;
                width: 660px;
            }
            
            .propic{
                height: 100%;
                margin-top: -80px;
            }
            
            .name{
                font-size: 22.7px;
                font-weight: 600;
                color: #636e7b;
            }
            
            .dept{
                font-size: 16.5px;
                color: #eb431c;
            }
            
            .college{
                font-size: 16.5px;
                color: #636e7b;
            }
            
            .course{
                width: 660px;
                text-align: right;
                font-size: 16.5px;
                color: #636e7b; 
                margin-top: -10px;
            }
            
            .content{
                height: 512px;
                width: 794px;
                margin-left: auto;
                margin-right: auto;
                margin-top: -7px;
            }
            
            .card{
                width: 215.5px;
                height: 130.4px;
                background-color: #ffffff;
                box-shadow: 0 0 3px 0 rgba(182, 182, 182, 0.5);
                display: inline-block;
                margin-left: 35px;
            }
            
            .cardheader{
                width: 100%;
                height: 41.1px;
                color: white;
                text-align: center;
                font-size: 12.4px;
                letter-spacing: -0.2px;
                padding-top: 11.1px
            }
            
            .profname{
                color: #636e7b;
                font-weight: 600;
                text-align: center;
                margin-top: 5px;
            }
            
            .by{
                text-align: center;
                margin-top: 6.4px;
            }
            .cardfooter{
                text-align: center;
                margin-top: -15px;
                font-weight: 600;
            }
            
            .row{
                padding-left: 15px;
                margin-top: 32.5px;
            }
            
            .unreadbadge{
                position: relative;
            }
            
            .unreadbadge[data-badge]:after{
                content: attr(data-badge);
                position: absolute;
                width: 22.8px;
                height: 22.8px;
                background-color: #e84918;
                font-size: 13.9px;
                color: white;
                text-align: center;
                border-radius: 50%;
                box-shadow: 0 0 1px #333;
                top: -11.4px;
                right: -224px;
                padding-top: 0.5px;
            }

    </style>

    <body>
        <div class="container-fluid">
            <div class="panel header">
                <div class="univinks">
                    <h3>
                        <img src="{{ URL::asset('public/images/logo.png') }}" height="30" />
                        <span style="color: #666666;">Univ</span>
                        <span style="color: #999999; margin-left: -5px;">inks</span>
                        <span class="pull-right" style="font-size: 15px;padding: 10px;">
                            <a href="{{url('/logout')}}">logout</a>
                        </span>
                    </h3>

                </div>
            </div>
            <div class="panel details">
                <img class="propic" src="{{ URL::asset('public/images/propic.png') }}">
                <div class="detailsText">
                    <div class="name"><?php echo $info[0]->name ?></div>
                    <div class="dept"><?php echo $info[0]->department ?></div>
                    <div class="college"><?php echo $info[0]->college_name ?></div>
                    
                </div>
            </div>
            <div class="panel content">
                <div class="row">
                @foreach($subjects as $sub)
                    <div class="card">
                        <a href="#" class="unreadbadge" data-badge="{{$sub->total}}" id='badge01'></a>
                        <a href="{{ URL::to('student/subject/' . $sub->subject_id) }}">
                            <div class="cardheader" style="background-color: #c48ac4;">
                                {{$sub->subject_name}} / {{$sub->subject_code}}
                            </div>
                        </a> 
                        <div class="cardcenter">
                            <div class="by">by</div>
                            <div class="profname">
                                <img class="img-circle" src="{{ URL::asset('public/images/propic.png') }}" height="23px"> {{$sub->faculty_name}} 
                            </div>
                        </div>
                        <hr style="margin-top: 6px" />
                        <div class="cardfooter" style="color: #c48ac4;">
                            +1 Pending Assignment
                        </div>
                    </div>
                @endforeach
                </div>

            </div>
        </div>
    </body>
</head>

</html>