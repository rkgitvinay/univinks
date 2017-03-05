<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdminSetupModel;
use Illuminate\Support\Facades\DB;

class AdminSetupModel extends Model{

	public static function addCollege($user_id,$clgname,$clgadd){
		$college_id = DB::table('college')->insertGetId(['name' => $clgname, 'address' => $clgadd]);
		if($college_id){
			DB::table('users')->where('id', $user_id)->update(['college_id' => $college_id,'setup'=> 'department']);
			return true;
		}else{
			return false;
		}		
	}

	public static function addDepartment($data){
		$department_id = DB::table('department')->insertGetId($data);
		if($department_id){
			$department =  DB::table('department')->where('id', $department_id)->get();
			return $department;
		}
	}

	public static function addSubject($data){
		$subject_id = DB::table('subjects')->insertGetId($data);
		if($subject_id){
			$subject =  DB::table('subjects')->where('id', $subject_id)->get();
			return $subject;
		}
	}

	public static function addPeople($data){
		$people_id = DB::table('people')->insertGetId($data);
		if($people_id){
			$people =  DB::table('people')->where('id', $people_id)->get();
			return $people;
		}
	}

	public static function goToCourse($user_id,$step){
		DB::table('users')->where('id', $user_id)->update(['setup'=> $step]);		
	}

	
}