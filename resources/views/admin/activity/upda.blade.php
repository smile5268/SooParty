@extends('layouts.style')

@section('title', '发布活动')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<!-- //时间// -->
<script  type="text/javascript" src="{{URL('js/jeDate/jedate.js')}}"></script>
<!-- //地区// -->
<link  type="text/css" rel="stylesheet" href="/css/sucaijiayuan.css">
<script type="text/javascript" src="/js/jquery.min.js"></script> 
<script type="text/javascript" src="/js/City_data.js"></script>
<script type="text/javascript" src="/js/areadata.js"></script>
 <link  type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"> 
<style type="text/css">
body{
  font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%
}
.acti-btn-edit{
   float: right;position: relative;top: -400px; /*width: 60px;*/
    text-align: center;
}

.acti-submit {
  width: 120px;height: 50px;line-height: 40px;text-align: center;border-radius: 5px;border: 1px solid #ccc;background: #0066cc;color: #ffffff;font-size: 16px; margin: 30px;

}
.acti-shop2{width: 1100px;/*border: 1px solid #ccc;*/ margin-top: 20px; background: #fff; 
  height: auto;/* line-height: 45px;*/margin-bottom: 20px;
  padding-left: 200px;padding-top: 30px; padding-bottom: 20px;
}
.acti-shop2 label{
   font-size: 14px;
}
.biaoji{
  color: #ff0397;
  margin: 0 10px;
}
.hot-theam{
  line-height: 60px;
}
.distpicker1{
  line-height: 60px;
}
.datainp {
    width: 200px;
    height: 40px;border:1px solid #e5e5e5;
    text-align: center;
    border-radius: 5px;
}
.hot-place{
    width: 200px;
    height: 40px;border:1px solid #e5e5e5;
    text-align: center;
    border-radius: 5px;
}
.form-post{
   margin-left: -25px;
}
.hot-change{
  
  font-size: 14px;
  text-align: center;
  border: 1px solid #e5e5e5;
}
.hot-gree{

/* width: 150px;height: 40px;*/
  line-height: 40px;
  font-size: 14px;
   text-align: center;
   margin-left: 20px;
   border: 1px solid #e5e5e5;
}
.hot-agree{
   width:1000px;
   text-align: center;
   border-bottom: 2px solid #e5e5e5;
}
.agree{
  position: relative;
  top: -2px;
  left: -5px;
  height: 22px;
  vertical-align: middle;
  width: 22px;
  background-color: #ffffff;
 
}
.hot-btn{
  width: 1000px;display: block;
text-align: center;
}
.hot-dialog{
  width: 650px;
  height: 270px;
  border: 1px solid #e5e5e5;
  margin-left: 100px;
   display: none;
}

.hot-dialog ul {
  width: 650px;  height: 300px;
}
.dia-title{
  width: 650px; 
  height: 50px;
  background-color: #f0f0f0;
}
.dia-title span{

  margin-left: 150px;
}
.title-desc{
 position: relative;
 left: 60px;
 
}
.dia-desc{
  width: 240px;
  height: 40px;

}
.dia-money{
  width: 100px;
  height: 40px;
}
.hot-dialog ul li span{
   margin-left: 50px;
}
.dia-add{
  text-align: center;
}
.hot-post{
  height: 260px;
  padding: 10px 20px;
  margin-right: 20px;
  border: 2px solid #e5e5e5;
}
.file {
    position: relative;
    display: inline-block;
    background: #D0EEFF;
    border: 1px solid #99D3F5;
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #1E88C7;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
    margin-left: 80px;
}
.file input {
    position: absolute;
  /*  font-size: 100px;*/
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #AADFFD;
    border-color: #78C3F3;
    color: #004974;
    text-decoration: none;
}
#province{
  width:141px;height:35px;
  border:1px solid #e5e5e5;border-radius: 5px;
}
#city{
  width:141px;height:35px;
  border:1px solid #e5e5e5;border-radius: 5px;
}
#area{
  width:141px;height:35px;
  border:1px solid #e5e5e5;border-radius: 5px;
}
#preview1 {float: left;
width:150px;height:150px;border:1px solid #e5e5e5;overflow:hidden;margin-left: 30px;
}
#preview2{float: left;
width:150px;height:150px;border:1px solid #e5e5e5;overflow:hidden;margin-left: 30px;
}
 #preview3 {float: left;
  width:150px;height:150px;border:1px solid #e5e5e5;overflow:hidden;margin-left: 30px;
 }
