@extends('center.index')
@section('classOn','surey16')
@section('right')
<!-- 企业没认证就让弹出弹框提示，否者就显示页面 -->
@if((isset($fang))==1)

<script type="text/javascript">
swal({
                  title:"Sorry",
                  text:'请先企业认证成功才能编辑',
                  type:"warning",
                 showConfirmButton:true,

              },function(){

                   var  host = window.location.host;
                   window.location='http://'+host+"/center/enterpriseow";
              })
</script>
@endsection
@else


<style type="text/css">
	.com-release{
	 width:980px;
     height: auto;
	}
	.rel-title{
		width:980px;
		height: 50px;
		line-height: 50px;
		background: #ffffff;

	}
.rel-title h4{
	line-height: 50px;
	font-size: 16px;
	text-align: center;
	width: 150px;
	background: #0066cc;
	color: #ffffff;
}
.rele-cont{
	width:980px;
	height: 730px;
	line-height: 50px;
	background: #ffffff;
	margin-top: 20px;
}
.rela-form{
	width:800px;
	margin: 20px auto;	
}
.com-input{
	width:460px;
	height: 40px;
	line-height: 40px;
   text-indent: 1.5em;
   border:1px solid #e5e5e5;
   border-radius: 5px;
  /* box-shadow:0 0 5px 5px #eeeeee;*/
}
.com-sub{
	width:100px;
	height: 50px;
	line-height: 50px;
	text-align: center;
	background: #0066cc;
	color: #ffffff;
	font-size: 18px;
	border: none;
	border-radius: 5px;
	margin-top:35px;
	margin-left: 251px;
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
   top:66px;
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
.com-photo{
	width:450px;
	height: 175px;
	margin-left: 80px;
	margin-top:-114px;
}

.form-desc label{display: block;position: relative;top:60px;
	margin-bottom: 50px;	
}

#preview4 {float: left;
width:150px;height:150px;overflow:hidden;
 position: relative;top:20px;
}
.text-desc{width:460px;
position: relative;left: 75px;top: -30px;
 border: 1px solid #e5e5e5;border-radius: 5px;text-indent: 1.5em;
}
.com-descript{display: block;
	position: relative;top:30px;
}
.com-warn{display: block;
    line-height: 30px;
    width: 620px;
	position: relative;
	top:106px;
	left:-60px;
}
.com-address{
	margin-top: -20px;
}
#img-prompt {
	 width: 300px;
    display: block;
    position: relative;
    left: 76px;
    top: -2px;border:none;
}
#img-prompt::-moz-placeholder{color: #ff0397;}
#img-prompt::-webkit-input-placeholder{color: #ff0397;}
#img-prompt:-ms-input-placeholder{color: #ff0397;}

#name-prompt::-moz-placeholder{color: #ff0397;} 
#name-prompt::-webkit-input-placeholder{color: #ff0397;} 
#name-prompt:-ms-input-placeholder{color: #ff0397;} 

#address-prompt::-moz-placeholder{color: #ff0397;}  
#address-prompt::-webkit-input-placeholder{color: #ff0397;}
#address-prompt:-ms-input-placeholder{color: #ff0397;}

#descript-prompt::-moz-placeholder{color: #ff0397;}            
#descript-prompt::-webkit-input-placeholder{color: #ff0397;}   
#descript-prompt:-ms-input-placeholder{color: #ff0397;} 

#name-prompt,#address-prompt {
	  width: 300px;
    display: block;
    position: relative;
    top:10px;left:76px;border:none;
}

#descript-prompt{
	  width: 300px;
    display: block;
    position: relative;
    top:-34px;left:76px;border:none;
}

</style>
<script type="text/javascript">
 function com(){
 	 var img=document.getElementById('upload4').value;
 	 var company_name=document.getElementById('company_name').value;
 	 var contactus=document.getElementById('contactus').value;  
 	 var address=document.getElementById('company_address').value;  
     // var Prompt=document.getElementById('com-Prompt');
 	 if(img==''){
 	 	// Prompt.html("请选择公司log");
 	 	document.getElementById('img-prompt').setAttribute("placeholder",'请选择公司log');
 	 	return false;
 	 }else{
 	 	document.getElementById('img-prompt').setAttribute("placeholder",'');
 	 	// return true;
 	 }
 	 if(company_name==''){
 	 	document.getElementById('name-prompt').setAttribute("placeholder",'请输入公司名称');
 	 	return false;
 	 }else{
 	 		document.getElementById('name-prompt').setAttribute("placeholder",'');
 	 }
 	 if(contactus==''){
 	    document.getElementById('descript-prompt').setAttribute("placeholder",'请输入公司名称');
 	 	return false;
 	 }else{
 	 	 document.getElementById('descript-prompt').setAttribute("placeholder",'');
 	 }
 	 if (address=='') {
 	 	 document.getElementById('address-prompt').setAttribute("placeholder",'请输入公司地址');
 	 	return false;
 	 }else{
 	 	 document.getElementById('address-prompt').setAttribute("placeholder",'');
 	 }
 }
</script>
<!-- 图片上传 -->

<script  src="/js/upload.js" type="text/javascript"></script>
<div class="com-release" >
	 <div class="rel-title">
	 	<h4>公司发布</h4>
	 </div>
	 <div class="rele-cont">
	 	 <form class="rela-form" action="{{URL('center/company_post')}}" method="POST" enctype="multipart/form-data"  onsubmit="return com()">
	 	     <input type="hidden" name="_token" value="{{ csrf_token() }}">
	 	    <div class="form-desc" >
	 	        <label >公司照片：</label>
	 	        <div class="com-photo" >
	 	    	 <div id="preview4">
                  <img id="imghead4" border=0 src="{{$entern->company_log or '/images/发布页.png'}}" style="width:150px;height: 150px;    "  />
                 </div>
                 <a href="" class="select" >
	 	    		<input type="file"  name="company_log" id="upload4" onchange="previewImage4(this)" >选择文件
	 	    	</a>
	 	    	<span class="com-warn">温馨提示：图片大小不能超过2M,建议尺寸用200*200的宽高,图片格式应为png或是jpg</span>
                  </div>  
	 	    </div>
             <input id="img-prompt" readonly="" placeholder="">
            <p>
	 	 	<label>公司名称：</label>
            <input type="text" value="{{$entern->company_name or ''}}" id="company_name" name="company_name" placeholder="请输入公司名称" class="com-input" >
             <input type="" name="" id="name-prompt" placeholder=""> 
            </p>
            <p>
            <label class="com-descript" >公司简介：</label>
            <textarea cols="50" rows="10" id="contactus" name="company_introduction" placeholder="请输入公司简介" class="text-desc" >{{$entern->company_introduction or ''}}</textarea> 
             <input type="" name="" id="descript-prompt" placeholder=""> 
            </p>    
            <p class="com-address" >
            <label>公司地址：</label>
            <input type="text" name="company_address" id="company_address" value="{{$entern->company_address or ''}}" placeholder="请输入公司地址" class="com-input"  >
              <input type="" name="" id="address-prompt" placeholder=""> 
            </p>    
            <p>
            	<input type="submit" name="" value="提交" class="com-sub">
            </p>
	 	 </form>
	 </div>
</div>


@endsection

@endif

