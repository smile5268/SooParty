@extends('center.index')

@section('classOn','surey13')

@section('right')
<script type="text/javascript">
function bbto(){
   var  pass=document.getElementById("pass").value;
   var  pass1=document.getElementById("pass1").value;
   var  pass2=document.getElementById("pass2").value;
   
   if((pass1.length)<5  || (pass1.length)>30){
           alert("密码不能小于6位字符或数字");
          return false;
    }
    if((pass2.length)<5  || (pass2.length)>30){
           alert("密码小于6位字符或数字");
          return false;
          // 密码小于6位字符或数字
    }
}
</script>
<!-- 安全中心 -->
    <div class="pas-safe" >
        <div class="safe-title" >
           <h4>修改密码</h4>
           <form action="{{URL('center/update_pass')}}" method="POST" onsubmit="return bbto()">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">

             <div class="safe-cont">
                  <p class="cont-tit">Sooparty</p>
                  <p class="cont-pwd"> 
                  <input type="password" name="pass"  id="pass" placeholder="请输入原密码"  ></p>
                  <p class="cont-pwd">
                  <input type="password" name="pass1"  id="pass1" placeholder="请输入新密码" ></p>
                  <p class="cont-pwd">  
                  <input type="password" name="pass2"  id="pass2" placeholder="请再次输入新密码" ></p>
                  <p class="safe-btn">
                  <input type="submit" name="" class="safe-cont-btn" value="提交更改" >
                </p>
                 </div>
            </form>
           </div>      
        </div>
   
@endsection