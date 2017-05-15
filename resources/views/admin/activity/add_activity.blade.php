@extends('admin.com.header')
@section('title', '管理员管理--管理员添加')
@section('content')
<style type="text/css">
.top_header{font-size: 24px;font-family:宋体;}
.top_center_a{margin-left:20px;margin-top:10px;}
.top_center_b{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_buttom{width:100px;height:5px;background:#00ce9b;}

table{margin:0 auto;padding-top: 25px;}
tr{align:center;height:45px;line-height: 45px;}
.class_a{    text-align: right;font-family: 微软雅黑;font-size: 15px;}

.class_c{text-align: center;width: 100px;}
.input{height: 30px;width:200px;}
</style>
<div class="top_header">
  <div class="top_center_a"><span>添加</span></div>
  <div class="top_center_b">
     <div class="top_buttom"></div>
  </div>
</div>
<form action="{{URL('admin\activity\nente')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
 <table>
    <tr>
    	<td class="class_a">活动类型：</td>
    	<td class="class_b"><input class="input" type="text" id="userName" name="activity_type" value=""></td>
    </tr>
    <tr>
    	<td  colspan="2" class="class_c"><input style="margin-left:56px;width:80px;height:30px;" type="submit" value="确认添加" ></td>
    </tr>
 </table>
</form>



@endsection