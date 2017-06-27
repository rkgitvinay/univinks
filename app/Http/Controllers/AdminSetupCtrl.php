<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\UserModel;
use App\Models\AdminSetupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Excel;
use Aws\Ses\SesClient;

class AdminSetupCtrl extends Controller{

	public function addCollege(Request $request){
		$user_id 	=	$request->session()->get('user_id');		
		$clgname	=	$request->get('clgname');
		$clgadd 	=	$request->get('clgadd');
		$college 	=	AdminSetupModel::addCollege($user_id,$clgname,$clgadd);
		if($college == true){
			return response(['status'=>'success']);
		}else{
			return response(['status'=>'error']);
		}
	}

	public function addDepartment(Request $request){
		$data = $request->all();
		$user_id 	=	$request->session()->get('user_id');
		$user = UserModel::user($user_id);	
		$data['college_id']	= $user->college_id;
		unset($data['_token']);
		if($data['name'] != ''){
			$department = AdminSetupModel::addDepartment($data);
			if(count($department) > 0){
				return response(['status'=>'success','department'=>$department[0]]);
			}	
		}else{
			return response(['status'=>'fail','message'=>'invalid input']);
		}
	}

	public function getCourseDetail(Request $request){
		$course_id =  $request->get('course_id');
		$detail = DB::table('department')->where('id',$course_id)->select('id','name','ug','pg','dual_degree')->get();
		if(count($detail) > 0){
			return response(['status'=>'success','course'=>$detail[0]]);
		}else{
			return response(['status'=>'error']);
		}
	}

	public function getDeptDetail(Request $request){
		
		$dept_id =  $request->get('dept_id');
		$detail = DB::table('department')->where('id',$dept_id)->select('id','name','ug','pg','dual_degree')->get();
		if(count($detail) > 0){
			return response(['status'=>'success','dept'=>$detail[0]]);
		}else{
			return response(['status'=>'error']);
		}
	}

	public function updateCourse(Request $request){
		$data = $request->all();
		if($data['type'] == 'ug'){
			DB::table('department')->where('id', $data['course_id'])->update(['name' => $data['name'],'ug'=>1,'pg'=>0,'dual_degree'=>0]);
		}else if($data['type'] == 'pg'){
			DB::table('department')->where('id', $data['course_id'])->update(['name' => $data['name'],'ug'=>0,'pg'=>1,'dual_degree'=>0]);
		}else{
			DB::table('department')->where('id', $data['course_id'])->update(['name' => $data['name'],'ug'=>0,'pg'=>0,'dual_degree'=>1]);
		}
		return response(['status'=>'success']);
	}

	public function updateDepartment(Request $request){
		$data = $request->all();
		DB::table('department')->where('id', $data['dept_id'])->update([
				'name' => $data['name'],
				'ug'=>isset($data['ug']) ? $data['ug'] : 0,
				'pg'=>isset($data['pg']) ? $data['pg'] : 0,
				'dual_degree'=>isset($data['dual_degree']) ? $data['dual_degree'] : 0
			]);
		return response(['status'=>'success','id'=>$data['dept_id'], 'name'=>$data['name'] ]);
	}	

	public function deleteCourse(Request $request){
		$data = $request->all();
		DB::table('department')->where('id',$data['course_id'])->delete();
		return response(['status'=>'success']);
	}

	public function deleteDept(Request $request){
		$data = $request->all();
		DB::table('department')->where('id',$data['dept_id'])->delete();
		return response(['status'=>'success']);
	}

	public function deleteSubject(Request $request){
		$data = $request->all();
		DB::table('subjects')->where('id',$data['subject_id'])->delete();
		return response(['status'=>'success']);
	}

	public function updateSubject(Request $request){
		$data = $request->all();
		DB::table('subjects')->where('id', $data['subject_id'])->update(['subject_name' => $data['subject_name'],'subject_code' => $data['subject_code'],'semester'=> $data['semester']]);
		return response(['status'=>'success']);
	}

	public function goToCourse(Request $request,$step){
		$user_id 	=	$request->session()->get('user_id');
		AdminSetupModel::goToCourse($user_id,$step);
		return response(['status'=>'success']);
	}	

	public function step(Request $request,$at){
		$user_id 	=	$request->session()->get('user_id');
		AdminSetupModel::goToCourse($user_id,$at);
		return redirect('/');
	}

	public function getCourses(Request $request,$department_id){
		$user_id 	=	$request->session()->get('user_id');
		$user = UserModel::user($user_id);
		$courses		= 	UserModel::getAllinfo($user_id,$department_id,$user->setup,$user->college_id);
		return response(['status'=>'success','courses'=>$courses]);
	}

	public function getPeopleDetail(Request $request){
		$people_id =  $request->get('people_id');
		$detail = DB::table('people')->where('id',$people_id)->get();
		if(count($detail) > 0){
			return response(['status'=>'success','people'=>$detail[0]]);
		}else{
			return response(['status'=>'error']);
		}
	}

	public function updatePeople(Request $request){
		$data =  $request->all();
		DB::table('people')->where('id', $data['people_id'])->update(['name' => $data['name'],'designation'=>$data['designation'],'email'=>$data['email']]);
		$people =  DB::table('people')->where('id',$data['people_id'])->get();
		return response(['status'=>'success','data'=>$people[0]]);
	}
	public function addSubject(Request $request){
		$data = $request->all();
			
		$subject = AdminSetupModel::addSubject($data);
		if(count($subject) > 0){
			return response(['status'=>'success','subject'=>$subject[0]]);
		}	
	}

	public function getSubjectDetail(Request $request){
		$subject_id =  $request->get('subject_id');
		$detail = DB::table('subjects')->where('id',$subject_id)->get();
		if(count($detail) > 0){
			return response(['status'=>'success','subject'=>$detail[0]]);
		}else{
			return response(['status'=>'error']);
		}
	}

	public function addPeople(Request $request){
		$data = $request->all();
		$user_id 	=	$request->session()->get('user_id');
		$user = UserModel::user($user_id);	
		$data['college_id']	= $user->college_id;
		$people = AdminSetupModel::addPeople($data);
		if(count($people) > 0){
			return response(['status'=>'success','people'=>$people[0]]);
		}	
	}

	public function deletePeople(Request $request){
		$data = $request->all();
		DB::table('people')->where('id',$data['people_id'])->delete();
		return response(['status'=>'success']);
	}

	public function getSubjects(Request $request,$course_id){
		$subject = UserModel::getCourseSubjects($course_id);
		return response(['status'=>'success','subject'=>$subject]);
	}

