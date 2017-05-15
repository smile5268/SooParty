<?php
namespace App\Http\Controllers;
header('Content-type:text/html;charset=utf-8');

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Activities;
use App\Models\Activity_image;
use App\Models\Package;
use App\Http\Controllers\ListController;

// 服务商中心
class ServiceController extends BaseController
{
	// 服务商中心首页
   public function cent(){
       
        return view('service.index');

    }


    public function index(){

        return view('service.index');

    }

    // 店铺概况
    public function survey(){

        return view('service.survey');
    }

    // 我报名的
    public function surveyManage(){

        return view('service.surveyManage');
    }

    // 我要发布
    public function release(){

        $id = session('userid');

        return view('service.release')->with('id',$id);

    }

    // 发布预览
    public function previewRelease(){
        
        $data = $_POST;
        $imgs = $_FILES['uploadFile'];
        $imgName = $imgs['name'];
         if($imgs==null){
            $imgUrls= array([0 => "/images/1.png"]);
         }
      
        // 循环出所有图片数据
        for($i=0;$i<3;$i++){

            $fileName = $imgs['name'][$i];           // 文件名

            $fileTmp_name = $imgs['tmp_name'][$i];   // 临时文件

            if(empty($fileName)){
                $imgUrl[$i] = '';
            }else{

                $nowExt = pathinfo($fileName,PATHINFO_EXTENSION);//获得上传文件的后缀名
               
                // 图片新的名字
                $newName = date('YmdHis').mt_rand(0,999999).'.'.$nowExt;
                
                // 生成一个时间目录
                $newDir = date('Ymd');
                $formUrl = "./preview/".$newDir.'/';  // 图片保存路径
                if(!is_dir($formUrl)){
                    mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
                }
 
                // 把图片放到新的目录中
                move_uploaded_file($fileTmp_name,$formUrl.$newName);

                // 图片地址
                $imgUrl[$i] = "/preview/".$newDir.'/'.$newName;

            }
        }
        $imgUrls = array_filter($imgUrl);
        // 详情(如果详情没数据，post里就没有contenter)
        if(isset($_POST['contenter'])){
            $content = $_POST['contenter'];     
        }else{
            $content = '';
        }
       
        return view('service.previewRelease')->with('content',$content)->with('imgUrl',$imgUrls)->with('data',$data);

    }

