<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\DashboardModel;
use Illuminate\Support\Facades\DB;

class DashboardModel extends Model{

	public function getAllCategories($parent_id){
		$users = DB::table('categories')->where('parent_id', $parent_id)->select('name', 'id')->get();
		return $users;
	}

}