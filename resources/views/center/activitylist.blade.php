@extends('center.index')
@section('classOn','surey12')
@section('right')
   <style type="text/css">
   .acti-list{
   	   width:980px;
   	  height: auto;
   }
.safe-title{
  width:980px;
height:50px;background: #ffffff;

}
/* .safe-title h4{
width: 150px;height: auto;height: 50px;line-height: 50px;
font-size: 14px;

text-align: center;
color: #ffffff;
background: #0066cc;
}*/
   .list-join{
    background: #ffffff;
    height: 200px;
    margin-top: 20px;
   }
  
.list-join dl dt{
	float: left;
}
.list-images{
	margin: 20px 20px;
}
.list-title{
	padding-top: 20px;
}
.list-btn{
	float: right;
	position: relative;
	top: 80px;
	margin-right: 50px;
}
.list-btn2{
  float: left;
  position: relative;
  top: 90px;
  /*margin-right: 50px;*/
}
.list-btn3{
  float: left;
  position: relative;
  top: 90px;
  margin-left: 50px;
}
.list-detail{
	display: block;
	width:118px;
	height: 38px;
	line-height: 38px;
	text-align: center;
	background: #0066cc;
	color: #e5e5e5;
	border-radius: 5px;
}
.list-detail:hover{
	background: #0066cc;
	color: #e5e5e5;
}
   </style>

  <div class="acti-list">
      <div class="safe-title" >
           <h4>我发布的</h4>
       </div>
       @foreach($user as $val)
      <div class="list-join">
      	   <div class="list-yin">
                <dl>
                    <dt>
                    @if($val->thumbnail)
                    <img src="{{$val->thumbnail }}" class="list-images" style="width:312px;height: 170px;"> 
                    @else
                    <img src="/images/soo.png" class="list-images" style="width:312px;height: 170px;"> 
                    @endif
                     </dt>
                    <dd class="list-title" >
                        <h3 >{{$val->activity_name}}</h3>
                    </dd>
                   <dd class="list-btn2">
                    <b>时间：</b>{{$val->activity_start_time}}
                   </dd>
                   <dd class="list-btn3">
                    <b>地点：</b>{{$val->province}}|{{$val->city}}|{{$val->area}}
                   </dd>
                   <dd class="list-btn">
                   	<a href="{{URL('center/activityadmin')}}" class="list-detail" >详情</a>
                   </dd>
                </dl>
           </div>       
      </div>
  	  @endforeach
  </div>

@endsection