<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentSetupModel;
use Illuminate\Support\Facades\DB;

class StudentSetupModel extends Model{

	public static function getStudentDetail($college_id,$username){
		$users = DB::table('users as u')
				->leftJoin('student as s', 'u.id', '=', 's.user_id')
				->leftJoin('college as c','u.college_id','=','c.id')				
				->where('u.college_id',$college_id)->where('u.username',$username)
				->select('u.id as user_id','u.username','u.is_active','s.name','s.department','s.email','s.mobile','c.name as college_name')
				->get();
		return $users;
	}

	public static function login($username,$password){
		$users = DB::table('users')
				->where('username', $username)
				->where('password', $password)
				->where('is_active','1')
				->get();
		return $users;
	}
// SELECT d.id as course_id,s.id as subject_id,s.subject_name,fs.user_id as faculty_id,f.name as faculty_name FROM department as d
// LEFT JOIN subjects as s on s.course_id = d.id
// LEFT JOIN faculty_subjects as fs on fs.subject_id = s.id
// LEFT JOIN faculty as f on f.user_id = fs.user_id
// LEFT JOIN assignment as a on a.subject_id = s.id	
// WHERE parent_id = 37 AND ug = '1' AND s.semester = '2nd'
	public static function getStudentSubjects($student_id){
		$dept = DB::table('department as d')
				->leftJoin('student as s','s.department','=','d.name')
				->where('s.user_id', $student_id)
				->select('d.id as department_id','s.course_type','s.semester')->get();
		if(count($dept) > 0){
			if($dept[0]->course_type == 'ug'){
				$subjects = DB::table('department as d')
							->leftJoin('subjects as s','s.course_id','=','d.id')
							->leftJoin('faculty_subjects as fs','fs.subject_id','=','s.id')
							->leftJoin('faculty as f', 'f.user_id', '=', 'fs.user_id')
							->leftJoin('assignment as a','a.subject_id','=','s.id')
							->where('parent_id',$dept[0]->department_id)
							->where('ug',1)
							->where('s.semester', $dept[0]->semester)
							->select('d.id as course_id','s.id as subject_id','s.subject_name','s.subject_code',
								's.semester','fs.user_id as faculty_id','f.name as faculty_name',DB::raw('COUNT(a.id) as total'))->get();
				return $subjects;
			}else if($dept[0]->course_type == 'pg'){
				$subjects = DB::table('department as d')
							->leftJoin('subjects as s','s.course_id','=','d.id')
							->leftJoin('faculty_subjects as fs','fs.subject_id','=','s.id')
							->leftJoin('faculty as f', 'f.user_id', '=', 'fs.user_id')
							->leftJoin('assignment as a','a.subject_id','=','s.id')
							->where('parent_id',$dept[0]->department_id)
							->where('pg',1)
							->where('s.semester', $dept[0]->semester)
							->select('d.id as course_id','s.id as subject_id','s.subject_name','s.subject_code',
								's.semester','fs.user_id as faculty_id','f.name as faculty_name',DB::raw('COUNT(a.id) as total'))->get();
				return $subjects;
			}else{
				$subjects = DB::table('department as d')
							->leftJoin('subjects as s','s.course_id','=','d.id')
							->leftJoin('faculty_subjects as fs','fs.subject_id','=','s.id')
							->leftJoin('faculty as f', 'f.user_id', '=', 'fs.user_id')
							->leftJoin('assignment as a','a.subject_id','=','s.id')
							->where('parent_id',$dept[0]->department_id)
							->where('dual_degree',1)
							->where('s.semester', $dept[0]->semester)
							->select('d.id as course_id','s.id as subject_id','s.subject_name','s.subject_code',
								's.semester','fs.user_id as faculty_id','f.name as faculty_name',DB::raw('COUNT(a.id) as total'))->get();
				return $subjects;
			}
		}else{
			return false;
		}
	}

	public static function upvote($assgn_id,$student_id){
		$result = DB::table('assignment_upvote')->where('assignment_id',$assgn_id)
					->where('student_id',$student_id)->get();
		if(count($result) > 0){	
			if($result[0]->status == 'downvote'){
				DB::table('assignment_upvote')->where('assignment_id',$assgn_id)
					->where('student_id',$student_id)
					->update(['status'=>'upvote']);
				DB::table('assignment')->where('id',$assgn_id)->decrement('downvote');
				DB::table('assignment')->where('id',$assgn_id)->increment('upvote');
				return 'upvote';
			}else{
				return 'exist';
			}			
		}else{
			$data = ['assignment_id'=> $assgn_id, 'student_id'=> $student_id, 'status'=>'upvote'];
			DB::table('assignment_upvote')->insert($data);
			DB::table('assignment')->where('id',$assgn_id)->increment('upvote');
			return 'upvote new';
		}
	}

	public static function downvote($assgn_id,$student_id){
		$result = DB::table('assignment_upvote')->where('assignment_id',$assgn_id)
					->where('student_id',$student_id)->get();
		if(count($result) > 0){	
			if($result[0]->status == 'upvote'){
				DB::table('assignment_upvote')->where('assignment_id',$assgn_id)
					->where('student_id',$student_id)
					->update(['status'=>'downvote']);
				DB::table('assignment')->where('id',$assgn_id)->decrement('upvote');
				DB::table('assignment')->where('id',$assgn_id)->increment('downvote');
				return 'downvote';
			}else{
				return 'exist';
			}			
		}else{
			$data = ['assignment_id'=> $assgn_id, 'student_id'=> $student_id, 'status'=>'downvote'];
			DB::table('assignment_upvote')->insert($data);
			DB::table('assignment')->where('id',$assgn_id)->increment('downvote');
			return 'downvote new';
		}
	}

	public static function postDiscussion($data){
		$id = DB::table('subject_discussion')->insertGetId($data);
		if($id){			
			$result = DB::table('subject_discussion as sd')
				->leftJoin('student as s', 's.user_id','=','sd.student_id')
				->where('sd.id',$id)
				->selectRaw("sd.id,sd.parent_id,sd.discussion,DATE_FORMAT(sd.created_at,'%b %d %Y %h:%i %p') as created_at,sd.student_id,s.name as student_name")
				->get();

			return $result;
		}else{
			return false;
		}
	}

	public static function postComment($data){
		$id = DB::table('subject_discussion')->insertGetId($data);
		if($id){
			$result = DB::table('subject_discussion as sd')
				->leftJoin('student as s', 's.user_id','=','sd.student_id')
				->where('sd.id',$id)
				->selectRaw("sd.id,sd.parent_id,sd.discussion,DATE_FORMAT(sd.created_at,'%b %d %Y %h:%i %p') as created_at,sd.student_id,s.name as student_name")
				->get();
			return $result;
		}else{
			return false;
		}
	}
}