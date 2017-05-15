@extends('center.index')

@section('classOn','surey3')

@section('right')
<!-- 弹出框 -->
<link rel="stylesheet" type="text/css" href="{{URL('alert/sweetalert.css')}}" />
<script src="{{ URL('alert/sweetalert.min.js') }}" type="text/javascript"></script>
<style type="text/css">
	.attend{
		width:975px;
		height: 50px;
		background: #ffffff;
	}
.attend h4 {
    font-size: 16px;
    line-height: 50px;
    width: 150px;
    text-align: center;
    background: #0066cc;
    color: #ffffff;
}
.att-content{
	width:980px;

	margin:20px 0px;
	padding-bottom: 30px;
}
#box-dib{
	width: 980px;
}
#box-dib li{

    width: 316px;
	background: #ffffff;
	height: 360px;
	margin: 0px 5px;
    margin-bottom: 10px;
}
#o-price{
	margin-left: 15px;
}
#hot-add {
    position: relative;
    left: 190px;
    top: 0px;
    width: 280px;

}
	#hot-share {
    left: 200px;
    top: 20px;
}
.hop-delete{
  color: #0066cc;
    float: left;
    margin-left: 20px;
    margin-top: 10px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}
</style>

<div class="attend">
	<h4>我的收藏</h4>
</div>
<div class="att-content">
	
        <ul class="dib-box" id="box-dib" >
       @foreach($hot as $val)
        <li class="dib"  >
            <span><a href="{{URL('list/details')}}?id={{$val->id}}">
             @if($val->thumbnail)
            <img src="{{$val->thumbnail or 'images/soo.png'}}" alt="" style="width:315px;height:182px">
            @else
            <img src="/images/soo.png" alt="" style="width:312px;height:182px" />
            @endif
            </a></span>
            <a href="{{URL('list/details')}}?id={{$val->id}}"   class="hot-tit ellipsis tt03">{{$val->activity_name}}</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">{{$val->prize_name}}</a>
                </span>
            </div> 
            <div class="hot-add" id="hot-add" >
                <span class="hot-time"  >{{substr_replace($val->activity_start_time,'',10,10)}}</span>
                <span class="hot-ad">{{$val->city}}|{{$val->area}}</span>
            </div>
            <a href=""  class="hot-shop">
            <!-- href="{{URL('center/colldel')}}?id={{$val->id}}" -->
                 <a  ><span class="hop-delete" >删除</span></a>
            </a>
        </li>
        <script type="text/javascript">
   $(".hop-delete").click(function(){
    swal({
        title: "您确定要删除吗？", 
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#ec6c62"
    }, function() {
                    $.ajax({ 
                        type: "POST", 
                        url: "{{URL('center/colldel')}}?id={{$val->id}}",
                        data:{'id':{{$val->id}},'_token':"{{ csrf_token()}}"}, 
                        dataType:"json", 
                        success: function (data) {
                        if(data.ok){
                            // swal("操作成功!", "已成功删除数据！", "success");
                             var  host = window.location.host;
                             window.location='http://'+host+"/center/coll";
                             return false  ;
                        }else{
                             swal("OMG", "删除操作失败了!", "error");
                        }  
                          },  
                       });
    });
});
</script>
        @endforeach 
      </ul> 

</div>


@endsection