@extends('layouts.style')

@section('title', '活动预览')

@section('header')
   	@include('layouts.header')
@endsection

@section('content')
<style>
.focus{width:940px;height:433px;overflow:hidden;position:relative;
}
.focus ul{ width:940px; height:433px;position:absolute;
}
.focus ul li{float:left;width:940px;height:433px;overflow:hidden;position:relative;/*background:#000;*/
}
.focus ul li a img{height: 433px;width:940px; 
}
.focus ul li div{position:absolute;overflow:hidden;}
.focus .btn{position:absolute;width:500px;height:10px;padding:5px 10px;right:0;bottom:10px;text-align:center;margin-right: 230px;
}
.focus .btn span{display:inline-block;_display:inline;_zoom:1;width:13px;height:13px;_font-size:0;margin-left:5px;cursor:pointer;background:#fff;border-radius:50%;}
.focus .btn span.on{background:yellow;
}
.focus .preNext{width:45px;height:100px;position:absolute;top:150px;background:url(../activity/sprite.png) no-repeat 0 0;cursor:pointer;display:none;
}
.focus .pre{left:0;}
.focus .next{right:0;background-position:right top;}
</style>
<!-- 内容 -->
<div class="w1200 acti">
	<div class="acti-left">

		<div class="acti-banner">
			<div id="focus" class="focus">
	         	<ul>
		             @if(!$imgUrl)
		             	<li><img src="/images/bg.png" alt="" style="width:940px;height:434px;overflow: hidden "/></li>
		             @else
			             @foreach($imgUrl as $val)
							<li><img src="{{ $val }}" alt="" style="width:940px;height:434px;overflow: hidden "/></li>
						 @endforeach
					 @endif
		    	</ul>
			</div>
		</div>

	<!-- 轮播 -->
<script type="text/javascript" src="{{ URL('js/jquery-1.11.2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL('js/Tony_Tab.js') }}"></script>
<script type="text/javascript">
$(function() {
	$('#focus').slideFocus();
});

</script>

<!-- 加减 -->
<script src="{{ URL('js/add.js') }}"></script>
		<!-- 活动信息选择 -->
		<div class="acti-shop">
		    <div class="acti-shop-l">
		    @if($data['acti_title'])
				<h1>{{$data['acti_title']}}</h1>
			@else 
                <h1>这是活动标题栏</h1>
            @endif
				<div class="acti-shop-prize">

					<p>奖品：</p>
					@if($data['acti_prize'])
					<div>
						<a href="">{{$data['acti_prize']}}</a>
					</div>
					@else 
                       <div>无</div>
					@endif
				</div>
				<!-- <div class="acti-shop-time">
					<p class="fl">$data['time']}}</p>
					<p class="fr">$data['province']}} | $data['city']}} | $data['area']}}</p>
				</div> -->
			</div>
			
			<div class="acti-shop-r">
			@if(isset($data['change']))	
				@if($data['change'] == 1)
					<div class="acti-shop-price">
						<p>
						   <small>¥</small>				   
						   <label >100.00</label>
					    </p>
					</div>
	                 <div class="acti-shop-package">
						<p>套餐：</p>			
							<span class="on-click " id="cc" name="">套餐 </span>
							<span class="on-click " id="cc" name="">套餐 </span>
							<span class="on-click " id="cc" name="">套餐 </span>
					</div>			
				@else
					<div class="acti-shop-price">
					<p>
					   <small>¥</small>				   
					   <label >免费</label>
				    </p>
					</div>
	                 <div class="acti-shop-package">
						<p>套餐：</p>			
							<span class="on-click " id="cc" name="">套餐 </span>
					</div>
				@endif
			@else
				<div class="acti-shop-price">
					<p>
					   <small>¥</small>				   
					   <label >免费</label>
				    </p>
					</div>
	                 <div class="acti-shop-package">
						<p>套餐：</p>			
							<span class="on-click " id="cc" name="">套餐 </span>
					</div>
			@endif
			
				<div class="acti-shop-num">

					<p>数量：</p>
					<label style="width: 88px ;">
					<input id="min1" name=""  style=" width:22px; height:22px; " type="button" value="-" border="none"  />
					<input id="text_box1" type="text" value="1" style="text-align:center;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"  />
					<input id="add1" name="" style=" width:22px; height:22px;" type="button" value="+" border="none"/>
					<!--  <p>(名额还剩99999个)</p>  -->
				</div>
				 <div class="acti-shop-tran"></div>		
				<div class="acti-shop-vote">
		
                    <a  class="acti-shop-payy" >立即付款</a>

					<a class="acti-shop-vote1">+购物车</a>

					<a class="acti-shop-vote2" >收藏</a>

					<div class="bdsharebuttonbox" id="bdsharebuttonbox" data-tag="share_1">
						<a class="bds_more"  id="bds_more" style="margin-top:12px; background: url(../images/分享1.png) no-repeat 0px ;color:#ccc; "> 分享</a>
					</div>

				</div>
			    <!-- <div id="pack-desc">
					<p>套餐描述</p>             
			    </div>  -->
