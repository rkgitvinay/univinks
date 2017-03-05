<!DOCTYPE HTML>
<html>
<head>
<title>Univinks | Create New Password</title>


<link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

</head>

<body>

    
    <style type="text/css">
    a{
      text-decoration: none !important;
    }
    body{
      overflow: hidden;
    }
     .container-fluid > .row{
        padding-top: 110px;
        background-color:#F6F6F6;
        padding-bottom: 110px;
       }
      .navbar{
         margin-bottom: 0px;
         border-bottom: 3px solid rgba(97, 85, 85, 0.11);
      }
      .navbar-bottom{
         border-top: 3px solid rgba(97, 85, 85, 0.11);
      }
     .form-control{
      background-color:#F4F4F4;
      color:black;
      border:0px;
      padding-left: 20px;
      }
     .panel-body > .row{
      padding-bottom: 20px;
     }
     .media-heading{
      padding-top: 5px;
     }
    .form-group button{
      background-color:#22B573;
     }
    .form-group button:hover{
      background-color:#1F945F;
     }
     .form-group .col-md-12{
      padding-top: 20px;
     }
     label{
      /*font-family:ProximaNova-Semibold;*/
      font-size: 16px;
      color:#666666;
      line-height:20px;
     }
    </style>

  <nav class="navbar">
      <div class="container">
          <div class="col-md-offset-5 col-md-3">
              <ul class="nav navbar-nav">
                  <li><h3><strong>Univ</strong><span class="text-muted">Inks</span></h3></li>
              </ul>
           </div>
      </div>
  </nav>

<div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-md-offset-4" >               
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-offset-3 col-md-6">
                <div class="media">
                  <!-- <div class="media-left">
                    <img class="media-object" src="{{ URL::asset('public/images/admin_icon.png') }}" alt="admin" style="width:25px;height:25px;">
                  </div> -->
                    <!-- <div class="media-body">
                      <h4 class="media-heading">New Password</h4>
                    </div> -->
                </div>
              </div>
            </div>
            <p id="error" style="color: red;margin-bottom: 5px;"></p>
            <form class="form-horizontal" id="login">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="form-group">
                <label for="input2" class="col-md-2 control-label">New Password</label>
                <div class="col-md-offset-1 col-md-9">
                  <input type="password" name="password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input2" class="col-md-2 control-label">Confirm Password</label>
                <div class="col-md-offset-1 col-md-9">
                  <input type="password" name="cnf_password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <button type="submit" id="btnLogin" class="btn btn-success btn-block btn-lg">Change Password</button>
                </div>
              </div>
            </form>            
          </div>
        </div>
      </div>
    </div>    
</div>
 
 
 <div class="navbar navbar-bottom">
    <p class="navbar-text pull-left">UnivInks © 2016</p>
    <ul class="list-inline pull-right">
       <li class="navbar-text"><a href="http://www.univinks.com/" class="text-muted"><strong>Home</strong></a></li>
       <li class="navbar-text"><a href="#" class="text-muted" data-toggle="modal" data-target="#popUpWindow"><strong>Contact Us</strong></a></li>
    </ul>
  </footer>
                       
<div class="modal fade" id="popUpWindow">
  <div class="modal-dialog">
      <div class="modal-content">          
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Contact Us</h3>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
           <input type="text" class="form-control" placeholder="Subject">
          </div>
        </form>
        <textarea class="form-control" rows="5" placeholder="Suggestion & Feedback"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Send</button>
        <button type="button" data-dismiss="modal" class="btn">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).on("click","#btnLogin",function(e){
    e.preventDefault();   
    var ele   = $('#login');
        var data  = ele.serialize();
        var url   = '{{url("/newPassword")}}';
        $.ajax({
           data : data,
           url : url,
           type: 'POST'
        }).done(function(data){
           if(data.status=='error'){
              $('#error').text(data.message);
           }else{
              window.location.href = '{{url("/admin")}}';//"http://localhost/production";
           }                    
              
        });
  });
</script>

</body>
</html>