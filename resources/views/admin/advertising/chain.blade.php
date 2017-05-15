@extends('admin.com.header')
@section('title', '后台管理--添加')
@section('content')
<style type="text/css">
.top_header{font-size: 24px;font-family:宋体;}
.top_center_a{margin-left:20px;margin-top:10px;}
.top_center_b{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_buttom{width:100px;height:5px;background:#00ce9b;}

table{margin:0 auto;padding-top: 25px;}
table tr{height:45px;line-height: 45px;}
.left{width:80px;} 
.right{padding-left:30px;}

.input{height: 30px;width:200px;}
</style>
<div class="top_header">
  <div class="top_center_a"><span>添加</span></div>
  <div class="top_center_b">
     <div class="top_buttom"></div>
  </div>
</div>
<div>
<style tyle="text/css">
.sub{align: center;}
</style>
  <form action="{{URL('admin/advertising/chainshan')}}" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <table  cellpadding="0" cellspacing="0" >
          <tr >
            <td class="left">图片链接：</td>
            <td><input type="text" name="site" style="width:300px;"></td>
            <td class="right"><span style="color:red">*</span>注意：以http://开头</td>
          </tr>
          <tr>
            <td class="left">图片上传：</td>
            <td ><input type="file" name="tu"></td>
            <td class="right" ><span style="color:red">*</span>这是广告图，请调整好图片的宽和高再上传</td>
          </tr>
          <tr >
            <td>广告位置：</td>
            <td colspan="2" style="float:left;">
               <input type="radio" name="tion" value="0">上
               <input type="radio" name="tion" value="1">下
            </td>
          </tr>
          <tr style="text-align: center">
            <td colspan="3" class="sub"><input type="submit" value="提交"></td>
          </tr>
      </table>
  </form>
</div>

@endsection