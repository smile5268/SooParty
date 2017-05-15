<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Models\User;
use App\Models\Signin;
use App\Models\Company_details;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Order_refund;
use App\Models\Address;
use App\Models\Activities;
use App\Models\Bank;


// 个人中心
class CenterController extends BaseController
{
   // 个人中心首页
    public function index(){
         return view('center.index');
    }
    public function mysoo(){
          $id=session('userid');
          //我发布的活动数量
          $number=DB::table('user')
                  ->leftjoin('activities',function($join){
                     $join->on('activities.user_id','=','user.id');
                  })
                  ->where('user_id',$id)
                  ->get();
            //我发布活动的总数
              $num=count($number);
          //将用户表和积分表连起来
          $ter = DB::table('user')     
                     ->leftjoin('signin', function($join)      
                      {  
                          $join->on('user.id', '=', 'signin.signin_userId');     
                      })
                    ->where('id', $id)
                    ->select('user.id','user.username','user.sex','user.integral','user.text','user.activity_classes','user.start','user.name','user.user_figure','signin.signin_userId','signin.signin_time','signin.signin_tate')
                    ->get();
            // dd($ter);

           //我参加的活动
           $personal=DB::table('order_detail')
                  ->leftjoin('activities', function($join)      
                  {  
                      $join->on('activities.id', '=', 'order_detail.actId');     
                  })
                  ->leftjoin('order', function($join)      
                  {  
                      $join->on('order.id', '=', 'order_detail.orderId');     
                  })
                  ->select('Order_detail.id','order.money','Order.serial','Activities.id as actiId','Activities.activity_name','Activities.prize_name','Activities.activity_start_time','Activities.province','Activities.city','Activities.thumbnail','Order_detail.number','Order_detail.price','Order_detail.status','Order_detail.refund','order.state')
                  ->where('activities.audit','=','1')
                  ->where('activities.activity_state','=','0')
                  ->where('order.operatorId','=',$id)
                  ->where('state','=','1')
                  ->get();
           
          //我退款的活动
          $refund=DB::table('order_detail')
                  ->leftjoin('activities','activities.id', '=', 'order_detail.actId')
                  ->leftjoin('order', 'order.id', '=', 'order_detail.orderId')
                  ->select('order.operatorId','activities.thumbnail','activities.activity_start_time','activities.activity_name','activities.audit','activities.activity_state','activities.province','activities.city','order.money','order.serial','order.state')
                  ->where('activities.audit','=','1')
                  ->where('activities.activity_state','=','0')
                  ->where('order.operatorId','=',$id)
                  ->where('state','=','3')
                  ->get();
         
         //关注别人的个数 
         $guanzhu=DB::table('signin')
                  ->select('attention','signin_tate')
                  ->where('attention',$id)
                  ->where('signin.signin_tate',3)
                  ->get();
         if($guanzhu){
           $ention=0;
         }else{
           $ention=count($guanzhu);
         }
         // dd($ention);
         // state   付款状态 0未付款 1付款 2取消 3退款
         // money     总金额
         // serial    订单号
         // province  省级
         // city      市级
         // thumbnail 图片
         // activity_start_time  开始时间
         // activity_name 标题
         // activity_state  活动必须是通过的
         // audit   必须是审核通过
        
         $ta=Date("Y-m-d H:i:s",time());
         $ti=substr($ta,0,10);
         if($ter==false){
            $uter = DB::table('user')->where('id', $id)->first();
           // dd($ter);
            return view('center.mysoo')->with('user',$uter);
         }else{
              //选出时间最大的与当天对比
              $uter=max($ter);
              // dd($uter);
             if(($uter->signin_time)==$ti){

           return view('center.mysoo')->with('user',$uter)->with('ti',$ti)->with('personal',$personal)->with('num',$num)->with('refund',$refund)->with('ention',$ention);
             }else{
                return view('center.mysoo')->with('user',$uter)->with('personal',$personal)->with('num',$num)->with('refund',$refund)->with('ention',$ention);
             }
             return view('center.mysoo')->with('user',$uter)->with('personal',$personal)->with('num',$num)->with('refund',$refund)->with('ention',$ention);
         }  
         // return view('center.mysoo')->with('user',$uter)->with('ti',$ti)->with('personal',$personal);
    }
    
