@extends('layouts.style')

@section('title', '网站地图')

@section('header')
   	@include('layouts.header')
@endsection

@section('content')
<style type="text/css">
	.web-cont{
		width: 1200px;
		background: #fff;
		margin: 20px auto;
		padding-bottom: 20px;
	}
	.web-img{
        width:900px;
		margin:20px auto;
	}
	.web-img img{
		margin-top: 20px;
        margin-left: 40px;
	}
	.web-img span{
		margin-left: 10px;
		font-size: 18px;
		color: #0066cc;
	}
	.web-ul{
		  width:900px;
        margin: auto;
	}
	.ul-title{
		/*background: #0066cc;*/
		height: 30px;
        border-bottom: 1px dashed #e5e5e5;
		line-height: 30px;
		padding-left: 40px;
        font-size: 16px;
       background:url(../images/star.png) no-repeat;    margin-left: 40px;
	}
	.ul-content{
		margin: 20px;
	}
     .ul-content span{
    margin-left: 10px;
    }
	.ul-content span a {
    color: #666;
    padding-right: 16px;
    padding-left: 14px;
    margin-top: 5px;
    line-height: 28px;
}
</style>
<!-- 网站地图 -->
<div class="event">
  <div class="w1200">
    <a href="" class="tt02 event-on">网站地图</a>
    <ul>
    </ul>
  </div>
</div>
<div class="web-cont" >
	<div class="web-img" >
	<img src="/images/web.png" alt="" style="vertical-align: bottom; " /><span>网站地图</span></div> 
	 <div class="web-ul" >
	 	<ul >
	 		<li class="ul-title" >搜派对服务</li>
            <li class="ul-content" >
                <span><a href="">热门活动</a>|</span>
                <span><a href="">有奖活动</a>|</span>
                <span><a href="" >精选活动</a>|</span>
                <span><a href="">活动主办方</a>|</span>
                <span><a href="">搜索好友</a>|</span>
                <span><a href="">发布活动</a>|</span>
                <span><a href="">账户管理</a>|</span>   
            </li>
            <li class="ul-title" >关于搜派对</li>
            <li class="ul-content">
            	<span><a href="" >关于搜派对</a>|</span>
                <span><a href="" >关于等级</a>|</span>
                <span><a href="" >官方活动</a>|</span>
                <span><a  href="{{URL('service/contact')}}" >联系我们</a>|</span>

               <!--  <span><a href="{{URL('service/Privacy')}}">隐私权</a>|</span>
                <span><a href="{{URL('service/user_agreement')}}">服务协议</a>|</span> -->
            </li>
            <li class="ul-title" >帮助中心</li>
            <li class="ul-content">
            	<span><a href="">支付方式</a>|</span>
            	<span><a href="{{URL('service/suggestions')}}">意见反馈</a>|</span>
            	<span><a href="">常见问题</a></span>
            </li>
            
        
	 	</ul>
	 </div>
</div>


@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection