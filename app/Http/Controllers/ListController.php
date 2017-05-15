<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Activities;
use App\Models\Activitiy_collection;
use App\Models\Shopping;
use App\Models\Package;  
use App\Models\Company_details;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Address;
use App\Models\User;
use DB;

// 活动
class ListController extends BaseController
{
	// 活动列表
	public function index($screening){
        
        $data = '';

		// 类型
        $type = substr($screening,0,3);
        if($type != 'ty0'){
            if($type == 'ty1'){
                $data['prize'] = 1;
            }else if($type == 'ty2'){
                $data['prize'] = 2;
            }
        }

        // 价格
        $cost = substr($screening,4,6);
        if($cost != 'co0'){
            if($cost == 'co1'){
                $data['cost'] = 1;
            }else if($cost == 'co2'){
                $data['cost'] = 2;
            }
        }
        // 时间
        if(isset($_GET['time'])){
            if($_GET['time']){
                $data['activity_start_time'] = $_GET['time'];
            }   
        }

        //地点
        if(isset($_GET['address'])){
            if($_GET['address']){
                $data['city'] = $_GET['address'];
            }   
        }
        // 判断搜索框
        if(isset($_POST['seek'])){      
         
             // 判断是不是爱好
            if($_POST['seek'] == 'hobby'){

                $hobby = $_POST['ak'];  // 搜索框的值
                // 判断是否有筛选
                if(!empty($data)){
                   $Activities =DB::table('Activities')          
                    ->leftjoin('user', function($join)  
                    {  
                        $join->on('activities.user_id', '=', 'user.id');  
                    })
                    ->select('activities.id','activities.thumbnail','activities.activity_name','activities.prize_name','activities.prize_name','activities.price','activities.activity_start_time','activities.province','activities.city','user.activity_classes','user.name')
                
                    ->where($data)
                    ->where('activity_name','like',"%$hobby%")
                    ->where('audit',1)
                    ->where('activity_state',0)
                    ->orderBy('id','desc')
                    ->paginate(9);

                }else{
                    $Activities =DB::table('Activities')          
                    ->leftjoin('user', function($join)  
                    {  
                        $join->on('activities.user_id', '=', 'user.id');  
                    })
                    ->select('activities.id','activities.thumbnail','activities.activity_name','activities.prize_name','activities.prize_name','activities.price','activities.activity_start_time','activities.province','activities.city','user.activity_classes','user.name')
                    ->where('activity_name','like',"%$hobby%")
                    ->where('audit',1)
                    ->where('activity_state',0)
                    ->orderBy('id','desc')
                    ->paginate(9);
                }

            // 判断是不是奖品
            }else if($_POST['seek'] == 'prize'){
                $prize = $_POST['ak'];  // 搜索框的值

                // 判断是否有筛选
                if(!empty($data)){
                     $Activities =DB::table('Activities')          
                    ->leftjoin('user', function($join)  
                    {  
                        $join->on('activities.user_id', '=', 'user.id');  
                    })
                    ->select('activities.id','activities.thumbnail','activities.activity_name','activities.prize_name','activities.prize_name','activities.price','activities.activity_start_time','activities.province','activities.city','user.activity_classes','user.name')

                    ->where($data)
                    ->where('prize_name','like',"%$prize%")
                    ->where('audit',1)
                    ->where('activity_state',0)
                    ->orderBy('id','desc')
                    ->paginate(9);

                }else{
                   $Activities =DB::table('Activities')          
                    ->leftjoin('user', function($join)  
                    {  
                        $join->on('activities.user_id', '=', 'user.id');  
                    })
                    ->select('activities.id','activities.thumbnail','activities.activity_name','activities.prize_name','activities.prize_name','activities.price','activities.activity_start_time','activities.province','activities.city','user.activity_classes','user.name')
                    ->where('prize_name','like',"%$prize%")
                    ->where('audit',1)
                    ->where('activity_state',0)
                    ->orderBy('id','desc')
                    ->paginate(9);
                }
            }else{
                if(!empty($data)){
                    $Activities =DB::table('Activities')          
                    ->leftjoin('user', function($join)  
                    {  
                        $join->on('activities.user_id', '=', 'user.id');  
                    })
                    ->select('activities.id','activities.thumbnail','activities.activity_name','activities.prize_name','activities.prize_name','activities.price','activities.activity_start_time','activities.province','activities.city','user.activity_classes','user.name')
                    ->where($data)
                    ->where('audit',1)
                    ->where('activity_state',0)
                    ->orderBy('id','desc')
                    ->paginate(9);
                }else{
                    $Activities =DB::table('Activities')          
                    ->leftjoin('user', function($join)  
                    {  
                        $join->on('activities.user_id', '=', 'user.id');  
                    })
                    ->select('activities.id','activities.thumbnail','activities.activity_name','activities.prize_name','activities.prize_name','activities.price','activities.activity_start_time','activities.province','activities.city','user.activity_classes','user.name')
                    ->orderBy('id','desc')
                    ->where('audit',1)
                    ->where('activity_state',0)
                    ->paginate(9);
                }
            }
        }else{
            if(!empty($data)){
                $Activities =DB::table('Activities')          
                ->leftjoin('user', 'activities.user_id', '=', 'user.id')
                ->select('activities.id','activities.thumbnail','activities.activity_name','activities.prize_name','activities.prize_name','activities.price','activities.activity_start_time','activities.province','activities.city','user.activity_classes','user.name')
                ->where($data)
                ->where('audit',1)
                ->where('activity_state',0)
                ->orderBy('id','desc')
                ->paginate(9);
            
            }else{
                $Activities =DB::table('Activities')          
                ->leftjoin('user','activities.user_id', '=', 'user.id')
                ->select('activities.id','activities.thumbnail','activities.activity_name','activities.prize_name','activities.prize_name','activities.price','activities.activity_start_time','activities.province','activities.city','user.activity_classes','user.name')
                ->orderBy('id','desc')
                ->where('audit',1)
                ->where('activity_state',0)
                ->paginate(9);
            }
        }
        
    // 推选活动
      $txhd = DB::table('activities')          
            ->leftjoin('recommended', function($join)  
            {  
                $join->on('activities.recommended_id', '=', 'recommended.id');  
            })
            ->leftjoin('user', function($join)
            {  
                $join->on('user.id', '=', 'activities.user_id');  
            })           
            ->select('recommended.push','activities.id','activities.activity_name', 'activities.prize_name','activities.activity_start_time','activities.province','activities.city','activities.area','activities.cost','activities.activity_state','activities.activity_number','activities.thumbnail','user.activity_classes','user.name')  
                ->limit(3)                          
                ->where('recommended_id', 4) //活动类型为推选活动(4)
                ->where('audit', 1 )  //审核通过
                ->orderBy('activities.id', 'desc')    //最新的显示在最前面
                ->get();
                
          $countti = count($txhd);

            //这是遍历套餐
           for($a=0;$a<$countti;$a++){
              if($txhd[$a]->cost==1){                  
                  $id = $txhd[$a]->id;
                  $results = Package::where('act_id',$id)->first();
                  $aa = $results->cost;
              }else if($txhd[$a]->cost==2){
                  $aa = '免费';
              }
              $moreti[$a] = $aa;
           } 
          $hear['txhd'] = $txhd;
          $hear['countti'] =$countti;
          $hear['moreti']  =$moreti;

		return view('list.index',['Activities'=>$Activities])->with('hear',$hear);
	}
     
