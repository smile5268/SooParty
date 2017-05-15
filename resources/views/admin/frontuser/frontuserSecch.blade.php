@extends('admin.com.header')
@section('title', '会员管理--会员列表')
@section('content')
<style type="text/css">
/*头部样式*/
.top_header{font-size: 24px;font-family:宋体;}
.top_center_a{margin-left:20px;margin-top:10px;}
.top_center_b{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_buttom{width:100px;height:5px;background:#00ce9b;}
/*搜索样式*/
 .sou{width: 800px;height: 22px;margin:10px;}
/*表样式*/
table {margin-top:10px;padding:0;width:100%;}
.top{text-align: center;color:#fafafb;background:#00ce9b}
tr{border:none;}
tr td{height:30px;line-height: 30px;text-align: center;}


/*分页*/
.listfy{float: left; margin-top: 20px;width: 800px; text-align: center;margin-left: 50px;
}
.listfy li a{
display: block;text-decoration:none;
}
.listfy ul li{list-style: none; width: 30px; text-align: center;float: left;  margin-left: 20px; border:1px solid #ccc;}
.active{
    background: #ccc;
}
</style>
<!-- 头部 -->
<div class="top_header">
  <div class="top_center_a"><span>列表</span></div> 
  <div class="top_center_b">
     <div class="top_buttom"></div>
  </div>
</div>
<!-- 头部结束 -->
<!-- 搜索开始 -->
<div class="sou">
   <form action="{{URL('admin/frontuser/frontuserSec')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="search" name="serch_value" id="input" placeholder="账号搜索">
    <input type="submit" name=""  value="搜索">
   </form>
</div>
<!-- 搜索结束 -->
<!-- 表信息 -->
  <table border="1" cellpadding="0" cellspacing="0" >
  	<tr class="top">
        <td>ID</td>
  	    <td>账号</td>
    		<td>昵称</td>
    		<td>积分</td>
        <td>状态</td>
        <td>登陆时间</td>
        <td>操作</td>
  	</tr>
    @foreach($users as $val)
    <tr class="tt">
        <td class="">{{$val->id}}</td>
        <td class="">{{$val->username}}</td>
        <td class="">{{$val->name}}</td>
        <td class="">{{$val->integral}}</td>
        @if($val->start==false)
        <td class="">启用</td>
        @else
        <td class="">禁用</td>
        @endif
        <td class="">{{$val->updated_at}}</td>
        <td class="list_tion">
        <a href="{{URL('admin/frontuser/frontuserEnable')}}?id={{$val->id}}">启用</a> 
        |                                                                                   
        <a href="{{URL('admin/frontuser/frontuserDisable')}}?id={{$val->id}}">禁用</a>
        |
        <a href="{{URL('admin/frontuser/frontuserEdit')}}?id={{$val->id}}">修改</a> 
        |
        <a href="{{URL('admin/frontuser/frontuserDel')}}?id={{$val->id}}">删除</a></td>
  	</tr>
  	@endforeach
  </table>
  <!-- 表信息结束 -->
<!-- 分页 -->
  <div class="listfy">
{!! $users->render() !!}
  </div>
@endsection