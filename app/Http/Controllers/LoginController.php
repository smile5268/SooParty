<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use App\Models\User_code;
use App\Http\Controllers\Sms\Note;
use App\Http\Controllers\Hash;

// 登录&注册
class LoginController extends BaseController
{
	// 登录页
	public function index(){
		return view('login.index');
	}

	// 登录接收页
	public function receive(){

		if(!isset($_SESSION)){
			session_start();
		}

		// 接收账号，密码
		$tel = \Request::input('tel');
		$pass = \Request::input('password');
		$code = \Request::input('code');
		// dd($_SESSION);
		// 与数据库进行匹配
		$userResult = User::where('username',$tel)->first();
		// 判断是否匹配到
		if($userResult){
			// 密码验证
			if(!\Hash::check($pass,$userResult['password'])){
				$json = array("not" => "账号或密码错误！");
				return response(json_encode($json));
			}

			// 验证码验证
			if($code){
				if($code != $_SESSION["authnum_session"]){
		        	$json = array("cot" => "验证码错误");
					return response(json_encode($json));
		        }
			}else{
				$json = array("cot" => "验证码不能为空");
				return response(json_encode($json));
			}

			session(['userid'=>$userResult['id'],'name'=>$userResult['name'],'isLogin'=>true]);
		}else{
			$json = array("not" => "账号或密码错误！");
			return response(json_encode($json));
		}
  
		// 给前端返回JSON，$root是获取当前域名
		$root = $_SERVER['SERVER_NAME'];
		$json = array("okt" => "$root");
		return response(json_encode($json));
	}

	// 注销
	public function cancel(){

		\Session::flush();

		// 页面转跳到首页
		return redirect('/');
	}

	// 注册页
	public function register(){

		return view('login.register');
	}

	// 注册接收页
	public function doRegister(){

		//账号判断（手机号）
		if(!$_POST['tel']){	
			echo '电话不能为空';
			return;
		}

		// 手机号码
		$tel = $_POST['tel'];
        $rule ='/^[1][358][0-9]{9}$/';
        $match=preg_match($rule,$tel);
		if(!($match)){
			echo '手机号格式错误!';
			return;
		}

		// 账号重复检测
		$userIf =User::where("username",$tel)->first();
		if($userIf){
			echo '账号已被注册！';
			return;
		}

		//密码
		$password = $_POST['password'];
		if(strlen($password)<6 || strlen($password)>12){
			echo '密码要在6~12位';
			return;
		}

		//确认密码
		$password2 = $_POST['password2'];
		if($password != $password2){
			echo '密码和确认密码不相同';
			return;
		}
		
		// 手机验证码
		if(!$_POST['code']){
			echo '验证码不能为空';
			return;
		}

		$code = $_POST['code'];
		$map['phone']=$tel;
		$map['code']=$code;
		$codeIf = User_code::where('phone',$tel)->where('code',$code)->first();

		if(!$codeIf){
			echo "验证码错误";
			return;
		}
		
		// 短信验证码存活时间
		$start_time=$codeIf['start_time'];
		$end_time=$codeIf['end_time'];
		$time=date('Y-m-d H:i:s',time());
		if($time>$end_time) {
			echo '验证码失效，请重新发送';
			return;
		}

		//插入数据库
		$passMd = bcrypt($password);
		$nowTime = date('Y-m-d H:i:s',time());
		// $IpAddress = $_SERVER['REMOTE_ADDR'];
		
		// 生成一个用户名
		$name = 'by_'.substr($tel,-6);

		$data['name']=$name;
		$data['username']=$tel;
		$data['password']=$passMd;
		$data['register_time']=$nowTime;

		$userTable = New User;
		$userTable->username=$tel;
		$userTable->password=$passMd;
		$userTable->name=$name;
		$userTable->register_time=$nowTime;
		$userTable->save();

		// 当前域名
		$root = $_SERVER['SERVER_NAME'];
		$json = array("url" => "$root");
		exit(json_encode($json));
	}

	// 【前端】手机号是否重复验证
	public function repeat(){
		$tel =$_POST['tel'];
		$userIf =User::where("username",$tel)->first();
		if($userIf){
			$arr = '账号已被注册！';
			exit(json_encode($arr));
		}
	}

	//短信发送
	public function code(){

		//账号判断（手机号）
		if(!$_POST['tel']){
			echo '电话不能为空';
			return;
		}

		// 接收的手机号参数
		$tel = $_POST['tel'];
        $rule ='/^[1][358][0-9]{9}$/';
        $match=preg_match($rule,$tel);
		if(!($match)){
			echo '手机号格式错误!';
			return;
		}

		$userIf =User::where("username",$tel)->first();
		if($userIf){
			echo '账号已被注册！';
			return;
		}

		// 生成随机验证码，获取当前时间，过期时间，
		$rend = mt_rand(0,999999);
		$nowTime = date('Y-m-d H:i:s',time());
		$nextTime = date('Y-m-d H:i:s',strtotime("+180 seconds"));
		$IpAddress = $_SERVER['REMOTE_ADDR'];

		$code = new User_code;

		$code->phone=$tel;
		$code->code=$rend;
		$code->start_time=$nowTime;
		$code->end_time=$nextTime;
		$code->found_ip=$IpAddress;
		$code->save();

		//向手机发送验证码
		$to=$tel;    			 // 手机号
    	$datas=array($rend,'3'); //值1：验证码，值2：失效分钟数
    	$tempId='112877'; 			 //短信模板编号
		Note::sendTemplateSMS($to,$datas,$tempId);
		echo '验证码已发送';
		return;
	}

	// 短信【测试】
	public function test(){
		$rend = mt_rand(0,999999);

		//向手机发送验证码
		$to=18637523369;    			 // 手机号
    	$datas=array($rend,'3'); //值1：验证码，值2：失效分钟数
    	$tempId='1'; 			 //短信模板编号
		Note::sendTemplateSMS($to,$datas,$tempId);
		echo '验证码已发送';
		return;
	}
    
}
