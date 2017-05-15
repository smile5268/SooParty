@extends('admin.com.header')
@section('title', '后台管理--外链列表')
@section('content')
<style type="text/css">
/*头部样式*/
.top_a{font-size: 24px;font-family:宋体;}
.top_b{margin-left:20px;margin-top:10px;}
.top_c{margin-top:10px;width:100%;height:5px;background-color:#e5e5e5;}
.top_d{width:100px;height:5px;background:#00ce9b;}
/*搜索样式*/

.box{margin-top:-30px;margin-left:80px; }
.box_input{width: 120px;height: 22px;}
.box_sub{height: 28px;}

/*表样式*/
table {margin-top:10px;padding:0;width:100%;}
.top{text-align: center;color:#fafafb;background:#00ce9b}
tr{border:none;}
tr td{height:30px;line-height: 30px;text-align: center;}


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

/*图片移入移除*/
.img{width:60px;height:60px;}
.hover{width:1000px;height:600px;
position: absolute;
display: block;
z-index: 1;
 
}

</style>

<!-- 头部 -->
<div class="top_a">
   <div class="top_b"><span>列表</span> </div>
  <div class="top_c">
     <div class="top_d"></div>
  </div>
</div>
<!-- 头部结束 -->
<!-- 表信息 -->
<div class="Tab">
  <table border="1" cellpadding="0" cellspacing="0" >
    <tr class="top">
        <td>ID</td>
        <td>外链图</td>
        <td>位置</td>
        <td>操作</td>
    </tr>
    @foreach($user as $val)
    <tr >
        <td>{{$val->id}}</td>
        <td><img src="{{$val->photoed}}" alt="" style="width:200px;height:60px;"></td>
     @if($val->location==0)
        <td>上</td>
     @else
     <td>下</td>
     @endif
        <td>
        <a href="{{URL('admin/advertising/chainedit')}}?id={{$val->id}}">换图</a>
        |
        <a href="{{URL('admin/advertising/deled')}}?id={{$val->id}}">删除</a>
        </td>
     </tr>
   @endforeach
  </table>
</div>
<!-- 表信息结束 -->

<!-- 分页 -->
 <div class="listfy">

 </div>
@endsection