@extends('center.index')
@section('classOn','surey8')
@section('right')
<style type="text/css">
.acti-admin{
	    width:970px;
		height: 750px;

	/*	padding-left: 20px;
		margin-left: 20px;*/
		background: #ffffff;

	
}
</style>
 <div class="acti-admin">
    <div class="needNumber-act fr">
		<div class="needNumber-act1">
			<span class="act1A">活动</span>
			<span class="act1B">数量</span>
			<span class="act1C">浏览量</span>
			<span class="act1D">总计（￥）</span>
			<span class="act1E">纯利润（￥）</span>
		</div>
		<div class="needNumber-act2">
			<span class="act2A">
				<span><img src="/images/ly.jpg" alt=""></span>
				<div class="needNumber-act2A">
					<h1>达利园Apple官方专营店达利园Apple官方专营店</h1>
					<!-- <p>投票-夺宝活动（亲子）</p> -->
					<b>￥699.00</b>
					<p>7月26日  广东|深圳</p>
				</div>
			</span>
			<span class="act1B">999</span>
			<span class="act1C">120545</span>
			<span class="act1D">67999.00</span>
			<span class="act1E">67999.00</span>
		</div>
	</div>

   <div class="order-num" >
	<div class="needNumber-tit fr">
		<ul>
			<li>用户名</li>
			<li>数量</li>
			<li>价格</li>
			<li>联系方式</li>
			<span>订单状态</span>
		</ul>
	</div>
	<div class="needNumber fr">
		<ul>
			<li>
				<span><img src="/images/ly.jpg" alt=""></span>
				<a href="" class="needNumberUsr">用户名</a>
				<p class="num">00</p>
				<p class="Price">00000</p>
				<p>15671657555</p>
				<div class="needNumber-det">
					<b>已付款</b>
					<!-- <a href="">订单明细</a> -->
				</div>
			</li>
			<li>
				<span><img src="/images/ly.jpg" alt=""></span>
				<a href="" class="needNumberUsr">用户名</a>
				<p class="num">00</p>
				<p class="Price">00000</p>
				<p>15671657555</p>
				<div class="needNumber-det">
					<b>已付款</b>
				<!-- 	<a href="">订单明细</a> -->
				</div>
			</li>
			<li>
				<span><img src="/images/ly.jpg" alt=""></span>
				<a href="" class="needNumberUsr">用户名</a>
				<p class="num">00</p>
				<p class="Price">00000</p>
				<p>15671657555</p>
				<div class="needNumber-det">
					<b>已付款</b>
					<!-- <a href="">订单明细</a> -->
				</div>
			</li>
			<li>
				<span><img src="/images/ly.jpg" alt=""></span>
				<a href="" class="needNumberUsr">用户名</a>
				<p class="num">00</p>
				<p class="Price">00000</p>
				<p>15671657555</p>
				<div class="needNumber-det">
					<b>已付款</b>
					<!-- <a href="">订单明细</a> -->
				</div>
			</li>
			<li>
				<span><img src="/images/ly.jpg" alt=""></span>
				<a href="" class="needNumberUsr">用户名</a>
				<p class="num">00</p>
				<p class="Price">00000</p>
				<p>15671657555</p>
				<div class="needNumber-det">
					<b>已付款</b>
					<!-- <a href="">订单明细</a> -->
				</div>
			</li>
		</ul>
	</div>
	</div>
 </div>











@endsection