    // 发布提交接收
    public function doRelease(){
       
        if(empty($_POST['acti_title'])){

            exit('活动标题不能为空');

        }else if(empty($_POST['time'])){

            exit('开始时间不能为空');

        }else  if(empty($_POST['endTime'])){

            exit('结束时间不能为空');

        }else  if(empty($_POST['acti_address'])){

            exit('详细地址不能为空');

        }else if(empty($_POST['acti_phone'])){

            exit('联系电话不能为空');

        }else if(!isset($_POST['change'])){

            exit('活动费用必须选择');

        }else if(!isset($_POST['contenter'])){

            exit('活动介绍不能为空');

        }else if(!isset($_POST['agree'])){

            exit('必须同意Sooparty协议');

        }


        // 活动奖品
        if(!empty($_POST['acti_prize'])){
            $prize = $_POST['acti_prize'];
            $ifPrize = 1;
        }else{
            $prize = '无';
            $ifPrize = 2;
        }

        $startTime = $_POST['time'];        // 开始日期
        $hoursStart = $_POST['hoursStart']; // 开始时间
        $endTime = $_POST['endTime'];       // 结束日期
        $hoursEnd = $_POST['hoursEnd'];     // 结束时间

        // 活动时间判断
        $theDate = date('Y-m-d',time());
        if($startTime < $theDate){
            exit('发布时间不能小于今天');
        }

        if($startTime > $endTime){
            exit('结束时间不能大于发布时间');
        }

        // 如果日期是一天，就判断时间
        if($startTime == $endTime){
            if($hoursEnd <= $hoursStart){
                exit('结束时间不能大于发布时间');
            }
        }

        // 活动费用
        $change = $_POST['change'];

        // 价格
        $key0 = array_filter($_POST['package_price']);

        // 描述
        $key1 = array_filter($_POST['package_desc']);

        if($change == 1){

            // 合并两个数组
            $combine = array_combine($_POST['package_price'],$_POST['package_desc']);

            // 把空的筛选掉
            $tc = array();
            foreach($combine as $key=>$value){
                if(!empty($key) && !empty($value)){
                    $tc["$key"] = $value;
                }
            }

            if(!$tc){
                exit('收费活动套餐，至少要有一套');
            }
            // 套餐里价格为键，描述为值，获取键
            $atf = array_keys($tc);

            // 活动费用类型
            $changeType = 1;
            $price = $atf[0];

        }else{
            $changeType = 2;
            $price = 0;
        }
        
        $Activities = new Activities;
        $Activities->user_id = session('userid');               // 用户
        $Activities->activity_name = $_POST['acti_title'];      // 活动名称
        $Activities->prize = $ifPrize;                          // 奖品
        $Activities->prize_name = $prize;                       // 奖品名称
        $Activities->activity_start_time = $startTime;          // 开始日期
        $Activities->hoursStart = $hoursStart;                  // 开始时间
        $Activities->activity_end_time = $endTime;              // 结束日期
        $Activities->hoursEnd = $hoursEnd;                      // 结束时间
        $Activities->phone = $_POST['acti_phone'];              // 联系电话
        $Activities->cost = $changeType;                        // 收费类型
        $Activities->price = $price;                            // 费用
        $Activities->province= $_POST['province'];              // 省
        $Activities->city=$_POST['city'];                       // 市
        $Activities->area=$_POST['area'];                       // 区
        $Activities->activity_address = $_POST['acti_address']; // 详细地址
        $Activities->activity_number = $_POST['acti_number'];   // 人数上限
        $Activities->activity_details = $_POST['contenter'];    // 活动详情
        $Activities->release_time = Date('Y-m-d H:i:s');        //用户发布的时间
        $Activities->save();

        $act_id = $Activities->id;   // 活动ID

        // 插入数据库
        for($i=0;$i<3;$i++){
            if(isset($key0[$i]) && isset($key1[$i])){
                // 套餐表
                $Package = new Package;
                $Package->act_id = $act_id;
                $Package->cost = $key0[$i];
                $Package->describe = $key1[$i];
                $Package->save();
            }
        }   

        // 获取图片
        $img = $_FILES['uploadFile'];

        $imgName = $img['name'];

        // 判断传了几张照片
        $NameCount = 0;
        foreach ($imgName as $key => $value) {  
            if($value != null){
                $NameCount+=1;
            }
        }

        if($NameCount == 0){
            return '照片至少需要一张!';
        }

        // 循环出所有图片数据
        for($i=0;$i<$NameCount;$i++){

            // 以下两个判断是解决用户点的第三个上传图片，第一二张没传的BUG
            $fileIf = $img['name'][$i];
            if($fileIf == ''){
                $i++;
            }

            $fileTwo = $img['name'][$i];
            if($fileTwo == ''){
                $i++;
            }

            $fileName = $img['name'][$i];           // 文件名
            $fileError = $img['error'][$i];         // 错误码
            $fileType = $img['type'][$i];           // mime类型
            $fileTmp_name = $img['tmp_name'][$i];   // 临时文件
            $fileSize = $img['size'][$i];           // 大小

            //判断是否产生错误
            switch($fileError){
                case 1:
                    exit('上传超过了上传的大小');
                break;
                case 2:
                    exit('超过了html文档中指定的值');
                break;
                case 3:
                    exit('文件只有部分被上传');
                break;
                case 4:
                    exit('没有文件被上传');
                break;
                case 6:
                    exit('找不到临时文件夹');
                break;
                case 7:
                    exit('文件写入失败');
                break;
            }

            //判断是否是通过HTTP POST上传的
            if(!is_uploaded_file($fileTmp_name)){
              //如果不是通过HTTP POST上传的
                exit('不是通过HTTP POST上传');
            }

            //允许的所有mime类型
            $mime = array('image/gif','image/jpeg','image/png');

            //判断mime类型
            if(!in_array($fileType,$mime)){
                exit('不是合法的mime类型');
            }

            //判断后缀名
            $ext = array('jpg','png','gif');//允许的后缀名
            $nowExt = pathinfo($fileName,PATHINFO_EXTENSION);//获得上传文件的后缀名
            if(!in_array($nowExt,$ext)){
                exit('不是合法的后缀名');
            }

            //判断文件的大小
            $size = 10488576;

            if($fileSize > $size){
                exit('已经超出了规定的大小');
            }

            // 图片新的名字
            $newName = date('YmdHis').mt_rand(0,999999).'.'.$nowExt;
            
            // 生成一个时间目录
            $newDir = date('Ymd');
            $formUrl = "./upload/".$newDir.'/';  // 图片保存路径
            if(!is_dir($formUrl)){
                mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
            }

            // 把图片放到新的目录中
            move_uploaded_file($fileTmp_name,$formUrl.$newName);

            // 图片地址
            $imgUrl = "/upload/".$newDir.'/'.$newName;

            // 缩略图thumbnail
            // 缩略图只需要一张，所以要看一下活动表里是否有有缩略图user_id
            $thuAct = new Activities;
            $thuImg = $thuAct->where('id',$act_id)->select('thumbnail')->first();
            $thuImg->thumbnail;

            // 没有缩略图生成
            if(!$thuImg->thumbnail){
                $thus = new ListController;
                $ccp = $thus->thu($imgUrl);
    
                $selectAct = new Activities;
                $addThumbnail = $selectAct->where('id',$act_id)->first();
                $addThumbnail->thumbnail = $ccp;
                $addThumbnail->save();
            }

            // 保存图片[需要活动ID]
            $activity_image = new Activity_image;
            $activity_image->act_id = $act_id;
            $activity_image->address = $imgUrl;
            $act_save = $activity_image->save();

        }
        
        return view('service.release_success');
       
    }

    // 活动管理
    public function releaseManage(){

        return view('service.releaseManage');
    }

     // 发布失败
    public function release_failure(){

        return view('service.release_failure');
    }
 
    // 网站地图
    public function website(){

        return view('service.website');
    }
    //投诉与建议
    public function suggestions(){

        return view('service.suggestions');
    }
    //用户协议
    public function user_agreement(){

        return view('service.user_agreement');
    }
    //隐私
    public function Privacy(){

        return view('service.Privacy');
    }
    //联系我们
    public function contact(){

        return view('service.contact');
    }

}
