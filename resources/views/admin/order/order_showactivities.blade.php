@extends('layouts.style')

@section('title',"$details->activity_name")

@section('header')
   	@include('layouts.header')
@endsection

@section('content')

<!-- 弹出框 -->
<link rel="stylesheet" type="text/css" href="{{URL('alert/sweetalert.css')}}" />
<script src="{{ URL('alert/sweetalert.min.js') }}" type="text/javascript"></script>
<!-- 活动详情 -->
<div class="event-hd">
	<div class="w1200">
		<ul>
			<li><a href="" class="tt02 event-hd-on">活动详情</a></li>
		</ul>
	</div>
</div>
<!-- 广告 -->
<style type="text/css">
.focus{width:940px;height:433px;overflow:hidden;position:relative;
}
.focus ul{ width:940px; height:433px;position:absolute;
}
.focus ul li{float:left;width:940px;height:433px;overflow:hidden;position:relative;
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
#pack-desc {
	z-index: 12;
    position: relative;
    width: 260px;
    height: 120px;
    line-height: 30px;
    background: #ffffff;
    border: 1px solid #e5e5e5;
    box-shadow: 0 0 5px 5px #eeeeee;
    text-align: center;
	float: left;
	display: none;
	overflow: hidden;
    top:-100px;
}

.bb{
	background-color:#0066cc;color:#ffffff;
}
.join-num{
	float: right;border: 1px solid red;
}
.acti-join{
	float: right;margin-top: -48px;margin-right: 30px; 
	cursor:pointer;
}

.join-people {
    position: absolute;
    width: 100px;
    z-index: 100;
    height: 56px;
    line-height: 26px;
    background: #ffffff;
    border: 1px solid #e5e5e5;
    text-align: center;
    filter: Alpha(opacity=80);
    float: right;
    left: 272px;
    bottom: 16px;
    box-shadow:0 0 5px 5px #eeeeee;
    display: none; 
}
.join-man{
  color: #80d6f1;
}
.join-women{
  color: #ff0397;
}
.people-limit {
    width: 200px;
    display: block;
    float: left;
    color: #666;
    font-weight: bold;
    position: absolute;
    top: 118px;
    /*border: 1px solid red;*/
}
	.acti-right-shop{
		margin-bottom: 20px;
	}
	.company_log{
		width: 120px;
		height: 120px;
	}

</style>
<!-- 内容 -->
<div class="w1200 acti" id="list-acti">
	<div class="acti-left">
		<div class="acti-banner">
			<div id="focus" class="focus">
	          <ul>
              @foreach($img as $val)
			  <li><img src="{{$val->address}}" alt="" style="width:2820px;height:434px;"/></li>
			  @endforeach
		    </ul>
			</div>
		
		</div>

<!-- 轮播 -->
<script type="text/javascript" src="{{ URL('js/jquery-1.11.2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL('js/Tony_Tab.js') }}"></script>
<script type="text/javascript">
$(function() {
	$('#focus').slideFocus();
     
     $('.acti-join').mousemove(function(){
	
	$('.join-people').show('slow');
});
     $('.acti-join').mouseout(function(){
       $('.join-people').hide();
  });

});

// $(document).ready(function(){
//   $(document).mousemove(function(e){
//     $("span").text(e.pageX + ", " + e.pageY);
//   });
// });
</script>

