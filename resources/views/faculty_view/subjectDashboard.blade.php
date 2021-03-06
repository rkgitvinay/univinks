<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Files | Univinks</title>
    <script src="https://use.fontawesome.com/b7f499e08c.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/sweetalert.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/font-awesome.min.css') }}" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="{{ URL::asset('public/fonts/glyphicons-halflings-regular.ttf') }}" />    
    <link rel="stylesheet" href="{{ URL::asset('public/css/scss/styles.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/scss/style1.css') }}" />

    <meta property="og:url" content="http://www.your-domain.com/your-page.html" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Your Website Title" />
    <meta property="og:description" content="Your description" />
    <meta property="og:image" content="http://www.your-domain.com/path/image.jpg" />
    <style type="text/css">
    .shape{    
        border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
        -ms-transform:rotate(360deg); /* IE 9 */
        -o-transform: rotate(360deg);  /* Opera 10.5 */
        -webkit-transform:rotate(360deg); /* Safari and Chrome */
        transform:rotate(360deg);
    }

    .shape-text{
        color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
        -ms-transform:rotate(30deg); /* IE 9 */
        -o-transform: rotate(360deg);  /* Opera 10.5 */
        -webkit-transform:rotate(30deg); /* Safari and Chrome */
        transform:rotate(30deg);
    }

    .project {
        min-height:70px;
        height:auto;
    }

    .project{
        background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); overflow:hidden;
    }

    .project-radius{
        border-radius:7px;
    }
    .project-success {  border-color: #5cb85c; }
    .project-success .shape{
        border-color: transparent #5cb85c transparent transparent;
        border-color: rgba(255,255,255,0) #5cb85c rgba(255,255,255,0) rgba(255,255,255,0);
    }
    .project-content {
        padding:0 20px 3px;
    }
    .custom{
        padding-left: 0px !important;
        padding-right: 0px !important;
        margin-top: 3px;
    }
   /* .panel-heading a:after {
        font-family: 'fontawesome';
        content: "\f07d";
        float: right;
        color: grey;
    }*/
    .panel-heading {
        cursor: pointer;
        cursor: hand;
    }
    .submcard{
                width: 100%px;
                height: 90px;
                margin-left: auto;
                margin-right: auto;
                padding-top: 14px;
                padding-bottom: 14px;
                padding-left: 16px;
                padding-right: 20px;
                margin-top: 16px;
            }
            
            .submName{
                font-weight: 600;
            }
            
            .cardLeft{
                display: inline-block;
                margin-left: 10px;
            }
            
            .propic{
                height: 61px;
            }
            
            .cardRight{
                display: inline-block;
                text-align: right;
                width: 70%;
            }
            
            .reviewIcon{
                height: 23px;
            }
            
            .redoIcon{
                height: 23px;
            }
            
            .approveIcon{
                height: 23px;
            }
            
            .approvedText{
                color: #7ed321;
                font-weight: 600;
            }
            
            .reviewText{
                font-weight: 600;
                color: #f5a623;
            }
            
            .redoText{
                font-weight: 600;
                color: #e74256;
            }
             .assignDesc{
                height: 134.5px;
                margin-top: 2px;
                padding-left: 30px;
                padding-top: 30px;
                
            }
            
            .assignImg{
                height: 50px;
                margin-top: -35px;
            }
            
            .descText{
                display: inline-block;
                margin-left: 10px;
            }
            
            .assignDeadline{
                display: inline-block;
                text-align: right;
                width: 60%;
            }
            
            .redDate{
                background-color: #e56373;
                display: inline-block;
                border-radius: 3px;
                color: white;
            }
            .expand{
                width: 100%;
                text-align: center;
                margin-top: 10px;
            }
    </style>
</head>

<body>
    <div id="fb-root"></div>
    <!-- <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=557156057775440";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->

    <!--NAV BAR STARTS-->
    <nav class="navbar navbar-default myNav">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="#">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse text-center mynav-text" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-center">
                    <li><a href="#">Univ<span>Inks</span></a></li>
                </ul>
                <a class="pull-right" style="font-size: 20px;" href="{{ URL::to('/admin/logout') }}">Logout</a>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!--NAV BAR ENDS-->



    <div class="row main-heading-row-1">
        <div class="col-xs-8 structure-text">{{$sub_info->subject_name}}</div>
        <div class="col-xs-4"></div>
    </div>
    <div class="row main-heading-row-2">
        <div class="col-sm-8 col-xs-2"></div>
       <!--  <div class="col-sm-4 col-xs-8 author-info">
            N <span>Students Enrolled</span>
        </div> -->
    </div>
    <div class="row main-heading-row-3">
        <ul class="nav nav-tabs">
            <li>
                <div class="col-xs-2 tab-text">
                    <a data-toggle="tab" href="#sec1">Files</a>&emsp;&emsp;&emsp;
                </div>
            </li>
            <li>
                <div class="col-xs-3 tab-text">
                    <a data-toggle="tab" href="#sec2">Discussions</a>&emsp;&emsp;&emsp;
                </div>
            </li>
            <li>
                <div class="col-xs-3 tab-text">
                    <a data-toggle="tab" href="#sec3">Submissions</a>&emsp;&emsp;&emsp;
                </div>
            </li>
            
            <span>
               <?php echo Session::get('message'); ?>
            </span>

        </ul>
    </div>

    <div class="tab-content">
        <!-- Section 1 -->
        <div id="sec1" class="tab-pane fade in active">
            <div class="main-wrapper">
                <div class="wrapper-inner">
                    <div class="row upload-row">
                        <div class="col-md-12 drag-and-drop">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 drag-and-drop-main">
                                    <div class="row">                                        
                                        <!-- <div class="col-xs-1">
                                            <i class="fa fa-cloud-upload"></i>
                                        </div>
                                        <div class="col-xs-5 drag-and-drop-main-text">
                                            Drag and Drop Your Files Here
                                        </div>
                                        <div class="col-xs-1 or-text">
                                            OR
                                        </div> -->

                                        <div class="col-xs-5 browse-text">
                                           <form action="{{ URL::to('/faculty/uploadAssignment') }}" class="form-horizontal" method="post" enctype="multipart/form-data">                                                
                                                <div class="input-group">
                                                    <input type="hidden" name="subject_id" value="{{$subject_id}}">
                                                    <input type="hidden" name="deadline" id="deadline">
                                                    <input type="hidden" name="assignmentName" id="assignmentName">
                                                    <input type="hidden" name="notes" id="notes">
                                                   <input onchange="assignmentInfo();" type="file" name="file_info" />
                                                   <span class="input-group-btn">
                                                        <button class="btn btn-primary">Upload File</button>
                                                   </span>
                                                  
                                                </div>
                                            </form>
                                        </div>                                       


                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div id="collapse1" class="panel panel-collapse collapse assignDetails">
                        File Name:&nbsp;&nbsp;<input type="text" class="postName" disabled><br /> Title:&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="postTitle"><br /> Comments:&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="postComment"><br />
                        <button type="submit" class="btn btn-success postBtn">Upload</button>
                    </div>
                    <hr />
                    <div class="row feed-row-heading">
                        Feed
                    </div>

                    @foreach($sub_files as $file)
                    <div class="row feed-row-main" id="assignment_row_{{$file['id']}}">
                        <div class="row">
                            <div class="col-md-11"></div>
                            <div class="col-md-1 trash-icon">
                                <i style="cursor: pointer;" data-assignment_id="{{$file['id']}}" class="fa fa-trash-o delete_assignment"></i>
                            </div>
                        </div>
                        <div class="row feed-row-content">
                            <div class="col-md-1" style="padding: 0">
                                <img src="http://placehold.it/70x70" alt="" />
                            </div>
                            <div class="col-md-10 main-text">
                                <a target="_blank" href="{{ URL::asset('uploads/'.$file['subject_name']) }}">
                                    <span>{{$file['subject_name']}}</span>
                                </a>
                                <!-- <span style="padding-left: 10px; color: blue;"><i class="fa fa-eye"></i></span> -->
                                <p>{{$file['notes']}}</p>
                            </div>
                            <div class="col-md-1 date">
                                {{$file['deadline']}}
                            </div>
                        </div>
                        <div class="row feed-row-footer">
                            <div class="col-md-1" style="padding: 0">
                            </div>
                            <div class="col-md-4 upload-text">
                                <p>Uploaded By: <span>&nbsp;&nbsp;{{$file['faculty_name']}}</span></p>
                            </div>
                             <!-- <div class="col-md-3 upload-text">
                                <a href="#" id="viewSubmissions" data-assgn_id="{{$file['id']}}" data-toggle="modal" data-target="#submissionModel">View Submissions</a>
                            </div> -->
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3 button-1">
                                        <div class="row">
                                            <div class="col-xs-7 button-1-left">
                                                &nbsp;Upvote
                                            </div>
                                            <div class="col-xs-5 button-1-right ">
                                                {{$file['upvote']}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3 button-2">
                                        <div class="row">
                                            <div class="col-xs-8 button-2-left">
                                                &nbsp;Downvote
                                            </div>
                                            <div class="col-xs-4 button-2-right">
                                                {{$file['downvote']}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach


                    <br/><br/><br/><br/><br/><br/>
                </div>
            </div>
        </div>

        <!-- Section 1 ends -->

        <div id="sec3" class="tab-pane fade" style="margin-top: 15px;">

<div class="container">
  <div class="row">
    <!-- <div class="col-md-6 col-md-offset-3 col-xs-12"> -->
     
      <div class="panel-group" id="accordion">

       

        <!-- panel2 -->
         @foreach($sub_files as $file)
        <div class="panel panel-default" id="panel2" data-toggle="collapse" data-target="#collapse{{$file['id']}}">
          <div class="panel-heading"  data-toggle="collapse" data-target="#collapse{{$file['id']}}">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-target="#collapse{{$file['id']}}" href="#collapse{{$file['id']}}" class="collapsed">
                    <img class="assignImg" src="{{ URL::asset('public/images/assignment.png' ) }}">
                    <div class="descText">
                        <h4><strong>{{$file['subject_name']}}</strong></h4>
                        Posted:&nbsp;<span class="datetime"><strong>{{$file['created_at']}}</strong></span>
                    </div>
                    <div class="assignDeadline">
                        <h5>Submission Deadline:</h5>
                        <div class="redDate">&nbsp;{{$file['deadline']}}&nbsp;</div>
                    </div>
                    <div class="expand">
                        <img src="{{ URL::asset('public/images/collapse_arrow1600.png' ) }}" height="20px">
                    </div>
                </a>
            

            </h4>
          </div>
          <div id="collapse{{$file['id']}}" class="panel-collapse collapse fade">
            <div class="panel-body">
                @foreach($file['submissions'] as $sub)
                <div class="panel submcard">
                    <img src="{{ URL::asset('public/images/propic.png' ) }}" class="propic">
                    <div class="cardLeft">
                        <div class="submName">{{$sub->student_name}}</div>
                        <div class="submDate">Submitted On: <strong>{{$sub->submitted_at}}</strong></div>
                    </div>
                    <div class="cardRight">
                        @if($sub->status == 'submit')
                        <span class="dynamic-text_{{$sub->id}}">
                            <img src="{{ URL::asset('public/images/iicon.png' ) }}"  class="reviewIcon">&emsp;&emsp;
                            <img src="{{ URL::asset('public/images/redArrow.png' ) }}" id="actionBtn" data-id="{{$sub->id}}" data-value="review" class="redoIcon">&emsp;&emsp;
                            <img src="{{ URL::asset('public/images/greentick.png' ) }}" id="actionBtn" data-id="{{$sub->id}}" data-value="accept" class="approveIcon">
                        </span>
                        @endif

                        @if($sub->status == 'review')
                        <span class="reviewText">Marked For Review</span>
                        @endif

                        @if($sub->status == 'accept')
                            <span class="approvedText">Approved</span>
                        @endif
                    </div>
                </div>
                <hr>
                 @endforeach

            </div>
          </div>
        </div>
        @endforeach
       
      </div>
   
  </div>
</div>

        </div>

        <!-- Section 2 -->
        <div id="sec2" class="tab-pane fade">
            <form id="discussion_form">
                <div class="panel post">
                    <input type="hidden" name="subject_id" value="{{$subject_id}}">
                    <input type="text" name="post_text" class="postbox" placeholder="Post Something?"><br />

                    <div class="btnSec">
                   <!--  <label style="float: left;"><input type="checkbox" name="ask_faculty" id="cbox1" value="1">&nbsp;Ask Faculty</label> -->
                        <button type="button" class="btn btn-success btnPostDiscussion">Post</button>
                    </div>
                </div>
            </form>
            <div id="discussion_list">
            @foreach($sub_disc as $disc)
                <div class="panel discCard" style="height: auto !important;">
                    <div class="cardHeader">
                        <img class="propic" src="{{ URL::asset('public/images/propic.png' ) }}">
                        <div class="poster">
                            <div class="posterName">{{$disc['student_name']}}</div>
                            <div class="posterDate">{{$disc['created_at'] }}</div>
                        </div>
                        <div class="binIcon">
                            <img src="{{ URL::asset('public/images/recycle-bin-icon-25.png') }}" height="20px;">
                        </div>
                    </div>
                    <div class="cardContent">
                        <!-- <div class="contentHeading">The Explanation of a Black Hole?</div> -->
                        <div class="mainContent">{{$disc['discussion']}}</div>
                        <div class="contentFooter">
                            <div class="commentCount">
                                <div class="staticComment">&nbsp;Comments</div>
                                <div class="commentCounter">{{$disc['comment_count']}}</div>
                            </div>
                            <div class="fbShare">
                            </div>
                        </div>
                    </div>
                    <div id="discussion_comments_{{$disc['id']}}">
                    @foreach($disc['comments'] as $comm)
                        <div class="postComment" style="height: auto !important;margin-top: 1px;">
                            <img src="{{ URL::asset('public/images/propic.png') }}" class="commentPic" style="margin-top: 4px;">
                            <div class="comment">
                                <div class="commentName">{{$comm->student_name}}</div><br />
                                <div class="commentText">{{$comm->discussion}}</div>
                            </div>
                            <div class="commentTime">{{ $comm->created_at }}</div>
                        </div>
                    @endforeach
                    </div>
                    <div>
                        <form id="postComment_{{$disc['id']}}">
                            <div class="form-group">                                 
                                <input type="hidden" name="discussion_id" value="{{$disc['id']}}">
                                <input autocomplete="off" data-id="{{$disc['id']}}" placeholder="write a comment" class="form-control" name="comment_text" id="addComment" type="text">
                            </div>
                        </form>
                    </div>

                </div>
            @endforeach
            </div>
        </div>
        <!-- Section 2 ends -->





        <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Assignment Details</h4>
                      </div>
                      <div class="modal-body">
                             <div class="form-group">
                                <label>Dead line</label>
                                <input autocomplete="off" class="form-control" id="datepicker" type="text">
                            </div>
                            <div id="service_info" class="form-group">
                                <label>Assignment</label>
                                <input autocomplete="off" class="form-control" id="assignment" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input autocomplete="off" class="form-control" id="assgnNotes" type="text">
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="updateData" class="btn btn-primary">Save</button>
                      </div>
                    </div>

                  </div>
                </div>
            <!-- Model end -->


              <!-- Modal -->
                <div id="submissionModel" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Submission Details</h4>
                      </div>
                      <div class="modal-body submission_list">

                            

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
            <!-- Model end -->

    </div>

    <script src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ URL::asset('public/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">

        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd',minDate:0 });
        function assignmentInfo(){
            $('#myModal').modal();
        }

        $(document).on('click', '#updateData', function(){
            $('#deadline').val($('#datepicker').val());
            $('#assignmentName').val($('#assignment').val());
            $('#notes').val($('#assgnNotes').val());

            $('#myModal').modal('hide');
        });

        $(document).on('click','.delete_assignment', function(){
            var assignment_id = $(this).data('assignment_id');
            var url   = '{{url("/faculty/deleteAssignment")}}';
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){
                $.ajax({           
                   url : url,
                   type: 'POST',
                   data:{assignment_id:assignment_id},
                }).done(function(data){                     
                    if(data.status == 'success'){               
                        $('#assignment_row_'+assignment_id).hide();
                        swal("Deleted!", "Your file has been deleted.", "success");
                    }             
                }); 
              
            }); 
        });

        $(document).on('click', '#actionBtn', function(e){
            var id = $(this).data('id');
            var value = $(this).data('value');
            var url   = '{{url("/facultySubject/review")}}';
            $.ajax({           
               url : url,
               type: 'POST',
               data:{submission_id:id,value:value},
            }).done(function(data){                     
                if(data.status == 'success'){               
                    if(value == 'review'){
                        $('.dynamic-text_'+id).html('');
                        $('.dynamic-text_'+id).text('Marked for review');
                        $('.dynamic-text_'+id).css({'color':'#f5a623','font-weight':'600'});
                    }else if(value == 'accept'){
                        $('.dynamic-text_'+id).html('');
                        $('.dynamic-text_'+id).text('Approved');
                        $('.dynamic-text_'+id).css({'color':'#7ed321','font-weight':'600'});
                    }
                }             
            });
        });

        $(document).on('click', '.btnPostDiscussion', function(e){
            e.preventDefault();  
            var ele   = $('#discussion_form');
            var data  = ele.serialize();
            var url   = '{{url("/faculty/postDiscussion")}}';
            $.ajax({
               data : data,
               url : url,
               type: 'POST'
            }).done(function(data){            
                if(data.status == 'success'){
                var post = '<div class="panel discCard" style="height: auto !important;">'+
                    '<div class="cardHeader">'+
                        '<img class="propic" src="{{ URL::asset("public/images/propic.png") }}">'+
                        '<div class="poster">'+
                            '<div class="posterName">'+data.post[0].student_name+'</div>'+
                            '<div class="posterDate">'+data.post[0].created_at+'</div>'+
                        '</div>'+
                        '<div class="binIcon">'+
                            '<img src="" height="20px;">'+
                        '</div>'+
                    '</div>'+
                    '<div class="cardContent">'+
                        '<div class="mainContent">'+data.post[0].discussion+'</div>'+
                        '<div class="contentFooter">'+
                            '<div class="commentCount">'+
                                '<div class="staticComment">&nbsp;Comments</div>'+
                                '<div class="commentCounter">0</div>'+
                            '</div>'+
                            '<div class="fbShare">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div id="discussion_comments_'+data.post[0].id+'">'+
                    '</div>'+
                    '<div>'+
                        '<form id="postComment_'+data.post[0].id+'">'+
                            '<div class="form-group">'+
                                '<input type="hidden" name="discussion_id" value="'+data.post[0].id+'">'+
                                '<input autocomplete="off" data-id="'+data.post[0].id+'" placeholder="write a comment" class="form-control" name="comment_text" id="addComment" type="text">'+
                            '</div>'+
                        '</form>'+
                    '</div>'+

                '</div>';
                $('#discussion_list').prepend(post);
                $('#discussion_form')[0].reset();

                }
            });

        });

        $(document).on('keypress', '#addComment', function(e){  
            var id = $(this).data('id');            
            if (e.which == 13) {  
                e.preventDefault();              
                var ele   = $('#postComment_'+id);
                var data  = ele.serialize();
                var url   = '{{url("/student/postComment")}}';
                $.ajax({
                   data : data,
                   url : url,
                   type: 'POST'
                }).done(function(data){            
                    if(data.status == 'success'){
                        var discussion_id = data.comment[0].parent_id;
                        var com = '<div class="postComment" style="height: auto !important;margin-top: 1px;">'+
                            '<img src="{{ URL::asset("public/images/propic.png") }}" class="commentPic" style="margin-top: 4px;">'+
                            '<div class="comment">'+
                                '<div class="commentName">'+data.comment[0].student_name+'</div><br />'+
                                '<div class="commentText">'+data.comment[0].discussion+'</div>'+
                            '</div>'+
                            '<div class="commentTime">'+data.comment[0].created_at+'</div>'+
                        '</div>';
                        $('#discussion_comments_'+discussion_id).append(com);
                        $('#postComment_'+id)[0].reset();
                    }                 
                });
                

            }
        });

    </script>

</body>

</html>