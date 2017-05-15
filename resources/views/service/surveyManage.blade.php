@extends('service.index')

@section('classOn','我报名的')

@section('right')
<style type="text/css">
	.tab{
	
		margin-bottom:20px;
		position:relative;overflow:hidden;
		background:#fff;
		width:980px;
		font-family:'Roboto', sans-serif;line-height:1.5;
		font-weight:300;color:#888;-webkit-font-smoothing:antialiased;
	}
.tabs{display:table;position:relative;overflow:hidden;margin:0;width:100%; height: 50px;
}
.tabs li{float:left;line-height:50px;overflow:hidden;padding:0;position:relative;}
.tabs a{
 
	border-bottom:1px solid #fff;color:#888;font-weight:500;display:block;letter-spacing:0;outline:none;padding:0 20px;text-decoration:none;-webkit-transition:all 0.2s ease-in-out;-moz-transition:all 0.2s ease-in-out;transition:all 0.2s ease-in-out;border-bottom:2px solid #0164bf;
}
.tabs_item{display:none;padding:30px 0;}

/*.tabs_item img{width:200px;float:left;margin-right:30px;}*/
.tabs_item:first-child{display:block;}
.current a{
	color:#fff;
	background:#0164bf;
}
.active1{
	/*background: #ffffff;*/
}
.tab_content{
	/*padding-left: 10px;*/
/*	border:2px solid red;*/
	background: #e7e7eb;
}
#box-dib li{
/*	border:1px solid #e5e5e5;*/
    width: 315px;
	background: #ffffff;
	height: 450px;
	margin: 0px 11px;
}
#o-price{
	margin-left: 15px;
}
#hot-add {
    position: relative;
    left: 180px;
    top: 0px;
    /* top: 370px; */
    width: 280px;
}

	#hot-share {
    left: -60px;
    top: 20px;
}
.hot-refund {
    display: block;
    width: 280px;
    margin-left: 15px;
    text-align: center;
    border-top: 1px solid #e5e5e5;
    margin-top: 55px;
    line-height: 30px;
}
</style>
<script type="text/javascript">
	$(document).ready(function() { 

	(function ($) { 
		$('.tab ul.tabs').addClass('active1').find('> li:eq(0)').addClass('current');
		
		$('.tab ul.tabs li a').click(function (g) { 
			var tab = $(this).closest('.tab'), 
				index = $(this).closest('li').index();
			
			tab.find('ul.tabs > li').removeClass('current');
			$(this).closest('li').addClass('current');
			
			tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
			tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
			
			g.preventDefault();
		} );
	})(jQuery);

});
</script>
<script src='/js/jquery.js'></script>

<div class="tab">
  <ul class="tabs">
    <li><a href="#">待参加的活动</a></li>
    <li><a href="#">已参加的活动</a></li>
    <li><a href="#">退款中的活动</a></li>
  </ul>
  <!-- / tabs -->
  <div class="tab_content">
    <div class="tabs_item"> 
            <div class="int-left" style="margin: -10px -20px;  " >
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
            <span class="hot-refund" >正在退款中......</span>
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
             <span class="hot-refund" >退款成功......</span>
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
             <span class="hot-refund" >正在退款中......</span>
        </li>
      </ul>
    </div> 
     
    </div>
    <!-- / tabs_item -->
    <div class="tabs_item"> 
                   <div class="int-left" style="margin: -10px -20px;  " >
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
            <span class="hot-refund" >正在退款中......</span>
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
             <span class="hot-refund" >退款成功......</span>
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
             <span class="hot-refund" >正在退款中......</span>
        </li>
      </ul>
    </div> 

    </div>
    <!-- / tabs_item -->
    <div class="tabs_item">
      <div class="int-left" style="margin: -10px -20px;  " >
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
            <span class="hot-refund" >正在退款中......</span>
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
             <span class="hot-refund" >退款成功......</span>
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
             <span class="hot-refund" >正在退款中......</span>
        </li>
      </ul>
    </div> 

    </div>
    <!-- / tabs_item -->
  </div>
  <!-- / tab_content -->
</div>

@endsection