    //签到
    public function signin(){
      $id=session('userid');
      $ta=Date("Y-m-d H:i:s",time());
      $ti=substr($ta,0,10);
      $integral='1';
      $sel=DB::select('select signin_time from signin where signin_userId= ? ',[$id]);
      //判断数据库里是否有过数据
      if($sel==null){
         $inser=DB::insert('insert into signin(signin_integral,signin_userId,signin_time,signin_tate) values(?,?,?,?)',[88,$id,$ti,'5']);
          if($inser==true){
             $uter = DB::table('user')->where('id', $id)->first();
             $ta=Date("Y-m-d H:i:s",time());
             $ti=substr($ta,0,10);
             if($inser==true){
                $uter = DB::table('signin')->select('signin_integral')->where('signin_userId', $id)->get();
                $integral = 0;
                foreach ($uter as $key => $value) {
                      $integral += $value->signin_integral;
                 }
                 $use = new User;
                 $userter = $use->where('id',$id)->first();
                 $userter->integral = $integral;
                 $userter->save();
                
              ?>
               <script type="text/javascript">
                  alert("签到成功");
                  var   host = window.location.host;
                  location.href='http://'+host+"/center/mysoo";
               </script>
              <?php
               }else{
                   ?>
                   <script type="text/javascript">
                      alert("签到失败");
                      var   host = window.location.host;
                      location.href='http://'+host+"/center/mysoo";
                   </script>
                  <?php
               } 
           return view('center.mysoo')->with('user',$uter)->with('ti',$ti);
          }
           
      }else{
        //用户signin表有签到数据的时候，取最大的日期与当天对比
        $aa=DB::select('select signin_time from signin where signin_userId= ?',[$id]);
        $bb=end($aa);
        if(($bb->signin_time)!=$ti){
              $inser=DB::insert('insert into signin(signin_integral,signin_userId,signin_time,signin_tate) values(?,?,?,?)',[$integral,$id,$ti,'5']);
              $uter = DB::table('user')->where('id', $id)->first();
              if($inser==true){
                //当插入积分成功后修改用户的积分字段数据
                $uter = DB::table('signin')->select('signin_integral')->where('signin_userId', $id)->get();
                $integral = 0;
                foreach ($uter as $key => $value) {
                      $integral += $value->signin_integral;
                 }
                 $use = new User;
                 $userter = $use->where('id',$id)->first();
                 $userter->integral = $integral;
                 $userter->save();
              ?>
               <script type="text/javascript">
                  alert("签到成功");
                  var   host = window.location.host;
                  location.href='http://'+host+"/center/mysoo";
               </script>
              <?php
               }else{
                  ?>
                   <script type="text/javascript">
                      alert("签到失败");
                      var   host = window.location.host;
                      location.href='http://'+host+"/center/mysoo";
                   </script>
                  <?php
               }
              return view('center.mysoo')->with('user',$uter);
       }else{
             $uter = DB::table('user')->where('id', $id)->first();
             $ti="已签到";
            return view('center.mysoo')->with('user',$uter)->with('ti',$ti);
       }
      }

    }
     //我报名的
    public function sign(){
        $user_id=session('userid');
        // 订单状态
        $order = DB::table('Order_detail')
        ->leftjoin('Activities','Activities.id','=','Order_detail.actId')
        ->leftjoin('Order','Order.id','=','Order_detail.orderId')
        ->where('Order.operatorId',$user_id)
        ->select('Order_detail.id','Order.serial','Activities.id as actId','Activities.activity_name','Activities.prize_name','Activities.activity_start_time','Activities.province','Activities.city','Activities.thumbnail','Order_detail.number','Order_detail.price','Order_detail.status','Order_detail.refund')
        ->orderBy('id','desc')
        ->get();

        // 当前时间，判断未付款订单是否过期
        $time = date('Y-m-d',time());

        // 待参加活动
        // refund为1是申请退款，2是退款成功，退款成功就不显示
        $wait = DB::table('Order_detail')
        ->leftjoin('Activities','Activities.id','=','Order_detail.actId')
        ->leftjoin('Order','Order.id','=','Order_detail.orderId')
        ->where('Order.operatorId',$user_id)
        ->where('activity_start_time','>',$time)
        ->where('status',1)
        ->where('refund','!=',2)
        ->select('Order_detail.id','Order.serial','Activities.id as actId','Activities.activity_name','Activities.prize_name','Activities.activity_start_time','Activities.province','Activities.city','Activities.thumbnail','Order_detail.number','Order_detail.price','Order_detail.status','Order_detail.refund')
        ->orderBy('id','desc')
        ->get();

        // 参加过的活动
        $join = DB::table('Order_detail')
        ->leftjoin('Activities','Activities.id','=','Order_detail.actId')
        ->leftjoin('Order','Order.id','=','Order_detail.orderId')
        ->where('Order.operatorId',$user_id)
        ->where('activity_start_time','<=',$time)
        ->where('status',1)
        ->where('refund',0)
        ->select('Order_detail.id','Order.serial','Activities.id as actId','Activities.activity_name','Activities.prize_name','Activities.activity_start_time','Activities.province','Activities.city','Activities.thumbnail','Order_detail.number','Order_detail.price','Order_detail.status','Order_detail.refund')
        ->orderBy('id','desc')
        ->get();

        // 退款的活动
        $refund = DB::table('Order_refund')
        ->leftjoin('Order_detail','Order_detail.id','=','order_refund.order_id')
        ->leftjoin('Activities','Activities.id','=','Order_detail.actId')
        ->leftjoin('Order','Order.id','=','Order_detail.orderId')
        ->where('Order.operatorId',$user_id)
        ->select('Order_refund.id','Order_detail.id as det_id','Order.serial','Activities.id as actId','Activities.activity_name','Activities.prize_name','Activities.activity_start_time','Activities.province','Activities.city','Activities.thumbnail','Order_detail.number','Order_detail.price','Order_refund.refund_state')
        ->orderBy('id','desc')
        ->get();

        return view('center.sign')->with('order',$order)->with('wait',$wait)->with('time',$time)->with('join',$join)->with('refund',$refund);
    }

