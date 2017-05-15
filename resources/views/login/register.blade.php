@extends('layouts.style')

@section('title', '注册')

@section('content')

<!-- 弹出框 -->
    <link rel="stylesheet" type="text/css" href="{{URL('alert/sweetalert.css')}}" />
    <script src="{{ URL('alert/sweetalert.min.js') }}" type="text/javascript"></script>
<div class="RegOrLogin">
    <a href="" class="ROL-logo"><img src="{{URL('images/logo.png')}}" alt=""></a>
    <h5>让生活处处是团队，无处不精彩</h5>
    
    <div>
        <span class="ROL">
            <a href="{{ URL('login') }}"><span>登陆</span></a>
            <a href=""><span class="ROL-on">注册</span></a>
        </span>
        <!-- action="__ROOT__/index.php/Home/Register/add" -->
        <form class="register" id="register" name="myform" method='post'>
        <ul>
            <li>
               <input type="text" id="tel" value="" name="tel" class="ROL-l" placeholder="手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机" />
                <span></span>
            </li>
            <li>
                <input type="password" id="password" value="" name="password" class="ROL-l" placeholder="密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码" /><span></span>
            </li>
            <li>
                <input type="password" id="password2" value="" name="password2" class="ROL-l" placeholder="确认密码" /><span></span>
            </li>
            <li>
               <input type="text" id="code" name="code" value="" class="ROL-l" style="width:100px;" placeholder="验证码" />
                      <input  type="button" id="btnSendCode" value="获取验证码" onclick="addCode()" style="    width: 140px;margin-left: 60px;" />
                <!-- <botton class="button" id="phone_btn" name="phoneCode" onclick="addCode()">获取验证码</botton> -->
               <!--  <input type="button" class="button" value="获取验证码"  id="phone_btn" name="phoneCode" onclick="addCode()"> -->
              
            </li>
            <div class="ROL-bot">
                <span><p>点击“注册”，即表示您同意并愿意遵守集结号</p>
                <a href="{{URL('service/user_agreement')}}" style="font-size: 12px; margin:0;line-height: 12px; color:#003366; padding-left:10px;text-decoration:underline;color:#0066cc; ">用户协议。</a></span>
            </div>
            <div class="ROL-sub"><input type="button" value="注册" onclick="register()"></div>
        </ul>
        </form>
    </div>
</div>

<style>
.register ul li label span{position: absolute;bottom: 6px;right: -270px;width: 250px;height: 30px;line-height: 30px;color:#e4228b;background:none;display: block;font-size: 14px;}
</style>

<script>
//回车登录
  document.onkeydown=function(e){
      var theEvent = window.event || e;  //兼容问题
      var code = theEvent.keyCode || theEvent.which; 
      if (code == 13) {  //回车键的键值为13
          register();   //调用验证方法
      }
  }


var PhoneBtn = document.getElementById('phone_btn');
var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount;//当前剩余秒数

//验证码倒计时
function sendMessage() {
  　curCount = count;
　　//设置button效果，开始计时(" + countdown + ")+ curCount +
     $("#btnSendCode").attr("disabled", "true");
     $("#btnSendCode").val("" + curCount + "秒内重新发送");
     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
}

//timer处理函数
function SetRemainTime() {
            if (curCount == 0) {                
                window.clearInterval(InterValObj);//停止计时器
                $("#btnSendCode").removeAttr("disabled");//启用按钮
                $("#btnSendCode").val("重新发送验证码");
            }
            else {
                curCount--;
                $("#btnSendCode").val("" + curCount + "秒内重新发送");
            }
        }
//电话号码
$('#tel').blur(function(){
    var rega =/^[1][358][0-9]{9}$/;
    var el = $('#tel').val();
    if(el!=''){
        if(!rega.test(el)){
            $('#tel').parent().find('span').html('格式不对');
            return false;
        }
        $('#tel').parent().find('span').html('');
        $.ajax({
            type: 'POST',
            url: "{{ URL('login/register/repeat') }}",
            data: {'tel':el,'_token':"{{ csrf_token() }}"},
            dataType: 'json',
            success: function(data){
                $('#tel').parent().find('span').html(data);
            },
        });
    }else{
        $('#tel').parent().find('span').html('电话号码不能为空！');
    }
});

//密码
$('#password').blur(function(){
    if(pass1!=''){
        var passW = /^[\s\S]{6,12}$/;
        var pass1 = $('#password').val();
        if(!passW.test(pass1)){
            $('#password').parent().find('span').html('密码长度必须在6~12位');
            return false;
        }else{
            $('#password').parent().find('span').html('密码不能为空！');
        
        $('#password').parent().find('span').html('');
        }         
    }
});

$('#password2').blur(function(){
    var pass1 = $('#password').val();
    var pass2 = $('#password2').val();
    if(pass1 != pass2){
        $('#password2').parent().find('span').html('密码输入不一致！');
        return false;
    }
    $('#password2').parent().find('span').html('');
});


// 验证码
function addCode(){
    var rega =/^[1][358][0-9]{9}$/;
    var el = $('#tel').val();
    if(el!=''){
        if(!rega.test(el)){
            $('#tel').parent().find('span').html('格式不对');
            return false;
        }
        $('#tel').parent().find('span').html('');

        // showtime();
        sendMessage();
        $.ajax({
            type: 'POST',
            url: "{{URL('login/register/code')}}",
            data: {'tel':el,'_token':"{{ csrf_token() }}"},
            dataType: 'json',
            success: function(data){
                
            }
        });
    }else{
        $('#tel').parent().find('span').html('电话号码不能为空！');
    }
}

// 提交
function register(){
    var code = $('#code').val();
    var pass1 = $('#password').val();
    var pass2 = $('#password2').val();

    var rega =/^[1][358][0-9]{9}$/;
    var el = $('#tel').val();

    if(el!=''){
        if(!rega.test(el)){
            $('#tel').parent().find('span').html('格式不对');
            return false;
        }
        $('#tel').parent().find('span').html('');
    }else{
        $('#tel').parent().find('span').html('电话号码不能为空！');
    }

    if(pass1 != pass2){
        $('#password2').parent().find('span').html('密码输入不一致！');
        return false;
    }

    $.ajax({
        url: "{{ URL('login/register/doRegister') }}", 
        data:{'tel':el,'password':pass1,'password2':pass2,'code':code,'_token':"{{ csrf_token() }}"},  
        type:'post',    
        cache:false,    
        dataType:'json',
        success:function(data){

              swal({
                  title:"Good",
                  text:"注册成功",
                  type:"success",
                 showConfirmButton:true,

              },function(){

                   window.location.href="http://" + data.url + "/login";
              });

            // setTimeout(80000);
              window.location.href="http://" + data.url + "/login";
        },
         error:function(){
            // alert();
        }
    });

}

</script>

@endsection

@section('bottom')
   	@include('layouts.bottomLogin')
@endsection



