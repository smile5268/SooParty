@extends('center.index')

@section('classOn','surey6')

@section('right')
<!-- 弹出框 -->
<link rel="stylesheet" type="text/css" href="{{URL('alert/sweetalert.css')}}" />
<script src="{{ URL('alert/sweetalert.min.js') }}" type="text/javascript"></script>
<style type="text/css">
.pas-about p {
    width: 370px;
    height: 40px;
    line-height: 40px;
}
.pas-btn{
    float: left;
    position: relative;
    top: -10px;
    margin-bottom: 20px;
    line-height: 35px;
/*   border:2px solid red ;*/
  
}

.pas-btn button{
    border: none;
    background: #ff006c;
   border-radius: 5px;
    float: left;
    width:100px;
    height: 35px;
    line-height: 35px;
    color: #ffffff;
}
.pas-btn p {
    /* margin-left: 20px; */
    font-size: 14px;
    /* color: #ff006c; */
    position: relative;
    top: 52px;
    right: -51px;
}
.pas-shop{
   position: relative;
   top: 30px;
}
.pas-release {
    float: right;
    position: relative;
    top: 52px;
    right: -41px;
}
.pas-join{
    margin-left: 30px;
}
.user-label { 
  width:80px;
  float: left;
  font-size: 12px;
  padding-left: 8px;
  padding-top:2px;
  line-height: 22px;
  color: #ffffff;margin-top:5px;
  background: url(../images/pContL.png) no-repeat left;
}
 .user-label2 {
  margin-left:10px;
  width:80px;
  float: left;
  font-size: 12px;
  padding-left: 20px;
  line-height: 22px;
  color: #ffffff;
  background: url(../images/label.png) no-repeat left;
  margin-top:5px;
}
/*选项卡*/


/*body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";background:#eee url(mask.gif);}*/
/* tabs*/

</style>

<!-- 
<script src="/js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/lib/raphael-min.js"></script>
<script type="text/javascript" src="/js/res/chinaMapConfig.js"></script>
<script type="text/javascript" src="/js/map-min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#ChinaMap').SVGMap({
            mapWidth: 806,
            mapHeight: 396
        });
    });
</script> -->
<style type="text/css">
#content{
  margin-top: 20px;
}
  .tab{
  
    margin-bottom:20px;
    position:relative;overflow:hidden;
    background:#fff;
    width:980px;
   /* font-family:'Roboto', sans-serif;line-height:1.5;
    font-weight:300;color:#888;-webkit-font-smoothing:antialiased;*/
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
/*  border:2px solid red;*/
  background: #F1F1F1;
}
#box-dib li{
/*  border:1px solid #e5e5e5;*/
    width: 315px;
  background: #ffffff;
  height: 413px;
  margin: 0px 11px;
    margin-bottom: 10px;
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
    left: 200px;
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
.int-left{

    width: 980px;
    height: 210px;
    margin-top: -10px;
    margin-bottom: 20px;
  /*  border:1px solid red;*/
}
.int-left dl{
     width: 979px;
     height: 210px;
     background: #fff;
     margin-bottom: 20px;
    
}
.int-left dl dt{

    margin:10px 10px;
    float: left;
}
.int-left dl dt img{

  width: 270px;
  height: 150px;border:none;
}
.int-left dd{
     line-height: 28px;
   
}
.int-left dd span{
      margin-left: 13px;
}
.int-left dl dt dd{
    float: left;
}

/*.o-money{
  float: right;
  margin-right: 20px;
  margin-top: -10px;
}*/
.o-money p{
  margin-right: 20px;
  text-align: right;
}

