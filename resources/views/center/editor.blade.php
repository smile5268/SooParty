@extends('center.index')

@section('classOn','surey5')

@section('right')

<!-- 安全中心 -->
   <style type="text/css">

  .edit-user {
    width: 980px;
    float: left;
    margin-left: 20px;  
}
.edit-title{
   background: #fff;
   margin-bottom: 16px;
}
.edit-title h4 {
    width: 160px;
    line-height: 50px;
    background: #0066cc;
    text-align: center;
    color: #ffffff;
    font-size: 16px;
   
}
.edit-cont{
  width: 980px;
  margin-top: 20px;
  background: #ffffff;
  padding-bottom: 1px;
  /*padding: 40px 50px;*/
}

 .edit-form {  
    width: 669px;
    margin: 0px auto;

    padding-top: 20px;

}
/*.edit-form label{
   line-height: 50px;
}*/

.edit-name {
    width: 500px;
    height: 60px;
    line-height: 60px;
    border-bottom: 1px solid #e5e5e5;
}
.edit-input {
    width: 400px;
    height: 35px;
    border: none;
    /*border:1px solid red;*/
}

#preview1 {float: left;
width:112px;height:112px;overflow:hidden;/*margin-left: 30px;*/
 position: relative;top:30px;
}

.edit-btn{
  display: block;
  width: 80px;
  height: 35px;
  line-height: 35px;
  text-align: center;
  margin: 20px ;
  background: #0066cc;
  border: none;
  border-radius: 5px;
  color: #ffffff;
  margin-left: 80px;
}
.edit-photo {
  /*  border: 1px solid red;*/
    margin-left: 76px;
    margin-top: -50px;
   height: 150px;
}
.select {
    position: relative;
    display: inline-block;
    background: #0066cc;
    border: 1px solid #e5e5e5;
    border-radius: 5px;
    padding: 4px 12px;
    overflow: hidden;
    color: #ffffff;
    line-height: 25px;
   float: left;
 top:50px;
   left: 20px;

}
.select input {

    position: absolute;
    right: 0;
    top: 0;
    opacity: 0;
}
.select:hover {
    background: #0066cc;
    color: #ffffff;
    text-decoration: none;
}
.edit-warn{display: block;
    height: 40px;
    line-height: 30px;
    width: 534px;
  /*  border: 2px solid red;*/
  position: relative;
  top:86px;
  left:-60px;
}
.head-pho label {
    position: relative;
    top: 45px;
    /* margin-top: 20px; */
}
.pho-lab{

padding-left: 20px;
}
</style>
<script type="text/javascript">
function bbto(){
   var acc_count=document.getElementById("uname").value;
   var tetee=document.getElementById("tetee").value;
   if((acc_count.length)<1  || (acc_count.length)>10){
           alert("昵称不能小于1位字符并且不能大于10个字符");
          return false;
    }
    if((tetee.length)>40){
           alert("个性签名不能大于40位字母或数字");
          return false;
    }
}
</script>
<!-- 更换头像 -->
<script  src="/js/upload.js" type="text/javascript"></script>
<!-- 安全中心 -->
    <div class="edit-user" >
        <div class="edit-title" >
           <h4>编辑资料</h4>
           </div>

           <div class="edit-cont">
                 <form class="edit-form"  action="{{URL('center/editer')}}" method="POST" enctype="multipart/form-data"  onsubmit="return bbto()">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="head-pho" >
                          <label>头&nbsp;&nbsp;像：</label>
                          <div class="edit-photo" > 
                          <div id="preview1">      
                          @if($uter->user_figure)
                          <img id="imghead1" border=0 src="{{$uter->user_figure}}" style="width: 110px;height: 110px;"  />
                          @else
                           <img id="imghead1" border=0 src="/images/热门达人.png"  />
                          @endif
                          </div>
                          <a href="" class="select" >
                           <input type="file" name="uImg" id="upload" onchange="previewImage1(this)" >更换头像
                          </a>

                       <span class="edit-warn">  温馨提示：图片尺寸不能超过2M,建议尺寸用110*110,图片格式应为png,jpg</span>

                  </div>

                </div>
                 <div class="edit-name" >
                         <label >昵&nbsp;&nbsp;称：</label>
                         <input type="text" name="uname" id="uname" placeholder="请在此输入十个字母" class="edit-input" value="{{$uter->name}}">
                    </div>
                      <div class="edit-name" >
                    <label >姓&nbsp;&nbsp;名：</label>
                    <input type="text" name="real_name" class="edit-input" value="{{$uter->real_name}}">
                    </div>    
                    <div class="edit-name">
                    <label >性&nbsp;&nbsp;别：</label>
                   @if($uter->sex==1)
                   <label  >
                   <input name="sex" type="radio" value="1" class="edit-check" checked="checked" />男 </label>
                   <label class="pho-lab">
                   <input name="sex" type="radio" value="2" class="edit-check" />女 </label> 
                   @else
                   <label  >
                   <input name="sex" type="radio" value="1" class="edit-check" />男 </label>
                   <label class="pho-lab">
                   <input name="sex" type="radio" value="2" class="edit-check"   checked="checked"/>女 </label> 
                   @endif
                    </div>
                <div class="demo1 edit-name ">
                   <label>出生日期：</label>                  
                   <input class="laydate-icon" id="demo" name="name_time"  value="{{ isset($uter->name_time) ?  substr_replace($uter->name_time,'',10,10 ) : ''}}"  > 
                </div>
                    <div class="edit-name" >
                    <label>所在地址：</label>
                    <input type="text" name="addr" class="edit-input" value="{{$uter->addr}}">
                    </div>
                     <div class="edit-name" >
                    <label>个性签名：</label>
                    <input type="text" name="tetee" id="tetee" class="edit-input" placeholder="请用一句话介绍自己" value="{{$uter->text}}" >
                    </div>
                    <div class="edit-keep" >
                        <input type="submit" class="edit-btn" value="保存" >
                    </div>

                 </form> 
              </div>
              </div> 
     
<script type="text/javascript" src="/js/date/laydate.js"></script>
<script type="text/javascript">
!function(){
  laydate.skin('dahong');//切换皮肤，请查看skins下面皮肤库
  laydate({elem: '#demo'});//绑定元素
}();

var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，充值开始日的最大日期
    }
};
// laydate(start);
laydate(end);


</script>
@endsection