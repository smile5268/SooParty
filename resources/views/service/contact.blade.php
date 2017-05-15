@extends('layouts.style')

@section('title',"联系我们")

@section('header')
   	@include('layouts.header')
@endsection

@section('content')
<style type="text/css">

 ul li{
 	list-style: none;
 }
.suggestion{
		width:1200px;
		background: #fff;
		margin: auto;
		padding: 10px;
		margin-bottom: 20px;
		/*border:1px solid red;*/
	}
.suggestion-tit{
	font-size: 16px;
	font-weight: bold;
	margin-top: 26px;
	margin-left: 20px;
}
.suggestion ul li p{
	margin: 10px 20px;
line-height: 32px;
}
.sug-text{
	width: 1100px;
    height: 210px;
}
</style>
<link href="{{  URL('css/style.css')}}"  rel="stylesheet" type="text/css">
<div class="event-hd">
	<div class="w1200">
		<ul>
			<li><a href="" class="tt02 event-hd-on">联系我们</a></li>
		</ul>
	</div>
</div>
<div class="w1200 acti" id="list-acti">
<div class="suggestion" >
	<ul>
		<li class="suggestion-tit">关于搜派对</li>
		<li ><p>搜派对（英文sooparty）是一款集玩乐与商业于一体的全民互动平台。搜派对上活动品类非常丰富，涵盖兴趣、社交、户外、文化、亲子、教育、消费、旅游等等。通过这些精彩的活动，给你一种新的玩乐体验！我们的愿景是：能约，能玩，能圆梦！<p></li>
		<li class="suggestion-tit">广告推广</li>
		<li><p>如果您想与搜派对（sooparty）进行业务合作（商务合作、广告投放、活动推荐位购买、赞助等），请联系：</p>
		<p>电话：0755-85217521</p>
		<p>邮箱：yang@sooparty.com</p>
		</li>
		<li class="suggestion-tit">联系我们</li>
		<li>
			<p>如果您在使用搜派对（sooparty）中遇到问题，请联系：</p>
			<p>电话：0755-85217521</p>
			<p>邮箱：yang@sooparty.com</p>
		</li>
	
	</ul>
</div>
</div>
@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection