@extends('layouts.style')

@section('title', '发布活动')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<!-- //时间// {{URL('js/jeDate/jedate.js')}}-->
<script  type="text/javascript" src="{{URL('js/jedate/jedate.js')}}"></script>
<!-- //地区// -->
<link  type="text/css" rel="stylesheet" href="{{URL('/css/sucaijiayuan.css')}}">
<script type="text/javascript" src="{{URL('js/jquery.min.js')}}"></script> 
<script type="text/javascript" src="{{URL('js/City_data.js')}}"></script>
<script type="text/javascript" src="{{URL('js/areadata.js')}}"></script>
<style type="text/css">
body{
font-family:"微软雅黑",arial;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%
}
.acti-btn-edit{
   float: right;position: relative;top: -400px; /*width: 60px;*/
    text-align: center;
}

.acti-submit {
  width: 120px;height: 50px;line-height: 40px;text-align: center;border-radius: 5px;border: 1px solid #ccc;background: #0066cc;color: #ffffff;font-size: 16px; margin: 30px;

}
.acti-shop2{width: 1100px;/*border: 1px solid #ccc;*/ background: #fff; 
  height: auto;/* line-height: 45px;*/margin-bottom: 20px;
  padding-left: 30px;padding-top: 30px; padding-bottom: 20px;
}
.acti-shop2 label{
   font-size: 14px;
   color: #666;     
                                                                                               
}
.biaoji{
  color: #ff0397;
  margin-right: 4px;
  /*margin: 0 10px;*/
}
.hot-theam{
  line-height: 50px;
}
.distpicker1{
  line-height: 60px;
}
.datainp {
    width: 190px;
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
  margin-left: 10px;
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
  /*text-decoration: underline;*/
  background-color: #ffffff;
 
}
.agree-ser{
  text-decoration: underline;
}
.hot-btn{
  width: 1000px;display: block;
text-align: center;
}
.hot-dialog{
  width: 650px;
  height: auto;

  border: 1px solid #e5e5e5;
  margin-left: 100px;
   display: none;
}

.hot-dialog ul {
/*  border:1px solid red;*/
  width: 650px;  height: auto;
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
  width:640px;
  position: relative;
  left:90px;
  top:-20px;
  height: 260px;
  padding: 10px 20px;
  margin-right: 20px;
  border-radius: 5px;
  border: 1px solid #e5e5e5;
}
.file {
    position: relative;
    display: inline-block;
    background: #0066cc;
    border: 1px solid #e5e5e5;
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #ffffff;
    text-decoration: none;
    text-indent: 0;
    line-height: 25px;
    margin-left: 80px;

}
.file input {

    position: absolute;
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #0066cc;
   /* border-color: #78C3F3;*/
    color: #ffffff;
    text-decoration: none;
}
.place-add{
  width:170px;height:40px;
  border:1px solid #e5e5e5;border-radius: 5px;
}

#preview1 {float: left;
width:150px;height:150px;overflow:hidden;margin-left: 37px;
/*border:1px solid red;*/
}

#preview2{float: left;
width:150px;height:150px;overflow:hidden;margin-left: 30px;
}
 #preview3 {float: left;
  width:150px;height:150px;overflow:hidden;margin-left: 30px;
 }
 .s_ok{
     width:105px; height: 40px;
     border:1px solid #e5e5e5;
     border-radius: 5px; 
 }
 #a_desc{
   color: #ff0397;
  margin: 0 10px;
 }
 #acti_address{
  margin-left: 88px;
 }
 #acti_title{
  margin-left: 2px;
 }
 .lab{
  margin-left: 17px;
 }
/* #select_k1 option{display: block;
  border:2px solid green;
  text-align: center;
 }*/
.acti-add {
    width: 105px;
    height: 45px;
    line-height: 40px;
    text-align: center;
    border-radius: 5px;
    border: 1px solid #ccc;
    background: #0066cc;
    color: #ffffff;
    font-size: 16px;
    margin-top: -20px;
    margin-left: 257px;
}
#a_theam{
  width: 300px;
  height: 35px;
  display: block;
  float: left;
 /* border:1px solid red;*/
}
#imghead {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);}
select::-ms-expand { display: none; }
</style>
<!-- 图片上传 -->
<script  src="{{URL('/js/upload.js')}}" type="text/javascript"></script>

<div class="event-hd">
  <div class="w1200">
    <ul>
      <li><a href="" class="tt02 event-hd-on">发布活动</a></li>
    </ul>
  </div>
</div>
<!-- 内容 -->
<div class="w1200 acti" id="list-acti" >
  <div class="acti-left2">
<form enctype="multipart/form-data" name="frr" method="post" id="submit_form">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- 活动信息选择 -->
  <div class="acti-shop2" >
      <div class="hot-theam" >
           <label>活动主题：</label>
           <span class="biaoji" >*</span>
           <input name="acti_title" id="acti_title" type="text" value="" placeholder="请输入活动名称" class="acti-tou"  onblur="checkTitle()"   />
            <span id="a_title"></span>
      </div>
           <div class="hot-theam" >
                <label>活动海报：</label>
                <span class="biaoji" >*</span>

                <div class="hot-post">
                  <a href="javascript:;" class="file">
                  <input type="file" name="uploadFile[]" id="upload1"  onchange="previewImage1(this)"  >选择图片
                 </a>
                  <a href="javascript:;" class="file">
                  <input type="file" name="uploadFile[]" id="upload2" onchange="previewImage2(this)" >选择图片
                 </a>
                  <a href="javascript:;" class="file">
                  <input type="file" name="uploadFile[]" id="upload3" onchange="previewImage3(this)">选择图片
                 </a>
                 <div class="pre">
                  <div id="preview1">
                  <img id="imghead1" border=0 src="/images/发布页.png" width="180" height="180" />
                 </div>
                  <div id="preview2">
                  <img id="imghead2" border=0 src="/images/photo1.png" width="180" height="180" />
                 </div>
                  <div id="preview3">
                  <img id="imghead3" border=0 src="/images/photo1.png" width="180" height="180" />
                 </div>
                 </div>
                 <span id="a_theam"></span>
                </div>
                 
          </div>

        <div class="hot-theam" >
            <!-- 日期插件 -->
          <p class="datep">
            <label>活动时间：</label>
            <span class="biaoji" >*</span>
            <!-- onblur="checkTime()" -->
            <input class="datainp" id="dateinfo" name="time" type="text" placeholder="请选择"     readonly />
             <select name="hoursStart" id="select_k1"  class="s_ok">
                <option value="00:00">00:00</option>
                <option value="00:30">00:30</option>
                <option value="01:00">01:00</option>
                <option value="01:30">01:30</option>
                <option value="02:00">02:00</option>
                <option value="02:30">02:30</option>
                <option value="03:00">03:00</option>
                <option value="03:30">03:30</option>
                <option value="04:00">04:00</option>
                <option value="04:30">04:30</option>
                <option value="05:00">05:00</option>
                <option value="05:30">05:30</option>
                <option value="06:00">06:00</option>
                <option value="06:30">06:30</option>
                <option value="07:00">07:00</option>
                <option value="07:30">07:30</option>
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
                <option value="23:00">23:00</option>
                <option value="23:30">23:30</option>
            </select> 

            ——
            <input class="datainp" id="dateinfo1" name="endTime" type="text" placeholder="请选择"  readonly>
             <select name="hoursEnd" id="select_k2"  class="s_ok">
                 <option value="00:00">00:00</option>
                <option value="00:30">00:30</option>
                <option value="01:00">01:00</option>
                <option value="01:30">01:30</option>
                <option value="02:00">02:00</option>
                <option value="02:30">02:30</option>
                <option value="03:00">03:00</option>
                <option value="03:30">03:30</option>
                <option value="04:00">04:00</option>
                <option value="04:30">04:30</option>
                <option value="05:00">05:00</option>
                <option value="05:30">05:30</option>
                <option value="06:00">06:00</option>
                <option value="06:30">06:30</option>
                <option value="07:00">07:00</option>
                <option value="07:30">07:30</option>
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
                <option value="23:00">23:00</option>
                <option value="23:30">23:30</option>
            </select> 
          
             <span id="a_time" ></span>
          </p>
        </div>
              <!-- 省市级联 -->
    <div class="distpicker1" >
          <label>活动地点：</label>
           <span class="biaoji" >*</span>
       <select name="province" id="province" class="place-add" ></select>
       <select name="city" id="city" class="place-add" ></select>
       <select name="area" id="area" class="place-add" ></select> 
       <input name="acti_address" id="acti_address" type="text" value="" class="acti-tou"  placeholder="请输入详细地址" onblur="checkAddress()"  />
         <span id="a_address"></span>
    </div> 

        <div class="hot-theam">
             <label>活动奖品：</label>
              <label class="lab" ></label>
             <input name="acti_prize"  type="text" value="" class="acti-tou" placeholder="请输入活动奖品名称" />
        </div>      
        <div class="hot-theam">
            <label for="">人数上限：</label> 
            <label class="lab" ></label>
            <input type="text" name="acti_number" value="" class="acti-tou" placeholder="请输入参加人数上限"/> 
         </div>
           <div class="hot-theam">
            <label for="">联系电话：</label> 
              <span class="biaoji">*</span>
            <input type="text" name="acti_phone" id="acti_phone" value="" class="acti-tou" placeholder="请填写您的联系电话" onblur="checkPhone()" /> 
             <span id="a_phone" ></span>
         </div >
          <div class="hot-theam">
       
            <label for="">活动费用：</label> 
              <!-- <label class="lab" ></label> -->
              <input type="radio" name="change" value="1" class="hot-change"  id="change" onclick="checkChange()"  /> 收费活动  
              <input type="radio" name="change" value="2" class="hot-gree" id="free"  onclick="checkChange()" /> 免费活动
               <div class="hot-dialog" id="hot-dialog " >
                   <ul>
                     <li class="dia-title">
                        <span>编号</span>  <span>金额</span>  <span class="title-desc">套餐描述</span> 
                     </li>
                      <li class="dia-01" >
                        <span>1</span> <span><input type="" name="package_price[]" placeholder="￥" class="dia-money"  > </span>
                        <span><input type="" name="package_desc[]" class="dia-desc" placeholder="请输入套餐描述，例如：包吃包住" ></span> 
                      </li>
                       <li class="dia-02" >
                         <span>2</span> <span> <input type="" name="package_price[]" placeholder="￥" class="dia-money"  ></span>
                         <span><input type="" name="package_desc[]" class="dia-desc" placeholder="请输入套餐描述，例如：包吃包住"></span> 
                       </li>
                         <li class="dia-03" >
                         <span>3</span> <span> <input type="" name="package_price[]" placeholder="￥" class="dia-money"  ></span>
                         <span><input type="" name="package_desc[]" class="dia-desc" placeholder="请输入套餐描述，例如：包吃包住"></span> 
                       </li> 
                    <!--    <li class="dia-add" > -->
                        
                       <!-- </li> -->
                   </ul>
                  <!--   <input type="button" name="" value="+添加套餐" class="acti-add" onclick="aa()" > -->
              </div>
                 <span id="a_change" ></span>
         </div>
           <div class="hot-theam">
            <label for="">活动详情：</label> 
              <span class="biaoji">*</span>
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
        <script id="containerss" name="contenter" type="text/plain" onblur="getContent()" ></script>
  <!-- 文本编辑器-结束 --> 
         </div >
           <span id="a_desc"></span>
          <div class="hot-theam">
              <div class="hot-agree"  >
                  <input name="agree" type="checkbox" id="agree" value="" class="agree" checked="checked"  onblur="checkBox()" />同意
                  <a href="{{url('center/agreement')}}" class="agree-ser" >《Sooparty服务协议》</a>
                  <span id="a_agree"></span>
              </div> 

          </div>
          <div class="hot-btn">
            <button class="acti-submit" onclick="return check()"><b>发布</b></button> 
            <!-- <input type="submit" value='提交'> -->
            <button onclick="preview()" class="acti-submit"><b>预览</b></button>
          </div>
  </div>