    // 订单退款申请
    public function refund(){
        $id = $_POST['orderId'];
        $user_id = session('userid');

        // 获取用户填写的退款信息
        $Bank = new Bank;
        $bank_value = $Bank->where('bank_num',$user_id)->first();

        if(!$bank_value){
            $json = array("not" => "您没有绑定支付宝无法申请退款，请绑定支付宝");
            return response(json_encode($json));
        }

        // 修改选中订单退款状态为申请退款
        $Order = new Order_detail;
        $detail = $Order->where('id',$id)->first();
        $detail->refund = 1;
        $detail->save();

        $number = $detail->number * $detail->price;
        
        // 向退款表插入内容
        $refund = new Order_refund;
        $refund->order_id = $id;
        $refund->account = $bank_value->bank_account;
        $refund->name = $bank_value->uname;
        $refund->time = date('Y-m-d H:i:s',time());
        $refund->price = $number;
        $refund->user_id = $user_id;

        $ordRef = $refund->save();
        if($ordRef){
            $json = array("ok" => "申请退款成功");
            return response(json_encode($json)); 
        }else{
            $json = array("not" => "申请退款失败");
            return response(json_encode($json)); 
        }
       
    }

    // 申请退款取消
    public function cancel(){
        // 子订单ID
        $orderID = $_POST['orderCancels'];
        
        // 退款ID
        $cancelID = $_POST['orderId'];

        // 退款表
        $refund = new Order_refund;
        $fun = $refund->where('id',$cancelID)->first();
        if($fun){
            $fun->refund_state = 3;
            $cancelRefund = $fun->save();
        }else{
            $json = array("not" => "网络异常，取消退款失败");
            return response(json_encode($json));
        }

        // 子订单表
        $order = new Order_detail;
        $ords = $order->where('id',$orderID)->first();
        if($ords){
            $ords->refund = 0;
            $detail = $ords->save();
        }else{
            $json = array("not" => "网络异常，取消退款失败");
            return response(json_encode($json)); 
        }

        if($cancelRefund && $detail){
            $json = array("ok" => "取消退款申请成功");
            return response(json_encode($json)); 
        }else{
            $json = array("not" => "取消退款申请失败");
            return response(json_encode($json));
        }

    }

    //我发布的
    public function release(){

        return view('center.release');
    }
    /*我收藏的在ListController控制器里*/

