@extends('admin.com.header')
@section('title', '后台')
@section('content')

<style type="text/css">
*{padding:0;margin: 0 auto;font-style: 14px;background-color:#3b3a3f }
a{text-decoration:none;}
.hdv{height: 77px;}
tr{line-height: 25px;color:}
.dd{height:38px;line-height:38px;padding-left: 25px;background-color:#353439;color:#6e6f72}
tr td a{color:#99999a;}
</style>
<div class="dv">
   <div class="hdv">
   </div>
	<div>
	<table class="menu_box">
		<tr>
			<dd class="dd">管理员管理</dd>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/user/userAdd')}}" target="right">管理员添加</a></td>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/user/userList')}}" target="right">管理员列表</a></td>
		</tr>
	</table>
	<table >
		<tr>
			<dd class="dd">会员管理</dd>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/frontuser/frontuserList')}}" target="right">会员列表</a></td>
		</tr>
	    <!-- <tr>
			<td class="td"><a href="{{URL('admin/frontuser/publish')}}" target="right">会员发布页</a></td>
		</tr> -->
	</table>
	<table >
		<tr>
			<dd class="dd">活动页</dd>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/activity/activepage')}}" target="right">活动列表</a></td>
		</tr>
	    <tr>
			<td class="td"><a href="{{URL('admin/activity/act_activity')}}" target="right">活动审核</a></td>
		</tr>
		<!-- <tr>
			<td class="td"><a href="{{URL('admin/activity/add_activity')}}" target="right">添加活动类型</a></td>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/activity/tyle')}}" target="right">活动类型</a></td>
		</tr> -->
	</table>
	<table >
		<tr>
			<dd class="dd">企业管理</dd>
		</tr>
		
		<tr>
			<td class="td"><a href="{{URL('admin/audit/firms')}}" target="right">企业认证</a></td>
		</tr>
	    <tr>
			<td class="td"><a href="{{URL('admin/audit/firmslist')}}" target="right">企业列表</a></td>
		</tr>
	</table>
	<table >
		<tr>
			<dd class="dd">广告位</dd>
		</tr>
		
		<tr>
			<td class="td"><a href="{{URL('admin/advertising/advertisaddabc')}}" target="right">首页轮播图</a></td>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/advertising/advertisaddlist')}}" target="right">轮播图列表</a></td>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/advertising/chain')}}" target="right">外链广告</a></td>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/advertising/chainlist')}}" target="right">外链列表</a></td>
		</tr>
	</table>
	<table >
		<tr>
			<dd class="dd">订单管理</dd>
		</tr>
		<tr>
			<td class="td"><a href="{{URL('admin/order/orderlist')}}" target="right">订单列表</a></td>
		</tr>
	</table>
	</div> 
</div>

@endsection