#imghead {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);}
select::-ms-expand { display: none; }
</style>
<!-- 图片上传 -->
<script  src="/js/upload.js" type="text/javascript"></script>
<!--  <script type="text/javascript">
  jQuery(function($){

$(".acti-submit").click(function(){
  
    var title = $.trim($("#acti_title").val());
    var time1 = $.trim($("#dateinfo").val());
   
    var time2 = $.trim($("#dateinfo1").val());  
    var phone = $.trim($("#acti_phone").val());

    if(title == "")
    {
        $('.a_title').html('活动主题不能为空')
           
        return false;
         
    }else if (phone=="") {
     
      $('.a_phone').html('活动开始时间应大于当前时间')
        return false;
    } 

    else 
    {
      return true;
    
    }
    
});
 
});
</script>  -->
<!--  <script>
$(function(){
  
  $(".acti-submit").click(function(){
  var title = $.trim($("#acti_title").val());
  var time1 = $.trim($("#dateinfo").val());
  var time2 = $.trim($("#dateinfo1").val());  
  var address=$.trim($("#acti_address").val());  
  var phone = $.trim($("#acti_phone").val());

 if(title == '') {

   $('.a_title').html('<font color="red">活动主题不能为空!</font>');

   $('.a_title').focus();

    return false;
 }
 if (time1<=time2) {
      $('.a_time').html('<font color="red">活动开始时间应大于当前时间</font>');
      $('.a_time').focus();
      return false;
 }

  if(phone == ''){
       $('.a_phone').html('<font color="red">联系方式不能为空!</font>');
       $('.a_phone').focus();
       return false;
 }
  if (address=='') {
      $('.a_address').html('<font color="red">请设置活动的详情地址!</font>');
      $('.a_address').focus();
      return false;
 }

if(repwd.val() != pwd.val()){
  reerror.html('<font color="red">对不起,两次密码输入不一致!</font>');
  error.html('<font color="red">对不起,两次密码输入不一致!</font>');
  return false;

 }
  else {

     $('.a_title').empty() &&  $('.a_time').empty();
    return true;
 }

})

});
</script>   -->
<script type="text/javascript">
    function check(){

  var title = $.trim($("#acti_title").val());
  var time1 = $.trim($("#dateinfo").val());
  var time2 = $.trim($("#dateinfo1").val());  
  var address=$.trim($("#acti_address").val());  
  var phone = $.trim($("#acti_phone").val());
  title.onblur=function(){

    var sim=$('a_title');
     
    var sim='';
    var isNam=false;
    if (title.value.length==0) {
         sim='<font color="red">活动主题不能为空!</font>';
    }else if (title.value.length<6) {
           sim='<font color="red">账号长度最少6位!</font>';
    }else{
      sim='输入成功';
      isNam=true;
    }
  };
 
 };
</script>
<div class="event-hd">
  <div class="w1200">
    <ul>
      <li><a href="" class="tt02 event-hd-on">活动</a></li>
    </ul>
  </div>
</div>

<!-- 内容 -->
<div class="w1200 acti">
  <div class="acti-left2">
