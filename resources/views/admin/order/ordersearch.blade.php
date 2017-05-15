@extends('admin.com.header')
@section('title', '后台管理--活动列表')
@section('content')
<style type="text/css">
/*头部样式*/
.top_header{font-size: 24px;font-family:宋体;}
.top_center_a{margin-left:20px;margin-top:10px;}
.top_center_b{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_buttom{width:100px;height:5px;background:#00ce9b;}


/*表样式*/
table {margin-top:10px;padding:0;width:100%;}
.top{text-align: center;color:#fafafb;background:#00ce9b}
tr{border:none;}
tr td{height:30px;line-height: 30px;text-align: center;}
.color:hover{background:#00ce9b}
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
<style type="text/css">
 .sou{width: 800px;height: 22px;border:1px solid #ff0000;margin:  10px;}
</style>

<div class="sou">
   <form action="{{URL('admin/order/ordersearch')}}">
    <input type="search" name="text" id="input" placeholder="订单号搜索">
    <input type="submit" name=""  value="搜索">
   </form>
</div>

<!-- 搜索框结束 -->
<!-- 表信息 -->

<div class="Tab">
  <table border="1" cellpadding="0" cellspacing="0" >
    <tr class="top">
        <td class="list_id">ID</td>
        <td class="list_time">订单编号</td>
        <td class="list_name">名称</td>
        <td class="list_lei">数量</td>
        <td class="list_num">状态</td>
        <td class="list_num">单价</td>
        <td class="list_num">总额</td>
        <td class="list_num">购买人账号</td>
        <td class="list_time">订单创建时间</td>
        <td class="list_time">操作</td>
    </tr>
    @foreach($users as $val)
    <tr class="color">
        <td class="list_id">{{$val->id}}</td>
        <td class="list_time">{{$val->serial}}#{{$val->pid}}</td>
        <td class="list_name">{{$val->activity_name}}</td>
        <td class="list_lei">{{$val->number}}</td>
          @if($val->refund==0)
          <td class="list_num">已付款</td>
          @elseif($val->refund==1)
          <td class="list_num">退款申请</td>
          @elseif($val->refund==2)
          <td class="list_num">退款成功</td>
          @endif
        <td class="list_num">{{$val->price}}</td>
        <td class="list_num">{{($val->number)*($val->price)}}</td>
        <td class="list_num">{{$val->phonenumber}}</td>
        <td class="list_time">{{$val->created_at}}</td>
        <td class="list_time">
        <a href="{{url('admin/order/order_showactivities')}}?id={{$val->act_id}}" target="_Blank">查看</a>
        
        @if($val->refund==1)
        |
        <a href="{{url('admin/order/order_update')}}?id={{$val->id}}">退款审核</a>
        @else 
        @endif
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