<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\UserModel;
use App\Models\DashboardModel;
use App\Models\FacultySetupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Aws\Ses\SesClient;
use Aws\Credentials\Credentials;


class UserController extends Controller{


	public function index(Request $request){
		if (session()->has('user_id')){
			$user_id = $request->session()->get('user_id');
			$user = UserModel::user($user_id);		
			if($user->user_type == 'admin'){						
				$info = UserModel::getAllinfo($user_id,0,$user->setup,$user->college_id);
				if($user->setup == 'department'){					
					return view('/admin_view/'.$user->setup.'Setup',['info'=>$info]);	
				}else if($user->setup == 'courses'){
					if(count($info) > 0){
						$courses = UserModel::getAllinfo($user_id,$info[0]->id,$user->setup,$user->college_id);
						$selected = ['dept_id' => $info[0]->id,'dept_name' => $info[0]->name];
						return view('/admin_view/'.$user->setup.'Setup',['info'=>$info,'courses'=>$courses,'dept_info'=>$selected]);
					}else{
						return redirect('step/department');						
					}						
				}else if($user->setup == 'subject'){
					$courses = UserModel::getAllinfo($user_id,$info[0]->id,$user->setup,$user->college_id);
					if(count($courses) > 0){
						$subjects = UserModel::getCourseSubjects($courses[0]->id);
						$selected = ['dept_id' => $info[0]->id,'dept_name' => $info[0]->name,'courses_id'=> $courses[0]->id,'courses_name'=>$courses[0]->name];
						return view('/admin_view/'.$user->setup.'Setup',['info'=>$info,'courses'=>$courses,'dept_info'=>$selected,'subjects'=>$subjects]);
					}else{
						return redirect('step/courses');
					}						
				}else if($user->setup == 'database' || $user->setup == 'studentDatabase'){
					return view('/admin_view/'.$user->setup.'Setup');					
				}else if($user->setup == 'people'){
					$people = UserModel::getAllPeoples($user->college_id);
					return view('/admin_view/'.$user->setup.'Setup',['people' => $people]);	
				}else if($user->setup == 'complete'){
					//$people = UserModel::getAllPeoples($user->college_id);
					return view('/admin_view/'.$user->setup.'Setup');	
				}

			}else if($user->user_type == 'faculty'){

				if($user->setup == 'createPassword'){

					$email = $request->session()->get('user_name');
					$user = FacultySetupModel::getFaculty($email);	
					return view('/faculty_view/'.$user->setup,['info'=>$user]);

				}else if($user->setup == 'selectDepartment'){

					$email = $request->session()->get('user_name');
					$access_token = $request->session()->get('access_token');

					$info = FacultySetupModel::getFaculty($access_token,$email);	
					$dept = UserModel::getAllinfo($user_id,0,$user->setup,$user->college_id);
					return view('/faculty_view/'.$user->setup,['info'=>$info,'dept'=>$dept]);

				}else if($user->setup == 'selectSubject'){
					$email = $request->session()->get('user_name');
					$access_token = $request->session()->get('access_token');
					$info = FacultySetupModel::getFaculty($access_token,$email);
					$dept = FacultySetupModel::getFacultyDepartments($user_id);
					$k=0;
					foreach($dept as $parant){
						$courses = FacultySetupModel::getCoursesByDept($user->college_id,$parant->department);
						$val['department_name'] = $parant->department;
						$val['courses'] = $courses; 
						$data[$k] = $val;
						$k++;
					}					
					return view('/faculty_view/'.$user->setup,['info'=>$info,'data'=>$data]);

				}else if($user->setup == 'headToDashboard'){
					$email = $request->session()->get('user_name');
					$access_token = $request->session()->get('access_token');

					$info = FacultySetupModel::getFaculty($access_token,$email);
					return view('/faculty_view/'.$user->setup,['info'=>$info]);

				}else if($user->setup == 'facultyDashboard'){
					$email = $request->session()->get('user_name');
					$access_token = $request->session()->get('access_token');
					$info = FacultySetupModel::getFaculty($access_token,$email);
					$subjects = FacultySetupModel::getFacultySubjects($user_id);					
					return view('/faculty_view/'.$user->setup,['info'=>$info,'subjects' => $subjects]);
				}	
				
			}else if($user->user_type == 'student'){
				$clg = DB::table('college')->select('id as college_id','name')->get();
				return view('/student_view/studentDashboard',['college'=>$clg]);	
			}

		}else{
			return view('login');
		}
	}

	public function login(Request $request){
		$user =  new UserModel;			
		$username = $request->input('username');
		$password = md5($request->input('password'));
		$check = $user->login($username,$password);
		if(count($check) == 0){
			return response(['status'=>'error','message'=>'invalid username or password']);
		}else{
			$request->session()->put('user_id', $check[0]->id);	
			$request->session()->put('user_name', $check[0]->username);
			$request->session()->put('access_token', $check[0]->access_token);
			return response(['status'=>'success','user_type'=>$check[0]->user_type,'is_active'=>$check[0]->is_active]);
		}		
	}

	public function newPasswordPage(){		
		return view('changePassword');
	}