<form enctype="multipart/form-data" method="post" id="submit_form" onsubmit="return check(this)" >
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- 活动信息选择 -->
  <div class="acti-shop2" style="">
      <div class="hot-theam" >
           <label>活动主题： </label>
           <span class="biaoji" >*</span>
           <input name="acti_title" id="acti_title" type="text" value="{{ $user->activity_name }}"  class="acti-tou"/>
            <span class="a_title"></span>
      </div>
           <div class="hot-theam" >
                <label>活动海报：</label>
                <!-- <div id="demo" class="demo"></div> -->
                <div class="hot-post">
                  <a href="javascript:;" class="file">
                  <input type="file" name="uploadFile[]" id="upload" onchange="previewImage1(this)"  >选择文件
                 </a>
                  <a href="javascript:;" class="file">
                  <input type="file" name="uploadFile[]" id="upload" onchange="previewImage2(this)" >选择文件
                 </a>
                  <a href="javascript:;" class="file">
                  <input type="file" name="uploadFile[]" id="upload" onchange="previewImage3(this)">选择文件
                 </a>
                 <div class="pre">
                  <div id="preview1">
                  <img id="imghead1" border=0 src="/images/预览.png" width="180" height="180" />
                 </div>
                  <div id="preview2">
                  <img id="imghead2" border=0 src="/images/预览.png" width="180" height="180" />
                 </div>
                  <div id="preview3">
                  <img id="imghead3" border=0 src="/images/预览.png" width="180" height="180" />
                 </div>
                 </div>
                </div>
          </div>

        <div class="hot-theam" >
            <!-- 日期插件 -->
          <p class="datep">
            <label>活动时间：</label>
            <span class="biaoji" >*</span>
            <input class="datainp" id="dateinfo" name="time" type="text" placeholder="请选择"  readonly>——
            <input class="datainp" id="dateinfo1" name="endTime" type="text" placeholder="请选择"  readonly>
             <span class="a_time" ></span>
          </p>
        </div>
              <!-- 省市级联 -->
    <div class="distpicker1" >
          <label>活动地点：</label>
          <span class="biaoji" >*</span>
       <select name="province" id="province" ></select>
       <select name="city" id="city" ></select>
       <select name="area" id="area" ></select><br>
       <input name="acti_address" id="acti_address" type="text" value="" class="acti-tou" style="margin-left:100px;" placeholder="请输入详细地址" />
         <span class="a_address"></span>
    </div> 
       
        <div class="hot-theam">
             <label>活动奖品：</label>
              <span class="biaoji">*</span>
             <input name="acti_prize"  type="text" value="" class="acti-tou" placeholder="请输入活动奖品名称" />
               </div>      
        <div class="hot-theam">
            <label for="">人数上线：</label> 
              <span class="biaoji"> &nbsp;</span>
            <input type="text" name="acti_number" value="" class="acti-tou" placeholder="请输入参加人数上限"/> 
         </div >
           <div class="hot-theam">
            <label for="">联系电话：</label> 
              <span class="biaoji">*</span>
            <input type="text" name="acti_phone" id="acti_phone" value="" class="acti-tou" placeholder="请填写您的联系电话"/> 
             <span class="a_phone" ></span>
         </div >
          <div class="hot-theam">
            <label for="">活动费用：</label> 
              <span class="biaoji">*</span> <!--  onclick="showdia()" -->
              <input type="radio" name="change" value="1" class="hot-change"  id="dd"  /> 收费活动
             
              <input type="radio" name="change" value="2" class="hot-gree" /> 免费活动
               <div class="hot-dialog" id="hot-dialog " >
                   <ul>
                     <li class="dia-title">
                        <span>编号</span>  <span>金额</span>  <span class="title-desc">套餐描述</span> 
                     </li>
                      <li>
                        <span>1</span> <span><input type="" name="package_price[]" placeholder="￥" class="dia-money"  > </span>
                        <span><input type="" name="package_desc[]" class="dia-desc" placeholder="请输入套餐描述，例如：包吃包住" ></span> 
                      </li>
                       <li>
                         <span>2</span> <span> <input type="" name="package_price[]" placeholder="￥" class="dia-money"  ></span>
                         <span><input type="" name="package_desc[]" class="dia-desc" placeholder="请输入套餐描述，例如：包吃包住"></span> 
                       </li>
                        <li>
                         <span>3</span> <span> <input type="" name="package_price[]" placeholder="￥" class="dia-money"  ></span>
                         <span><input type="" name="package_desc[]" class="dia-desc" placeholder="请输入套餐描述，例如：包吃包住"></span> 
                       </li>
                      <!--  <li class="dia-add" >
                         <input type="button" name="" value="+添加套餐" class="acti-submit">
                       </li> -->
                   </ul>
              </div>
         </div>
           <div class="hot-theam">
            <label for="">活动详情：</label> 
              <span class="a_desc"></span>
                  <!-- 文本编辑器-开始 -->
    <!-- 配置文件 -->
        <script type="text/javascript" src="/baidu/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="/baidu/ueditor.all.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('containerss',{
              toolbars:[
                ['undo','bold','fontsize','forecolor','justifyleft','justifycenter','justifyright','simpleupload']
              ],
              elementPathEnabled:false,
            });
        </script>
    <!-- 加载编辑器的容器 -->
        <script id="containerss" name="contenter" type="text/plain"></script>
  <!-- 文本编辑器-结束 --> 
         </div >
          <div class="hot-theam">
              <div class="hot-agree"  >
                  <input name="agree" type="checkbox" value="1" class="agree"  />同意
                  <a>《Sooparty服务协议》</a>
              </div> 

          </div>
          <div class="hot-btn">
            <button onclick="doSubmit()" class="acti-submit"><b>发布</b></button> 
            <button onclick="preview()" class="acti-submit"><b>预览</b></button>
          </div>
  </div>
  
  <!-- <div class="acti-submit"> -->
      <!-- <input type="submit" onclick="doSubmit" value="提交" /> -->
  <!-- </div> -->
 