    //企业列表
    public function enterprise(){
        // dd($_POST);
         return view('list.enterprise');
    }



    // 活动详情页
    public function details(){
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
          // dd($data);
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
             // dd($Comselect);
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
           
 
    }
    // 活动收藏
    public function attend(){
        // 判断是否登录
        if(!session('isLogin')){
            $arr = '登录后才可以收藏！';
            $json = array("attend" => "$arr");
            exit(json_encode($json));
        }

        $activitiyId = $_POST['id'];    // 活动id
        $userId = session('userid');  // 用户id
        $data = date('Y-m-d H:i:s',time());
        
        $collection = new Activitiy_collection;
        $collcon = $collection->where('user_id',$userId)
        ->where('act_id',$activitiyId)
        ->first();

        // 是否收藏
        if($collcon){
            $arr = '请不要重复收藏！';
            $json = array("attend" => "$arr");
            exit(json_encode($json));
        }else{
            $collection->user_id = $userId;
            $collection->act_id = $activitiyId;
            $collection->created_at = $data;
            $collection->updated_at = $data;
            $collection->save();

            $arr = '收藏成功^_^';
            $json = array("attend" => "$arr");
            exit(json_encode($json));
        }
        
    }

    //活动收藏页
    public function attendCollection(){
        $userid = session('userid');

         $hot = DB::table('Activitiy_collection')         //将多张表拼接起来  
            ->leftjoin('Activities', function($join)  
            {  
                $join->on('Activities.id','=','Activitiy_collection.act_id');  
            })
            ->select('activities.id','activities.user_id', 'activities.activity_name','activities.prize_name',  
            'activities.activity_start_time','activities.activity_end_time','activities.province','activities.thumbnail','activities.city','activities.area')
            ->where('Activitiy_collection.user_id',$userid)
            ->get();
        return view('center.coll')->with('hot',$hot);
    }
    //删除收藏
     public function colldel(){
        $userid = session('userid');
        $id=$_GET['id'];
        $dele=DB::delete("delete from activitiy_collection where act_id='$id'");
         if($dele){
                $json = array("ok"=>"删除成功");
                return response(json_encode($json));
            }else{
                $json = array("no" => "请输入账号名或者没有该用户。");
               return response(json_encode($json));
            }

        return redirect('center\coll');
     }



