@extends('layouts.style')

@section('title', '我的搜派对')

@section('header')
    @include('layouts.header')
@endsection

@if((isset($fang))==2)



@section('content')
<script type="text/javascript">
swal({
                  title:"Sorry",
                  text:'请先编辑企业资料才能查看',
                  type:"warning",
                 showConfirmButton:true,

              },function(){

                   var  host = window.location.host;
                   window.location='http://'+host+"/center/company";
              })
</script>

@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection



@else

@section('content')
<style type="text/css">
	.company{
		width: 1200px;
		height: auto;

		margin:0px auto;
		margin-bottom: 20px;

	}
	.com-logo{

		width:200px;		
		margin: 0px auto;
	}
	.com-logo img{

           MAX-WIDTH: 100%!important;HEIGHT: auto!important;width:expression(this.width > 200 ? "200px" : this.width)!important;
		/*height: 120px;
          width: 0px;*/
		margin-top: 20px;
	}
	/*公司详情*/
.acti-about{width: 1200px;background: #ffffff;height: auto;
	padding-bottom: 30px;margin-top: 20px;

}
.acti-com {width: 200px;  border: 1px solid #ccc; height: 50px; margin: 30px auto; padding: 0 10px;}
.com-jian{font-size: 20px;font-weight: bold; text-align: center;margin-top: -15px;}
.com-us{text-align: center;}

.com-cont{

	margin: 30px;
	margin-left: 90px;
}
.com-cont ul{
	width:506px;
    height: auto;
    padding-top: 20px;
  
   position: relative;
   border-right: 2px solid #ccc;

}
.com-detail{
    
	position: relative;
	left:500px;
/*	margin-bottom: 20px;*/
}
.com-adress{
	margin-bottom: 20px;
}
.com-jieshao{
	background: url(../images/com-desc.png) no-repeat 0px;
	padding-left: 25px; 
    font-size: 16px;
    font-weight: bold;
}
.com-font {
   margin-left: 55px;
}
.com-ads{
  background: url(../images/com-desc.png) no-repeat 100px ;
  padding-left: 25px ; 
  width:100px;
   font-size: 16px;
    font-weight: bold;

 margin-left: 400px;
}
.com-name{
	 background: url(../images/com-desc.png) no-repeat 100px ;
  padding-left: 25px ; 
  width:100px;
   font-size: 16px;
    font-weight: bold;
   margin-left: 400px;
}
.address{

	margin-left: 55px;
	margin-right: 50px;
	
}
.com-company{
	margin-left: 280px;
	font-size: 16px;
	font-weight: bold;
	color: #ff0397;
}
</style>
<div class="event">
  <div class="w1200">
    <a href="" class="tt02 event-on">公司详情</a>
    <ul>
    </ul>
  </div>
</div>
 <div class="company">
          <div class="acti-about">
          	   <div class="com-logo" >
          	   <img src="{{$user->company_log}}" >
          	   </div>
          	   <div class="com-cont">
          	     <ul>
          	     	<li class="com-li" >
          	     		<p class="com-name" >公司名称</p>
          	     		<p class="com-company" >{{$user->company_name}}</p>
          	     	</li>
          	     </ul>
          	      <ul>
          	      	<li class="com-detail" >
          	      		<p class="com-jieshao">公司介绍</p>
          	      	    <p class="com-font" >{{$user->company_introduction}}</p>
          	      	</li>
          	      		
          	      </ul>
                  <ul>
                  	<li class="com-address" >
          	      		<p class="com-ads">公司地址</p>
          	      	    <p class="address">{{$user->company_address}}</p>
          	      	   </li>
                  </ul>
          	   </div>
 
</div>
</div>

    
@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection
@endif