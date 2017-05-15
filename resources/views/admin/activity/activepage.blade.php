@extends('admin.com.header')
@section('title', '后台管理--活动列表')
@section('content')
<style type="text/css">
/*头部样式*/
.top_header{font-size: 24px;font-family:宋体;}
.top_center_a{margin-left:20px;margin-top:10px;}
.top_center_b{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_buttom{width:100px;height:5px;background:#00ce9b;}
/*搜索样式*/
.sou{width: 800px;height: 22px;margin:  10px;}
/*表样式*/
table {margin-top:10px;padding:0;width:100%;}
.top{text-align: center;color:#fafafb;background:#00ce9b}
tr{border:none;}
tr td{height:30px;line-height: 30px;text-align: center;}
.list_id{width: 60px;}
.list_num{width:110px;}
.list_name{width: 300px;}
.list_time{width: 200px;}
.list_lei{width: 100px;}
.list_di{width:228px; }
.list_tion{width: 520px;}


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
<div class="top_header">
  <div class="top_center_a"><span>列表</span></div>
  <div class="top_center_b">
     <div class="top_buttom"></div>
  </div>
</div>

<!-- 头部结束 -->
<!-- 搜索框开始 -->
<div class="sou">
   <form action="{{URL('admin/activity/activepagerSec1')}}" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="search" name="serch_value1" id="input" placeholder="名称搜索">
      <input type="submit" name=""  value="搜索">
   </form>
</div>

<!-- 搜索框结束 -->
<!-- 表信息 -->

<div class="Tab">
  <table border="1" cellpadding="0" cellspacing="0" >
    <tr class="top">
        <td class="list_id">ID</td>
        <td class="list_name">名称</td>
        <td class="list_lei">类型</td>
        <td class="list_num">推荐位置</td>
        <td class="list_time">开始时间</td>
        <td class="list_di">地址</td>
        <td class="list_lei">是否显示</td>
        <td class="list_tion">操作</td>
    </tr>
    @foreach($users as $val)
    <tr >
        <td class="list_id">{{$val->id}}</td>
        <td class="list_name">{{ $val->activity_name}}</td>
          @if($val->cost==1)
          <td class="list_lei" style="color:#ff0000">收费</td>
          @elseif($val->cost==2)
          <td class="list_lei">免费</td>
          @endif
          @if($val->recommended_id==1)
          <td class="list_num">热门活动</td>
          @elseif($val->recommended_id==2)
          <td class="list_num">有奖活动</td>
          @elseif($val->recommended_id==3)
          <td class="list_num">精选活动</td>
          @elseif($val->recommended_id==4)
          <td class="list_num">推选活动</td>
          @else
          <td class="list_num">否</td>
         @endif
        <td class="list_time">{{substr($val->activity_start_time,0,10)}}</td>
        <td class="list_di">{{$val->province}}-{{$val->city}}-{{$val->area}}</td>
          @if($val->audit==0)
          <td class="list_lei" style="color:#12D9E2" >审核中</td>
          @elseif($val->audit==1)
          <td class="list_lei">通过</td>
          @elseif($val->audit==2)
          <td class="list_lei">未通过</td>
          @else
          <td class="list_lei" style="color:#ff0000">未知数据</td>
          @endif
        <td class="list_tion">
        <a href="{{URL('admin/activity/hot')}}?id={{$val->id}}">热门</a>
        |
        <a href="{{URL('admin/activity/theprize')}}?id={{$val->id}}">有奖</a>
        |
        <a href="{{URL('admin/activity/thesele')}}?id={{$val->id}}">精选</a>
        |
        <a href="{{URL('admin/activity/noshow')}}?id={{$val->id}}">取消推送</a>
        |
        <a href="{{URL('admin/activity/elect')}}?id={{$val->id}}">推选</a>
        |
        <!-- <a href="{{URL('admin/activity/details')}}?id={{$val->id}}">详情页</a> 
        | -->                                                                      
        <a class="dv" href="{{URL('admin/activity/disable')}}?id={{$val->id}}">禁用</a>
        |
        <a href="{{URL('admin/activity/show')}}?id={{$val->id}}">显示</a>
        |
        <a href="{{URL('admin/activity/upda')}}?id={{$val->id}}">修改</a> 
        |
        <a href="{{URL('admin/activity/activityDel')}}?id={{$val->id}}">删除</a>
        </td>
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