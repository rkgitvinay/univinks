<?php
//510815031 -> aditya
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\UserModel;
use App\Models\StudentSetupModel;
use App\Models\FacultySetupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Excel;

class StudentSetupCtrl extends Controller{

	public function index(Request $request){
		if (session()->has('student_id')){
			$college_id = $request->session()->get('college_id');
			$username = $request->session()->get('username');	
			$studentDetail = StudentSetupModel::getStudentDetail($college_id,$username);
			$subjects = StudentSetupModel::getStudentSubjects($request->session()->get('student_id'));
			if($subjects == false){
				$subjects = array();
			}
			return view('/student_view/studentDashboard',['info'=>$studentDetail,'subjects'=>$subjects]);
		}else{
			$clg = DB::table('college')->select('id as college_id','name')->get();
			return view('/student_view/studentLogin',['college'=>$clg]);
		}	
	}

	public function getStarted(Request $request){
		$college_id = $request->input('college_id');
		$username = $request->input('username');
		$studentDetail = StudentSetupModel::getStudentDetail($college_id,$username);
		if(count($studentDetail)>0){
			if($studentDetail[0]->is_active == 0){
				$request->session()->put('username', $studentDetail[0]->username);
				$request->session()->put('college_id', $college_id);
				return response(['status'=>'success','result'=>$studentDetail]);
			}else{
				return response(['status'=>'error','message'=>'already registed']);
			}			
		}else{
			return response(['status'=>'error','message'=>'Invalid User Id']);
		}
	}

	public function getStudentDetails(Request $request){
		$username = $request->session()->get('username');				
		$college_id = $request->session()->get('college_id');				
		$studentDetail = StudentSetupModel::getStudentDetail($college_id,$username);
		if(count($studentDetail)>0){
			return view('/student_view/studentDetails',['details'=>$studentDetail]);
		}
	}

	public function setStudentDetails(Request $request){
		$user_id = $request->input('user_id');
		$email = $request->input('email');
		$mobile = $request->input('mobile');
		$password = $request->input('password');
		DB::table('users')->where('id', $user_id)->update(['password' => md5($password)]);
		DB::table('student')->where('user_id', $user_id)->update(['email' => $email,'mobile'=>$mobile]);
		return response(['status'=>'success']);

	}

	public function getStudentSem(){
		return view('/student_view/studentSemester');
	}

	public function setStudentSem(Request $request){
		$username = $request->session()->get('username');
		$type = $request->input('type');
		if($type == 'ug'){
			$val = $request->input('opt_ug');
		}else if($type == 'dd'){
			$val = $request->input('opt_dd');
		}else{
			$val = $request->input('opt_pg');
		}
		DB::table('student')->where('identity_number', $username)->update(['semester' => $val,'course_type'=>$type ]);
		DB::table('users')->where('username', $username)->update(['is_active' => '1']);
		return response(['status'=>'success']);		
	}

	public function login(Request $request){
		$user =  new UserModel;			
		$username = $request->input('username');
		$password = md5($request->input('password'));
		$check = StudentSetupModel::login($username,$password);
		if(count($check) == 0){
			return response(['status'=>'error','message'=>'invalid username or password']);
		}else{
			$request->session()->put('student_id', $check[0]->id);	
			$request->session()->put('username', $check[0]->username);
			$request->session()->put('college_id', $check[0]->college_id);
			return response(['status'=>'success']);
		}	
	}

	public function studentSubject(Request $request, $subject_id){
		$sub_info = FacultySetupModel::getSubjectInfo($subject_id);
		$sub_files = FacultySetupModel::getSubjectAssignmentList($subject_id);
		$sub_disc = FacultySetupModel::getSubjectDiscussion($subject_id,0);
		$data = [];
		$k=0;
		foreach($sub_disc as $val){
			$temp['id'] = $val->id;
			$temp['discussion'] = $val->discussion;
			$temp['created_at'] = $val->created_at;
			$temp['student_id'] = $val->student_id;
			$temp['student_name'] = $val->student_name;
			$temp['comments'] = FacultySetupModel::getSubjectDiscussion(0,$val->id);
			$temp['comment_count'] = count($temp['comments']);
			$data[$k] = $temp;
			$k++;
		}
		//return response($data);
		return view('/student_view/subjectDashboard',['subject_id'=>$subject_id,'sub_info'=>$sub_info[0],'sub_files'=>$sub_files,'sub_disc'=>$data]);
	}

	public function upvote(Request $request){
		$assgn_id = $request->input('assgn_id');
		$student_id = $request->session()->get('student_id');
		$response = StudentSetupModel::upvote($assgn_id,$student_id);
		return response(['status'=>$response]);
		//print_r($response);
	}

	public function downvote(Request $request){
		$assgn_id = $request->input('assgn_id');
		$student_id = $request->session()->get('student_id');
		$response = StudentSetupModel::downvote($assgn_id,$student_id);
		return response(['status'=>$response]);
	}

	public function postDiscussion(Request $request){
		$ask_faculty = $request->input('ask_faculty');
		if($ask_faculty != 1){
			$ask_faculty = 0;
		}
		$post_text = $request->input('post_text');
		$subject_id = $request->input('subject_id');		
		$student_id = $request->session()->get('student_id');
		$data = ['parent_id'=>0,'subject_id'=>$subject_id,'student_id'=>$student_id,'discussion'=>$post_text,'ask_faculty'=>$ask_faculty];
		$response = StudentSetupModel::postDiscussion($data);
		return response(['status'=>'success','post'=>$response]);
	}

	public function postComment(Request $request){
		$data = $request->all();
		$student_id = $request->session()->get('student_id');
		$data = ['parent_id'=>$data['discussion_id'],'subject_id'=>0,'student_id'=>$student_id,'discussion'=>$data['comment_text'],'ask_faculty'=>0];
		$response = StudentSetupModel::postComment($data);
		return response(['status'=>'success','comment'=>$response]);
	}	
}