<!-- 加减 -->
<script src="{{ URL('js/add.js') }}"></script>
	<!-- 活动信息选择 -->
	<div class="acti-shop" >
		<div class="acti-shop-l">
			<h1>{{ $details->activity_name }}</h1>
			
			<div class="acti-shop-prize">
				<p>奖品：</p>
				<div>
					<a href="">{{$details->prize_name}}</a>
				</div>

			</div>
           <!-- <div class="join-num" > -->
              <div class="acti-join"  > 已参与：0000
                <div class="join-people">
                <p class="join-man">♂：2501</p>
                <p class="join-women" >♀：2501</p>
              </div> 
             </div>  
             <div class="people-limit">
             	人数上限：{{$full}}
             </div>
			<div class="acti-shop-time">
				<p class="fl time">{{substr($details->activity_start_time,0,10)}}</p>
				<p class="fr">{{$details->province}} | {{$details->city}}</p>
			</div>
		</div>
		<div class="acti-shop-r">
			@if($cost == 1)
			<div class="acti-shop-price"><p><small>¥</small><label ></label> </p></div>
             <div class="acti-shop-package">
				<p>套餐：</p>
				@foreach($PackSelect as $pack)

				<input type="hidden" id='PacCost' name="PacCost"  value="{{ $pack->cost }}" checked="checked" >
				<span class="on-click " id="cc" name="{{ $pack->id }}">套餐 </span>
				<input type="hidden" id='PacDes' name="PacDes" value="{{ $pack->describe }}">
				@endforeach

			</div>
			@else
			<div class="acti-shop-price"><p><small>¥</small> {{ $PackSelect }}</p></div>
             <div class="acti-shop-package">
				<p></p>
			</div>
			@endif 
			<div class="acti-shop-num">
				<p>数量：</p>
				<label style="width: 88px ;">
				<input id="min1" name=""  style=" width:22px; height:22px; " type="button" value="-" border="none"  />
				<input id="text_box1" type="text" value="1" style="text-align:center;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"  />
				<input id="add1" name="" style=" width:22px; height:22px;" type="button" value="+" border="none"/>
				 <!-- <p>(名额还剩99999个)</p>  -->
			</div>
				<!-- <div style="width: 250px;float: right;margin-top: -54px;">
                 报名人数上限：{{$full}}
				</div> -->
				 <div class="acti-shop-tran"></div>		
				<div class="acti-shop-vote">		
                    <a href="" class="acti-shop-payy" >立即付款</a>
                     <div class="demo_1">
                       <a class="acti-shop-vote1" onclick="shooping()" >+购物车</a> 
                      <!-- <button>+购物车</button> -->
                      <!-- <button class="acti-shop-vote1" type="button" >提交认证</button>  -->
                      </div>
					<!-- <a class="acti-shop-vote1" onclick="shooping()">+购物车</a> -->
					<a class="acti-shop-vote2" onclick="attend()">收藏</a>
					<div class="bdsharebuttonbox" id="bdsharebuttonbox" data-tag="share_1">
					<a class="bds_more" id="bds_more" data-cmd="more" style="margin-top:12px; /*background: url(../images/fenxiang.png) no-repeat 0px ;*/color:#000;background: #ffffff "> 分享</a>
					</div>
					<script>
						// 分享使用的是百度分享，详细文档地址 http://share.baidu.com/code/advance
						window._bd_share_config = {
							common : {
								bdDesc:'搜派对',
								bdText:'小伙伴们，快来搜派对一起SooParty吧O(∩_∩)O~~',
								bdUrl:"http://www.beiyetech.com/",
								bdPic:"http://www.beiyetech.com/img/banner_lv.png",			
							},
							share : [
								{
									'tag':'share_1',
									'bdSize':16,		
								}
							],
							image : [
								//此处放置图片分享设置
								{
									"tag" : "img_1",
									viewType : 'list',
									viewPos : 'top',
									viewColor : 'black',
									viewSize : '16',
									viewList : ['qzone','tsina','huaban','tqq','renren']
								}
							],
							
						}
						//以下为js加载部分
						with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
					</script>

				</div>
			    <div id="pack-desc">
					<p>套餐描述:包吃包住</p>
               
				</div> 
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
			     // alert(money);
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

		<!-- 详情区 -->
		<div class="acti-cont" id="list-acti" >
			<div class="row" id="main">
			  <span id="index_1"><b></b><p>活动简介</p></span>
			  {!!$details->activity_details!!}
			</div>		
		</div>
	</div>
	
