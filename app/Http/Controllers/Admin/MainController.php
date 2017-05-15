<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MainController extends BaseController
{
	// 首页
	public function index(){
	   return view('admin.main.main');
	}
	//左边管理页面
	public function left(){
		
	   return view('admin.main.left');
	}
	//头部的页面
	public function top(){
	   return view('admin.main.top');
	}
	//右边的内容页
	public function right(){
		
	   return view('admin.main.right');
	}
	    
}
