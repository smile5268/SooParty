@extends('center.index')
@section('classOn','surey10')
@section('right')

<style type="text/css">
 
    .pas-safe{
        width: 980px;
        height: 50px;
        float: left;margin-left: 20px;background: #ffffff;
      /*  border:1px solid #e5e5e5;*/
    }
    .pas-safe p{
        line-height: 40px;
    }

     .cont-tit{
        font-size: 30px;color: #0066cc;border: none;
     }
     .cont-pwd{
        font-size: 16px;
        color: #cccccc;
        margin-left: -30px;
     }
      .cont-pwd input{
        height: 40px;
        line-height: 40px;
        border: none; margin-left: 10px;
      }
     
      .safe-btn{
        margin: 0px auto;
        width: 500px;height: 40px;
      }
      .safe-cont-btn{
        position: relative;
        left: 100px;
        top: 100px;
        width: 120px;
        text-align: center;
        line-height: 50px;color: #ffffff;
        background: #0066cc;
        border-radius: 5px;border: none;
      
      }
      .safe-btn p{
        position: relative;
        left: 100px;
      }
      .safe-user{
          width: 980px;height: 635px;
        background: #ffffff;
     /*   border: 1px solid #e5e5e5;*/
        margin-top: 20px;
      }
      .safe-user dl{
        width:980px;  
      }
       .safe-user dl dt {
         border: 1px solid #e5e5e5;  
        float: left;
        margin: 20px 20px;
       }
       .safe-user dl dt dd{
        float: left;
        /* line-height: 35px;*/
         border: 2px solid green;
       }
      .safe-name{
        width:500px;padding-top: 15px;
      } 
.PassR-cont4-adm {
    width: 860px;
    margin-left: 54px;
    margin-top: 30px;
    padding-bottom: 30px;
}
.PassR-cont4-adm ul li {
    height: 70px;
    width: 100%;
    border-bottom: 1px solid #ccc;
}
.adm1{

   background: url('/images/phone.png') no-repeat;
}
.adm2{

   background: url('/images/email.png') no-repeat;
}
.adm3{

   background: url('/images/foot4.png') no-repeat;
}
.adm4{

   background: url('/images/QQ.png') no-repeat;
}
.adm4 p{
  margin-left: 10px;
}
.adm5{

   background: url('/images/foot3.png') no-repeat;
}
.PassR-cont4-adm ul li h1 {
    float: left;
    line-height: 70px;
    font-size: 18px;
    font-weight: bold;
    color: #666;
    margin-right: 78px;
}

.PassR-cont4-adm ul li p {
    font-size: 12px;
    color: #e2448b;
    float: left;
    line-height: 70px;
}

.PassR-cont4-adm ul li h6 {
    float: right;
    line-height: 70px;
    width: 130px;
}

.PassR-cont4-adm ul li h6 a {
    color: #06c;
}
.PassR-cont4-phone{
  background: url('images/phone.png') no-repeat;
}
/*弹框*/
.safe-dialog{
  width:495px;
  height: 248px;
  border: 1px solid #e5e5e5; background-color: #ffffff;
  left:50%;
  top:50%;
  z-index: 1;
  position:fixed!important;
  margin-left:-150px !important;
  _position:absolute;
  _top:expression(eval(document.compatMode && document.compatMode=='CSS1Compat')?
  documentElement.scrollTop + (document.documentElement.clientHeight - this.offsetHeight)/2: /**//*IE6*/
  document.body.scrollTop + (document.body.clientHeight - this.clientHeight)/2); /**//*IE5 IE5.5*/ 
  margin: auto;
  box-shadow:0 0 5px 5px #eeeeee;
  display: none;
}
.safe-dialog p{
  height: 50px;
  line-height: 50px;
  margin: 20px 37px ;
}
.safe-dialog .p-name{
  border: none;
  width:410px; height: 40px;
   border-bottom: 1px solid #e5e5e5;
  line-height: 40px;
}
.safe-dialog .p-count{
  border: none;
  width:186px; height: 40px;
  line-height: 40px;
  border-bottom: 1px solid #e5e5e5;
}
.dia-close{
  float: right;
  width:38px; height:37px;  border:0;  background:url(/images/cancel.png) no-repeat right top
}
.bind-btn{
  float: left;
  border: none;
  width: 90px;height: 40px;
  line-height: 40px;
  text-align: center;
  color: #ffffff;
  background: #0066cc;
  border-radius: 5px;
  margin-left: 30px;
  margin-top: 10px;
}

