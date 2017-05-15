<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Models\User;
use App\Models\Usdel;

class FrontuserController extends BaseController
{
	// 首页
	public function index(){
     $users =DB::table('User')->where('deleted_at',null)->orderBy('id', 'desc')->paginate(15);
	   return view('admin.frontuser.frontuserList',['users'=>$users]);
	}
	// 启用会员操作
	public function enable(){
		$Id=$_GET['id'];
		$use = new User;
        $userAdmin = $use->where('id',$Id)->first();
        $userAdmin->start = '0';
		if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/frontuser/frontuserList";
             </script>
            <?php
         }else{
         	?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/frontuser/frontuserList";
             </script>
            <?php
         }
         
	}

    //禁用会员操作
	public function disable(){
		$Id=$_GET['id'];
		$use = new User;
        $userAdmin = $use->where('id',$Id)->first();
        $userAdmin->start = '1';
		if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/frontuser/frontuserList";
             </script>
            <?php
         }else{
         	?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/frontuser/frontuserList";
             </script>
            <?php
         }
	}

    
	 // 修改会员操作
	public function edit(){
         $id=$_GET['id'];       
         $user = DB::table('user')->where('id', $id)->first();
	   return view('admin.frontuser.frontuserEdit')->with('users',$user);
	    
	}
    
    //修改会员后要提交的操作
	public function ed(){

		$Id=$_POST['id'];
        $name =$_POST['name'];
	    $sex=$_POST['sex'];
        $integral=$_POST['integral'];
	    $Pwds =$_POST['password'];
	    // $created_at=date("Y-m-d H:i:s",time());
        //    $updated_at=date("Y-m-d H:i:s",time());
        $user = DB::table('user')->where('id', $Id)->first();
        if(($user->password)==$Pwds){
            $user = new User;
            $userAdmin = $user->where('id',$Id)->first();
            $userAdmin->name = $name;
            $userAdmin->sex = $sex;
            $userAdmin->integral = $integral;
            if($userAdmin->save()==true){
                ?>
                 <script type="text/javascript">
                    alert("编辑成功");
                    var   host = window.location.host;
                    location.href='http://'+host+"/admin/frontuser/frontuserList";
                 </script>
                <?php
                 }else{
                 	?>
                     <script type="text/javascript">
                        alert("编辑失败");
                        var   host = window.location.host;
                        location.href='http://'+host+"/admin/frontuser/frontuserList";
                     </script>
                    <?php
                 }
        }else{    
            $Pwd=bcrypt($Pwds);     
            $user = new User;
            $userAdmin = $user->where('id',$Id)->first();
            $userAdmin->name = $name;
            $userAdmin->sex = $sex;
            $userAdmin->integral = $integral;
            $userAdmin->password = $Pwd;
            if($userAdmin->save()==true){
                ?>
                 <script type="text/javascript">
                    alert("编辑成功");
                    var   host = window.location.host;
                    location.href='http://'+host+"/admin/frontuser/frontuserList";
                 </script>
                <?php
             }else{
                ?>
                 <script type="text/javascript">
                    alert("编辑失败");
                    var   host = window.location.host;
                    location.href='http://'+host+"/admin/frontuser/frontuserList";
                 </script>
                <?php
             }
        }
	}
	//删除会员操作
	public function del(){
     $Id=$_GET['id'];
        $post = Usdel::find($Id);
        $post->delete();
        if($post->trashed()){
             ?>
             <script type="text/javascript">
                alert("删除成功");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/frontuser/frontuserList";
              </script>
             <?php
        }else{
             ?>
             <script type="text/javascript">
	             alert("删除失败");
	             var   host = window.location.host;
	             location.href='http://'+host+"/admin/frontuser/frontuserList";
             </script>
             <?php
        }
	}
    //对会员的账号搜索
    public function sec(){
        if($name=$_POST['serch_value']==null){
            ?>
            <script type="text/javascript">
            alert("请输入您要查询的账号");
             var   host = window.location.host;
             location.href='http://'+host+"/admin/frontuser/frontuserList";
             exit;
            </script>
            <?php
        }
            $name=$_POST['serch_value'];
            $user = new User;
            $user = DB::table('user')->where('username', 'like', "%$name%")->where('deleted_at',null)->orderBy('id', 'desc')->paginate(15);
            return view('admin.frontuser.frontuserSecch')->with('users',$user);       
    }  
}