    // 添加到购物车
    public function shopping(){

         // 判断是否登录
        if(!session('isLogin')){
            $arr = '登录后才可以添加到购物车！';
            $json = array("attend" => "$arr");
            exit(json_encode($json));
        }

        $datas = '';

        // 活动Id
        $datas['act_id'] = $_POST['id'];

        // 用户Id
        $datas['userid'] = session('userid');

        // 数量
        $number = $_POST['number'];

        // 套餐(区分收费免费，免费没有套餐)
        if(isset($_POST['pack'])){
            // 活动套餐ID
            $datas['packageId'] = $_POST['pack'];
            $packs = 1;
        }

        $Shopping = new Shopping;
        $collcon = $Shopping->where($datas)->first();

        if($collcon){
            // 如果已经加入购物车,就只添加数量
            $collconNumber = $collcon['act_number'];    // 数据库数量
            $number = $_POST['number'];                 // 添加数量
            $addNumber = $collconNumber + $number;      // 最新数量
            $collconAdd = $Shopping->where($datas)->first();
            $collconAdd->act_number = $addNumber;
            $ifAdd = $collconAdd->save();

            if($ifAdd){
                $json = array("attend" => '添加成功');
            }else{
                $json = array("attend" => '添加失败');
            }
            exit(json_encode($json));

        }else{
            $Shopping->act_id = $datas['act_id'];
            $Shopping->userid = $datas['userid'];
            $Shopping->act_number = $number;

            // 判断是收费还是免费，收费为teue
            if(isset($packs)){
                $Shopping->packageId = $datas['packageId'];
            }
            
            $ifShoopping = $Shopping->save();

            if($ifShoopping){
                $json = array("attend" => '活动添加成功^_^');
            }else{
                $json = array("attend" => '活动添加失败');
            }
            exit(json_encode($json));
        }

    }

    // 购物车页
    public function shoppingCart(){
        $userid = session('userid');

        // 购物车里的活动
        $data=Date('Y-m-d'); 
        $details = DB::table('Shopping')
            ->leftjoin('Activities', function($join)  
            {  
                $join->on('Activities.id','=','Shopping.act_id');  
            })
            ->leftjoin('activity_package', function($join)
            {  
                $join->on('activity_package.id','=','Shopping.packageId');
            })          
            ->select('Shopping.id','Shopping.act_id','Activities.activity_name','Activities.activity_start_time','Activities.province','Activities.city','Shopping.act_number','activity_package.cost','Shopping.packageId')
            ->where('userid',$userid)
            ->orderBy('id','desc')
            ->get();
         // dd($details);
        return view('list.shopping')->with('details',$details)->with('data',$data);

    }
    // 购物车活动添加
    public function shoppingAdd(){
        
        $userid = session('userid'); // 用户Id
        $add = $_POST['add'];          // 添加数量
        $actId = $_POST['actId'];      // 活动Id
        $packs = $_POST['packs'];      // 套餐Id

        $shopping = new Shopping;
        $shopSelect = $shopping->where('userid',$userid)
        ->where('act_id',$actId)
        ->where('packageId',$packs)
        ->first();

        $shopSelect->act_number = $add;
        $shopSelect->save();

    }

