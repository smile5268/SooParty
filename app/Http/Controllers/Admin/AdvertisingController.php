<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Models\Figure;
use App\Models\Chain;
class AdvertisingController extends BaseController
{  
  //轮播图上传
   public function index(){
   	  return view('admin.advertising.advertisaddabc');
   }

   //轮播图接收展示
   public function adver(){
   	  //1.获取要上传文件的信息
        $site=$_POST['site'];
        $uImg=$_FILES['tu'];
 
        $img = explode('.',$uImg['name'],2);
        $imgName=end($img);
           
          
         if($imgName!="png" && $imgName!="gif" && $imgName!="jpg"){
             ?>
                  <script type="text/javascript">
                   alert("图片类型不对");
                   var   host = window.location.host;
                  location.href='http://'+host+"/";
                 </script>
             <?php
         }
           
            //判断文件的大小
            if($uImg["size"]>2000000){
                ?>
                  <script type="text/javascript">
                   alert("图片文件过大");
                   var   host = window.location.host;
                  location.href='http://'+host+"/";
                 </script>
               <?php
            }
            
            // 图片新的名字
            $newName = date('YmdHis').rand(10000,99999).'.'.$imgName;
            
            // 生成一个时间目录
            $newDir = date('Ymd');
            $formUrl = "./ueditor/figure/".$newDir.'/';  // 图片保存路径
            if(!is_dir($formUrl)){
                mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
            }
            // 把图片放到新的目录中
            move_uploaded_file($uImg['tmp_name'],$formUrl.$newName);

            // 图片地址
            $imgUrl = "/ueditor/figure/".$newDir.'/'.$newName;

      $figu= DB::insert('insert into figure(site,photo) values (?,?)', [$site,$imgUrl]);
    if($figu==true){
         ?>
             <script type="text/javascript">
                alert("操作成功");
                 var   host = window.location.host;
                  location.href='http://'+host+'/admin/advertising/advertisaddlist';
              </script>
             <?php
         }else{
            ?>
             <script type="text/javascript">
                 alert("操作失败");
                  var   host = window.location.host;
                  location.href='http://'+host+'/admin/advertising/advertisaddlist';
              </script>
             <?php
            
          
        }
     }  
     
     //列表
     public function listter(){
         $user=DB::table('figure')->orderBy('id','desc')->get();
        return view("admin.advertising.advertisaddlist")->with('user',$user);
    }
     
     //修改
     public function edit(){
        $id=$_GET['id'];
      
        $use=DB::table('figure')->where('id',$id)->first();
      
        return view("admin.advertising.advertisaddedit")->with('use',$use);
    }
     
    //修改图片接收
   
    

    //删除图片
    public function del(){
        $id=$_GET['id'];
        $dele=DB::delete("delete from figure where id='$id'");
        if($dele==true){
         ?>
             <script type="text/javascript">
                alert("删除成功");
                 var   host = window.location.host;
                  location.href='http://'+host+'/admin/advertising/advertisaddlist';
              </script>
             <?php
         }else{
        ?>
         <script type="text/javascript">
             alert("删除失败");
              var   host = window.location.host;
              location.href='http://'+host+'/admin/advertising/advertisaddlist';
          </script>
         <?php
        }
    }


    //外链广告
     public function chain(){
        return view("admin.advertising.chain");
     }

     //添加外链
     public function add(){
        $site=$_POST['site'];
        $tion=$_POST['tion'];
        $uImg=$_FILES['tu'];
 
        $img = explode('.',$uImg['name'],2);
        $imgName=end($img);
           
          
         if($imgName!="png" && $imgName!="gif" && $imgName!="jpg"){
             ?>
                  <script type="text/javascript">
                   alert("图片类型不对");
                   var   host = window.location.host;
                  location.href='http://'+host+'/admin/advertising/chainlist';
                 </script>
             <?php
         }
           
            //判断文件的大小
            if($uImg["size"]>2000000){
                ?>
                  <script type="text/javascript">
                   alert("图片文件过大");
                   var   host = window.location.host;
                  location.href='http://'+host+'/admin/advertising/chainlist';
                 </script>
               <?php
            }
            
            // 图片新的名字
            $newName = date('YmdHis').rand(10000,99999).'.'.$imgName;
            
            // 生成一个时间目录
            $newDir = date('Ymd');
            $formUrl = "./ueditor/".$newDir.'/';  // 图片保存路径
            if(!is_dir($formUrl)){
                mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
            }
            // 把图片放到新的目录中
            move_uploaded_file($uImg['tmp_name'],$formUrl.$newName);

            // 图片地址
            $imgUrl = "/ueditor/".$newDir.'/'.$newName;

      $figu= DB::insert('insert into chain(siteed,photoed,location) values (?,?,?)', [$site,$imgUrl,$tion]);
    if($figu==true){
         ?>
             <script type="text/javascript">
                alert("操作成功");
                 var   host = window.location.host;
                  location.href='http://'+host+'/admin/advertising/chainlist';
              </script>
             <?php
         }else{
            ?>
             <script type="text/javascript">
                 alert("操作失败");
                  var   host = window.location.host;
                 location.href='http://'+host+'/admin/advertising/chainlist';
              </script>
             <?php
            
          
        }
     }
      
      //外链列表
      public function chainlist(){
        $user=DB::table('chain')->get();
        return view("admin.advertising.chainlist")->with('user',$user);
      }
       
      //外链修改
      public function chainedit(){
        $id=$_GET['id'];
      
        $use=DB::table('chain')->where('id',$id)->first();
      
        return view("admin.advertising.chainedit")->with('use',$use);
    }

        //外链修改图片接收
    public function chained(){
        $id=$_POST['id'];
        $link=$_POST['link'];
        $uImg=$_FILES['img'];

        $img = explode('.',$uImg['name'],2);
        $imgName=end($img);
          
         
         if($imgName!="png" && $imgName!="gif" && $imgName!="jpg"){
             ?>
                  <script type="text/javascript">
                   alert("图片类型不对");
                   var   host = window.location.host;
                   location.href='http://'+host+'/admin/advertising/chainlist';
                 </script>
             <?php
         }
           
            //判断文件的大小
            if($uImg["size"]>2000000){
                ?>
                  <script type="text/javascript">
                   alert("图片文件过大");
                   var   host = window.location.host;
                   location.href='http://'+host+'/admin/advertising/chainlist';
                 </script>
               <?php
            }
            
            // 图片新的名字
            $newName = date('YmdHis').rand(10000,99999).'.'.$imgName;
            
            // 生成一个时间目录
            $newDir = date('Ymd');
            $formUrl = "./ueditor/chain/".$newDir.'/';  // 图片保存路径
            if(!is_dir($formUrl)){
                mkdir($formUrl,0777,true);      // 没有这个文件夹就创建
            }
            // 把图片放到新的目录中
            move_uploaded_file($uImg['tmp_name'],$formUrl.$newName);

            // 图片地址
            $imgUrl = "/ueditor/chain/".$newDir.'/'.$newName;
         
          $user = new Chain;
          $userin = $user->where('id',$id)->first();         
          $userin->siteed    = $link;
          $userin->photoed   = $imgUrl;
        if($userin->save()==true){
         ?>
             <script type="text/javascript">
                alert("修改成功");
                 var   host = window.location.host;
                  location.href='http://'+host+'/admin/advertising/chainlist';
              </script>
             <?php
         }else{
        ?>
         <script type="text/javascript">
             alert("修改失败");
              var   host = window.location.host;
               location.href='http://'+host+'/admin/advertising/chainlist';
          </script>
         <?php
        }
    }

     //删除外链图片
    public function deled(){
        $id=$_GET['id'];
        $dele=DB::delete("delete from chain where id='$id'");
        if($dele==true){
         ?>
             <script type="text/javascript">
                alert("删除成功");
                 var   host = window.location.host;
                  location.href='http://'+host+'/admin/advertising/chainlist';
              </script>
             <?php
         }else{
        ?>
         <script type="text/javascript">
             alert("删除失败");
              var   host = window.location.host;
              location.href='http://'+host+'/admin/advertising/chainlist';
          </script>
         <?php
        }
    }
    
}