    //购物车
    public function shopcart(){        
        return view('center.shopcart');
    }
    //编辑资料
    public function editor(){
      $user=Date('Y-m-d H:i:s'); 
         $id=session('userid');
         $uter = DB::table('user')->where('id', $id)->first();
          
         return view('center.editor')->with('uter',$uter); 
    }
    //编辑资料接收
    public function editer(){
          $id=session('userid');
          $name      =$_POST['uname'];
          $real_name =$_POST['real_name'];
          $sex       =$_POST['sex'];
          $name_time =$_POST['name_time'];
          $addr      =$_POST['addr'];
          $text      =$_POST['tetee'];
          $uImg      =$_FILES['uImg']; 
          if(strlen($uImg['name'])<='0'){
                      $user = new User;
                      $userin = $user->where('id',$id)->first();
                      $userin->name      = $name;
                      $userin->real_name = $real_name;
                      $userin->sex       = $sex;
                      $userin->name_time = $name_time;
                      $userin->addr      = $addr;
                      $userin->text      = $text;
                        if($userin->save()==true){
                          ?>
                           <script type="text/javascript">
                              alert("保存成功");
                              var   host = window.location.host;
                              location.href='http://'+host+"/center/editor";
                           </script>
                          <?php
                         }else{
                            ?>
                             <script type="text/javascript">
                                alert("保存失败");
                                var   host = window.location.host;
                                location.href='http://'+host+"/center/editor";
                             </script>
                            <?php
                         }
          }else{
                     $img = explode('.',$uImg['name'],2);
                     $imgName=end($img);
                      if($imgName!="png" && $imgName!="gif" && $imgName!="jpg"){
                         ?>
                              <script type="text/javascript">
                               alert("图片类型不对");
                               var   host = window.location.host;
                              location.href='http://'+host+"/center/editor";
                             </script>
                         <?php
                      }
                        //判断文件的大小
                        if($uImg["size"]>2000000){
                            ?>
                              <script type="text/javascript">
                               alert("图片文件过大");
                               var   host = window.location.host;
                              location.href='http://'+host+"/center/editor";
                             </script>
                           <?php
                        }
                        $newName = date('YmdHis').rand(1000,9999).'.'.$imgName;   // 图片新的名字
                        $newDir = date('Ymd');      // 生成一个时间目录
                        $formUrl = "./ueditor/po/".$newDir.'/';  // 图片保存路径
                        if(!is_dir($formUrl)){
                            mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
                        }else{}
                        // 把图片放到新的目录中
                        move_uploaded_file($uImg['tmp_name'],$formUrl.$newName);
                        // 图片地址
                        $imgUrl = "/ueditor/po/".$newDir.'/'.$newName;            
                        $user = new user;
                        $userin = $user->where('id',$id)->first();
                        // dd($userin);_
                        if($userin==null){
$userin= DB::insert('insert into  user(id,user_figure, name,real_name,sex,name_time,addr,text) values (?,?,?,?,?,?,?,?)', [$id, $imgUrl,$name, $real_name,$sex,$name_time,$addr,$text]);
                        if($userin==true){
                              ?>
                               <script type="text/javascript">
                                  alert("保存成功");
                                  var   host = window.location.host;
                                  location.href='http://'+host+"/center/editor";
                               </script>
                              <?php
                           }else{
                              ?>
                               <script type="text/javascript">
                                  alert("保存失败");
                                  var   host = window.location.host;
                                  location.href='http://'+host+"/center/editor";
                               </script>
                              <?php
                           }
                }else{
                      $user = new User;
                      $userin = $user->where('id',$id)->first();
                      $userin->name      = $name;
                      $userin->real_name = $real_name;
                      $userin->sex       = $sex;
                      $userin->name_time = $name_time;
                      $userin->addr      = $addr;
                      $userin->text      = $text;
                      $userin->user_figure=$imgUrl;
                      if($userin->save()==true){
                        ?>
                         <script type="text/javascript">
                            alert("保存成功");
                            var   host = window.location.host;
                            location.href='http://'+host+"/center/editor";
                         </script>
                        <?php
                     }else{
                        ?>
                         <script type="text/javascript">
                            alert("保存失败");
                            var   host = window.location.host;
                            location.href='http://'+host+"/center/editor";
                         </script>
                        <?php
                     }
                }
          }
    }
    //我的评价
    public function evaluation(){        
        return view('center.evaluation');
    }
   
    //活动管理
    public function activityadmin(){ 
        $id=session('userid');
        $user=DB::table('activities')->where('user_id',$id)->get();
        dd($user);
        return view('center.activityadmin');
    }
    
    //活动列表
    public function activitylist(){  
         $id=session('userid');

         // $id=$_GET['userid'];
         // $id=$_POST['userid'];
         // dd($id); 
       $user = DB::table('activities')->where('user_id',$id)->orderBy('id','desc')->get();
        return view('center.activitylist')->with('user',$user);
    }

