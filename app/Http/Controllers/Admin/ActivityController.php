<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Models\User;
use App\Models\Activities;
use App\Models\Recommended; 
use App\Models\Package; 
use App\Models\Company_details;
class ActivityController extends BaseController
{  
		//活动首页
	  public function index(){
     
	  } 
   //活动页
    public function activepage(){
     // $Id=$_GET['id'];
     // $users =DB::table('User')->where('deleted_at',null)->orderBy('id', 'desc')->paginate(5);
     //   return view('admin.frontuser.activepage',['users'=>$users]);
        // $user = new User;
        $user = new Activities;
        $user = DB::table('Activities')->where('deleted_at',null)->where('audit','1')->orderBy('id', 'desc')->paginate(15);
        return view('admin.activity.activepage')->with('users',$user);
    }

    //热门活动
     public function hot(){
        $id=\Request::input('id');
        $use = new Activities;
        $userAdmin = $use->where('id',$id)->first();
        $userAdmin->recommended_id = '1';
        if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }

     }
    
     //有奖活动
     public function theprize(){
        $id=\Request::input('id');
        $use = new Activities;
        $userAdmin = $use->where('id',$id)->first();
        $userAdmin->recommended_id = '2';
        if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }

     }
      
      //精选活动
     public function thesele(){
        $id=\Request::input('id');
        $use = new Activities;
        $userAdmin = $use->where('id',$id)->first();
        $userAdmin->recommended_id = '3';
        if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }

     }




      //禁用
     public function disable(){
        $Id=$_GET['id'];
        $use = new Activities;
        $userAdmin = $use->where('id',$Id)->first();
        $userAdmin->activity_state = '2';
        if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }
     }
     
      //通过
     public function show(){
        $Id=$_GET['id'];
        $use = new Activities;
        $userAdmin = $use->where('id',$Id)->first();
        $userAdmin->activity_state = '0';
        if($userAdmin->save()==true){
             

            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/activepage";
             </script>
            <?php
         }
     }


     //修改操作
     public function updata(){
        $Id=$_GET['id'];
        $user = DB::table('Activities')->where('id', $Id)->first();
        // dd($user);
       return view('admin.activity.upda')->with('user',$user);
     }
     
     //修改提交后的操作
     // public function update(){
     //     $Id=$_POST['id'];
     //     $ =$_POST('');
     //     $ =$_POST('');  
     //     $ =$_POST(''); 
     //     $ =$_POST('');  
     //    $created_at=date("Y-m-d H:i:s",time());
     //    $updated_at=date("Y-m-d H:i:s",time());
        
     //    $user = new Activities;
     //    $userAdmin = $user->where('id',$Id)->first();
     //    $userAdmin->字段名 = $; 
     //    $userAdmin->字段名 = $;
     //    $userAdmin->字段名 = $;

     //    if($userAdmin->save()==true){
     //        这个加个php的问号>
     //         <script type="text/javascript">
     //            alert("编辑成功");
     //            var   host = window.location.host;
     //            location.href='http://'+host+"/admin/user/userList";
     //         </script>
     //        <?php
     //     }else{
     //        这个加个php的问号>
     //         <script type="text/javascript">
     //            alert("编辑失败");
     //            var   host = window.location.host;
     //            location.href='http://'+host+"/admin/user/userList";
     //         </script>
     //        <?php
     //     }
     // }

    //删除操作
	public function del(){
        $Id=$_GET['id'];
         $Activities=Activities::find($Id); 
        $Activities->delete();
        if($Activities->trashed()){
             ?>
             <script type="text/javascript">
                alert("删除成功");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/activepage";
              </script>
             <?php
        }else{
             ?>
             <script type="text/javascript">
                alert("删除失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/activepage";
              </script>
             <?php
            }
        }
    
      //查询
        public function sec1(){
        if($name1=$_POST['serch_value1']!=null){
            $name1=$_POST['serch_value1'];
            $user = new Activities;
            $user = DB::table('activities')->where('activity_name', 'like', "%$name1%")->where('deleted_at',null)->orderBy('id', 'desc')->paginate(15);
            return view('admin.activity.activepage')->with('users',$user); 
           
        }else{
            ?>
            <script type="text/javascript">
            alert("请输入您要查询的编号");
             var   host = window.location.host;
             location.href='http://'+host+"/admin/activity/activepage";
             exit();
            </script>
            <?php
        }
            
       }
       //查看活动
       public function showact(){
         $id=$_GET['id'];
        // 活动图片
        $img=DB::table('activity_image')->where('act_id',$id)->get();

        // 活动信息
        $details = Activities::where('id',$id)->firstOrFail();
       //右侧的信息
        $data = DB::table('activities')         
            ->join('user','user.id','=','activities.user_id')           
            ->select('user.id','user.name','user.activity_classes','user.text')                
            ->where('activities.id', $id) 
            ->first();

        //查报名活动人数是否上限
        $user = DB::table('order_detail')
        ->leftjoin('activities','activities.id','=','order_detail.actId')
        ->leftjoin('order','order.id','=','order_detail.orderId')
        ->leftjoin('user','user.id','=','order.operatorId')
        ->select('order_detail.status','order_detail.number','order_detail.refund','activities.activity_number','activities.id','order.operatorId','user.sex')
        ->where('order_detail.status',1)
        ->where('order_detail.refund',0)
        ->where('order.operatorId','!=',null)
        ->where('activities.id',$id)
        ->get();

        // dd($user);
        //判断人数是否超过了上限的数，
        //如果超过了，将按照设定最大的数显示
        //否则将显示报名数人数
        $num=0;
        $nan=0;
        $nv=0;  
        for($i=0;$i<count($user);$i++){
               $num +=$user[$i]->number;
                  if($user[$i]->sex==1){
                     $nan +=$user[$i]->number;
                   }
                   if($user[$i]->sex==2){
                     $nv +=$user[$i]->number;
                   }
        }
             
        //判断是否有人数上限
        if($details->activity_number==0){
           $number="无上限";
            
               if($num>=$details->activity_number){
                   $full='1';
               }else{
                   $full='1';
               }
        }else{
            //如果用户爆满了是2，否则是1
            if($num>=$details->activity_number){
                   $full='2';
               }else{
                   $full='1';
               }
           $number="$details->activity_number";
        }
        
         //1是企业，0是用户
         if($data->activity_classes==1){
             $id = $data->id;
             $Company=new Company_details;
             $Comselect = $Company->where('id',$id)->first();
             if($Comselect==null){
                 $Comselect=$data->text;
                 $name=  $data->name;
                 $activity_classes = 0;
             }else{
                $name=$Comselect->company_name;
                $activity_classes = 1;
             } 
         }else{
             $Comselect=$data->text;
             $name=  $data->name;
             $activity_classes = 0;   
         }
         // 判断收费活动还是免费活动
        if($details->cost == 1){            
            $act_id = $details->id;
            $Package = new Package;
            $PackSelect = $Package->where('act_id',$act_id)->get();
            $cost = 1;
        }else{
            $PackSelect = '免费';
            $cost = 2;
        }

        return view('list.details')
                ->with('details',$details)
                ->with('cost',$cost)
                ->with('PackSelect',$PackSelect)
                ->with('img',$img)
                ->with('data',$data)
                ->with('activity_classes',$activity_classes)
                ->with('Comselect',$Comselect)
                ->with('name',$name)
                // ->with('number',$number)    
                ->with('num',$num)
                ->with('full',$full)
                ->with('nan',$nan)
                ->with('nv',$nv); 
        // return view('admin.activity.showact');
       }
 

      //活动审核
      public function activity(){
        $users=DB::table('activities')->orderBy('id','desc')->paginate(15);
     
      return view('admin.activity.act_activity')->with('users',$users);
      }
      

     //活动审核是否通过
     public function activitythrough(){
         $id=$_GET['id'];
         // $user=DB::table('activities')->where('id',$id)->first();
         $user=new Activities;
         $userAdmin=$user->where('id',$id)->first();
         $userAdmin->audit='1';
        if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/activity/act_activity";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/act_activity";
             </script>
            <?php
         }
     }
      //活动不通过
      public function activitynothrough(){
        $id=$_GET['id'];
         // $user=DB::table('activities')->where('id',$id)->first();
         $user=new Activities;
         $userAdmin=$user->where('id',$id)->first();
         $userAdmin->audit='2';
        if($userAdmin->save()==true){
            ?>
             <script type="text/javascript">
               alert("操作成功");
               var   host = window.location.host;
               location.href='http://'+host+"/admin/activity/act_activity";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("操作失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/activity/act_activity";
             </script>
            <?php
         }
      }

} 

