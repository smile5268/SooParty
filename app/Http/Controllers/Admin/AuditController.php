<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Models\User;
use App\Models\Enterprise;
use App\Models\Company_details;
class AuditController extends BaseController
{ 
   public function firms(){
   	  // $users = DB::table('user')->select('name', 'email as user_email')->get();
      $data = DB::table('user')         //将两张表拼接起来  
            ->join('enterprise', function($join)  
            {  
                $join->on('user.id', '=', 'enterprise.user_id');  
            })->select('user.activity_classes','user.username', 'enterprise.id','enterprise.enter_name','enterprise.enter_headname','enterprise.enter_number','enterprise.enter_file','enterprise.tte')  
                // ->skip($pageSize*($pageIndex))   //$pageIndex是页码   即一次会跳过几个数据
                // ->limit($pageSize)                 //$pageSize限制一次获取的数据条数  
                ->orderBy('user.id', 'desc')  
                ->get();
    
       // dd($data);
   	  return view('admin.audit.firms')->with('user',$data);
   }
   
   //放大图片
   public function tion(){
       $Id=$_GET['id'];
       $user = Enterprise::where('user_id',$Id)->first(); 
      
       return view('admin.audit.tu')->with('user',$user);


   }
  
   //企业认证通过
   public function through(){
        $Id=$_GET['id'];
        $use = new Enterprise;
        $userAdmin = $use->where('id',$Id)->first();
        $userAdmin->tte ='1';
        //  $ter=$userAdmin->user_id;
         
        // 
        // $us = new User;
        // $user = $us->where('id',$ter)->first();
        //  dd($user);
        
    if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/audit/firms";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/audit/firms";
             </script>
            <?php
         }
   }
   //企业认证不通过
   public function nothrough(){
        $Id=$_GET['id'];
        $use = new Enterprise;
        $userAdmin = $use->where('id',$Id)->first();
        $userAdmin->tte = '0';
    if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/audit/firms";
             </script>
            <?php
         }else{
          ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/audit/firms";
             </script>
            <?php
         }
   }
    //删除企业认证的
    public function del(){
        $Id=$_GET['id'];
        $del = DB::delete('delete from Enterprise where user_id='.$Id);
        if($del==true){
             ?>
             <script type="text/javascript">
                alert("删除成功");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/audit/firms";
              </script>
             <?php
        }else{
             ?>
             <script type="text/javascript">
               alert("删除失败");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/audit/firms";
             </script>
             <?php
        }
   }
    //企业列表
    public function firmslist(){
      $user=DB::table('company_details')->get();
      // dd($user);
       return view('admin.audit.firmslist')->with('user',$user);
    }
   //企业推荐
    public function push(){
      $Id=$_GET['id'];
      $push = new Company_details;
      $pushId = $push->where('id',$Id)->first();
      $pushId->company_push = '1';
      if($pushId->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/audit/firmslist";
             </script>
            <?php
         }else{
          ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/audit/firmslist";
             </script>
            <?php
         }
    } 

    //不推荐企业
    public function nopush(){
      $Id=$_GET['id'];
      $push = new Company_details;
      $pushId = $push->where('id',$Id)->first();
      $pushId->company_push = '0';
      if($pushId->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/audit/firmslist";
             </script>
            <?php
         }else{
          ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/audit/firmslist";
             </script>
            <?php
         }
    }
    //删除企业
    public function dele(){
        $Id=$_GET['id'];
        $del = DB::delete('delete from company_details where user_id='.$Id);
        if($del==true){
             ?>
             <script type="text/javascript">
                alert("删除成功");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/audit/firmslist";
              </script>
             <?php
        }else{
             ?>
             <script type="text/javascript">
               alert("删除失败");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/audit/firmslist";
             </script>
             <?php
        }
   }
}