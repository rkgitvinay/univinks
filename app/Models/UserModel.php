<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class UserModel extends Model{

	public static function user($user_id){
		$users = DB::table('users')->where('id', $user_id)->get();
		return $users[0];
	}

	public function login($username,$password){	
		$users = DB::table('users')->where('username', $username)->where('password', $password)->get();
		return $users;
	}

	public function changePassword($password,$user_id){
		$user = DB::table('users')->where('id', $user_id)
					->update(['password' => md5($password),'is_active'=>'1']);
		return true;
	}

	public static function getAllinfo($user_id,$parent_id,$setup='default',$college_id=0){
		if($setup == 'subject' && $parent_id != 0){
			$info = DB::table('department')
            				->where('college_id',$college_id)
            				->where('parent_id','!=',0)
            				->select('department.*')
            				->get();
        	return $info;
		}else{		
			$info = DB::table('department')
	            				->where('college_id',$college_id)
	            				->where('parent_id', $parent_id)
	            				->select('department.*')
	            				->get();
	        return $info;
	    }
	}

	public static function getCourseSubjects($course_id){
		$info = DB::table('subjects')        				
        				->where('course_id',$course_id)        				
        				->get();
    	return $info;
	}

	public static function getAllPeoples($college_id){
		$people =  DB::table('people')->where('college_id', $college_id)->get();
			return $people;
	}
	

}