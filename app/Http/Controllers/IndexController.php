<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Models\Recommended;
use App\Models\Activities;
use App\Models\Activitiy_image;
use App\Models\Package;
use App\Models\Figure;
use App\Models\Company_details;  
use App\Models\Order_detail;
use App\Models\Order;
use App\Models\User;
class IndexController extends BaseController
{
  // 首页
  public function index(){  
            
       //首页三个轮播图
       $res = DB::table('figure')->orderBy('id','desc')->limit(3)->get(); 
       //热门活动
         $hot = DB::table('activities')         //将多张表拼接起来  
            ->leftjoin('recommended','activities.recommended_id', '=', 'recommended.id')
            ->leftjoin('user','user.id', '=', 'activities.user_id')           
            ->select('recommended.push','activities.id','activities.activity_name', 'activities.prize_name','activities.activity_start_time','activities.province','activities.city','activities.area','activities.cost','activities.activity_state','activities.thumbnail','user.activity_classes','user.name')  
            ->limit(3)                 //$pageSize限制一次获取的数据条数               
            ->where('recommended_id', 1 ) 
            ->where('audit', 1 ) 
            ->orderBy('activities.id', 'desc')
            ->get();
            // dd($hot);
// 
// 这是为了弄报名的人数的
// 总数和男女个数，这是开始
// 下面还有俩个都是类是的
// 
        $countIndex = array();
        // dd(count($hot));
        for($i=0;$i<count($hot);$i++){
          //查报名活动人数是否上限
        $user[$i] = DB::table('order_detail')
         ->leftjoin('activities','activities.id','=','order_detail.actId')
        ->leftjoin('order','order.id','=','order_detail.orderId')
        ->leftjoin('user','user.id','=','order.operatorId')
        ->select('order_detail.status','order_detail.number','order_detail.refund','activities.activity_number','activities.id','order.operatorId','user.sex')
        ->where('order_detail.status',1)
        ->where('order_detail.refund',0)
        // ->where('order.operatorId','!=',null)
        ->where('activities.id',$hot[$i]->id)
        ->get();
        

        //分别获取到要推的ID
         if(!$user[$i]){
             $num=0;
             $nan=0;
             $nv=0;
             $countIndex[$i] = $num.','.$nan.','.$nv;
         }else{

              $num=0; //总数
              $nan=0; //男
              $nv=0;  //女
                // dd(count($user[$i]));
                // 获取总数和男女分别是多少
                for($s=0;$s<count($user[$i]);$s++){

                      $num += $user[$i][$s]->number;

                    if($user[$i][$s]->sex==1){

                      $nan += $user[$i][$s]->number;

                   }else if($user[$i][$s]->sex==2){

                      $nv += $user[$i][$s]->number;

                   }
                } 
                               
                $countIndex[$i] = $num.','.$nan.','.$nv;

         }

      }  
        // dd($countIndex);
        $explodeArray = array();
        for ($w=0; $w<count($countIndex); $w++) { 
             $explodeArray[$w]= explode(',',($countIndex[$w]));

        }
// 
// 这是为了弄报名的人数的
// 总数和男女个数，这是结束
// 
// 

          //显示三条数据
          $count = count($hot);
           for($c=0;$c<$count;$c++){
              if($hot[$c]->cost==1){                  
                  $id = $hot[$c]->id;
                  $results = Package::where('act_id',$id)->first(); 
                  $cc = $results->cost;

              }else if($hot[$c]->cost==2){
                  $cc = '免费';
              }
              $more[$c] = $cc;
           } 

          $box['explodeArray'] =$explodeArray;  
          $box['hot'] = $hot;
          $box['count'] =$count;
          $box['more']  =$more;
         // dd($box)

          //有奖活动
           $yjhd = DB::table('activities')         //将多张表拼接起来  
            ->leftjoin('recommended','activities.recommended_id', '=', 'recommended.id')
            ->leftjoin('user','user.id', '=', 'activities.user_id')           
            ->select('recommended.push','activities.id','activities.activity_name', 'activities.prize_name','activities.activity_start_time','activities.province','activities.city','activities.area','activities.cost','activities.activity_state','activities.thumbnail','user.activity_classes','user.name')  
                ->limit(3)                 //$pageSize限制一次获取的数据条数               
                ->where('recommended_id', 2)
                ->where('audit', 1 ) 
                ->orderBy('activities.id', 'desc')    //最新的显示在最前面
                ->get();

                $countIndexx = array();
        // dd(count($hot));
        for($b=0;$b<count($yjhd);$b++){
          //查报名活动人数是否上限
        $yjhduser[$b] = DB::table('order_detail')
         ->leftjoin('activities','activities.id','=','order_detail.actId')
        ->leftjoin('order','order.id','=','order_detail.orderId')
        ->leftjoin('user','user.id','=','order.operatorId')
        ->select('order_detail.status','order_detail.number','order_detail.refund','activities.activity_number','activities.id','order.operatorId','user.sex')
        ->where('order_detail.status',1)
        ->where('order_detail.refund',0)
        // ->where('order.operatorId','!=',null)
        ->where('activities.id',$yjhd[$b]->id)
        ->get();
        

        //分别获取到要推的ID
         if(!$yjhduser[$b]){
             $num=0;
             $nan=0;
             $nv=0;
             $countIndexx[$b] = $num.','.$nan.','.$nv;
         }else{

              $num=0; //总数
              $nan=0; //男
              $nv=0;  //女
                // dd(count($user[$i]));
                // 获取总数和男女分别是多少
                for($c=0;$c<count($user[$b]);$c++){

                      $num += $user[$b][$c]->number;

                    if($user[$b][$c]->sex==1){

                      $nan += $user[$b][$c]->number;

                   }else if($user[$b][$c]->sex==2){

                      $nv += $user[$b][$c]->number;

                   }
                } 
                               
                $countIndexx[$b] = $num.','.$nan.','.$nv;

         }

      }  
        // dd($countIndexx);
        $explodeArrayy = array();
        for ($e=0; $e<count($countIndexx); $e++) { 
             $explodeArrayy[$e]= explode(',',($countIndexx[$e]));

        }
          $countti = count($yjhd);
           for($a=0;$a<$countti;$a++){
              if($yjhd[$a]->cost==1){                  
                  $id = $yjhd[$a]->id;
                  $results = Package::where('act_id',$id)->first();
                  $aa = $results->cost;
              }else if($yjhd[$a]->cost==2){
                  $aa = '免费';
              }
              $moreti[$a] = $aa;
           } 
          $hear['explodeArrayy'] =$explodeArrayy; 
          $hear['yjhd'] = $yjhd;
          $hear['countti'] =$countti;
          $hear['moreti']  =$moreti;
         
           //精选活动
           $juhd = DB::table('activities')         //将多张表拼接起来  
            ->leftjoin('recommended', 'activities.recommended_id', '=', 'recommended.id')
            ->leftjoin('user','user.id', '=', 'activities.user_id')           
            ->select('recommended.push','activities.id','activities.activity_name', 'activities.prize_name','activities.activity_start_time','activities.province','activities.city','activities.area','activities.cost','activities.activity_state','activities.thumbnail','user.activity_classes','user.name')  
                ->limit(6)                 //$pageSize限制一次获取的数据条数               
                ->where('recommended_id', 3) 
                ->where('audit', 1 )
                ->orderBy('activities.id', 'desc')
                ->get();  
                  

                          $countIndexx = array();
        // dd(count($hot));
        for($f=0;$f<count($juhd);$f++){
          //查报名活动人数是否上限
        $juhduser[$f] = DB::table('order_detail')
         ->leftjoin('activities','activities.id','=','order_detail.actId')
        ->leftjoin('order','order.id','=','order_detail.orderId')
        ->leftjoin('user','user.id','=','order.operatorId')
        ->select('order_detail.status','order_detail.number','order_detail.refund','activities.activity_number','activities.id','order.operatorId','user.sex')
        ->where('order_detail.status',1)
        ->where('order_detail.refund',0)
        // ->where('order.operatorId','!=',null)
        ->where('activities.id',$juhd[$f]->id)
        ->get();
        

        //分别获取到要推的ID
         if(!$juhduser[$f]){
             $num=0;
             $nan=0;
             $nv=0;
             $countIndexxx[$f] = $num.','.$nan.','.$nv;
         }else{

              $num=0; //总数
              $nan=0; //男
              $nv=0;  //女
                // dd(count($user[$i]));
                // 获取总数和男女分别是多少
                for($c=0;$c<count($user[$f]);$c++){

                      $num += $user[$f][$c]->number;

                    if($user[$f][$c]->sex==1){

                      $nan += $user[$f][$c]->number;

                   }else if($user[$f][$c]->sex==2){

                      $nv += $user[$f][$c]->number;

                   }
                } 
                               
                $countIndexxx[$f] = $num.','.$nan.','.$nv;
         }
      }  

        $explodeArrayyy = array();
        for ($e=0; $e<count($countIndexxx); $e++) { 
             $explodeArrayyy[$e]= explode(',',($countIndexxx[$e]));

        }



          $counted = count($juhd);
           for($a=0;$a<$counted;$a++){
              if($juhd[$a]->cost==1){                  
                  $id = $juhd[$a]->id;
                  $results = Package::where('act_id',$id)->first();
                  $aa = $results->cost;
              }else if($juhd[$a]->cost==2){
                  $aa = '免费';
              }
              $moreed[$a] = $aa;
           } 
          $bottom['explodeArrayyy'] =$explodeArrayyy;
          $bottom['juhd'] = $juhd;
          $bottom['counted'] =$counted;
          $bottom['moreed']  =$moreed;

       //  外链
        $chain1=DB::table('chain')->where('location','0')->orderBy('id','desc')->first();

        $chain2=DB::table('chain')->where('location','1')->orderBy('id','desc')->first();
       //优秀主办方
       $company=DB::table('Company_details')->where('company_push',1)->orderBy('id','desc')->get();

        
    return view('index')->with('results',$res)->with('box',$box)->with('hear',$hear)->with('bottom',$bottom)->with('chain1',$chain1)->with('chain2',$chain2)->with('company',$company);
  }
    
}