    // 购物车活动减少
    public function shoppingRed(){

        $userid = session('userid'); // 用户Id
        $addVal = $_POST['Red'];          // 添加数量
        $actId = $_POST['actId'];      // 活动Id
        $packs = $_POST['packs'];      // 套餐Id

        $shopping = new Shopping;
        $shopSelect = $shopping->where('userid',$userid)
        ->where('act_id',$actId)
        ->where('packageId',$packs)
        ->first();

        $shopSelect->act_number = $addVal;
        $shopSelect->save();

    }

    // 购物车活动删除
    public function shoppingDel(){
        $userid = session('userid');
        $actId = $_POST['actId'];
        $packs = $_POST['packs'];      // 套餐Id

        $shopping = new Shopping;
        $shopSelect = $shopping->where('userid',$userid)
        ->where('act_id',$actId)
        ->where('packageId',$packs)
        ->first();
        $sel = $shopSelect->delete();

        if($sel){
            $json = array("ok" => "删除成功");
            return response(json_encode($json));
        }else{
            $json = array("not" => "删除失败");
            return response(json_encode($json));
        }
    }
    
    // 订单页
    public function order(){

        $shoppingId = $_POST['shoppingId']; // 购物车id
        $expId = explode(',',$shoppingId);  // 字符串转数组

        // 选中的活动
        for($i=0;$i<count($expId);$i++){
            $details[$i] = DB::table('Shopping')
            ->leftjoin('Activities', function($join)  
            {  
                $join->on('Activities.id','=','Shopping.act_id');  
            })
            ->leftjoin('activity_package', function($join)
            {  
                $join->on('activity_package.id','=','Shopping.packageId');
            })          
            ->select('Shopping.id','Shopping.act_id','Activities.activity_name','Activities.activity_start_time','Activities.province','Activities.city','Shopping.act_number','activity_package.cost','Shopping.packageId','Activities.thumbnail')
            ->where('Shopping.id',$expId[$i])
            ->first();
        }

        return view('list.order')->with('details',$details);

    }

    // 订单接收页(生成订单)
    public function orderAdd(){

        // 要付款的活动ID（购物车表ID）
        $orderId = $_POST['orderId'];

        // 总价格
        $total = $_POST['total'];


        // 参加活动用户信息表ID
        $Address = new Address;
        $Address->consignee = $_POST['name'];
        $Address->cardnumber = $_POST['card'];
        $Address->phonenumber = $_POST['tel'];
        $Address->save();

        $infoId = $Address->id;

        // 付款方式(现在只有微信，所以直接赋值不需要获取)
        $payment = 1;

        // 操作用户ID
        $userId = session('userid');

        // 唯一订单号
        $serial = date('YmdHis').substr(implode(NULL,array_map('ord',str_split(substr(uniqid(),7,13),1))),0,8);

        // 生成总订单（主表：活动表）
        $order = new Order;
        $order->serial = $serial;
        $order->addId = $infoId;
        $order->operatorId = $userId;
        $order->payment = $payment;
        $order->money = $total;
        $order->save();

        // 主订单ID
        $activityOrder = $order->id;


        // 获取订单详情的信息（子表：活动详情表）
        for($i=0;$i<count($orderId);$i++){
            $orderVal[$i] = DB::table('Shopping')
            ->leftjoin('Activities','Activities.id','=','Shopping.act_id')
            ->leftjoin('activity_package','activity_package.id','=','Shopping.packageId')
            ->select('Shopping.id','Shopping.act_id','Shopping.act_number','activity_package.cost as costVal','Activities.cost')
            ->where('Shopping.id',$orderId[$i])
            ->first();
        }

        // select字段：购物车ID，活动ID，数量，单价，活动费用类型 1收费 2免费

        $orderDetailId = array();
        foreach ($orderVal as $key) {
            $detail = new Order_detail;
            $detail->orderId = $activityOrder;
            $detail->actId = $key->act_id;
            $detail->number = $key->act_number;

            if($key->costVal == null){
                $costVal = 0;
            }else{
                $costVal = $key->costVal;
            }

            $detail->price = $costVal;
            $detail->save();
            $orderDetailId[$detail->id] = 1;
        }

        // 订单生成后，删除购物车选中的
        foreach ($orderVal as $keys) {
            $shoppingDelete = new Shopping;
            $shoppingDelete->where('id',$keys->id)->delete();

        }

        // 如果是0元就直接付款成功
        if($total == 0){
            foreach($orderDetailId as $keyc=>$value){
                $detailStatus = new Order_detail;
                $detailFirst = $detailStatus->where('id',$keyc)->first();
                $detailFirst->status = 1;
                $detailFirst->save();
            }

            $json = array("cot" => "购买成功");
            return response(json_encode($json));
        }

        // else{
        //     // 微信
        //     echo 'weixin';
        // }

    }