</form>
</div>
</div>
<script>
    //jeDate.skin('gray');
    jeDate({
    dateCell:"#dateinfo",
    format:"YYYY-MM-DD ",
    isinitVal:true,
    isTime:true, //isClear:false,
   
    // okfun:function(val){alert(val)}
  })
     jeDate({
    dateCell:"#dateinfo1",
    format:"YYYY-MM-DD ",
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

//点击按钮添加套餐
// $('.acti-add').click(function(){   
//    $('.hot-dialog ul').append('<li> <span>3</span> <span> <input type="" name="package_price[]" placeholder="￥" class="dia-money"  ></span> <span><input type="" name="package_desc[]" class="dia-desc" placeholder="请输入套餐描述，例如：包吃包住"></span></li>');
//     $('.hot-dialog ul:last').focus();
// });

//活动海报
 function checkTheam(){
  
    var image1=$('.hot-post').find('#upload1').val();
    var image2=$('.hot-post').find('#upload2').val();
    var image3=$('.hot-post').find('#upload3').val();
  
    var theam=$('#a_theam');
    // alert(image);
 
    // 判断是否传了图片
    if (image1 || image2 || image3) {
        // alert(1);

        // 下面三个判断是查看那个传了值
        if(image1){
           // 检测格式
           if(!/\.(gif|jpg|jpeg|png|gif|jpg|png)$/i.test(image1)){
                theam.html('<font color=" #ff0397">图片格式必须是.gif,jpeg,jpg,png</font>');
                var imgVal1 = false;
            }else{
                var imgVal1 = true;
            }
         }else{
            var imgVal1 = true;
         }

         if(image2){
           if(!/\.(gif|jpg|jpeg|png|gif|jpg|png)$/i.test(image2)){
                theam.html('<font color=" #ff0397">图片格式必须是.gif,jpeg,jpg,png</font>');
                var imgVal2 = false;
            }else{
                var imgVal2 = true;
            }
         }else{
            var imgVal2 = true;
         }

         if(image3){
           if(!/\.(gif|jpg|jpeg|png|gif|jpg|png)$/i.test(image3)){
                theam.html('<font color=" #ff0397">图片格式必须是.gif,jpeg,jpg,png</font>');
                var imgVal3 = false;
            }else{
                var imgVal3 = true;
            }
         }else{
            var imgVal3 = true;
         }

         if(imgVal1 && imgVal2 && imgVal3){
            theam.html("");
            return true;
         }else{
            return false;
         }
          

    }else{
        theam.html('<font color=" #ff0397">至少选择一张活动海报!</font>');
        return false;
    }

 
    
 //    if(ext!=".BMP"&&ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
 //  alert("图片限于bmp,png,gif,jpeg,jpg格式");
 //  return false;

 // }


}

  //活动主题
  function checkTitle(){
    var title=$("#acti_title").val(); 
    var tit=$("#a_title");
    if(title==""){
      tit.html('<font color=" #ff0397">活动主题不能为空!</font>');
       return false;
    } if(title.length<4||title.length>16){
         tit.html('<font color=" #ff0397">活动主题的长度应在4到16之间!</font>');
        return false;
    }
    else{
       tit.html("");
       return true;
    } 
  }
//活动地址
function checkAddress(){
  var address=$("#acti_address").val();
  var add=$("#a_address");
  if (address=="") {
     add.html('<font color="#ff0397">活动地址不能为空</font>');
      return false;
  }else{
     add.html("");
    return true;

  }
    
}
//联系电话
function checkPhone(){
   var phone=$("#acti_phone").val();
   var phone_prompt=$("#a_phone");
 
  if(phone==""){
    phone_prompt.html('<font color="#ff0397">联系方式不能为空</font>');
    return false;
  }if (!phone.match(/^1[34578]\d{9}$/)) { 
 
   phone_prompt.html("<font color='red'>手机号码格式不正确！请重新输入！</font>"); 
   return false; 
} 
  else{
     phone_prompt.html("");
     return true;
  }
 
}
   //活动详情
    function getContent() {

       var arr = [];
       var edt=$("#a_desc");
        arr.push(UE.getEditor('containerss').hasContents());    
        if(arr == 'true'){
           edt.html("");
           return true;
        }else if(arr == 'false'){

          edt.html('活动详情不能为空');
          return false;
        }       
    }

//活动时间
function checkTime(){
var time1=$("#dateinfo").val();  
var time2=$("#dateinfo1").val();

var tody = new Date(); 
nian = tody.getFullYear();
month = tody.getMonth() + 1; 
day = tody.getDate(); 
month =month <10?"0"+month :month; 
day=day<10?"0"+day:day;

var jt=nian+"-"+month+"-"+day;   //当前时间
    var min1=$("#select_k1").val();
    var min2=$("#select_k2").val();
    var tim=$("#a_time") ;
   // alert(min2);
   if(jt>time1){
        tim.html('<font color="#ff0397">发布时间不能小于当前时间</font>');
        return false;
    }else if (time1>time2) {
         tim.html('<font color="#ff0397">结束时间不能大于开始时间</font>');
         return false;  
    }else if (time1==time2) {
          if (min1>=min2) {
              tim.html('<font color="#ff0397">结束时间不能大于开始时间！!</font>');
              return false;
          }
    }
        tim.html('');
        return true;
}

//服务协议
function checkBox(){
   var hasChk = $('#agree').is(':checked');
   var agree=$('#a_agree');
   if (hasChk) {
     agree.html('');
     return true;
   } else{
     agree.html('<font color="#ff0397">请同意服务协议!</font>');
     return false
   }
  
}

//活动费用
function checkChange(){
     var cha=$('input:radio[name="change"]:checked').val();
     var change=$('#a_change');
    
     if(cha){

      // return true;
        if (cha=='1') {
           //显示套餐
           $(".hot-dialog").show();
           var pack1=$('.dia-01').find('.dia-money').val();
           var pack2=$('.dia-01').find('.dia-desc').val();
  
            if(pack1 && pack2){
                var one = true;
            }else{
                var one = false;
            }
           var pack11=$('.dia-02').find('.dia-money').val();
           var pack22=$('.dia-02').find('.dia-desc').val();
        
           if(pack11 && pack22){
                var two = true;
            }else{
                var two = false;
            }
 
           var pack3=$('.dia-03').find('.dia-money').val();
           var pack4=$('.dia-03').find('.dia-desc').val();

           if(pack3 && pack4){
                var three = true;
            }else{
                var three = false;
            }

            if(one || two || three){
 
              return true;
            }
            else{
             change.html('<font color="#ff0397">请填写套餐内容</font>'); 
                return false;
            }        
      }else if(cha == '2'){
          
        // alert('mian');
            $(".hot-dialog").hide();
            return true;
      }
     
     }else{
      change.html('<font color="#ff0397">请选择活动费用</font>');
      return false;
     }
 
}

//提交验证
function check(){
  // 
    if (checkTitle()&&checkTheam() &&checkTime() && checkAddress() && checkPhone() &&checkChange() && getContent() && checkBox()) {
        
      // if(checkTitle()){
         $('#submit_form').attr('action',"{{ URL('service/doRelease') }}");
         $('#submit_form').attr('target','');

         return true;
    }else{
     //返回顶部
    $('body,html').animate({'scrollTop':0},500);
        return false;      
        
    }

}
// 预览
function preview(){
    $('#submit_form').attr('action',"{{URL('service/previewRelease')}}");
    $('#submit_form').attr('target','_blank');
}

// 提交
// function doSubmit(){

//   $('#submit_form').attr('action',"{{ URL('service/doRelease') }}");
//   $('#submit_form').attr('target','');
// }
 </script>

<script type="text/javascript" src="{{URL('js/editor/jQuery-jcFrame.js')}}"></script>

@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection