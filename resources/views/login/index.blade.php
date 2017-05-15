@extends('layouts.style')

@section('title', '登录')

@section('content')
 <style type="text/css">

 </style>
<div class="RegOrLogin">
    <a href="index.html" class="ROL-logo"><img src="images/logo.png" alt=""></a>
    <h5>让生活处处是团队，无处不精彩</h5>
    <div>
        <span class="ROL">
            <a href=""><span class="ROL-on">登陆</span></a>
            <a href="{{ URL('/login/register') }}"><span>注册</span></a>
        </span>
        <form class="register"  >
        <ul>

            <li><input type="text" value="" name="tel" class="ROL-l" id="tel" placeholder="帐&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号" ></li>
            <li><input type="password" id="password" name="password" value="" maxlength="16" placeholder="密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码" ></li>
            <li><input type="text" id="code" name="code" value="" maxlength="16" placeholder="验&nbsp;&nbsp;证&nbsp;&nbsp;码" >
                <span class="code-img" >
                    <img  title="点击刷新" src="./code/captcha.php" align="absbottom" onclick="this.src='code/captcha.php?'+Math.random();">
                </span>
            
            </li>
            <span id="login-error"></span>
            <div class="ROL-bot">
               <!--  <span><b><input id="ROl-cooike" type="checkbox"></b>记住我</span> -->
                <a href="find_password1.html">忘记密码？</a>
            </div>

            <div class="ROL-sub"><input type="button" id="input1" value="登陆" onclick="loginForm()"></div>
            <div class="ROL-party">
                <p>使用合作伙伴帐号登录</p>
                <a href="javascript:;" onclick="ale();" id="ROL-qq"></a>
                <a href="javascript:;" onclick="ale();" id="ROL-weibo"></a>
               <!--  <a href="javascript:;" onclick="ale();" id="ROL-weixin"></a>
                <a href="javascript:;" onclick="ale();" id="ROL-douban"></a> -->
            </div>
        </ul>
        </form>
    </div>
</div>

<style>
    #login-error{
        width: 100%;
        height: 20px;
        display: block;
        text-align: center;
        color:#e4228b;
    }
</style>
<!-- action="__ROOT__/index.php/Home/Register/loginForm" -->
<script>

  //回车登录
  document.onkeydown=function(e){
      var theEvent = window.event || e;  //兼容问题
      var code = theEvent.keyCode || theEvent.which; 
      if (code == 13) {  //回车键的键值为13
          loginForm();   //调用验证方法
      }
  }

        function loginForm(){
        var tel = $('#tel').val();
        var pass = $('#password').val();
        var code = $('#code').val();
    $.ajax({
        type: 'POST',
        url: "{{ URL('login/receive') }}",
        data:{'tel':tel,'password':pass,'_token':"{{ csrf_token() }}",'code':code},
        dataType: 'json',
        success: function(data){
            if(data.okt){
                window.location.href = "http://" + data.okt;
            }else if(data.not){
                $('#login-error').html('您输入的账号或者密码错误！');
            }else if(data.cot){
                $('#login-error').html('您输入的验证码错误！');
            }
        },
        error : function(){
            $('#login-error').html('网络错误，请刷新页面再次尝试！');
        }
    });
}

 
 
</script>
@endsection

@section('bottom')
   	@include('layouts.bottomLogin')
@endsection