	public function uploadFacultyDatabase(Request $request){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();

			if(!empty($data) && count($data)){
				$user_id 	=	$request->session()->get('user_id');
				$user = UserModel::user($user_id);					
				foreach ($data as $key => $value){
					$check = DB::table('users')->where('username', $value->email)->get();
					if(count($check) == 0){
						$random = md5(uniqid($value->email, true));
						$insert = ['college_id'=>$user->college_id,'username' => $value->email,'name' => $value->name,'password' => md5('password'),'access_token'=>$random,'user_type' =>'faculty','setup' => 'createPassword'];
						if(!empty($insert)){

							//$this->sendEmail($value->email,$value->name,$random);

							$id =  DB::table('users')->insertGetId($insert);
							$user_info = ['user_id'=>$id, 'name' => $value->name, 'email' => $value->email,'department'=>$value->department];
							$faculty_id = db::table('faculty')->insertGetId($user_info);
							$dept_info = ['user_id' => $id,'department'=>$value->department];
							DB::table('faculty_department')->insert($dept_info);
						}
					}				

				}			
				
			}
		}
		return back();
	}
	public function uploadStudentDatabase(Request $request){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();

			if(!empty($data) && count($data)){
				$user_id 	=	$request->session()->get('user_id');
				$user = UserModel::user($user_id);					
				foreach ($data as $key => $value) {
					$check = DB::table('users')->where('username', $value->id)->get();
					if(count($check) == 0){
						$random = md5(uniqid($value->id, true));
						$insert = ['college_id'=>$user->college_id, 'username' => $value->id,'name' => $value->name, 'password' => md5('password'),'access_token'=>$random,'user_type' =>'student'];
						if(!empty($insert)){
							$id =  DB::table('users')->insertGetId($insert);
							$user_info = ['user_id'=>$id, 'name' => $value->name, 'identity_number' => $value->id, 'department' => $value->department];
							db::table('student')->insert($user_info);
						}
					}
				}	
				
			}
		}
		return back();
	}

	

	public function departments(Request $request){
		$user_id = $request->session()->get('user_id');
		$user = UserModel::user($user_id);	
		$info = UserModel::getAllinfo($user_id,0,$user->setup,$user->college_id);	
		
		return view('/admin_view/dashboard/departments',['info'=>$info]);	
	}

	public function courses(Request $request){
		$user_id = $request->session()->get('user_id');
		$user = UserModel::user($user_id);	
		$info = UserModel::getAllinfo($user_id,0,$user->setup,$user->college_id);
		if(count($info) > 0){
			$courses = UserModel::getAllinfo($user_id,$info[0]->id,$user->setup,$user->college_id);
			$selected = ['dept_id' => $info[0]->id,'dept_name' => $info[0]->name];
			return view('/admin_view/dashboard/courses',['info'=>$info,'courses'=>$courses,'dept_info'=>$selected]);
		}else{
			return redirect('step/department');						
		}	
	}

	public function subjects(Request $request){
		$user_id = $request->session()->get('user_id');
		$user = UserModel::user($user_id);	
		$info = UserModel::getAllinfo($user_id,0,$user->setup,$user->college_id);
		$courses = UserModel::getAllinfo($user_id,$info[0]->id,$user->setup,$user->college_id);
		if(count($courses) > 0){
			$subjects = UserModel::getCourseSubjects($courses[0]->id);
			$selected = ['dept_id' => $info[0]->id,'dept_name' => $info[0]->name,'courses_id'=> $courses[0]->id,'courses_name'=>$courses[0]->name];
			return view('/admin_view/dashboard/subjects',['info'=>$info,'courses'=>$courses,'dept_info'=>$selected,'subjects'=>$subjects]);
		}else{
			return redirect('step/courses');
		}
	}

	public function database(Request $request){
		return view('/admin_view/dashboard/database');
	}

	public function people(Request $request){
		$user_id = $request->session()->get('user_id');
		$user = UserModel::user($user_id);
		$people = UserModel::getAllPeoples($user->college_id);
		return view('/admin_view/dashboard/people',['people' => $people]);	
	}

	public function sendEmail($email,$name,$access_token){
		$client = SesClient::factory(array(
		    'key' => 'AKIAIYLT7HLPDOHPR5QQ',
		    'secret' => '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',
		    'region' => 'us-east-1',
		    'version'=>'latest',
		    'http'    => [
		        'verify' => false
		    ]
		));

		$url = "http://production.univinks.com/faculty/".$access_token."/".$email."";

		$emailSentId = $client->sendEmail(array(		    
		    'Source' => 'support@univinks.com',		    
		    'Destination' => array(
		        'ToAddresses' => array($email)
		    ),
		    'Message' => array(		      
		        'Subject' => array(		            
		            'Data' => 'Univinks Setup Invitation',
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
							            <div class="nameGreet">Hi '.$name.',</div><br /> <strong>Indian Institute of Engineering Science and Technology, Shibpur</strong> is now live on UnivInks. Please accept this invitation by your college admin to get started.<br /><br />
							            <div class="buttonelement">
							                <a class="button1" href="'.$url.'">Setup your Virtual Classroom</a><br /><br />
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

		// print_r($emailSentId);
		
	}

}
