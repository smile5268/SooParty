@extends('admin.com.header')
@section('title', '后台管理--活动审核')
@section('content')
<style type="text/css">
/*头部样式*/
.top_header{font-size: 24px;font-family:宋体;}
.top_center_a{margin-left:20px;margin-top:10px;}
.top_center_b{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_buttom{width:100px;height:5px;background:#00ce9b;}
/*搜索样式*/

.box{margin-top:-30px;margin-left:108px;}
.box1{margin-top:-28px;margin-left:400px;}

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
<script>
function search() {
    var search_value = document.getElementById('box').value;
}
function search1() {
    var search_value1 = document.getElementById('box1').value;
}
</script>
<!-- 头部 -->
<div class="top_header">
  <div class="top_center_a"><span>活动审核</span></div>
  <div class="top_center_b">
     <div class="top_buttom">  
     </div>
  </div>
</div>
 <div class="Tab">
  <table border="1" cellpadding="0" cellspacing="0" >
    <tr class="top">
        <td class="list_id">ID</td>
        <td class="list_name">名称</td>
        <td class="list_time">开始时间</td>
        <td class="list_time">结束时间</td>
        <td class="list_di">地址</td>
        <td class="list_lei">是否显示</td>
        <td class="list_name">操作</td>
    </tr>
    @foreach($users as $val)
     <tr>
        <td class="list_id">{{$val->id}}</td>
        <td class="list_name">{{$val->activity_name}}</td>
        <td class="list_time">{{$val->activity_start_time}}&nbsp;&nbsp;{{$val->hoursStart}}</td>
        <td class="list_time">{{$val->activity_end_time}}&nbsp;&nbsp;{{$val->hoursEnd}}</td>
        <td class="list_di">{{$val->province}}|{{$val->city}}|{{$val->area}}</td>
        @if($val->audit == 0)
        <td class="list_lei">审核中</td>
        @elseif($val->audit == 1)
        <td class="list_lei">审核通过</td>
        @else 
        <td class="list_lei">审核未通过</td>
        @endif
        <td class="list_tion">
          <a href="{{URL('admin/activity/showact')}}?id={{$val->id}}">查看活动</a>
          |
          <a href="{{URL('admin/activity/activitythrough')}}?id={{$val->id}}" >通过</a>
          |
          <a href="{{URL('admin/activity/activitynothrough')}}?id={{$val->id}}" >不通过</a> 
          |
          <a href="{{URL('admin/activity/delect')}}?id={{$val->id}}" >删除</a> 
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