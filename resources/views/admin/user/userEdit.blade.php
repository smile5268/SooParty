@extends('admin.com.header')
@section('title', '管理员管理--修改页面')
@section('content')

<style type="text/css">
.top_a{font-size: 24px;font-family:宋体;}
.top_b{margin-left:20px;margin-top:10px;}
.top_c{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_d{width:100px;height:5px;background:#00ce9b;}
table{margin:0 auto;padding-top: 25px;}
tr{align:center;height:45px;line-height: 45px;}
.class_a{text-align: right;}

.class_c{text-align: center;width: 100px;}
.input{height: 30px;width:200px;}
</style>
<div class="top_a">
   <div class="top_b"><span>编辑</span></div>
  <div class="top_c">
     <div class="top_d"></div>
  </div>
</div>
<form action="{{URL('admin\user\userEd')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="id" value="{{$users->id}}">
 <table>
    <tr>
    	<td class="class_a">用户名：</td>
    	<td class="class_b"><input class="input" type="text" id="userName" name="name" value="{{$users->name}}"></td>
    </tr>
    <tr>
    	<td class="class_a">姓名：</td>
    	<td class="class_b"><input class="input" type="text" id="usersName" name="usersName" value="{{$users->usersName}}"></td>
    </tr>
    <tr>
    	<td class="class_a">密码：</td>
    	<td class="class_b"><input class="input" type="password" id="userPwd" name="userPwd" value="{{$users->userPwd}}"></td>
    </tr>
    <tr>
    	<td  colspan="2" class="class_c"><input style="text-align:center;width:80px;height:30px;" type="submit" value="确认提交" ></td>
    </tr>
 </table>

</form>

@endsection