    // 缩略图
    public function thu($imgUrl){
        /**
      * 生成保持原图纵横比的缩略图，支持.png .jpg .gif
       * 缩略图类型统一为.png格式
       * $srcFile     原图像文件名称
       * $toW         缩略图宽
       * $toH         缩略图高
       * $toFile      缩略图文件名称，为空覆盖原图像文件
       * @return bool    
       */

        $srcFile = '.'.$imgUrl;
        $toW = 280;
        $toH = 185;

        // 图片新的名字
        $newName = date('YmdHis').mt_rand(0,999999);
        
        // 生成一个时间目录
        $newDir = date('Ymd');
        $formUrl = "./upload/thumbnail/".$newDir.'/';  // 图片保存路径
        if(!is_dir($formUrl)){
            mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
        }

        // 缩略图保存路径
        $toFile=$formUrl.$newName.'.png';

         if ($toFile == "")
         { 
                $toFile = $srcFile; 
         }
         $info = "";
         //返回含有4个单元的数组，0-宽，1-高，2-图像类型，3-宽高的文本描述。
         //失败返回false并产生警告。
         $data = getimagesize($srcFile, $info);
         // dd($data);
         if (!$data){
             // return false;
            die('false');
        }

         //将文件载入到资源变量im中
         switch ($data[2]) //1-GIF，2-JPG，3-PNG
         {
         case 1:
             if(!function_exists("imagecreatefromgif"))
             {
                 echo "the GD can't support .gif, please use .jpeg or .png! <a href='javascript:history.back();'>back</a>";
                 exit();
             }
             $im = imagecreatefromgif($srcFile);
             break;
             
         case 2:
            if(!function_exists("imagecreatefromjpeg"))
             {
                 echo "the GD can't support .jpeg, please use other picture! <a href='javascript:history.back();'>back</a>";
                 exit();
             }
             $im = imagecreatefromjpeg($srcFile);
             break;
               
         case 3:
             $im = imagecreatefrompng($srcFile);    
             break;
         }
         
         //计算缩略图的宽高
         $srcW = imagesx($im);
         $srcH = imagesy($im);
         $toWH = $toW / $toH;
         $srcWH = $srcW / $srcH;
         if ($toWH <= $srcWH) 
         {
             $ftoW = $toW;
             $ftoH = (int)($ftoW * ($srcH / $srcW));
         }
         else 
         {
             $ftoH = $toH;
             $ftoW = (int)($ftoH * ($srcW / $srcH));
         }
         
         if (function_exists("imagecreatetruecolor")) 
         {
             $ni = imagecreatetruecolor($ftoW, $ftoH); //新建一个真彩色图像
             if ($ni) 
             {
                 //重采样拷贝部分图像并调整大小 可保持较好的清晰度
                 imagecopyresampled($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
             } 
             else 
             {
                 //拷贝部分图像并调整大小
                 $ni = imagecreate($ftoW, $ftoH);
                 imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
             }
         }
         else 
         {
             $ni = imagecreate($ftoW, $ftoH);
             imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
         }
 
         //保存到文件 统一为.png格式
         imagepng($ni, $toFile); //以 PNG 格式将图像输出到浏览器或文件
         ImageDestroy($ni);
         ImageDestroy($im);
         
         // 去点图片地址前的符号点   ->   .
         $strNew = substr($toFile,1);
    
         return $strNew;
     }


    // 搜友
    public function search(){
            $search = \Request::input('search');
            //查找用户是否存在
            $userResult = User::where('username',$search)->select('username','id')->first();
            if($userResult){
                $json = array("username" => $search,"id" => $userResult['id']);
                return response(json_encode($json));
            }else{
                $json = array("no" => "请输入账号名或者没有该用户。");
               return response(json_encode($json));
            }
         // return view('list.friend');
    } 

    //访问别人页面
    public function friend(){
          $myid=session('userid');

          //获取链接，取的账号名
          $href= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          $left=(strpos($href,'=')); //查找=后面的

          //查找后的账号
          $account=substr($href,$left+1);   

          //查找出用户的账号，id，性别,个性签名，昵称，头像，是否是商家,等级
          $userResult = User::where('username',$account)->select('username','id','sex','text','name','user_figure','activity_classes','integral')->firstOrFail();   
       
          $id=$userResult->id;
          // dd($userid);
          
          //他/她发布的活动次数
         $release=DB::table('activities')
                  ->leftjoin('user', function($join)      
                  {  
                      $join->on('activities.user_id', '=','user.id');     
                  })
                  // ->select('Activities.id as actId','Activities.activity_name','Activities.prize_name','Activities.activity_start_time','Activities.province','Activities.city','Activities.thumbnail')
                  ->where('user.id','=',$id)
                  ->get();
         // dd($release);
         //发布活动次数
         $countnum=count($release);
        
         
        //是否关注了该好友，或是自己关注自己
        $attention = DB::table('signin')
        ->select('signin_userId','attention')  //查找要关注人的id和自己的id
        ->where('signin_userId','=',$id )
        ->where('attention','=',$myid )
        ->first();        
        

         // 当前时间，判断未付款订单是否过期
         $time = date('Y-m-d',time());
         // dd($time);
          //他/她参加过的活动
         $join = DB::table('Order_detail')
                ->leftjoin('Activities','Activities.id','=','Order_detail.actId')
                ->leftjoin('Order','Order.id','=','Order_detail.orderId')
                ->where('Order.operatorId',$id)
                ->where('activity_start_time','<=',$time)
                ->where('status',1)
                ->where('refund',0)
                ->select('Order_detail.id','Order.serial','Activities.id as actId','Activities.activity_name','Activities.prize_name','Activities.activity_start_time','Activities.province','Activities.city','Activities.thumbnail','Order_detail.number','Order_detail.price','Order_detail.status','Order_detail.refund')
                ->orderBy('id','desc')
                ->get();
          // dd($join);
         return view('list.friend')->with('userResult',$userResult)->with('countnum',$countnum)->with('attention',$attention)->with('join',$join)->with('release',$release);
    }

    
     




    //关注别人或是关注自己
    public function focus(){
         $myid=session('userid'); 
         $signin_integral="1" ;//被关注人获得的积分点数
         $id=$_POST['id'];
         $time=Date("Y-m-d");  //被关注的时间
         $signin_tate="3"; // 这是signing表里的一个字段，表示是被关注意思，   //默认是0，1发活动，2参加活动，3被关注，4自己关注自己，5签到
         $signin_integral="1" ; 
         
         $signin=DB::insert('insert into signin (signin_integral,signin_userId,signin_time,signin_tate,attention) values (?,?, ?, ?, ?)', [$signin_integral,$id,$time, $signin_tate,$myid]);
          if($signin){
                $json = array("ok" => "已关注");
                return response(json_encode($json));
            }else{
                $json = array("no" => "没关注成功");
               return response(json_encode($json));
            }
    }
    //取消关注别人或是取消关注自己
    public function nofocus(){

         $myid=session('userid'); 
         $id=$_POST['id'];
         $signin_tate="3"; // 这是signing表里的一个字段，表示是被关注意思，   //默认是0，1发活动，2参加活动，3被关注，4自己关注自己，5签到
         // $signin_integral="1" ; 
         
         $delsignin=DB::table('signin')
                    ->where('signin_userId','=',$id )
                    ->where('signin_tate','=',$signin_tate )
                    ->where('attention','=',$myid )
                    ->delete();
                   
          if($delsignin){
                $json = array("ok" => "取消关注");
                return response(json_encode($json));
            }else{
                $json = array("no" => "关注");
               return response(json_encode($json));
            }
    }


}
