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
.class_a{text-align: right;font-family:微软雅黑;font-size: 15px;}

.class_c{text-align: center;width: 100px;}
.input{height: 30px;width:200px;}
</style>
<div class="top_a">
   <div class="top_b"><span>编辑</span></div>
  <div class="top_c">
     <div class="top_d"></div>
  </div>
</div>
<form action="{{URL('admin\advertising\chained')}}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="id" value="{{$use->id}}">
 <table>
    <tr>
        <td class="class_a">链接：</td>
        <td class="class_b"><input type="text" name="link" value="{{$use->siteed}}" style="width:300px"></td>
    </tr>
    <tr>
        <td class="class_a">原图：</td>
        <td class="class_b"><img src="{{$use->photoed}}" alt="" style="width:700px;height:220px;"></td>
    </tr>
    <tr>
        <td class="class_a">新图：</td>
        <td class="class_b"><input type="file"  name="img"></td>
    </tr>
    <tr>
        <td  colspan="2" class="class_c"><input style="text-align:center;width:80px;height:30px;" type="submit" value="确认提交" ></td>
    </tr>
 </table>

</form>

@endsection