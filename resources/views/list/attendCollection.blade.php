@extends('service.index')

@section('classOn','survey1')

@section('right')

<style type="text/css">
	.attend{
		width:975px;
		height: 50px;
		background: #ffffff;
	}
.attend h4 {
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

    width: 315px;
	background: #ffffff;
	height: 450px;
	margin: 0px 5px;
}
#o-price{
	margin-left: 15px;
}
#hot-add {
    position: relative;
    left: 180px;
    top: 0px;
    width: 280px;
}
	#hot-share {
    left: -60px;
    top: 20px;
}

</style>

<div class="attend">
	<h4>我的收藏</h4>
</div>
<div class="att-content">
	
       <ul class="dib-box" id="box-dib" >
        <li class="dib"  >
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price" id="o-price"><small>￥</small>360</p>
            <div class="hot-add" id="hot-add" >
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop">
                <span style="position: relative;top:20px; " >A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
                 <b class="hot-share" id="hot-share">8251</b>            
            </a>
          <!--   <span class="hot-refund" >正在退款中......</span> -->
        </li>
            <li class="dib"  >
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price" id="o-price"><small>￥</small>360</p>
            <div class="hot-add" id="hot-add" >
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop">
                <span style="position: relative;top:20px; " >A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
                 <b class="hot-share" id="hot-share">8251</b> 
            </a>
          <!--    <span class="hot-refund" >退款成功......</span> -->
        </li>
        <li class="dib"  >
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price" id="o-price"><small>￥</small>360</p>
            <div class="hot-add" id="hot-add" >
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop">
                <span style="position: relative;top:20px; " >A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
                 <b class="hot-share" id="hot-share">8251</b> 
            </a>
            <!--  <span class="hot-refund" >正在退款中......</span> -->
        </li>
      </ul>

</div>


@endsection







