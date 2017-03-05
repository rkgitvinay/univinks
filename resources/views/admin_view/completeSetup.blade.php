<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

    <style type="text/css">

.sidebar-nav {
    position: fixed;
    width: 190px;
    padding: 0;
    height: 100%;
    overflow-y: auto;
    overflow-x: hidden;
    background: black;
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
                    <a href="{{ URL::to('/admin/departments') }}"><img src="{{ URL::asset('public/images/billing.png' ) }}"><div>Departments</div> </a>
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
</body>
</head>
