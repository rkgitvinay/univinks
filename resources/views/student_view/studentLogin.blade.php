<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="119705170013-232n11v2en0lva0nrq5cbjejo2a0u49g.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Student Login : Univinks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
        body {
            font-family: Montserrat;
        }
        
        @font-face {
            font-family: Montserrat;
            src: url({{ URL::asset('public/fonts/Montserrat-Light.otf') }});
        }
        
        .col-md-7 {
            min-height: 100vh;
            background-size: cover;            
            background-image: url({{ URL::asset('public/images/download.png') }});
        }
                        .panel{
                    width: 375px;
                    height: 300px;
                    background-color: rgba(255, 255, 255, 0.4);
                    border-color: rgba(255, 255, 255, 0.4);
                    border-style: hidden;
                 }
                 .col-md-offset-8{
                    padding-top: 14%;
                    background-color: white;
                 }
                 .RightForm{
                    width: 300px;
                 }
                 .Left{
                    width: 375px;
                    margin-left: 20%;
                    margin-right: 60%;
                    margin-top: 20%;
                    text-align: center;
                    color: white;
                 }
                .LeftForm{
                    width: 350px;
                }
                .rightButton{
                    width: 300px;
                    height: 45px;
                }
                 .logInButton{
                     width: 300px;
                 }
                 .googleButton{
                     background-color: #dd4b39;
                 }
                 .googleButton:hover{
                    background-color: #dc6a5b;
                    color: white;
                 }
                 .googleButton:active{
                    background-color: #e3270e;
                    color: white;
                 }
                 
                 .fbButton{
                    background-color: #3b5998;   
                 }
                 .fbButton:hover{
                    background-color: #5f6e8e;
                    color: white;
                 }
                 .fbButton:active{
                    background-color: #1e489d;
                    color: white;
                 }
                 .RightText{
                     color: #87909f;
                 }

    </style>
</head>

<body>
<div id="fb-root"></div>
    <div class="col-md-7">
        <div class="Left">
            <div class="BigLeftText">
                <h1 style="display:inline;"><strong><img src="{{ URL::asset('public/images/logo.png') }}" style="width: 45px;">&nbspUnivinks</strong></h1>
            </div>
            Build connections and interact more with your College.<br /><br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="LeftForm">
                        <form id="login_form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group" id="email">
                                <input type="email" id="user_id" name="username" placeholder="user id" style="background: url({{ URL::asset('public/images/envelope.png')}}) no-repeat; padding-left: 30px; width: 325px; height: 30px; border-style: hidden; background-color: rgba(52,61,60,0.6)">
                            </div>
                            <div class="form-group" id="password">
                                <input type="password" id="password" name="password" placeholder=" Password" style="background: url({{ URL::asset('public/images/key.png')}}) no-repeat; padding-left: 30px; width: 325px; height: 30px; border-style: hidden; background-color: rgba(52,61,60,0.6)">
                            </div>
                            <button type="button" class="logInButton btn btn-success">Log In</button>
                            <p id="error_login" style="display: none;color: red;">Error!, make sure you are registered.</p>
                        </form>
                        <br /><strong><h4>OR</h4></strong> Log in with<br /><br />
                        <div style="display: flex;">
                            <div class="g-signin2" data-onsuccess="onSignIn">Button</div>
                            <!-- <div class="fbButton btn" style="width:150px;margin-left: 50px;">Facebook</div> -->
                            <div style="width:150px;margin-left: 50px;" class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false">button</div>
                            <!-- <button type="button" class="fbButton btn" style="width:150px;">Facebook</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="col-md-offset-8">
        <div class="RightText">
            <h3><strong>Sign Up</strong></h3>
            Don't have an account?
        </div>
        <br />
        <div class="RightForm">
            <form id="reg_form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <select name="college_id" class="form-control" id="sel">
                       <option value="" selected disabled>Select College</option>
                       @foreach($college as $clg)
                            <option value="{{$clg->college_id}}">{{$clg->name}}</option>
                       @endforeach                      
                    </select>
                </div>
                <div class="form-group" id="ID">
                    <input type="text" name="username" id="ID" placeholder="    Enter ID" style="width: 300px;">
                </div>
                <button type="button" class="rightButton btn btn-success">Get Started</button>
            </form>
            <p id="error_msg" style="color: red;display: none;"></p>
        </div>
    </div>
    <!-- <a onclick="signOut()" href="javascript:void(0);">logOut</a> -->
    <script>

    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=166497960511409";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        // console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        // console.log('Full Name: ' + profile.getName());
        // console.log('Given Name: ' + profile.getGivenName());
        // console.log('Family Name: ' + profile.getFamilyName());
        // console.log("Image URL: " + profile.getImageUrl());
        //console.log("Email: " + profile.getEmail());
        var email = profile.getEmail();
        var url   = '{{url("/student/googleLogin")}}';
        $.ajax({
           data : {email:email},
           url : url,
           type: 'POST'
        }).done(function(data){            
           if(data.status=='error'){
              $('#error_login').css({'display':'block'});
           }else{                
                window.location.href = '{{url("/")}}';
           } 
                  
        });

        // The ID token you need to pass to your backend:
        //var id_token = googleUser.getAuthResponse().id_token;
        //console.log("ID Token: " + id_token);
    };

    function signOut() {
        document.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/production";
    }

    $(document).on("click",".rightButton",function(e){
        e.preventDefault();  
        $('#error_msg').css({'display':'none'});
        var ele   = $('#reg_form');
        var data  = ele.serialize();
        var url   = '{{url("/student/getStarted")}}';
        $.ajax({
           data : data,
           url : url,
           type: 'POST'
        }).done(function(data){            
           if(data.status=='error'){
              $('#error_msg').css({'display':'block'});
              $('#error_msg').text(data.message);
           }else{                
                window.location.href = '{{url("/student/getStudentDetails")}}';
           } 
                  
        });
    });

  $(document).on("click",".logInButton",function(e){
        e.preventDefault();  
        $('#error_login').css({'display':'none'});
        var ele   = $('#login_form');
        var data  = ele.serialize();
        var url   = '{{url("/student/login")}}';
        $.ajax({
           data : data,
           url : url,
           type: 'POST'
        }).done(function(data){            
           if(data.status=='error'){
              $('#error_login').css({'display':'block'});
           }else{                
                window.location.href = '{{url("/")}}';
           } 
                  
        });
  });
</script>
</body>

</html>