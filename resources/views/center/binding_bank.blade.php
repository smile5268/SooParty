
@extends('center.index')

@section('classOn','surey11')

@section('right')

<style type="text/css">
  .bind{
    height: 300px;
    padding: 20px;
  }
.bind h2{
  margin-left: 60px;
}
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
  /*width: 500px;*/
  height: 50px;
  line-height: 50px;
 border-bottom: 1px solid #e5e5e5;
  margin: 20px 37px ;
}
.safe-dialog .p-name{
  border: none;
  width:410px; height: 40px;
  line-height: 40px;
}
.safe-dialog .p-count{
  border: none;
  width:410px; height: 40px;
  line-height: 40px;
}
.dia-close{
  float: right;
  width:38px; height:37px;  border:0;  background:url(/images/cancel.png) no-repeat right top
}
.bind-btn{
  float: right;
  border: none;
  width: 90px;height: 40px;
  line-height: 40px;
  text-align: center;
  color: #ffffff;
  background: #0066cc;
  border-radius: 5px;
  margin-right: 30px;
  margin-top: 10px;
}
#bind-add{
  background: none;
  border: none; color: #0066cc;
font-size: 18px;color:#ffffff;background-color:#0066cc;width: 120px;height: 45px;border-radius: 6px;padding: 0px;margin-top: 40px;margin-left:60px;
}
.bind-cont{
   position: relative;height: 100px;   margin-top: -160px;margin-left: 77px;
}

.bind-name{
  margin-top: 20px;
 font-weight:bold;width:200px;
}
.p-alert {
    margin-left: 40px;
    width: 350px;
    display: block;
}
</style>
<script src="/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
  $(function(){    
      $("#bind-add").click(function(){
      $(".safe-dialog").toggle();
});
  
      });
    </script>
<!-- 安全中心 -->
    <div class="pas-safe" >
        <div class="safe-title" >
           <h4>绑定支付宝</h4>
           </div>
           <div class="safe-user">
            <div class="bind" >
              <h2>已绑定的账号</h2>
              <button href="" id="bind-add">添加绑定</button> 
            </div>
            @if(isset($userter))
               
                <div class="bind-cont" > 
                   <img src="/images/支付宝.jpg" >
                  <!--  <a href="" style="padding-left:20px;">修改支付账号</a> -->
                   <p class="bind-name" >姓名：{{$userter->uname}}</p>
                   <p class="bind-name">账号：{{$userter->bank_account}}</p>
                </div >
               
            @else 

            @endif
                 <div class="safe-dialog" id="safe-dialog">
                   <input  type="button"  style=" " class="dia-close"   />
                     <p>
                     <input class="p-name" type="text" value="" name="name" placeholder="请输入您的真实姓名"  >
                     </p>
                     <p>
                     <input class="p-count"  type="text" value="" name="account" placeholder="请输入您的支付宝账号" >
                     </p>
                    <span class="p-alert" ></span>
                     <!--  <p>
                     <input type="text" name="" placeholder="请输入您的银行卡号">
                     </p> -->
                     <input type="submit" name="" value="绑定" class="bind-btn" onclick="check()" >
                   </div>
           </div>   
    </div>
<script type="text/javascript">

//提交验证
function check(){
    // $('') 
var name=$('.p-name').val();    //真实姓名
var count=$('.p-count').val(); // 支付宝账号
var prom=$('.p-alert');      //提示
    if (name=="") {
         prom.html('<font color=" #ff0397">姓名不能为空!</font>');
         // $('.p-form').attr('action',"{{ URL('center/binding') }}");
         // $('#submit_form').attr('target','');
         return false;
    }if (name.length<4||name.length>16) {
        prom.html('<font color=" #ff0397">姓名必须在4-16位!</font>');
        return false;
    }if (count=="") {
         prom.html('<font color=" #ff0397">账号不能为空!</font>');
          return false;

    }if(count.length<4||count.length>16){
         prom.html('<font color=" #ff0397">账号必须在4-16位!</font>');
          return false;
    }
    $.ajax({
            type: "POST", 
            url: "{{URL('center/binding')}}",
            data:{"name":name,"account":count,'_token':"{{ csrf_token()}}"}, 
            dataType:"json",
             success:function(data){
              swal({
                  title:"Good",
                  text:"绑定成功",
                  type:"success",
                 showConfirmButton:true,

              },function(){
                   var   host = window.location.host;
                    location.href='http://'+host+"/center/binding";
              });
        } 
    })


}

  $('.dia-close').click(function(){
       $('.safe-dialog').css('display','none');
  })
</script>
@endsection