@extends('admin.com.header')
@section('title', '管理员管理--管理员列表')
@section('content')
<style type="text/css">
/*头部样式*/
.top_a{font-size: 24px;font-family:宋体;}
.top_b{margin-left:20px;margin-top:10px;}
.top_c{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_d{width:100px;height:5px;background:#00ce9b;}
/*表样式*/
table {margin-top:10px;padding:0;width:100%;}
.top{text-align: center;color:#fafafb;background:#00ce9b}
tr{border:none;}
tr td{height:30px;line-height: 30px;text-align: center;}
.color:hover{background:#00ce9b}


.tt{height:40px;line-height: 40px;}

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
<div class="top_a">
   <div class="top_b"><span>列表</span></div>
  <div class="top_c">
     <div class="top_d"></div>
  </div>
<!-- 头部结束 -->

<!-- 表信息 -->
</div>
  <table border="1" cellpadding="0" cellspacing="0" >
  	<tr class="top">
  	    <td class="top_d">编号</td>
  	  	<td class="top_d">管理员</td>
  	  	<td class="top_d">姓名</td>
        <td class="top_d">状态</td>
        <td class="top_d">操作</td>
  	</tr>
    @foreach($users as $val)

    @if($val->level==true)
    <tr class="color">
        <td>{{$val->id}}</td>
        <td>{{$val->name}}</td>
        <td>{{$val->usersName}}</td>
       @if($val->state==false)
        <td>启用</td>
       @else
        <td>禁用</td>
       @endif
        <td></td>
    </tr>
    @else
  	<tr class="tt color">
  	    <td>{{$val->id}}</td>
  		  <td>{{$val->name}}</td>
    		<td>{{$val->usersName}}</td>
       @if($val->state==false)
        <td>启用</td>
       @else
        <td>禁用</td>
       @endif
        <td>
        <a href="{{URL('admin/user/userEnable')}}?id={{$val->id}}">启用</a> 
        |                                                                                   
        <a href="{{URL('admin/user/userDisable')}}?id={{$val->id}}">禁用</a>
        |
        <a href="{{URL('admin/user/userEdit')}}?id={{$val->id}}">修改</a> 
        |
        <a href="{{URL('admin/user/userDel')}}?id={{$val->id}}">删除</a></td>
  	</tr>
    @endif
  	@endforeach
  </table>
  <!-- 表信息结束 -->
<!-- 分页 -->
 <div class="listfy">
{!! $users->render() !!}
  </div>

@endsection