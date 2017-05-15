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
.Tab{width: 600px;margin:auto}
table{width: 500px;margin-top: 15%;}
table tr{height: 36px;line-height: 36px;}
table tr td{padding-left:10px;}
table tr td:first-child{text-align: center;}


</style>

<!-- 头部 -->
<div class="top_header">
  <div class="top_center_a"><span>退款审核</span></div>
  <div class="top_center_b">
     <div class="top_buttom"> 
     </div>
  </div>
</div>

<!-- 头部结束 -->
<!-- 表信息 -->
<style tyle="text/css">
  
</style>
<div class="Tab">
   <form action="{{URL('admin\order\orderupdate')}}" method="post">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <input type="hidden" name="id" value="{{$update->id}}">
      <table border="1px solid #ccc" cellpadding="0" cellspacing="0" margin="auto">
           <tr >
             <td>订单编号</td>
             <td>{{$update->serial}}</td>
           </tr>
           <tr >
             <td>数量</td>
             <td>{{$update->number}}</td>
           </tr>
           <tr >
             <td>单价</td>
             <td>{{$update->price}}元</td>
           </tr>
           <tr >
             <td>状态</td>
             <td>
             @if($update->refund==1)
             <input type="radio" name="statee" value="1" checked="checked">申请退款
             <input type="radio" name="statee" value="2" >退款成功
             <input type="radio" name="statee" value="0" >无退款申请 
             @elseif($update->refund==2)
             <input type="radio" name="statee" value="1" >申请退款
             <input type="radio" name="statee" value="2" checked="checked">退款成功
             <input type="radio" name="statee" value="0" >无退款申请
             @elseif($update->refund==0)
             <input type="radio" name="statee" value="1" >申请退款
             <input type="radio" name="statee" value="2" >退款成功
             <input type="radio" name="statee" value="0" checked="checked">无退款申请 
             @endif
             </td>
           </tr>
           <tr >
             <td>总额</td>
             <td style="color:#ff0000;font-weight:bold">{{($update->number)*($update->price)}}元</td>
           </tr>
           <tr  >
             <td colspan=2><input type="submit" name="" value="确定修改"></td>
           </tr>
      </table>
  </form>
</div>

<!-- 表信息结束 -->

@endsection