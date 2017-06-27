<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\FacultySetupModel;
use Illuminate\Support\Facades\DB;

class FacultySetupModel extends Model{

	public static function getFaculty($token,$email){
		$users = DB::table('users')->where('username', $email)->where('access_token',$token)
				->leftJoin('faculty', 'users.id', '=', 'faculty.user_id')				
				->leftJoin('college','users.college_id','=','college.id')
				->select('users.id','users.username','faculty.name','faculty.department','users.user_type','users.setup','college.name as college_name')
				->get();
		return $users[0];
	}

	public static function setPassword($passwd,$user_id){
		$user = DB::table('users')->where('id', $user_id)
					->update(['password' => md5($passwd),'is_active'=>'1','setup'=>'selectDepartment']);
		return true;
	}

	public static function getFacultyDepartments($user_id){
		$faculty_department = DB::table('faculty_department')->where('user_id', $user_id)				
				->select('department')
				->get();
		return $faculty_department;

	}

	public static function getCoursesByDept($college_id,$department_name){
		$courses = DB::table('department as d')
				->join('department as temp', 'd.id', '=', 'temp.parent_id')
				->where('d.college_id', $college_id)				
				->where('d.name',$department_name)				
				->select('temp.id as course_id', 'temp.name as course_name')
				->get();
		$k=0;
		$data = [];
		foreach($courses as $val){			
			$subjects = DB::table('subjects as s')
						->where('s.course_id',$val->course_id)
						->select('s.id as subject_id','s.subject_name','s.subject_code','s.semester')
						->get();
			$temp['course_id'] = $val->course_id;
			$temp['course_name'] = $val->course_name;
			$temp['subjects'] = $subjects;

			$data[$k] = $temp;
			$k++;
			//print_r($data);
		}
		return $data;
	}

	public static function getFacultySubjects($faculty_id){
		$subjects = DB::table('faculty_subjects as fs')
					->leftJoin('subjects as s','s.id','=','fs.subject_id')
					->leftJoin('department as d', 'd.id', '=', 's.course_id')
					->leftJoin('department as dd', 'dd.id','=','d.parent_id')
					->where('fs.user_id',$faculty_id)
					->select('fs.subject_id','s.course_id','s.subject_name','s.subject_code','s.semester','d.name as course','dd.name as dept')
					->get();
		return $subjects;
	}

	public static function getSubjectInfo($subject_id){
		return DB::table('subjects')->where('id',$subject_id)->select('subject_name')->get();
	}

	public static function getSubjectAssignmentList($subject_id){
		return DB::table('assignment as a')
				->leftJoin('faculty as f', 'f.user_id','=','a.faculty_id')
				->where('a.subject_id',$subject_id)
				->select('a.id','a.subject_id','a.name as subject_name','a.notes','a.deadline','a.upvote','a.downvote','a.comments','a.created_at','f.name as faculty_name')
				->get();
	}

	public static function getSubjectDiscussion($subject_id,$parent_id){
		return DB::table('subject_discussion as sd')
				->leftJoin('student as s', 's.user_id','=','sd.student_id')
				->where('sd.subject_id',$subject_id)->where('sd.parent_id',$parent_id)
				->selectRaw("sd.id,sd.discussion,DATE_FORMAT(sd.created_at,'%b %d %Y %h:%i %p') as created_at,sd.student_id,s.name as student_name")
				->get();
	}
	public static function getAssignmentSubmissions($assignment_id){
		//$assignment_id = $request->input('assignment_id');
		$res = 	DB::table('assignment_submit as a')
				->leftJoin('student as s', 's.user_id','=','a.user_id')
				->where('a.assgn_id',$assignment_id)
				->select('a.id','a.name as submission_name','a.status','a.created_at as submitted_at','s.user_id','s.name as student_name')
				->get();
		return $res;
	}

}