</script>
 <!-- 右边 -->
   <div class="acti-right">
    <div class="acti-right-shop">
            @if($activity_classes==1)
			<span class="acti-right-shop-tit">Sooparty </span>
			
			<a href="{{URL('center/companydetail')}}" class="acti-right-shop-logo">       <!-- {{URL('images/shop-logo.png')}}  --> 
			<img src="{{$Comselect->company_log}}" alt="" class="company_log" >
			</a>
			<h1>{{$name}}</h1>
			<p class="acti-right-shop-add"><span>{{substr($Comselect->company_introduction,0,59)."..." or ''}}</span></p>
			
			@else
			<span class="acti-right-shop-tit">Sooparty </span>
			
			<a href="" class="acti-right-shop-logo">       <!-- {{URL('images/shop-logo.png')}}  --> 
			<img src="{{URL('images/shop-logo.png')}}" alt="" class="company_log" >
			</a>
			<h1>{{$name}}</h1>
			<p class="acti-right-shop-add"><span>{{$Comselect}}</span></p>
			@endif
			<!-- <div class="evaluate">
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
			</div> -->
			<!-- <div class="acti-right-shop-cont dib-box">
				<a href="" class="dib">联系商家</a>
				<a href="javascript:;" class="dib" style="margin: 26px 20px 0 20px">|</a>
				<a href="" class="dib">收藏店铺</a>
			</div> -->
			
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
<script type="text/javascript" src="{{URL('js/jQuery-jcFrame.js')}}"></script>


<script type="text/javascript">
// 加入购物车
function shooping(){
    //alert(1);
    // 套餐ID 
	var onluId = $('.onlyId').attr('name');
	// alert(onluId);
	var box1 = $('#text_box1').val();	// 数量
	var id = {{ $details->id }};		// 活动ID
	// alert(id);
	$.ajax({
		'url':"{{ URL('list/shopping') }}",
		'type':'post',
		'data':{'id':id,'number':box1,'_token':"{{ csrf_token() }}",'pack':onluId},
		"dataType":"json",
		"success":function(data){
			var datval = data.attend;
			// $('#dia-tishi').text(datval);
			 swal("Good!",datval,"success");
			// $("#dialog1").fadeIn('slow'); 
		}
	});
}

// 收藏
function attend(){
	var id = {{ $details->id }};
	// swal({confirmButtonColor:"#0066cc",};
	$.ajax({
		'url':"{{ URL('list/attend') }}",
		'type':'post',
		'data':{'id':id,'_token':"{{ csrf_token() }}"},
		"dataType":"json",
		"success":function(data){
			var datval = data.attend;
			 swal(datval);
			
			// $('#dia-tishi').text(datval);
			// $("#dialog1").fadeIn('slow');   
		}
	});
}

</script>
<script>
$(function(){
     $(".demo_1 button").click(function(){
          alert(111);
           swal("恭喜你认证成功!");
                });
    $(".demo_2 button").click(function(){
        swal("Good!", "弹出了一个操作成功的提示框", "success");
    });
    $(".demo_3 button").click(function(){
        swal("OMG!", "弹出了一个错误提示框", "error");
    });
    $(".demo_4 button").click(function(){
         swal({
            title: "您确定要删除吗？", 
            text: "您确定要删除这条数据？", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "是的，我要删除",
            confirmButtonColor: "#ec6c62"
            }, function() {
                $.ajax({
                    url: "do.php",
                    type: "DELETE"
                }).done(function(data) {
                    swal("操作成功!", "已成功删除数据！", "success");
                }).error(function(data) {
                    swal("OMG", "删除操作失败了!", "error");
                });
            });
    });
    
    $(".demo_5 button").click(function(){
        swal({   
            title: "Good!",   
            text: '自定义<span style="color:red">图片</span>、<a href="#">HTML内容</a>。<br/>5秒后自动关闭。',   
            imageUrl: "images/thumbs-up.jpg",
            html: true,
            timer: 5000,   
            showConfirmButton: false
        });
    });
    
    $(".demo_6 button").click(function(){
        swal({   
            title: "输入框来了",   
            text: "这里可以输入并确认:",   
            type: "input",   
            showCancelButton: true,   
            closeOnConfirm: false,   
            animation: "slide-from-top",   
            inputPlaceholder: "填点东西到这里面吧" 
        }, function(inputValue){   
            if (inputValue === false) return false;      
            if (inputValue === "") {     
                swal.showInputError("请输入!");     
                return false   
            }      
            swal("棒极了!", "您填写的是: " + inputValue, "success"); 
        });
    });
});
</script>
@endsection

@section('bottom')
   	@include('layouts.bottom')
@endsection