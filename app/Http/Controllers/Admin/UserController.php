<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Pagination\Paginator;
use DB;
use SoftDeletes;
use App\Models\AdminUser;
use App\Models\Posts;

class UserController extends BaseController
{
	// 首页register
	public function add(){
       
	   return view('admin.user.userAdd');
	}

	//添加管理员
	public function register(){
        
	    $userName =\Request::input('name');
      
	    $usersName=\Request::input('usersName');
	    $Pwd  =\Request::input('userPwd');
        $userPwd=bcrypt($Pwd);
	    $created_at=date("Y-m-d H:i:s");
        $updated_at=date("Y-m-d H:i:s");
        $add=DB::insert('insert into adminUser(name, usersName , userPwd, created_at , updated_at) values (?,?,?,?,?)',[ $userName,$usersName,$userPwd,$created_at,$updated_at]);
        if(($add)==true){
            ?>
             <script type="text/javascript">
                alert("添加成功");
             </script>
            <?php
        }else{
        	?>
             <script type="text/javascript">
                alert("添加失败");
             </script>
            <?php
        }
	}

    // 查询管理员列表页面
	public function lister(){
        
      
        $users =DB::table('adminUser')->where('deleted_at',null)->orderBy('id', 'desc')->paginate(20);
        return view('admin.user.userList',['users'=>$users]);
        
	}

    // 修改管理员操作
	public function edit(){
         $id=$_GET['id'];       
         $user = DB::table('adminuser')->where('id', $id)->first();
         
	   return view('admin.user.userEdit')->with('users',$user);
	    
	}
    
    //修改管理员后要提交的操作
	public function ed(){
        $Id=$_POST['id'];
        $Pwd  =$_POST['userPwd'];
        $userName =$_POST['name'];
        $usersName=$_POST['usersName'];
        $user = DB::table('adminuser')->where('id', $Id)->first();
	    $created_at=date("Y-m-d H:i:s",time());
        $updated_at=date("Y-m-d H:i:s",time());

        
        if(($user->userPwd)==$Pwd){

            $user = new AdminUser;
            $userAdmin = $user->where('id',$Id)->first();
            $userAdmin->name = $userName;
            $userAdmin->usersName = $usersName;
            if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
                alert("编辑成功");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/user/userList";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("编辑失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/user/userList";
             </script>
            <?php
         }

        }else{
            $user = new AdminUser;
            $userAdmin = $user->where('id',$Id)->first();
            $userAdmin->name = $userName;
            $userAdmin->usersName = $usersName;
            $userPwd=bcrypt($Pwd); 
           // dd($userPwd);
           $userAdmin->userPwd = $userPwd;
           if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
                alert("编辑成功");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/user/userList";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("编辑失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/user/userList";
             </script>
            <?php
         }
        }  
	}

	// 启用管理员操作
	public function enable(){
		$Id=$_GET['id'];
		$use = new AdminUser;
        $userAdmin = $use->where('id',$Id)->first();
        $userAdmin->state = '0';
		if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/user/userList";
             </script>
            <?php
         }else{
         	?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/user/userList";
             </script>
            <?php
         }
         
	}

    //禁用管理员操作
	public function disable(){
		$Id=$_GET['id'];
		$use = new AdminUser;
        $userAdmin = $use->where('id',$Id)->first();
        $userAdmin->state = '1';
		if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/user/userList";
             </script>
            <?php
         }else{
         	?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/user/userList";
             </script>
            <?php
         }
	}

    //删除管理员操作
	public function del(){
     $Id=$_GET['id'];
        $post = Posts::find($Id);
        $post->delete();
        if($post->trashed()){
             ?>
             <script type="text/javascript">
                alert("删除成功");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/user/userList";
              </script>
             <?php
        }else{
             ?>
             <script type="text/javascript">
                alert("删除失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/user/userList";
              </script>
             <?php
        }
	}
}