    //账号绑定
    public function account_binding(){
         $id=session('userid');
         // dd($id);
          $user = DB::table('user')->where('id', $id)->first();
        return view('center.account_binding')->with('user',$user);
    }
     
     //绑定银行卡或其他支付方式
    public function binding_bank(){
           $id=session('userid');
           $user=DB::table('bank')->where('bank_num',$id)->get();
           //判断是否有数据
           if($user==null){
             return view('center.binding_bank');
           }else{
             $userter=$user;
           }
           $user=$user[0];          
        return view('center.binding_bank')->with('userter',$user);
    }
      
    //绑定支付接收
    public function binding(){
      if($_POST){
        $userid = session('userid');
        $name=$_POST['name'];
        $account=$_POST['account'];
        $user= DB::insert('insert into bank (bank_num,uname,bank_account) values (?,?,?)', [$userid,$name,$account]);
      if($user){
              $json = array("ok" =>"绑定成功");
              return response(json_encode($json));
          }else{
              $json = array("no" => "绑定失败");
             return response(json_encode($json));
          }
      }else{
           $id=session('userid');
           $user=DB::table('bank')->where('bank_num',$id)->get();
           //判断是否有数据
           if($user==null){
             return view('center.binding_bank');
           }else{
             $userter=$user;
           }
           $user=$user[0];          
        return view('center.binding_bank')->with('userter',$user);
      }
    }

     //等级管理
    public function levelman(){
        $id=session('userid');
        $user = DB::table('user')
           ->join('signin', function($join)      
              {  
                  $join->on('user.id', '=', 'signin.signin_userId');     
              })
          ->where('id', $id)
          ->select('user.id','user.username','user.integral','signin.signin_tate','signin.signin_integral')
          ->first(); 

          //如果积分表里没积分，就默认给88积分  
         if($user==null){
           $user = DB::table('user')->where('id', $id)
                  ->select('user.id','user.username','user.integral')
                  ->first();
              
          return view('center.levelman')->with('user',$user);
          }     
        return view('center.levelman')->with('user',$user);
    }
    
    //实名认证
    public function real(){
       $id=session('userid');

       $user = DB::table('real_name')->where('num', $id)->first();
        if (!$user) {
             return view('center.real')->with('user','');
        }else{
             return view('center.real')->with('user',$user); 
        }
        // return view('center.real')->with('user','')->with('ent','');
    }

     //企业认证
    public function enterprises(){
       
        // return view('center.enterprise');
        $id=session('userid');
        $enter = DB::table('enterprise')->where('user_id', $id)->first(); 
       // dd($enter->tte);
        if($enter){
            if($enter->tte==0){
                    return view('center.enterprise')->with('ent',$enter)->with('atteif','审核中')->with('tte',0);
                }else if($enter->tte==1){
                    return view('center.enterprise')->with('ent',$enter)->with('atteif','企业认证通过信息')->with('tte',1);
                }
        }else{
             return view('center.enterprise')->with('ent','');
        }
    }