.o-day {
    position: relative;
    /* top: -21px; */
    width: 93px;
    background: url(../images/cont.png) no-repeat 0 7px;
    padding-left: 20px;
    float: left;
    left: -13px;
}
.o-place{
 
   background: url(../images/cont.png) no-repeat 0 -34px;
   padding-left: 20px;
}
.o-order{
    width:200px;
    font-weight: bold;float: left;
    /*color: #0066cc;*/
}
.o-num{
    color: #ff006c;
}
.int-order{

  border-bottom: 2px solid #e5e5e5;
  margin: 0 10px;
}
.o-refund a {
    position: relative;
    right: 10px;
    float: right;
    color: #666666;
    margin-left: 20px;
    width:160px;
}
.money-total {
    float: right;
    margin-right: 20px;
    text-align: right;
}
.money-total b{
  color: #0066cc;
  font-size: 18px;
}
.o-title{
  font-size: 20px;
  font-weight: bold;
  color: #000;
  margin-top:10px;
}
.o-prize1{
  margin-top:10px;
}
#dv {
    float: right;
    margin-top: -10px;
    margin-right: -40px;
 
    cursor: pointer;
}
.people-one{
  margin-top: 10px;
}
.sign{
  float: right; margin-top: -10px;margin-right: -50px; cursor:pointer
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
 <div class="PassR">
       
  
    <!-- ///// -->
     <div class="tab">
  <ul class="tabs">
    <li><a href="#">订单状态</a></li>
    <li><a href="#">待参加的活动</a></li>
    <li><a href="#">已参加的活动</a></li>
     <li><a href="#">退款中的活动</a></li>
  </ul>
  <!-- 订单状态 -->
<div class="tab_content">
<div class="tabs_item">
@if($order)
    @foreach($order as $orderValue)
        <div class="int-left">
            <dl>
                <dd class="int-order" >
                    <span class="o-order" style="width:320px">订单号:{{ $orderValue->serial }}#{{ $orderValue->id }}</span>
                    <span class="o-refund" >
                        <!-- 判断是否付款 -->
                        @if($orderValue->status == 0)

                            <!-- 如果过期，就不让付款 -->
                            @if($orderValue->activity_start_time > $time)
                                <a style="color:red">未付款,点击付款</a> 
                            @else
                                <a>已过期</a> 
                            @endif

                        @elseif($orderValue->status == 1)
                            <!-- 如果退款成功就不显示已付款 -->
                            @if($orderValue->refund == 2)                  
                                <a>退款成功</a>
                            @else
                                
                                @if($orderValue->refund == 1)
                                    <a style="color:#0066CC">退款审核中</a>
                                @else
                                    <a style="color:green">已付款</a>

                                    <!-- 如果时间过期就不显示申请退款，但是有退款中时间过期了，所以审核中没有放到过期判断里 -->
                                    @if($orderValue->activity_start_time > $time)
                                        @if($orderValue->refund == 0)                     
                                            <a class='orderId' name="{{ $orderValue->id }}">申请退款</a>
                                        @endif
                                    @endif

                                @endif

                            @endif
                        @endif
                        <!-- <a style="color:green">已付款</a> -->
                    </span> 
                </dd>

                <dt>
                    <a href="{{ URL('list/details') }}?id={{ $orderValue->actId }}">
                        <!-- 默认图 -->
                        @if($orderValue->thumbnail)
                            <img src="{{ $orderValue->thumbnail }}" alt="">
                        @else
                            <img class="image" src="/images/soo.png" alt=""/>
                        @endif
                    </a>
                </dt>

                <dd>
                    <p class="o-title" >{{ $orderValue->activity_name }}<p>
                </dd>

                <dd>
                    <p class="o-prize1" >奖品：<b class="o-num">{{ $orderValue->prize_name }}</b><p>
                </dd>

                <dd class="o-money" >
                    <p class="o-font" >数量：<b class="o-num">{{ $orderValue->number }}</b></p>
                    <p class="o-pic" >单价：<b class="o-num">{{ $orderValue->price }}</b></p>     
                </dd>

                <dd class="o-detail" >
                    <span class="o-day"  >{{ $orderValue->activity_start_time }}</span>
                    <span class="o-place" >{{ $orderValue->province }} | {{ $orderValue->city }}</span>
                    <span class="money-total" >总计：<b >￥{{ $orderValue->number * $orderValue->price }}</b></span>
                </dd>
            </dl>
        </div>
    @endforeach
@endif
</div>
    
    <!-- 待参加的活动 -->
    <div class="tabs_item">
@if($wait)
    @foreach($wait as $waitValue)
        <div class="int-left">
            <dl>
                <dd class="int-order" >
                    <span class="o-order" style="width:320px">订单号:{{ $waitValue->serial }}#{{ $waitValue->id }}</span>
                    <span class="o-refund" >
                      
                    </span> 
                </dd>

                <dt>
                    <a href="{{ URL('list/details') }}?id={{ $waitValue->actId }}">
                        @if($waitValue->thumbnail)
                            <img src="{{ $waitValue->thumbnail }}" alt="">
                        @else
                            <img class="image" src="/images/soo.png" alt=""/>
                        @endif
                    </a>
                </dt>

                <dd>
                    <p class="o-title" >{{ $waitValue->activity_name }}<p>
                </dd>

                <dd>
                    <p class="o-prize1" >奖品：<b class="o-num">{{ $waitValue->prize_name }}</b><p>
                </dd>

                <dd class="o-money" >
                    <p class="o-font" >数量：<b class="o-num">{{ $waitValue->number }}</b></p>
                    <p class="o-pic" >单价：<b class="o-num">{{ $waitValue->price }}</b></p>     
                </dd>

                <dd class="o-detail" >
                    <span class="o-day"  >{{ $waitValue->activity_start_time }}</span>
                    <span class="o-place" >{{ $waitValue->province }} | {{ $waitValue->city }}</span>
                    <span class="money-total" >总计：<b>￥{{ $waitValue->number * $waitValue->price }}</b></span>
                </dd>
            </dl>
        </div>
    @endforeach
@endif
    </div>

    <!-- 已参加的活动 -->
    <div class="tabs_item">
@if($join)
    @foreach($join as $joinValue)
        <div class="int-left">
            <dl>
                <dd class="int-order" >
                    <span class="o-order" style="width:320px">订单号:{{ $joinValue->serial }}#{{ $joinValue->id }}</span>
                    <span class="o-refund" >
                      
                    </span> 
                </dd>

                <dt>
                    <a href="{{ URL('list/details') }}?id={{ $joinValue->actId }}">
                        @if($joinValue->thumbnail)
                            <img src="{{ $joinValue->thumbnail }}" alt="">
                        @else
                            <img class="image" src="/images/soo.png" alt=""/>
                        @endif
                    </a>
                </dt>

                <dd>
                    <p class="o-title" >{{ $joinValue->activity_name }}<p>
                </dd>

                <dd>
                    <p class="o-prize1" >奖品：<b class="o-num">{{ $joinValue->prize_name }}</b><p>
                </dd>

                <dd class="o-money" >
                    <p class="o-font" >数量：<b class="o-num">{{ $joinValue->number }}</b></p>
                    <p class="o-pic" >单价：<b class="o-num">{{ $joinValue->price }}</b></p>     
                </dd>

                <dd class="o-detail" >
                    <span class="o-day"  >{{ $joinValue->activity_start_time }}</span>
                    <span class="o-place" >{{ $joinValue->province }} | {{ $joinValue->city }}</span>
                    <span class="money-total" >总计：<b >￥{{ $joinValue->number * $joinValue->price }}</b></span>
                </dd>
            </dl>
        </div>
    @endforeach
@endif
    </div>

<!-- 退款的订单 -->
<div class="tabs_item">
@if($refund)
    @foreach($refund as $refundValue)
        <div class="int-left">
            <dl>
                <dd class="int-order" >
                    <span class="o-order" style="width:320px">订单号:{{ $refundValue->serial }}#{{ $refundValue->det_id }}</span>
                    <span class="o-refund" >
                        @if( $refundValue->refund_state==0 )
                           <input type="hidden" id="PacCost1" name="PacCost1" value="{{ $refundValue->det_id }}" >    
                           <a style="color:#0066CC" class="orderCancel" name="{{ $refundValue->det_id }}" value="{{ $refundValue->id }}">取消</a>
                            <a style="color:#0066CC">退款审核中</a>
                        @elseif( $refundValue->refund_state==1 )
                            <a style="color:green">退款成功</a>
                        @elseif( $refundValue->refund_state==2 )
                            <a style="color:red">退款失败</a>  
                        @elseif( $refundValue->refund_state==3 )
                            <a>退款申请已取消</a>  
                        @endif
                    </span> 
                </dd>

                <dt>
                    <a href="{{ URL('list/details') }}?id={{ $refundValue->actId }}">
                        <!-- 默认图 -->
                        @if($refundValue->thumbnail)
                            <img src="{{ $refundValue->thumbnail }}" alt="">
                        @else
                            <img class="image" src="/images/soo.png" alt=""/>
                        @endif
                    </a>
                </dt>

                <dd>
                    <p class="o-title" >{{ $refundValue->activity_name }}<p>
                </dd>

                <dd>
                    <p class="o-prize1" >奖品：<b class="o-num">{{ $refundValue->prize_name }}</b><p>
                </dd>

                <dd class="o-money" >
                    <p class="o-font" >数量：<b class="o-num">{{ $refundValue->number }}</b></p>
                    <p class="o-pic" >单价：<b class="o-num">{{ $refundValue->price }}</b></p>     
                </dd>

                <dd class="o-detail" >
                    <span class="o-day"  >{{ $refundValue->activity_start_time }}</span>
                    <span class="o-place" >{{ $refundValue->province }} | {{ $refundValue->city }}</span>
                    <span class="money-total" >总计：<b >￥{{ $refundValue->number * $refundValue->price }}</b></span>
                </dd>
            </dl>
        </div>
    @endforeach
@endif
</div>

  </div>
  <!-- / tab_content -->
</div>

  </div>
</div>  
    </div>

    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
function resetTabs(){
    $("#content > div").hide(); //隐藏所有内容
    $("#tabs a").attr("id",""); //重置“id”   
}

var myUrl = window.location.href; //取得超链地址
var myUrlTab = myUrl.substring(myUrl.indexOf("#")); 
var myUrlTabName = myUrlTab.substring(0,4);

(function(){
    $("#content > div").hide(); // 最初隐藏所有内容
    $("#tabs li:first a").attr("id","current"); // 激活第一个选项卡
    $("#content > div:first").fadeIn(); // 显示第一个选项卡的内容

    $("#tabs a").on("click",function(e) {
        e.preventDefault();
        if ($(this).attr("id") == "current"){ //检测当前选项卡
            return       
        }else{             
            resetTabs();
            $(this).attr("id","current"); // 激活这
            $($(this).attr('name')).fadeIn(); // 显示当前选项卡的内容
        }
    });

    for (i = 1; i <= $("#tabs li").length; i++) {
        if(myUrlTab == myUrlTabName + i){
            resetTabs();
            $("a[name='"+myUrlTab+"']").attr("id","current"); // 激活url选项卡
            $(myUrlTab).fadeIn(); // 显示url选项卡内容      
        }
    }
})

// 申请退款
// function orderStats(){
$('.orderId').click(function(){
    // 子订单ID
    var orderId = $(this).attr('name');
      
    $.ajax({
        type: 'POST',
        url: "{{ URL('center/refund') }}",
        data:{'orderId':orderId,'_token':"{{ csrf_token() }}"},
        dataType: 'json',
        success: function(data){
            
            if(data.ok){
            
               swal({
                  title:"Good",
                  text:data.ok,
                  type:"success",
                 showConfirmButton:true,

              },function(){

                   var  host = window.location.host;
                   window.location='http://'+host+"/center/sign";
              });
            }else if(data.not){
                swal({
                  title:"申请退款",
                  text:data.not,
                  type:"info",
                 showConfirmButton:true,

              },function(){

                   var  host = window.location.host;
                   window.location='http://'+host+"/center/binding_bank";
              });
            }


       
        },

    });

});


// 退款取消
$('.orderCancel').click(function() {
 
    // 子订单ID
    var orderCancels = $(this).attr('name');

    // 退款表ID
    var orderId = $(this).attr('value');
    
    $.ajax({
        type: 'POST',
        url: "{{ URL('center/cancel') }}",
        data:{'orderCancels':orderCancels,'orderId':orderId,'_token':"{{ csrf_token() }}"},
        dataType: 'json',
        success: function(data){
          if (data.ok) {
                  swal({
                  title:"Good",
                  text:data.ok,
                  type:"success",
                 showConfirmButton:true,

              },function(){
                   var  host = window.location.host;
                   window.location='http://'+host+"/center/sign";
              });
            
          }else if(data.not){
               swal("OMG", data.not, "error");
          }
        }
            
    });
 
});
</script>


@endsection