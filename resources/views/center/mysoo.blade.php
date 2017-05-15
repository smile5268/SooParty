@extends('center.index')

@section('classOn','surey1')

@section('right')

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
    right: -52px;
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
   font-weight: bold;float: left;
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
  float: right; margin-top: -10px;margin-right: -50px; cursor:pointer;overflow: hidden;
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
        <div class="PassR-sq">
            <div class="PassR-sqL">
                <span>
                @if($user->user_figure)
                <img src="{{$user->user_figure}}" alt="">
                @else
                 <img src="/images/ly.jpg" alt="">
                @endif
                </span>
                <div class="pas-hi">
                <p>hi,</p><p style="font-width:900px;">{{$user->name}}</p>
                    @if($user->sex==1)
                    <span><img src="{{URL('images/男.png')}}" alt=""></span>
                    @else 
                    <span><img src="{{URL('images/女.png')}}" alt=""></span>
                    @endif       
                </div>
                @if(!isset($ti))

                @else
              <!--   <div style="float: right;    margin-top: -30px;margin-right: 40px;width: 100px; cursor:pointer">
                <img src="{{URL('images/已签到.png')}}" title="每次签到+1积分"><b style="color:#c3c3c3;position: absolute;margin-top: 10px;">&nbsp;已签到</b>
                </div> -->
                @endif
                <div class="pas-about ">
                      <p>
                      @if($user->activity_classes==1)
                      <label class="user-label">商家用户</label> 
                      @else
                      <label class="user-label">个人用户</label> 
                      @endif
                        <label class="user-label2" >
                        @if( $user->integral    < 88)
                        LV0
                        @elseif( $user->integral < 313 && $user->integral >=88 )
                        LV1
                        @elseif( $user->integral < 678 && $user->integral >=313 )
                        LV2
                        @elseif( $user->integral < 1365 && $user->integral >=678 )
                        LV3
                        @elseif( $user->integral < 5698 && $user->integral >=1365 )
                        LV4
                        @elseif( $user->integral < 16458 && $user->integral >=5698 )
                        LV5
                        @elseif( $user->integral < 47257 && $user->integral >=16458 )
                        LV6
                        @elseif( $user->integral < 107449 && $user->integral >=47257 )
                        LV7
                        @elseif( $user->integral < 197914 && $user->integral >=107449)
                        LV8
                        @elseif( $user->integral >= 197914 )
                        LV9
                        @endif
                        </label> 
                      </p>
                      @if($user->text)
                      <p class="people-one" >个人简介:{{$user->text}}</p>
                      @else
                      <p >个人简介：&nbsp;这人很懒，什么也没留下</p>
                      @endif
                </div>  
            </div>

            <div class="PassR-sqR">

              <div class="pas-btn" >
                @if(!isset($ti))
                 <div id="dv" onclick="dv()"  >
                      <a href="{{URL('center/signin')}}"><img src="{{URL('images/签到.png')}}" title="每次签到+1积分"><!-- <b>&nbsp;签到</b> --></a>
                  </div> 
                @else
                  <div class="sign" >
                  <img src="{{URL('images/已签到.png')}}" title="每次签到+1积分">
                  </div> 
                @endif
                  <P>关注 :&nbsp;&nbsp;<span style="color:#ff006c" >{{$ention}}</span></P> 
              </div>
                  <div class="pas-release" >
                    <p>发布活动:
                     @if(isset($num))
                      <span>{{$num}}</span>
                     @else 
                     <span>0</span>
                     @endif
                    </p>
                     <p class="pas-join">参与活动: <span>1</span></p>
                </div> 
            </div>
        </div>
        <div class="pas-tabs" >

  <div id="content">
   
     <div class="tab">
  <ul class="tabs">
    <li><a href="#">我参加的活动</a></li>
    <!-- <li><a href="#">退款中的活动</a></li> -->
  </ul>
  <!-- / tabs -->
  <div class="tab_content">
    <div class="tabs_item"> 
       @foreach($personal as $val)
              <div class="int-left">
                  <dl>
                     <dd class="int-order" >
                        <span class="o-order" >订单号:{{$val->serial}}#{{$val->id}}</span>
                        <span class="o-refund" ></span> 

                  </dd>
                  <dt><a href="{{ URL('list/details') }}?id={{ $val->actiId }}">
                  <img src="{{$val->thumbnail}}" alt=""></a></dt>
                   <dd >
                      <p class="o-title" ><a href="{{ URL('list/details') }}?id={{ $val->actiId }}">{{$val->activity_name}}</a><p>
                  </dd>
                  <dd>
                    <p class="o-prize1" >奖品：<b class="o-num">哈哈</b><p>
                  </dd>

                   <dd class="o-money" >
                     <p class="o-font" >数量：<b class="o-num">{{$val->state}}</b></p>
                     <p class="o-pic" >单价：<b class="o-num">{{$val->money}}</b></p>     
                   </dd>
                  <dd class="o-detail" >
                    <span class="o-day"  >{{$val->activity_start_time}}</span>
                    <span class="o-place" >{{$val->province}}|{{$val->city}}</span>
                    <span class="money-total" >总计：<b >￥{{($val->money)*($val->state)}}</b></span>
                  </dd>
               
               </dl>

              </div>
       @endforeach
    </div>
    <!-- / tabs_item -->
    <div class="tabs_item">
     @if(isset($refund))
        @foreach($refund as $val)
        <div class="int-left">
              <dl>
                  <dt><a href="../Assembly_user/detail.html"><img src="{{$val->thumbnail}}" alt=""></a></dt>
                  <dd> 
                 <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">{{$val->activity_name}}</a>
                  </dd>
                      <dd>
                       <span class="o-day"  >{{$val->activity_start_time}}</span>
                  </dd>
                   <dd>
                       <span class="o-place" >{{$val->province}}|{{$val->city}}</span>
                  </dd>
                  <dd >
                     <span class="o-font" >数量：<b class="o-num">{{$val->state}}</b></span>
                     <span class="o-font" >金额：<b class="o-num">{{$val->money}}</b></span>     

                  </dd>
                
                  <dd>
                        <span class="o-order" >订单号：{{$val->serial}}</span>
                  </dd>
              </dl>
              </div>
          @endforeach
      @else
      @endif
    </div>

  </div>

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
})()
</script>


@endsection