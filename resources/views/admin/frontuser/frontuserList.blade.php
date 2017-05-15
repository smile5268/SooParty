@extends('admin.com.header')
@section('title', '会员管理--会员列表')
@section('content')
<style type="text/css">
/*头部样式*/
.top_a{font-size: 24px;font-family:宋体;}
.top_b{margin-left:20px;margin-top:10px;}
.top_c{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_d{width:100px;height:5px;background:#00ce9b;}
/*搜索样式*/


/*表样式*/
table {margin-top:10px;padding:0;width:100%;}
.top{text-align: center;color:#fafafb;background:#00ce9b}
tr{border:none;}
tr td{height:30px;line-height: 30px;text-align: center;}
.color:hover{background:#00ce9b}

/*.tt{height:40px;line-height: 40px;}*/

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
.Tab .tt .e a{color:#000000 ;}
</style>
<!-- 头部 -->
<div class="top_a">
   <div class="top_b"><span>列表</span></div>
   <div class="top_c">
     <div class="top_d"></div>
   </div>
</div>
<!-- 头部结束 -->
<!-- 搜索开始 -->
<style type="text/css">
 .sou{width: 800px;height: 22px;margin:10px;}
</style>
<div class="sou">
   <form action="{{URL('admin/frontuser/frontuserSec')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="search" name="serch_value" id="input" placeholder="账号搜索">
    <input type="submit" name=""  value="搜索">
   </form>
</div>
<!-- 搜索结束 -->
<!-- 表信息 -->
<div class="Tab">
  <table border="1" cellpadding="0" cellspacing="0" >
  	<tr class="top">
        <td>ID</td>
  	    <td>账号</td>
    		<td>昵称</td>
        <td>个或企</td>
    		<td>积分</td>
        <td>状态</td>
        <td>登陆时间</td>
        <td>操作</td>
  	</tr>
    @foreach($users as $val)
    <tr class="tt color">
        <td>{{$val->id}}</td>
        <td>{{$val->username}}</td>
        <td>{{$val->name}}</td>
        @if($val->activity_classes==0)
        <td>个人</td>
        @elseif($val->activity_classes==1)
        <td>企业</td>
        @endif
        <td>{{$val->integral}}</td>
        @if($val->start==false)
        <td>启用</td>
        @else
        <td>禁用</td>
        @endif
        <td>{{$val->updated_at}}</td>
        <td>
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
</div>
  <!-- 表信息结束 -->
<!-- 分页 -->
 <div class="listfy">
{!! $users->render() !!}
  </div>
@endsection