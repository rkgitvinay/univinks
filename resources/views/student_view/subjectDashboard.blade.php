<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Files | Univinks</title>
    <script src="https://use.fontawesome.com/b7f499e08c.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/sweetalert.css') }}" />

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
        .icon{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=557156057775440";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
                <span class="pull-right" style="font-size: 15px;padding: 10px;">
                    <a href="{{url('/logout')}}">logout</a>
                </span>
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
        <!-- <div class="col-sm-4 col-xs-8 author-info">
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
                <div class="col-xs-2 tab-text">
                    <a data-toggle="tab" href="#sec3">Faculty</a>
                </div>
            </li>

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
                                        <div class="col-xs-1">
                                            <i class="fa fa-cloud-upload"></i>
                                        </div>
                                        <div class="col-xs-5 drag-and-drop-main-text">
                                            Drag and Drop Your Files Here
                                        </div>
                                        <div class="col-xs-1 or-text">
                                            OR
                                        </div>

                                        <div class="col-xs-3 browse-text">
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
                    <div class="row feed-row-main">
                        <div class="row">
                            <div class="col-md-11"></div>
                            <!-- <div class="col-md-1 trash-icon">
                                <i class="fa fa-trash-o"></i>
                            </div> -->
                        </div>
                        <div class="row feed-row-content">
                            <div class="col-md-1" style="padding: 0">
                                <img src="http://placehold.it/70x70" alt="" />
                            </div>
                            <div class="col-md-10 main-text">
                                <a target="_blank" href="{{ URL::asset('uploads/'.$file->subject_name) }}">
                                    <span>{{$file->subject_name}}</span>
                                </a>
                                <p>{{$file->notes}}</p>
                            </div>
                            <div class="col-md-1 date">
                                {{$file->deadline}}
                            </div>
                        </div>
                        <div class="row feed-row-footer">
                            <div class="col-md-1" style="padding: 0">
                            </div>
                            <div class="col-md-7 upload-text">
                                <p>Uploaded By: <span>&nbsp;&nbsp;{{$file->faculty_name}}</span></p>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3 button-1">
                                        <div class="row">
                                            <div data-id="{{$file->id}}" class="btn_upvote col-xs-7 button-1-left icon">
                                                &nbsp;Upvote
                                            </div>
                                            <div class="col-xs-5 upvote_count_{{$file->id}} button-1-right icon">
                                                {{$file->upvote}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3 button-2">
                                        <div class="row">
                                            <div data-id="{{$file->id}}" class="btn_downvote col-xs-8 button-2-left icon">
                                                &nbsp;Downvote
                                            </div>
                                            <div class="col-xs-4 downvote_count_{{$file->id}} button-2-right icon">
                                                {{$file->downvote}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3 button-3">
                                        <div class="row">
                                            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
                                        </div>
                                    </div>
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

        <!-- Section 2 -->
        <div id="sec2" class="tab-pane fade">
            <form id="discussion_form">
                <div class="panel post">
                    <input type="hidden" name="subject_id" value="{{$subject_id}}">
                    <input type="text" name="post_text" class="postbox" placeholder="Post Something?"><br />

                    <div class="btnSec">
                    <label style="float: left;"><input type="checkbox" name="ask_faculty" id="cbox1" value="1">&nbsp;Ask Faculty</label>
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

        <!-- Section 3 start -->
        <div id="sec3" class="tab-pane fade">
            <div class="tabSelector">
                <ul class="nav nav-tabs">
                    <li>
                        <div class="filesTab">
                            <a data-toggle="tab" id="getFiles" href="#files">Files</a>
                        </div>
                    </li>
                    <li>
                        <div class="assignmentsTab">
                            <a data-toggle="tab" href="#assignments">Assignments</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="assignments" class="tab-pane fade in active">
                    @foreach($sub_files as $file)
                    <div class="panel assignmentCard">
                        <img class="assignPic" src="{{ URL::asset('public/images/propic.png') }}">
                        <div class="assignDate">{{ $file->created_at }}</div>
                        <div class="assignText">
                            <div class="assignTopic">{{$file->subject_name}}</div>
                            <div class="assignDesc">{{$file->notes}}</div>
                        </div>
                        <div class="actionBtns">
                            Due Date :
                            <div class="dueDate">&nbsp;{{$file->deadline}}&nbsp;</div>
                            <div class="btns">
                                <a href="#" class="comment"><img src="{{ URL::asset('public/images/comment.png') }}">Comment</a>&emsp;

                                <a target="_blank" href="{{ URL::asset('uploads/'.$file->subject_name) }}" class="preview"><img src="{{ URL::asset('public/images/preview.png') }}">Preview</a>&emsp;

                                <a target="_blank" href="{{ URL::asset('uploads/'.$file->subject_name) }}" class="download"><img src="{{ URL::asset('public/images/download1.png') }}">Download</a>&emsp;                                


                                <a href=""  onclick="document.getElementById('upload_assign').click(); return false" class="submit"><img src="{{ URL::asset('public/images/submit.png') }}">Submit Assignment</a>
                                <form id="submitAssign" action="{{ URL::to('/student/submitAssignment') }}" class="form-horizontal" method="post" enctype="multipart/form-data">                                                
                                    <div class="input-group">
                                        <input type="hidden" name="subject_id" value="{{$subject_id}}">
                                        <input type="hidden" name="assgn_id" value="{{$file->id}}">
                                        <input type="hidden" name="assgn_name" value="{{$file->subject_name}}">
                                        <input onchange="submitAssigment();" id="upload_assign" style="visibility: hidden;" type="file" name="file_info" />                                      
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="postComment">
                            <img class="commentPic" src="{{ URL::asset('public/images/propic.png') }}">
                            <div class="commentText">
                                <div class="name">Akbar Ali</div>
                                <div class="comment">afkjasnlkffulafuksrflksubflasrkblksrb</div>
                            </div>
                            <hr style="margin-top: -10px;" />
                            <div class="post" style="margin-top: -20px;">
                                <input type="text" class="commentInput" placeholder="Write a Comment.">
                            </div>
                        </div>
                    </div>  
                    @endforeach                  
                </div>
                <div id="files" class="tab-pane fade">



                </div>
            </div>
        </div>
        <!-- section 3 end -->





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

    </div>

    <?php 
        $var = $subject_id;
    ?>

    <script src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ URL::asset('public/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">

        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd',minDate:0 });
        function assignmentInfo(){
            $('#myModal').modal();
        }

        function submitAssigment(){

            swal({
                title: "Submit Assignment ?",                
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Upload",
                closeOnConfirm: false
            },
            function(){
                var formData = new FormData($('#submitAssign')[0]);
                var url   = '{{url("/student/submitAssignment")}}';
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    async: false,
                    success: function (data) {
                        if(data.status == 'success'){
                             swal("Done!", "Your assignment has been uploaded", "success");
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
              
            });
        }

        $(document).on('click', '#updateData', function(){
            $('#deadline').val($('#datepicker').val());
            $('#assignmentName').val($('#assignment').val());
            $('#notes').val($('#assgnNotes').val());

            $('#myModal').modal('hide');
        });

        $(document).on('click','.btn_upvote', function(){
            var assgn_id = $(this).data('id');                        
            var url   = '{{url("/student/upvote")}}';
            $.ajax({
               data : {assgn_id:assgn_id},
               url : url,
               type: 'POST'
            }).done(function(data){            
                if(data.status == 'upvote'){
                    var el_u = $('.upvote_count_'+assgn_id);
                    var num_u = parseInt(el_u.text());
                    el_u.text(num_u+1); 

                    var el_d = $('.downvote_count_'+assgn_id);
                    var num_d = parseInt(el_d.text());
                    el_d.text(num_d-1);
                }else if(data.status == 'upvote new'){
                    var el_u = $('.upvote_count_'+assgn_id);
                    var num_u = parseInt(el_u.text());
                    el_u.text(num_u+1);
                } 
                                    
            });
        });

        $(document).on('click','.btn_downvote', function(){
            var assgn_id = $(this).data('id');                        
            var url   = '{{url("/student/downvote")}}';
            $.ajax({
               data : {assgn_id:assgn_id},
               url : url,
               type: 'POST'
            }).done(function(data){            
                if(data.status == 'downvote'){
                    var el_d = $('.downvote_count_'+assgn_id);
                    var num_d = parseInt(el_d.text());
                    el_d.text(num_d+1); 

                    var el_u = $('.upvote_count_'+assgn_id);
                    var num_u = parseInt(el_u.text());
                    el_u.text(num_u-1); 

                }else if(data.status == 'downvote new'){
                    var el_d = $('.downvote_count_'+assgn_id);
                    var num_d = parseInt(el_d.text());
                    el_d.text(num_d+1); 
                } 
                                  
            });
        });

        $(document).on('click', '.btnPostDiscussion', function(e){
            e.preventDefault();  
            var ele   = $('#discussion_form');
            var data  = ele.serialize();
            var url   = '{{url("/student/postDiscussion")}}';
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

        $(document).on('click', '#getFiles', function(e){
            $('#files').html('');
            subject_id = '<?php echo $var ;?>';
            var url   = '{{url("/student/getSubmitAssignments")}}';
            $.ajax({
               data : {subject_id:subject_id},
               url : url,
               type: 'GET'
            }).done(function(data){            
                $.each(data.list, function(i,row){
                    var file = '<div class="panel assignmentCard" style="height: 140px;">'+
                        '<img class="assignPic" src="{{ URL::asset("public/images/propic.png") }}">'+
                        '<div class="assignDate">'+row.created_at+'</div>'+
                        '<div class="assignText">'+
                            '<div class="assignTopic">'+row.name+'</div>'+
                        '</div>'+
                        '<div class="actionBtns">Due Date :'+
                            '<div class="dueDate">&nbsp;'+row.status+'&nbsp;</div>'+
                            '<div class="btns">'+
                                '<a target="_blank" href="#" class="preview">'+
                                    '<img src="#">Preview'+
                                '</a>'+
                                '<a href=""  onclick="document.getElementById("upload_assign").click(); return false" class="submit">'+
                                    '<img src="{{ URL::asset("public/images/submit.png") }}">Submit Assignment'+
                                '</a>'+
                                '<form id="submitAssign" action="{{ URL::to("/student/submitAssignment") }}" class="form-horizontal" method="post" enctype="multipart/form-data">'+                                                
                                    '<div class="input-group">'+
                                        '<input type="hidden" name="subject_id" value="{{$subject_id}}">'+
                                        '<input type="hidden" name="assgn_id" value="{{$file->id}}">'+
                                        '<input type="hidden" name="assgn_name" value="{{$file->subject_name}}">'+
                                        '<input onchange="submitAssigment();" id="upload_assign" style="visibility: hidden;" type="file" name="file_info" />'+
                                    '</div>'+
                                '</form>'+
                            '</div>'+
                        '</div>'+
                    '</div>';

                    $('#files').append(file);
                    
                });          
            });
        });

    </script>

</body>

</html>