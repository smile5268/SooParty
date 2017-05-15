<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Activities;
use App\Models\Package; 
use App\Models\Order_detail; 
use App\Models\Order;
use DB;


class OrderController extends BaseController
{  

   //列表页面
   public function orderlist(){
         $users =DB::table('Order')
         ->leftjoin('address','address.id','=','Order.addId')
         ->leftjoin('order_detail','order_detail.orderId','=','Order.id')
         ->leftjoin('activities','order_detail.actId','=','activities.id')
         ->select('address.phonenumber','Order.id','Order.serial','Order.state','Order.payment','Order.money','Order.created_at','order_detail.number','order_detail.id as pid' ,'order_detail.price','order_detail.status','order_detail.refund','activities.activity_name','activities.id as act_id')
         ->where('status',1)
         ->orderBy('Order.id','desc')
         ->paginate(15);
         // ->get();
         // dd($users);
   	  return view('admin.order.orderlist')->with('users',$users);
   }
   //查看活动的订单
   public function order_showactivities(){
          $id=$_GET['id'];
        // 活动图片
        $img=DB::table('activity_image')->where('act_id',$id)->get();
        // 活动信息
        $details = Activities::where('id',$id)->firstOrFail();
      
        $data = DB::table('activities')         
            ->join('user', function($join)
            {  
                $join->on('user.id','=','activities.user_id');  
            })           
            ->select('user.id','user.name','user.activity_classes','user.text')                
            ->where('activities.id', $id) 
            ->first();

        //查报名活动人数是否上限
        $user = DB::table('order_detail')
        ->leftjoin('activities', function($join)
        {  
            $join->on('activities.id','=','order_detail.actId');  
        })
        ->leftjoin('order', function($join)
        {  
            $join->on('order.id','=','order_detail.orderId');  
        })
        ->where('state',1)
        ->get();

        $num=0;
        for($i=0;$i<count($user);$i++){
        $num +=$user[$i]->number;
        }

        //判断购买的人数是否上限
       if($num>=$details->activity_number){
           $full="人数已经满了";
       }else{
           $full=$num;
       }

        if(!$details->activity_number){
         $number="无上限";
        }else{
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

        return view('admin.order.order_showactivities')->with('details',$details)->with('cost',$cost)->with('PackSelect',$PackSelect)->with('img',$img)->with('data',$data)->with('activity_classes',$activity_classes)->with('Comselect',$Comselect)->with('name',$name)->with('number',$number)->with('full',$full); 
   }
    
    //要修改订单状态的显示
    public function order_update(){
        $id =$_GET['id'];
       $update = DB::table('order_detail')
       ->leftjoin('order','order.id','=','order_detail.orderId')
       ->select('order.serial','order_detail.id','order_detail.number','order_detail.price','order_detail.refund')
       ->where('orderId', $id)
       ->first();
       return view('admin.order.orderstate')->with('update',$update);
    }

    //修改订单状态
    public function orderupdate(){
         $id=$_POST['id'];
         $statee=$_POST['statee'];
          $user = new Order_detail;
          $userin = $user->where('id',$id)->first();
          $userin->refund  = $statee;
         if($userin->save()==true){
            ?>
             <script type="text/javascript">
                var   host = window.location.host;
                location.href='http://'+host+"/admin/order/orderlist";
             </script>
            <?php
         }else{
            ?>
             <script type="text/javascript">
                alert("保存失败");
                var   host = window.location.host;
                location.href='http://'+host+"/admin/order/orderlist";
             </script>
            <?php
         }
    }

    //搜索订单号
    public function ordersearch(){
        if($text=$_POST['text']!=null){
            $text=$_POST['text'];
            $users = new Order;
            //查询订单的编号，#字开头的前的数字
            $users =DB::table('order')
                   ->leftjoin('address','address.id','=','Order.addId')
                   ->leftjoin('order_detail','order_detail.orderId','=','Order.id')
                   ->leftjoin('activities','order_detail.actId','=','activities.id')
                   ->select('address.phonenumber','Order.id','Order.serial','Order.state','Order.payment','Order.money','Order.created_at','order_detail.number','order_detail.id as pid' ,'order_detail.price','order_detail.status','order_detail.refund','activities.activity_name','activities.id as act_id')
                   ->where('status',1)
                   ->where('Order.serial', 'like', "%$text%")
                   ->orderBy('Order.id','desc')
                   ->paginate(15);
            return view('admin.order.ordersearch')->with('users',$users);    
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

}