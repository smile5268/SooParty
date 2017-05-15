<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use DB;
use App\Models\AdminUser;
use resources\views\admin\code\Code;

//require_once 'resources/views/admin/code/Code';

class AdminLoginController extends BaseController
{
        public function index(){
           return view('admin.login.index');
    	}
       
        // 接收账号，密码
      public function send(){
        $name=\Request::input('account'); 
        $pass=\Request::input('pass'); 
        //匹配数据库
        $userResult = AdminUser::where('name',$name)->first();
        
        if($userResult){
            $MyPass = $userResult->userPwd;   // 密码
           
            if(!\Hash::check($pass,$MyPass)){
                exit("账号或密码错误！！");
            }else{
                session(['adminId'=>$userResult['id'],'adminName'=>$userResult['usersName'],'adminLogin'=>true]);
                return view('admin.main.main');
            }  
        }else{
            exit('账号或密码错误！');
        }

      }

}
