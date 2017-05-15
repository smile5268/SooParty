@extends('admin.com.header')
@section('title', '会员管理--会员列表')
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
   <div class="top_b"><span>认证</span> </div>
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
  	    <td>账号</td>
    	<td>公司名</td>
    	<td>营业执照</td>
    	<td>负责人</td>
        <td>负责人身份证号</td>
        <td>是否通过</td>
        <td>操作</td>
  	</tr>
  	@foreach($user as $val)
     <tr >
        <td>{{$val->id}}</td>
  	    <td>{{$val->username}}</td>
    	<td>{{$val->enter_name}}</td>
    	<td><img src="{{$val->enter_file}}"  width="60px" height="60px" onMouseOver="javascript:this.style.height='400px';this.style.width='600px'"  onMouseOut="javascript:this.style.height='50px';this.style.width='50px'" class="imgf" ></td>
    	<td>{{$val->enter_headname}}</td>
        <td>{{$val->enter_number}}</td>
        @if($val->tte==0)
        <td>审核中</td>
        @elseif($val->tte==1)
        <td>审核通过</td>
        @else
        <td>没通过</td>
        @endif 
        <td>
        <a href="{{URL('admin/audit/tion')}}?id={{$val->id}}" target="_blank">查看</a>
        |
        <a href="{{URL('admin/audit/through')}}?id={{$val->id}}">通过   </a>
        |
        <a href="{{URL('admin/audit/nothrough')}}?id={{$val->id}}">不通过   </a>
        |
        <a href="{{URL('admin/audit/del')}}?id={{$val->id}}">删除   </a>
        </td>
  	 </tr>
  	@endforeach
  </table>
</div>
  <!-- 表信息结束 -->
<!--     <img src="" width="60px" height="60px" onMouseOver="javascript:this.style.height='200px';this.style.width='200px'"  onMouseOut="javascript:this.style.height='50px';this.style.width='50px'">        -->
<!-- 分页 -->
 <div class="listfy">

 </div>
@endsection