    //个人认证接收
    public function gerenren(){
      $id=session('userid');
      
        if($_POST){ 
       $name=$_POST['username'];// 名字
       $digital=$_POST['card_no'];// 身份证
       $users = DB::insert('insert into real_name (uname, id_number,num) values (?, ? ,?)', [ $name,$digital,$id]);
         if($users==true){
              $user = DB::table('real_name')->where('num', $id)->first();
              $ger = 1;
              return view('center.gerenren')->with('ger',$ger)->with('user',$user);
         }else{
              $ger = 2;
              return view('center.gerenren')->with('ger',$ger);
         }
       }else{
            return view('center.real');
       }
    }
    //接收企业数据
   public function enter(){
            $id=session('userid');
            $enterprise_name=$_POST['enterprise_name'];   //企业名
            $enterprise_head=$_POST['enterprise_head'];   //负责人名
            $enterprise_card=$_POST['enterprise_card'];   //负责人身份证
            $imgs=$_FILES['enterprise_file'];             //上传文件
            $fileName = $imgs['name'];           // 文件名
            $fileTmp_name = $imgs['tmp_name'];   // 临时文件
            if(empty($fileName)){
                $imgUrl = '';
            }else{
                $nowExt = pathinfo($fileName,PATHINFO_EXTENSION);//获得上传文件的后缀名
                // 图片新的名字
                $newName = date('YmdHis').mt_rand(0,999999).'.'.$nowExt;
                // 生成一个时间目录
                $newDir = date('Ymd');
                $formUrl = "./picture/".$newDir.'/';  // 图片保存路径
                if(!is_dir($formUrl)){
                    mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
                }
                // 把图片放到新的目录中
                move_uploaded_file($fileTmp_name,$formUrl.$newName);
                // 图片地址
                $imgUrl = "/picture/".$newDir.'/'.$newName;
            }
 $user = DB::insert('insert into enterprise(enter_name, enter_headname,enter_number,enter_file,user_id,tte) values (?, ? ,?,?, ? ,?)', [$enterprise_name,$enterprise_head,$enterprise_card,$imgUrl,$id,0]);
          if($user==true){
             ?>
              <script type="text/javascript">
               // alert("审核中，需要1到2个工作日才能完成，节假日推后，如需加速审核，请电话联系我们 0755-85217521 ");
               var   host = window.location.host;
              location.href='http://'+host+"/center/enterpriseow";
             </script>
             <?php           
         }else{
            ?>
              <script type="text/javascript">
               var   host = window.location.host;
              location.href='http://'+host+"/";
             </script>
             <?php
         }
   }
 
    //密码修改
    public function update_password(){
       
        return view('center.update_password');
    } 
   //密码修改接收
    public function update_pass(){
      header("Content-type: text/html; charset=utf-8");
          $id=session('userid');
          $pass=$_POST['pass'];
          $password1=$_POST['pass1'];   
          $password2=$_POST['pass2']; 
          // dd($_POST);
          $pass2=bcrypt($password2);
          // 与数据库进行匹配
            $userResult = User::where('id',$id)->first();

            if($userResult){
              $MyPass = $userResult->password;
                  if(!\Hash::check($pass,$MyPass)){

                       ?>
                        
                        <script type="text/javascript">
                         alert("密码错误！");
                         var   host = window.location.host;
                         location.href='http://'+host+"/center/update_password";
                       </script>
                        <?php  
                        exit;
                  }else{ 
                    //判断两次密码是否一致
                        if($password1==$password2){
                               $affected = DB::update("update user set password = '$pass2' where id = ?", [$id]);
                              if($affected==true){
                                  \Session::flush();       //改密后销毁session，
                                  return redirect('/login');
                              }else{
                               ?>
                                  <script type="text/javascript">
                                   alert("密码修改错误！");
                                   var   host = window.location.host;
                                   location.href='http://'+host+"/center/update_password";
                                 </script>
                                  <?php 
                                  exit;
                              }  
                         }else{
                                  ?>
                                  <script type="text/javascript">
                                   alert("输入的两次密码不一致！！");
                                   var   host = window.location.host;
                                   location.href='http://'+host+"/center/update_password";
                                 </script>
                                  <?php 
                                  exit;
                         } 
                  }
            }else{
              exit('请输入密码');
            }
    }
     