	public function newPassword(Request $request){		
		$user =  new UserModel;			
		$user_id = $request->session()->get('user_id');
		$password = $request->input('password');
		$cnf_password = $request->input('cnf_password');
		if($password == $cnf_password){
			$change = $user->changePassword($password,$user_id);
			return response(['status'=>'success']);
		}else{
			return response(['status'=>'error','message'=>'check your password']);
		}		
	}

	public function forgotPassword(Request $request){
		$user =  new UserModel;					
		$email = $request->input('email');
		$data = DB::table('users')->where('username',$email)->select('id','access_token')->get();

		$client = SesClient::factory(array(
		    'key' => 'AKIAIYLT7HLPDOHPR5QQ',
		    'secret' => '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',
		    'region' => 'us-east-1',
		    'version'=>'latest',
		    'http'    => [
		        'verify' => false
		    ]
		));

		$emailSentId = $client->sendEmail(array(		    
		    'Source' => 'support@univinks.com',		    
		    'Destination' => array(
		        'ToAddresses' => array('vinayksingh2@gmail.com')
		    ),
		    'Message' => array(		      
		        'Subject' => array(		            
		            'Data' => 'Univinks Email Test',
		            'Charset' => 'UTF-8',
		        ),		        
		        'Body' => array(
		            'Text' => array(		          
		                'Data' => 'My plain text email',
		                'Charset' => 'UTF-8',
		            ),
		            'Html' => array(
		                // Data is required
		                'Data' => '<a href="#">Reset Password</a>',
		                'Charset' => 'UTF-8',
		            ),
		        ),
		    )		  
		));

		print_r($emailSentId);

		
		
	}

	public function email(){		

		$credentials = new Credentials(env('AWS_ACCESS_KEY_ID'), env('AWS_SECRET_ACCESS_KEY'));

		$client = SesClient::factory(array(
		    // 'key' => 'AKIAIYLT7HLPDOHPR5QQ',
		    // 'secret' => '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',
		    'credentials' => $credentials,
		    'region' => 'us-east-1',
		    'version'=>'latest',
		    'http'    => [
		        'verify' => false
		    ]
		));

		$emailSentId = $client->sendEmail(array(		    
		    'Source' => 'support@univinks.com',		    
		    'Destination' => array(
		        'ToAddresses' => array('vinayksingh2@gmail.com')
		    ),
		    'Message' => array(		      
		        'Subject' => array(		            
		            'Data' => 'Univinks Email Test',
		            'Charset' => 'UTF-8',
		        ),		        
		        'Body' => array(
		            'Text' => array(		          
		                'Data' => 'My plain text email',
		                'Charset' => 'UTF-8',
		            ),
		            'Html' => array(		               
		                'Data' => '<DOCTYPE html>
							    <html lang="en-US">

							    <head>
							        <meta charset="utf-8">
							        <meta name="viewport" content="width=device-width, initial scale=1">
							        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
							        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
							        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
							        <style>
							            .button1 {
							                color: #fff;
							                background-color: #337ab7;
							                border-color: #2e6da4;
							                font-size: 16px;
							                padding: 5px 15px;
							                border: none;
							                display: inline-block;
							                border-radius: 3px;
							            }
							            
							            .button1:hover {
							                box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
							            }
							            
							            .nameGreet {
							                color: green;
							            }
							            
							            .text {
							                display: inline-block;
							            }
							            
							            .panel-footer {
							                font-size: 14px;
							                text-align: center;
							                padding: 5px 5px 5px 0px;
							            }
							            
							            .buttonelement {
							                text-align: center;
							            }
							            
							            .page-header {
							                width: 20%;
							                display: block;
							                margin: auto;
							                padding-top: 20px;
							                padding-bottom: 15px;
							            }
							            
							            .container-fluid {
							                font-family: "Comic Sans MS", cursive, sans-serif;
							            }
							        </style>
							    </head>

							    <body>
							        <div class="container-fluid">							            
							            <div class="nameGreet">Hi Professor Anirban Gupta,</div><br /> <strong>Indian Institute of Engineering Science and Technology, Shibpur</strong> is now live on UnivInks. Please accept this invitation by your college admin to get started.<br /><br />
							            <div class="buttonelement">
							                <button class="button1" type="button">Setup your Virtual Classroom</button><br /><br />
							            </div>
							            <div class="text">
							                <p>UnivInks is an online sharing and collaboration tool for colleges and we have customized it for you. 
											Once you click on this link, you will be guided to a setup wizard which will let you set up your dashboard with just a few clicks.</p>
											<p>With your class live on UnivInks you can share content, engage in discussions, post assignments and recieve submissions from your students. All your classrooms are accessible from a single dashboard.</p>
											<p>We wish you have a delightful experience with UnivInks. If you have a suggestion, feedback or issue, do write to us at support@univinks.com.</p> <br />
							                <br />Thank You.<br />Team UnivInks.<br /><br />
							            </div>
							            <br />
							            <div class="panel-footer">Team Univinks</div>
							        </div>
							    </body>

							    </html>',
		                'Charset' => 'UTF-8',
		            ),
		        ),
		    )		    
		));

		print_r($emailSentId);
		
	}

	public function logout(){
		session()->flush();
		return redirect('https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/production');
	}

	public function adminLogout(){
		session()->flush();
		return redirect('/admin');
	}

}
