<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\UserModel;
use App\Models\FacultySetupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Excel;
use Illuminate\Support\Facades\Redirect;

class FacultySetupCtrl extends Controller{

	public function index(Request $request,$token,$email){
		$user = FacultySetupModel::getFaculty($token,$email);		
		return view('/faculty_view/'.$user->setup,['info'=>$user]);	
	}

	public function setPassword(Request $request){
		$password = $request->input('pwd');
		$user_id = $request->input('user_id');
		FacultySetupModel::setPassword($password,$user_id);
		return response(['status'=>'success']);
	}

	public function setDepartment(Request $request){
		$change_dept = $request->input('yesno');
		$department = $request->input('department');
		$parent_dept = $request->input('parent_dept');
		$user_id = $request->input('user_id');
		
		if($change_dept == 'yes'){
			$index = array_search($parent_dept,$department);
			if($index !== FALSE){
			    unset($department[$index]);
			}
			foreach($department as $value){
				$check = DB::table('faculty_department')->where('user_id',$user_id)->where('department',$value)->get();
				if(count($check) == 0){
					$dept = ['user_id' =>$user_id,'department'=>$value];
					DB::table('faculty_department')->insert($dept);
				}				
			}
		}
		DB::table('users')->where('id', $user_id)->update(['setup' => 'selectSubject']);
		return response(['status'=>'success']);
	}

	public function setSubject(Request $request){
		$subjects = $request->input('subjects');
		$user_id = $request->input('user_id');
		$data = [];
		$k = 0;
		foreach($subjects as $value){
			$data[$k]['user_id'] = $user_id;
			$data[$k]['subject_id'] = $value;
			$k++;
		}
		DB::table('faculty_subjects')->insert($data);
		DB::table('users')->where('id', $user_id)->update(['setup' => 'headToDashboard']);
		return response(['status'=>'success']);
	}

	public function facultySubject(Request $request, $subject_id){
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
		//print_r($sub_files);
		$submissions = [];
		$i = 0;
		foreach($sub_files as $file){
			$sub['id'] = $file->id;
			$sub['subject_id'] = $file->subject_id;
			$sub['subject_name'] = $file->subject_name;
			$sub['notes'] = $file->notes;
			$sub['deadline'] = $file->deadline;
			$sub['upvote'] = $file->upvote;
			$sub['downvote'] = $file->downvote;
			$sub['comments'] = $file->comments;
			$sub['created_at'] = $file->created_at;
			$sub['faculty_name'] = $file->faculty_name;
			$sub['submissions'] = FacultySetupModel::getAssignmentSubmissions($file->id);
			$submissions[$i] = $sub;
			$i++;
		}
		

		return view('/faculty_view/subjectDashboard',['subject_id'=>$subject_id,'sub_info'=>$sub_info[0],'sub_files'=>$submissions,'sub_disc'=>$data]);
	}

	public function getAssignmentSubmissions(Request $request){
		$user_id = $request->session()->get('user_id');
		$assignment_id = $request->input('assignment_id');
		$res = 	DB::table('assignment_submit as a')
				->leftJoin('student as s', 's.user_id','=','a.user_id')
				->where('a.assgn_id',$assignment_id)
				->select('a.id','a.name as submission_name','a.status','a.created_at as submitted_at','s.user_id','s.name as student_name')
				->get();
		if($res){
			return response(['status'=>'success','data'=>$res]);
		}
		//print_r($res);
	}

	public function review(Request $request){
		$user_id = $request->session()->get('user_id');
		$submission_id = $request->input('submission_id');
		$value = $request->input('value');

		DB::table('assignment_submit')->where('id', $submission_id)->update(['status' => $value]);
		return response(['status'=>'success']);
	}

	public function uploadAssignment(Request $request){
		$user_id = $request->session()->get('user_id');
		$subject_id = $request->input('subject_id');
		$deadline =$request->input('deadline');
		$notes = $request->input('notes');
		$destinationPath = 'uploads'; 
	    $extension = Input::file('file_info')->getClientOriginalExtension(); 
	    $fileName = rand(1111111,9999999).'_'.$request->input('assignmentName').'.'.$extension; 	    	    
	    Input::file('file_info')->move($destinationPath, $fileName); 	    
	    $data = ['subject_id'=>$subject_id,'faculty_id'=>$user_id,'name'=>$fileName,'notes'=>$notes,'deadline'=>$deadline];
	    DB::table('assignment')->insert($data);

	    return Redirect::back()->with('message','Upload Successful !');;
	}

	public function deleteAssignment(Request $request){
		$user_id = $request->session()->get('user_id');
		$assignment_id = $request->input('assignment_id');
		$res = DB::table('assignment')
			->where('id',$assignment_id)
			->where('faculty_id', $user_id)
			->delete();
		if($res === 1){
			return response(['status'=>'success']);
		}
	}

	public function postDiscussion(Request $request){		
		// $post_text = $request->input('post_text');
		// $subject_id = $request->input('subject_id');		
		// $user_id = $request->session()->get('user_id');
		// $data = ['parent_id'=>0,'subject_id'=>$subject_id,'student_id'=>$user_id,'discussion'=>$post_text,'ask_faculty'=>'1'];
		// $response = StudentSetupModel::postDiscussion($data);
		return response(['status'=>'success','post'=>$response]);
	}

}
