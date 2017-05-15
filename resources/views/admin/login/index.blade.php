@extends('admin.com.header')
@section('title', '后台LoGin')
@section('content')
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}" tppabs=".{{asset('css/style.css')}}" />
<style type="text/CSS">
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>

<script src="../js/jquery.js"></script>
<script src="../admin/js/verificationNumbers.js" tppabs="../admin/verificationNumbersa.js"></script>
<script src="../admin/js/Particleground.js" tppabs="../admin/js/Particleground.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码 
  createCode();
  //测试提交，对接程序删除即可
  $(".submit_btn").click(function(){
    location.href="javascrpt:;"/*tpa=http://***index.html*/;
    });
}); 
function btn(){
 
    var acc_count=document.getElementById("account").value.toUpperCase();
    var pa_ss=document.getElementById("pass").value.toUpperCase();
    if(((acc_count.replace(/[ ]/g,"")).length)<6 ){
           // alert("账号不能小于6位字符或数字");
           document.getElementById('account').setAttribute("placeholder","账号不能小于6位字符或数字");

          return false;
       }else{
        if(((pa_ss.replace(/[ ]/g,"")).length)<6){
           // alert("密码不能小于6位字符或数字");
           document.getElementById('pass').setAttribute("placeholder","密码不能小于6位字符或数字");
         return false;
       }else{
        if(((pa_ss.replace(/[ ]/g,"")).length)<6){
                 alert("密码不能小于6位字符或数字");
               return false;
             }
          var inputCode = document.getElementById("J_codetext").value.toUpperCase();
          var codeToUp=code.toUpperCase();
          if(inputCode.length <=0) {
            document.getElementById("J_codetext").setAttribute("placeholder","输入验证码");
            createCode();
            return false;
          }
          else if(inputCode != codeToUp ){
            document.getElementById("J_codetext").value="";
            document.getElementById("J_codetext").setAttribute("placeholder","验证码错误");
            createCode();
            return false;
          }
          else {
            window.open(document.getElementById("J_down").getAttribute("data-link"));
            document.getElementById("J_codetext").value="";
            createCode();
            return true;
          }
       } 
     } 
} 
</script>
</head>
<body>

<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
 <form id="fi" action="{{URL('admin/login/send')}}" method="POST" onsubmit="return btn()">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <dd class="user_icon">
    <input type="text" placeholder="账&nbsp;&nbsp;&nbsp;号" id="account" name="account" class="login_txtbx"/>
   </dd>
   <dd class="pwd_icon">
    <input type="password" placeholder="密&nbsp;&nbsp;&nbsp;码" id="pass" name="pass" class="login_txtbx"/>
   </dd>
   <dd class="val_icon">
    <div class="checkcode">
      <input type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">
      <canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
    </div>
    <input type="button" value="验证码核验" class="ver_btn" onClick="validate();">
   </dd>
    <!-- login()   onClick=" login() " -->
   <dd>
    <input type="submit" value="立即登陆" class="submit_btn"  />   
   </dd>
 </form>
 <dd>
  <p>Copyright© 2016 北叶科技有限公司 版权所有 </p>
  <p>粤ICP备16020501号</p>
 </dd>
</dl>
<script>
  
</script>

@endsection