</form>

 
</div>

  </div>


<script>

  $(document).ready(function(){
    // 弹出框-水星
    $("#dd").click(function(){
      $(".hot-dialog").toggle();
});

});

    //jeDate.skin('gray');
    jeDate({
    dateCell:"#dateinfo",
    format:"YYYY-MM-DD hh:mm:ss",
    isinitVal:true,
    isTime:true, //isClear:false,
   
    // okfun:function(val){alert(val)}
  })
     jeDate({
    dateCell:"#dateinfo1",
    format:"YYYY-MM-DD hh:mm:ss",
    isinitVal:true,
    isTime:true, //isClear:false, 
    // okfun:function(val){alert(val)}
  })
</script>
<!-- 日期插件 -->
<script type="text/javascript" src="{{URL('js/editor/distpicker.data.js')}}"></script>
<script type="text/javascript" src="{{URL('js/editor/distpicker.js')}}"></script>
<script type="text/javascript">
$(function() {
    $(".distpicker1").distpicker();
    autoSelect: false
  
});

function setDialog() {
    // alert('请编辑您的图片')
    var $wObj = $(window);
    var $dObj = $("#act-dialog");
    var widW = $wObj.width();
    var widH = $wObj.height();
    var diaH = $dObj.height();
    var diaW = $dObj.width();     
    var left = (widW - diaW) / 2.3;   
    var top = (widH - diaH) / 2.1;
    $dObj.css({ "left": left, "top": top });
}

function showMask() {
    $("#mask").css({
        display: "block"
    }); 

    $("#mask").click(function () {                                     
        setDialog();   
        $("#act-dialog").fadeIn(1000);      
    });
}

$(document).ready(function(e){
  $('#activityForm').on('submit',function(){
    e.preventDefault();
    var fommData = new FormData(this);

    $.ajax({
      type:'POST',
            url: "{{ URL('service/doRelease') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
    });

  });
});

// 预览
function preview(){
  $('#submit_form').attr('action',"{{URL('service/previewRelease')}}");
    $('#submit_form').attr('target','_blank');
}

// 提交
function doSubmit(){
  $('#submit_form').attr('action',"{{ URL('service/doRelease') }}");
    $('#submit_form').attr('target','');
}
 </script>

<script type="text/javascript" src="{{URL('js/editor/jQuery-jcFrame.js')}}"></script>


@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection