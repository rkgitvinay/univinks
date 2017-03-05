<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\DashboardModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardCtrl extends Controller{

	public function index(){		
		if (session()->has('user_id')) {
			$cat = new DashboardModel;
			$parent_id = 0;
			$categories = $cat->getAllCategories($parent_id);
    		return view('dashboard',['categories' => $categories]);			
		}else{
			return view('login');
		}		
	}

	
}
