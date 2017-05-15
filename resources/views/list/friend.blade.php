@extends('layouts.style')

@section('title', '某某的主页')

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
      <li><a href="" class="tt02 event-hd-on">个人主页</a></li>
    </ul>
  </div>
</div>

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

    font-size: 14px;
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
    top: 54px;
    right:40px;
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
.Passrs{width: 1200px;margin: auto;margin-top: 20px;}
.Passrs .PassR-sqq{height: 158px;border: 1px solid #EEE;background: #fff;}
.tab{
  
    margin-bottom:20px;
    position:relative;overflow:hidden;
    /*background:#fff;*/
    width:1200px;
  }
.tabs{display:table;position:relative;overflow:hidden;margin:0;width:100%; height: 50px;
}
.tabs li{float:left;line-height:50px;overflow:hidden;padding:0;position:relative;}
.tabs a{
 
  border-bottom:1px solid #fff;color:#888;font-weight:500;display:block;letter-spacing:0;outline:none;padding:0 20px;text-decoration:none;-webkit-transition:all 0.2s ease-in-out;-moz-transition:all 0.2s ease-in-out;transition:all 0.2s ease-in-out;border-bottom:2px solid #0164bf;
}
.tabs_item{display:none;padding:30px 0;}
.tabs_item:first-child{display:block;}
.current a{
  color:#fff;
  background:#0164bf;
}
.active1{
  background: #ffffff;*/
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

    width: 1200px;
    /*height: 210px;*/ 
    margin-top: -10px;
    margin-bottom: 20px;
}
.int-left dl{

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
    width:260px;
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
  float: right; margin-top: -10px;margin-right: -50px; cursor:pointer
}

.PassR-sqR{width:240px; height: 92px; margin: auto; text-align: center;margin-left: 110px;margin-top: 30px; float: right;}
.PassR-sqR ul {margin: 9px 0;}
.PassR-sqR > div{width: 240px; height: 15px; margin:auto; padding-top: 8px;color: #666666;}
.PassR-sqR div > p{float: right; text-align: left; height: 15px; line-height: 15px;padding-left: 15px;}
.PassR-sqR div > span{float: left; background: url(../images/evaluate1.png) no-repeat center; width: 96px; height: 15px;}
.PassR-sqR div > h6{float: left; height: 15px; color: #0066cc; padding-left: 5px;}
.PassR-sqR ul li{margin: 0 8px; font-size: 12px;color: #666666;}


/*这是内容列表块*/
.activity{width: 288px ;height:328px;float: left;background: #fff;margin:6px;font-size: 12px;}
.activity a{color:#000;}
.activity img{width: 296px;height: 170px;}
.activity .activity_name{height: 40px;line-height: 40px;margin-left: 10px;}
.activity .activity_name span{font-size: 16px;font-family: "微软雅黑";width: 280px;}
.activity .activity_prize span{font-size: 16px;font-family: "微软雅黑";margin-left:10px; margin-top: 10px;position: absolute;}
.activity .activity_price{position: absolute;margin-top: 42px;margin-left: 10px;}
.activity .activity_price b{color:#0164bf;font-size: 20px;}
.activity .activity_address{position:absolute;margin-top: 82px;width:288px;}
.activity .activity_address span{margin-left: 10px;}
.activity .activity_address .acti-right-ad{height: 100%;line-height: 43px;padding-left: 22px;font-size: 12px;color: #999;}
.activity .activity_buttom{margin-top: 116px;height: 30px;line-height: 30px;}
.activity .activity_buttom .ph{line-height: 32px;}
.ph span{
  margin-left: 6px;
}
.activity .activity_buttom .ph p{width: 20px;height: 20px;background: #0164bf;border-radius: 100%;float: left;margin-top: 6px;margin-left: 10px;color:#fff;text-align: center;line-height: 20px;}
.activity .activity_buttom .activity_time{float: right;margin-top: -50px;}
.activity .activity_buttom .activity_time span{color: #999;margin-top: -30px;width: 82px;}
.activity .activity_buttom .activity_time span.hot-time{    background: url(../images/cont.png) no-repeat 0 8px;padding-left: 16px;position: relative; float: right;}
               
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
 <div class="Passrs">

   
        <div class="PassR-sqq">
            <div class="PassR-sqL">

                <span> 
                    @if($userResult->user_figure==null)
                    <img src="/images/ly.jpg" alt="">
                    @else 
                     <img src="{{$userResult->user_figure}}" alt="">
                    @endif
                </span>   

                <div class="pas-hi">
                <p>hi,</p><p style="font-width:900px;">{{$userResult->name}}</p>
                    <span>
                    @if($userResult->sex==2)
                    <img src="/images/女.png" alt="">
                    @else
                    <img src="/images/男.png" alt="">                   
                    @endif
                    </span>
                </div>

                <div class="pas-about ">
                      <p>
                      @if($userResult->activity_classes == 1)
                      <label class="user-label">商家用户</label> 
                      @else 
                      <label class="user-label">个人用户</label>
                      @endif
                      <label class="user-label2" >
                        @if( $userResult->integral    < 88)
                        LV0
                        @elseif( $userResult->integral < 313 && $userResult->integral >=88 )
                        LV1
                        @elseif( $userResult->integral < 678 && $userResult->integral >=313 )
                        LV2
                        @elseif( $userResult->integral < 1365 && $userResult->integral >=678 )
                        LV3
                        @elseif( $userResult->integral < 5698 && $userResult->integral >=1365 )
                        LV4
                        @elseif( $userResult->integral < 16458 && $userResult->integral >=5698 )
                        LV5
                        @elseif( $userResult->integral < 47257 && $userResult->integral >=16458 )
                        LV6
                        @elseif( $userResult->integral < 107449 && $userResult->integral >=47257 )
                        LV7
                        @elseif( $userResult->integral < 47257  && $userResult->integral >=107449)
                        LV8
                        @endif
                        </label> 
                      </p>
                      @if($userResult->text == null)
                      <p >个人简介：&nbsp;这人很懒，什么也没留下</p>
                      @else 
                      <p >个人简介：&nbsp;{{$userResult->text}}</p>
                      @endif
                      
                </div>  
            </div>
            <script type="text/javascript">
              $(function(){
                $('#guanzhu').click(function(){

                  //关注别人或是关注自己
                  $.ajax({ 
                        type: "POST", 
                        url: "{{URL('list/focus')}}",
                        data:{'id':'{{$userResult->id}}','_token':"{{ csrf_token()}}"}, 
                        dataType:"json", 
                        success: function (data) {
                        if(data.no){
                          $('.yiguanzhu').html("<p id='noguanzhu' style='color:#fff;width: 100px;height: 40px;line-height:40px;margin-top:-14px;border-radius:15px;background:#ccc;margin-right: 94px;text-align:center;cursor:pointer'>已关注&nbsp;&nbsp;&nbsp;</p>");
                        }else{
                          $('.yiguanzhu').html("<p class='noguanzhu' style='color:#fff;width: 100px;height: 40px;line-height:40px;margin-top:-14px;border-radius:15px;background:#ccc;margin-right: 94px;text-align:center;cursor:pointer'>已关注&nbsp;&nbsp;&nbsp;</p>");
                        }  
                       },     
                    });
                })
              })
               $(function(){
                //取消关注别人或是取消关注自己
                $('#noguanzhu').click(function(){
                  $.ajax({ 
                        type: "POST", 
                        url:"{{URL('list/nofocus')}}",
                        data:{'id':'{{$userResult->id}}','_token':"{{ csrf_token()}}"}, 
                        dataType:"json", 
                        success: function (data) {
                        if(data.no){
                          $('.yiguanzhu').html("<p id='guanzhu' style='color:#fff;width: 100px;height: 40px;line-height:40px;margin-top:-14px;border-radius:15px;background:#ff0397;margin-right: 94px;text-align:center;cursor:pointer'>+关注&nbsp;&nbsp;&nbsp;</p>");
                        }else{
                          $('.yiguanzhu').html("<p id='guanzhu' style='color:#fff;width: 100px;height: 40px;line-height:40px;margin-top:-14px;border-radius:15px;background:#ff0397;margin-right: 94px;text-align:center;cursor:pointer'>+关注&nbsp;&nbsp;&nbsp;</p>");
                        }  
                       },     
                    });
                })
              }) 
            </script>
            <div class="PassR-sqR">
              <div class="pas-btn yiguanzhu" >

              @if($attention==null)
              <P id="guanzhu" value="" style="color:#fff;width: 100px;height: 40px;line-height:40px;margin-top:-14px;border-radius:15px;background:#ff0397;margin-right: 94px;text-align:center;cursor:pointer">+关注&nbsp;&nbsp;&nbsp;</P>
              @else
              <P id="noguanzhu" style='color:#fff;width: 100px;height: 40px;line-height:40px;margin-top:-14px;border-radius:15px;background:#ccc;margin-right: 94px;text-align:center;cursor:pointer'>已关注&nbsp;&nbsp;&nbsp;</P>
              @endif
              </div>
                  <div class="pas-release" >
                    <p>发布活动:
                     <span>{{isset($countnum) ? $countnum : 0}}</span>
                    </p>
                    <p class="pas-join">参与活动: <span>1545</span></p>
                </div> 
            </div>
        </div>
        <div class="pas-tabs" >
  <div id="content">
<div class="tab">
  <ul class="tabs">
  
    <li><a href="#">他/她报名的活动</a></li>
    <li><a href="#">他/她的发布</a></li>
    <!-- <li><a href="#">他/她的留言</a></li> -->
  </ul>
  <!-- / tabs -->
  <div class="tab_content">
    <div class="tabs_item"> 

           <div class="int-left">       
            @foreach($join as $val)  
               <div class="activity">
                   <a href="{{ URL('list/details')}}?id={{$val->actId}}"><img src="{{$val->thumbnail}}"></a>
                  <div class="activity_name"><span><b>{{$val->activity_name}}</b></span></div>
                   <div class="activity_prize"><span>奖品：<b>{{$val->prize_name}}</b></span></div>
                   <div class="activity_price"><b>￥{{$val->price}}</b></div>
                   <div class="activity_address"><span class="acti-right-ad">{{$val->province}}|{{$val->city}}</span></div>
                   <div class="activity_buttom">
                     <!-- <div class="ph">
                     <p>个</p>
                     <span>某某有限公司</span> 
                     </div> -->
                     <div class="activity_time"><span class="hot-time">{{$val->activity_start_time}}</span></div>
                   </div>
               </div>           
          @endforeach
           </div> 
    </div>
    <!-- //// -->
    <div class="tabs_item"> 
       <div class="int-left">
       
       </div> 

    </div>
  </div>
</div>  
  </div>
  </div>
  </div>
     <style type="text/css">
          .activity22{border: 1px solid #ddd;width: 296px;height: 363px;float: left;}
        </style>
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

@section('bottom')
    @include('layouts.bottom')
@endsection