<script type="text/javascript">
    window.onload=function(){
      
       var ss=$('#PacCost').val();
       // alert(ss);
         //默认选中套餐1
        $('.acti-shop-price label').html(ss).select(); //默认选中
    	$('.on-click').first().css({"background-color":"#0066cc","color":"#ffffff"}).siblings().css({"background-color":"#ffffff","color":"black"});
    	$('.on-click').first().addClass('onlyId'); // 给一个唯一class

    };     
         //点击套餐选择价格
         $('.on-click').click(function(){

         		  var packageId = $(this).attr('name');  // 获取当前套餐ID
                  var rem=$('.onlyId').removeClass('onlyId');
                  var zz=$(this).addClass('onlyId');

                 var forstt = $(this).attr('class');

			     var money=$(this).prev('#PacCost').val();  
			     $('.acti-shop-price label').html(money); 
                 $(this).first().css({"background-color":"#0066cc","color":"#ffffff"}).siblings().css({"background-color":"#ffffff","color":"black"});
               // $(this).first().addClass("bb").siblings().removeClass("bb");
         });

         //鼠标悬浮显示套餐描述
         $(".on-click").hover(function(){   
                     var desc=$(this).next('#PacDes').val();  //描述内容
                     $('#pack-desc p').html(desc);
                       $("#pack-desc").show();
                          
                      },function(){
                               $("#pack-desc").hide();
                });    
</script>
					
			</div>
		</div>
		<div id="dialog1">
    <div >
      <input type="button" name="" class="cancel" >
        <p class="dia-prom" >提示框</p>
    </div>
    <div class="dia-content" >
    	 <p id="dia-tishi" ></p>
     <!--     <p class="dia-can">
           <input type="button" name="" class="order-look" value="确定" >
           <input type="button" name="" class="order-look" value="取消" >
           
        </p> -->
    </div> 
 </div>

		<!-- 详情区 -->
		<div class="acti-cont">
			<div class="row" id="main">
			  <span id="index_1"><b></b><p>活动简介</p></span>
			   @if($content)
			   {!! $content !!}
			   @else 
			   @endif
			</div>		
		</div>
	</div>
	

<style type="text/css">
	.acti-right-shop{
		margin-bottom: 20px;
	}
	.company_log{
		width: 120px;
		height: 120px;
	}
</style>

</script>
 <!-- 右边 -->
   <div class="acti-right">
    <div class="acti-right-shop">
           
			<span class="acti-right-shop-tit">Sooparty </span>
			
			<!-- <a href="{{URL('center/companydetail')}}" class="acti-right-shop-logo">       <!-- {{URL('images/shop-logo.png')}}  --> 
			<img src="{{URL('images/shop-logo.png')}}" alt="" class="acti-right-shop-logo" >
			</a>
			<h1>这是自己的用户名</h1>
			<p class="acti-right-shop-add"><b>简介：</b><span>自己资料里的简介</span></p>
			
			
			
			
			
			<div class="evaluate">
				<div>
					<p>店铺评价：</p>
					<span></span>
					<h6>5.0分</h6>
				</div>
				<ul class="dib-box evaluate1">
					<li class="dib">服务</li>
					<p class="dib">|</p>
					<li class="dib">服务</li>
					<p class="dib">|</p>
					<li class="dib">服务</li>
				</ul>
				<ul class="dib-box evaluate4">
					<li class="dib">5.0</li>
					<p class="dib">|</p>
					<li class="dib">5.0</li>
					<p class="dib">|</p>
					<li class="dib">5.0</li>
				</ul>
			</div>
			
			<!-- <div class="acti-right-shop-cont dib-box">
				<a href="" class="dib">联系商家</a>
				<a href="javascript:;" class="dib" style="margin: 26px 20px 0 20px">|</a>
				<a href="" class="dib">收藏店铺</a>
			</div> -->
			<div class="acti-right-shop-aut">搜派对认证企业</div>
		</div>

  </div>
</div>



<style type="text/css">
	.acti-right-shop{
		margin-bottom: 20px;
	}
  #dia-tishi{
  	text-align: center;
 	margin: 10px auto;
 }
 #dialog1{
    background-color: #ffffff;
    width: 320px;
    height: 105px;
    margin : 10px auto;
 	position: absolute;
 
 	left: 520px;
 	display: none; 
 
 	border:1px solid #e5e5e5;
 	/*box-shadow:0 0 5px 5px #cccccc;*/
 	border-radius: 10px;
 }

 .dia-prom{
 	width: 315px;
 	font-size: 16px;
 	font-weight: bold;
 	margin: 10px auto;	text-align: center;
   border-bottom: 2px solid #0066cc;
 	/*border:1px solid red;*/
 }
.dia-can{
	margin-top: 65px;
	margin-left: 30px;
}

.order-su{
    font-size: 24px;
     color: #0066cc;
}
	.cancel {
    width: 38px;
    height: 37px;
    border: 0;
    background: url('/images/删除.png') no-repeat 15px 0px;
    float: right;
    /* margin: 10px; */
}

.order-look {
    float: left;
    width: 80px;
    height: 30px;
    line-height: 30px;
    margin-left: 35px;
    background: #ccc;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    border:none;
}
.order-look:hover{
    background: #0066cc;
    color: #ffffff;
}
.acti-join{float: right;margin-top: -60px;margin-right: 10px;   } 
         .acti-join2{float: right;position: relative;top: 88px;
    /*   border: 5px solid pink;*/
        } 
        .acti-join2 p{
          text-align: right;
        }
        .man{
          color: #80d6f1;margin-left: 30px;
        }
        .women{
          color: #ff0397;float: right;
        }

</style>
@endsection

@section('bottom')
   	@include('layouts.bottom')
@endsection