    //公司详情编辑
    public function company(){
      $id=session('userid');
      $data = DB::table('user')         //将两张表拼接起来  
            ->join('enterprise', 'enterprise.user_id', '=', 'user.id')
            ->select('enterprise.tte','user.id')
            ->where('user.id',$id)
            ->first();
       if($data==null){
          //没企业认证，传回一个值
            $fang="1"; 
           return view('center.company')->with('fang' ,$fang);
       }else{
           if($data->tte==1){
                 return view('center.company');
           }else{
                 $fang="1"; 
                 return view('center.company')->with('fang' ,$fang);
           }
       
       }
     
     
    }
    //公司编辑接收
    public function company_post(){
        $id=session('userid');
             $uImg=$_FILES['company_log'];
             $company_name=\Request::input('company_name');
             $company_introduction=\Request::input('company_introduction');
             $company_address=\Request::input('company_address');
            
          if(strlen($uImg['name'])<='0'){
                        $user = new Company_details;
                        $userin = $user->where('id',$id)->first();
                        $userin->company_name = $company_name;
                        $userin->company_introduction = $company_introduction;
                        $userin->company_address = $company_address;
                        if($userin->save()==true){
                          ?>
                           <script type="text/javascript">
                              alert("编辑成功");
                              var   host = window.location.host;
                              location.href='http://'+host+"/center/company";
                           </script>
                          <?php
                         }else{
                            ?>
                             <script type="text/javascript">
                                alert("编辑失败");
                                var   host = window.location.host;
                                location.href='http://'+host+"/center/company";
                             </script>
                            <?php
                         }
          }else{
             $img = explode('.',$uImg['name'],2);
             $imgName=end($img);
          if($imgName!="png" && $imgName!="gif" && $imgName!="jpg"){
             ?>
                  <script type="text/javascript">
                   alert("图片类型不对");
                   var   host = window.location.host;
                  location.href='http://'+host+"/center/company";
                 </script>
             <?php
          }
            //判断文件的大小
            if($uImg["size"]>2000000){
                ?>
                  <script type="text/javascript">
                   alert("图片文件过大");
                   var   host = window.location.host;
                  location.href='http://'+host+"/center/company";
                 </script>
               <?php
            }
            $newName = date('YmdHis').rand(10000,99999).'.'.$imgName;   // 图片新的名字
            $newDir = date('Ymd');      // 生成一个时间目录
            $formUrl = "./ueditor/company/".$newDir.'/';  // 图片保存路径
            if(!is_dir($formUrl)){
                mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
            }else{}
            // 把图片放到新的目录中
            move_uploaded_file($uImg['tmp_name'],$formUrl.$newName);
            // 图片地址
            $imgUrl = "/ueditor/company/".$newDir.'/'.$newName;            
            $user = new Company_details;
            $userin = $user->where('id',$id)->first();
                  //如果第一次上传，选择插入数据，从会员变成商家也是在这里
                if($userin==null){
                  $userin= DB::insert('insert into company_details (id,company_log, company_name,company_introduction,company_address) values (?,?, ?,?,?)', [$id, $imgUrl,$company_name, $company_introduction,$company_address]);
                        if($userin==true){
                            $uName=new User;
                            $userint = $uName->where('id',$id)->first(); 
                            $userint->activity_classes = '1';  
                            //用户编辑完资料后成为商家
                              if( $userint->save()==true){
                                 ?>
                                 <script type="text/javascript">
                                    alert("编辑成功");
                                    var   host = window.location.host;
                                    location.href='http://'+host+"/center/company";
                                 </script>
                                <?php
                              }else{
                                ?>
                                 <script type="text/javascript">
                                    alert("编辑失败");
                                    var   host = window.location.host;
                                    location.href='http://'+host+"/center/company";
                                 </script>
                                <?php
                              } 
                           }else{
                              ?>
                               <script type="text/javascript">
                                  alert("编辑失败");
                                  var   host = window.location.host;
                                  location.href='http://'+host+"/center/company";
                               </script>
                              <?php
                           }
                }else{
                  $userin->company_log  = $imgUrl;
                  $userin->company_name = $company_name;
                  $userin->company_introduction = $company_introduction;
                  $userin->company_address = $company_address;
                      if($userin->save()==true){
                        ?>
                         <script type="text/javascript">
                            alert("编辑成功");
                            var   host = window.location.host;
                            location.href='http://'+host+"/center/company";
                         </script>
                        <?php
                     }else{
                        ?>
                         <script type="text/javascript">
                            alert("编辑失败");
                            var   host = window.location.host;
                            location.href='http://'+host+"/center/company";
                         </script>
                        <?php
                     }
                }
            
          }

    }

        // return view('center.company');
    // }

   //公司详情
    public function companydetail(){
         $id=session('userid');
         $data = DB::table('user')         //将两张表拼接起来  
            ->join('enterprise', 'enterprise.user_id', '=', 'user.id')
            ->select('enterprise.tte','user.id')
            ->where('user.id',$id)
            ->first();
            // dd($data);
        
        //如果认证通过，没有编辑企业资料，就会提示编辑资料提交才能查看
       if($data!=null){
            if($data->tte==1){
              //企业认证通过
                   $user = DB::table('company_details')->where('id', $id)->first();
                   if($user==null){
                     $fang="2"; 
                     return view('center.companydetail')->with('fang' ,$fang);
                   }else{
                    return view('center.companydetail')->with('user',$user);
                   }
                 
            }else{
              //企业认证没通过
                 $fang="2"; 
                 return view('center.company')->with('fang' ,$fang);
            }
      }else{

               $fang="2"; 
               return view('center.company')->with('fang' ,$fang);
      } 
  }

    
    //公司详情
    public function agreement(){
        return view('center.agreement');
   }


}