.bind-name{
  margin-top: 20px;
 font-weight:bold;width:200px;
}
#p-alert {
    margin-left: 40px;margin-top: -10px;
    width: 350px;color: #ff0397;
    display: block;
}
#btnSendCode{
  width:130px;
  height: 34px;text-align: center;
  background: #00ccff;
  color:#fff;border-radius: 5px;border: none;

}
</style>
<script src="/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function(){
  // 弹出框 
    $("#bind-update").click(function(){
      $(".safe-dialog").toggle();
     });
  
    $('.dia-close').click(function(){
      $('.safe-dialog').css('display','none');
    })
   
 

});

var InterValObj; //timer变量，控制时间
var count = 5; //间隔函数，1秒执行
var curCount;//当前剩余秒数

function sendMessage() {
  　curCount = count;
　　//设置button效果，开始计时
     $("#btnSendCode").attr("disabled", "true");
     $("#btnSendCode").val( + curCount + "秒内重新发送");
     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
　　  //向后台发送处理数据
//   $.ajax({
//   　　type: "POST", //用POST方式传输
//   　　dataType: "text", //数据格式:JSON
//   　　url: 'Login.ashx', //目标地址
//  　　 data: "dealType=" + dealType +"&uid=" + uid + "&code=" + code,
//  　　 error: function (XMLHttpRequest, textStatus, errorThrown) { },
//   　　success: function (msg){ }
//   });
}

//timer处理函数
function SetRemainTime() {
            if (curCount == 0) {                
                window.clearInterval(InterValObj);//停止计时器
                $("#btnSendCode").removeAttr("disabled");//启用按钮
                $("#btnSendCode").val("重新获取验证码");
            }
            else {
                curCount--;
                $("#btnSendCode").val( + curCount + "秒内重新发送");
            }
        }

 function check1(){
   var phone=$('.p-name').val();
   if (phone=='') {
      $('#p-alert').html('手机号不能为空!');
      return false;
   }
   if (!phone.match(/^1[34578]\d{9}$/)) {
       $('#p-alert').html('手机号码格式不正确！请重新输入');
       return false;
   }
} 

    </script>

<!-- 安全中心 -->
     <div class="pas-safe" >
        <div class="safe-title" >
           <h4>账号绑定</h4>
           <div class="safe-user">
               <dl>
                 <dt>
                   <img src="../images/热门达人.png">
                 </dt>
                 <dd class="safe-name">
                    <p> 昵&nbsp;&nbsp;&nbsp;&nbsp; 称：<span>{{$user->name}}</span></p>
                    <p>绑 定 邮 箱：<span>未绑定</span></p>
                    <p>绑 定 手 机：
                    @if($user->username)
                    <span>{{substr_replace($user->username,'****',3,4)}}</span>
                    @else
                    <span>无绑定手机</span>
                    @endif
                    </p>
                 </dd>
               </dl>
                <div class="PassR-cont4">
        <ul>
          <li>
            @if($user->username)
            <span class="adm1"></span>
            <h1>手机</h1>
            <p>{{substr_replace($user->username,'****',3,4)}}</p>
            @else
            <span class="adm1"></span>
            <h1>手机</h1>
            <p>   无绑定手机</p>
            @endif
            <h6><a  id="bind-update" >修改</a></h6>
          </li>
          <li>
            <span class="adm2"></span>
            <h1>邮箱</h1>
            <p>   未绑定邮箱</p>
            <h6><a href="">立即绑定</a></h6>
          </li>
<!--           <li>
            <span class="adm3"></span>
            <h1>微信</h1>
            <p>   未绑定微信</p>
            <h6><a href="">立即绑定</a></h6>
          </li> -->
          <li>
            <span class="adm4"></span>
            <h1>Q&nbsp;Q</h1>
            <p>   未绑定QQ</p>
            <h6><a href="">立即绑定</a></h6>
          </li>
            <li>
            <span class="adm5"></span>
            <h1>微博</h1>
            <p>未绑定微博</p>
            <h6><a href="">立即绑定</a></h6>
          </li>
        </ul>
      </div>
           </div>  

        </div>
 <!-- 弹框 -->
 <div class="safe-dialog" id="safe-dialog">
     <input  type="button"  style=" " class="dia-close"   />
     <p>
     <input class="p-name" type="text" value="" name="p-name" placeholder="请输入您的手机号"  >
     </p>
     <p>
     <input class="p-count"  type="text" value="" name="account" placeholder="请输入您的验证码" >
     <input id="btnSendCode" type="button" value="获取验证码" onclick="sendMessage()" />
     </p>
     <span id="p-alert" ></span>
     <!--  <p>
     <input type="text" name="" placeholder="请输入您的银行卡号">
     </p> -->
     <input type="submit" name="" value="确定" class="bind-btn" onclick="check1()" >
   </div>

    </div> 
      
@endsection