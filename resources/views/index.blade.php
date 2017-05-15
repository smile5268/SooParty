@extends('layouts.style')

@section('title', '搜派对－能约、能玩、能赚、能圆梦')

@section('header')
   	@include('layouts.header')
@endsection

@section('content')

<link href="{{url('/css/shake.css')}}" rel="stylesheet" media="all">

<link rel="stylesheet" href="{{url('/css/demo.css')}}" />
<link rel="stylesheet" href="{{url('/css/set2.css')}}" />

<style type="text/css"> 
        .acti-star1{
          float: right;margin-top: 25px;margin-right: -80px;
        }
          .acti-star2{
          float: right;margin-top: 15px;margin-right: -80px;
        }
         .acti-star1 input{
          background: url('images/star.png');
         }
         .can{
          font-size: 16px;
         }
         .nan{
           color: #80d6f1;font-size: 16px;
         }
         .girl{
             color: #ff0397;font-size: 16px;
         }
         .xing{

          margin-top: 10px;
         }
         .inter-join{
          position: relative;
          top: 40px;
         }

#peo{
   display: none;
}
.acti-peo1{ 
   z-index: 12;
   position: relative;
   left: 20px;
   width: 100px;
   height: 60px;line-height: 30px;
   background:#ffffff;
  border: 1px solid #e5e5e5;
   text-align: center; filter:Alpha(opacity=80);
   float: right;
   display: none;
}
.jinxuan{
   width: 1500px;
   height: 900px;
   margin-bottom: 20px;
   margin: 0px auto;
   border:2px solid red;
}
.jinxuan dl {
   position: relative;
   left: -85px;
  float: left;
  width: 290px;
  height: 350px;
  border:2px solid red;
  background: #fff;
  margin-left: 10px;
  margin-top: 10px;
}
.p-prize{
  float: left;
  color: #0164bf;
}
.p-join{
  float: right;margin-right: 20px;
}
.jin-left{
  width: 90px;
  height: auto;
}
.int-let{
    float: left;
     margin-left: 10px; 
    width: 890px;
    text-align: left;
}
.int-left{
    margin-bottom: 30px;
}
.cont-content{
  position: relative;
  left: -7px;
}

/*优秀主办方*/
.int-right{
    width:310px;
    height: 880px;
   float: left;
   margin-left: 10px;
}
  .int-right dl{
    height: 110px; 
    margin-bottom: 10px;
    position: relative;
  }
  .int-right dl dt{
    margin: 5px 5px;
  float: left;
  }
   .int-right dl dt dd{
    margin: 5px 5px;
   }
.off-jian {
    text-align: left;
    color: #b6b6b6;
    padding-right: 15px;
    margin-top: 10px;
    /*width: 200px;*/
    height: 42px;
  overflow : hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    /*border:1px solid red;*/
}
  .off-care{
      float: right;
      margin-right: 10px;
      color: #0164bf;
      border: 0;
      background: #ffffff;
  }
  .off-com{
    text-align: left;
    font-size: 16px;
    font-weight: bold;
    padding-top: 10px;
  }
  .int-right dl {
     background: #ffffff;
  }

  .acti-peo{ 
   z-index: 12;
   position: relative;
   left: 20px;
   width: 100px;
   height: 60px;line-height: 30px;  
  border: 1px solid #e5e5e5;
   text-align: center; filter:Alpha(opacity=80);
   float: right;
}
.acti-people {
    position: relative;
    z-index: 12;
    margin-right: 16px;
    text-align: center;
    filter: Alpha(opacity=80);
    background: #ffffff;
    float: right;
    width: 90px;
    height: 50px;
    opacity: 0;
    border: 1px solid #e5e5e5;
    cursor: pointer;
    margin-top: 20px
}
  .acti-people:hover{
/*    position: relative;
    z-index: 12;
    margin-right: 20px;
    text-align: center; filter:Alpha(opacity=80);
     background:#ffffff;
    float: right;
    width: 100px; margin-top: 20px;
    border:1px solid #e5e5e5;*/
    opacity: 1;
  }
.acti-join{  display: block;position: absolute;right:26px;/*margin-top: -40px;*/}
.man{   color: #80d6f1;font-weight: bold; font-size: 16px;}
.women{color: #ff0397; font-size: 16px;}
.image-com{
  width:86px;height:86px;
  margin:6px 10px 8px 6px;
}
</style>
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.slider.min.js"></script>
<script type="text/javascript">
$(document).ready(function ($) {
  $(".slider").slideshow({
    width: 1200,
    height: 400,
    transition: ['bar', 'Rain', 'square', 'squareRandom', 'explode']
  });
});
</script>

<!-- 活动 -->
<div class="event">
	<div class="w1200">
		<a href="{{ URL('list/screening/ty0_co0') }}" class="tt02 event-on">更多活动</a>
		<ul>
		</ul>
	</div>
</div>

  <div class="slider">
  @foreach($results as $val)
    <div><a href="{{$val->site }}"><img src="{{$val->photo }}" alt="" style="width:100%;height:400px;"></a></div>
  @endforeach

  </div>

<!-- 热门活动 -->
<div class="w1200 tit" id="hot-title" >
<h1>热门活动</h1>
</div>
<div class="hot">
  <div class="grid">
    <ul>
    @for($i=0;$i<$box['count'];$i++)
        <li>
            <a href="{{URL('list/details')}}?id={{$box['hot'][$i]->id}}"   class="hot-img">
            @if($box['hot'][$i]->thumbnail)

              <figure class="effect-apollo">
                      <img src="{{$box['hot'][$i]->thumbnail}}" alt="">  
                      <figcaption>   
                      </figcaption>   
             </figure>
            @else  
            <img src="/images/soo.png" alt=""/>

            @endif  
            </a> 
            
            <a href="{{URL('list/details')}}?id={{$box['hot'][$i]->id}}"  class="hot-tit ellipsis tt03">{{$box['hot'][$i]->activity_name}}</a>   
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="{{URL('list/details')}}?id={{$box['hot'][$i]->id}}"  class="ellipsis">{{$box['hot'][$i]->prize_name}}</a>
                </span>              
            </div>    
            <p class="hot-Price"><small>￥</small>{{ $box['more'][$i] }}</p>

          <div class="acti">       <!-- str_split("$box['countIndex'][$i]")   --> 
             <p class="acti-join"  > 
             已参与:   {{$box['explodeArray'][$i][0] }}</p>
                <div class="acti-people">
                <p class="man">♂：{{$box['explodeArray'][$i][1] }}</p>
                <p class="women" >♀：{{$box['explodeArray'][$i][2] }}</p>
              </div>      
           </div>
            <div class="hot-add">
                <span class="hot-time">{{substr_replace($box['hot'][$i]->activity_start_time,'',10,10 )}}</span>
                <span class="hot-ad">{{$box['hot'][$i]->city}}|{{$box['hot'][$i]->area}}</span>
            </div>
           
            <a href="#" class="hot-shop">
                <!-- <span></span> -->
                @if(($box['hot'][$i]->activity_classes)==1)
                <span>企</span>  
                <p style="margin-top:77px;" >{{$box['hot'][$i]->name}}</p>
                @else
                <span>个</span>
                 <p>{{$box['hot'][$i]->name}}</p> 
                @endif   
            </a> 
        </li>

        @endfor
    </ul>
  </div>
</div>

<!-- 广告-->
@if( $chain1 != null)
<a href="{{$chain1->siteed}}" target="_black"  class="w1200 cont-banner"><img src="{{$chain1->photoed}}" alt="" style="width:100%;height:206px"></a>
@else 
@endif
<!-- 夺宝活动 -->
<div class="w1200 tit">
    <h1>有奖活动推荐</h1>
</div>
<div class="hot">
    <ul>
      @for($i=0;$i<$hear['countti'];$i++)
        <li>
            <a href="{{URL('list/details')}}?id={{$hear['yjhd'][$i]->id}}"   class="hot-img">

            @if($hear['yjhd'][$i]->thumbnail)

            <img class="shake shake-slow" src="{{$hear['yjhd'][$i]->thumbnail}}" alt="musica_byern"  style="width:390px;height:240px;">

            @else
            <img class="shake shake-slow" src="/images/soo.png" alt="musica_byern"/>
            @endif
            </a>
            <a href="{{URL('list/details')}}?id={{$hear['yjhd'][$i]->id}}"  class="hot-tit ellipsis tt03">{{$hear['yjhd'][$i]->activity_name}}</a>
   
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="{{URL('list/details')}}?id={{$hear['yjhd'][$i]->id}}"  class="ellipsis">{{$hear['yjhd'][$i]->prize_name}}</a>
                </span>              
            </div>    
            <p class="hot-Price"><small>￥</small>{{ $hear['moreti'][$i] }}</p>
            <div class="acti" >
              <p class="acti-join"  > 已参与： {{$hear['explodeArrayy'][$i][0] }}</p>
                <div class="acti-people">
                <p class="man">♂：{{$hear['explodeArrayy'][$i][1] }}</p>
                <p class="women" >♀：{{$hear['explodeArrayy'][$i][2] }}</p>
              </div> 
             </div>
            <div class="hot-add">
                <span class="hot-time">{{substr_replace($hear['yjhd'][$i]->activity_start_time,'',10,10 )}}</span>
                <span class="hot-ad">{{$hear['yjhd'][$i]->city}} |{{$hear['yjhd'][$i]->area}}</span>
            </div>
            <a href="#" class="hot-shop">
                @if(($hear['yjhd'][$i]->activity_classes)==1)
                <span>企</span>  
                <p>{{$hear['yjhd'][$i]->name}}</p>
                @else
                <span>个</span>
                 <p>{{$hear['yjhd'][$i]->name}}</p> 
                @endif     

            </a> 
        </li>
     @endfor
    </ul>
</div>

<!-- 广告 -->
@if( $chain2 != null)
<a href="{{$chain2->siteed}}" target="_black"  class="w1200 cont-banner"><img src="{{$chain2->photoed}}" alt="" style="width:100%;height:206px"></a>
@else 
@endif
<!-- 夺宝活动 -->
<div class="cont-content">
 <div class="interest">
    <div class="jin-title">
    <h1 >精选活动推荐</h1>
        <div class="jin-title2">
    <h1 >优质主办方</h1>
   </div> 
</div>
    <div class="int-let">
          <div class="int-left">
     <ul class="dib-box">

      @for($i=0;$i<$bottom['counted'];$i++)
        <li class="dib">
            <span>
            <a href="{{URL('list/details')}}?id={{$bottom['juhd'][$i]->id}}">
            @if($bottom['juhd'][$i]->thumbnail)
            <img class="image" src="{{$bottom['juhd'][$i]->thumbnail}}" alt=""   style="width:282px;height:168px;">
            @else
            <img class="image" src="/images/soo.png" alt=""/>
            @endif
            </a></span>
            <a href="{{URL('list/details')}}?id={{$bottom['juhd'][$i]->id}}"  class="hot-tit ellipsis tt03">{{$bottom['juhd'][$i]->activity_name}}</a>
        
            <div class="hot-prize">
                <p>奖品： </p>
                <span>
                    <a href="{{URL('list/details')}}?id={{$bottom['juhd'][$i]->id}}"  class="ellipsis">{{$bottom['juhd'][$i]->prize_name}}</a>
                </span>
            </div>
            <p class="o-Price"><small>￥</small>{{ $bottom['moreed'][$i] }}</p>
             <div class="acti" >
              <p class="acti-join"  > 已参与： {{$bottom['explodeArrayyy'][$i][0] }}</p>
                <div class="acti-people">
                <p class="man">♂：{{$bottom['explodeArrayyy'][$i][1] }}</p>
                <p class="women" >♀：{{$bottom['explodeArrayyy'][$i][2] }}</p>
              </div> 
             </div>
            <div class="hot-add">
                <span class="hot-time" style="margin-top: -4px;  " >{{substr_replace($bottom['juhd'][$i]->activity_start_time,'',10,10 )}}</span>
                <span class="hot-ad">{{$bottom['juhd'][$i]->city}} |{{$bottom['juhd'][$i]->area}}</span>
            </div>
            <a href=""  class="hot-shop1">
                @if(($bottom['juhd'][$i]->activity_classes)==1)
                <span>企</span>  
                <p>{{$bottom['juhd'][$i]->name}}</p>
                @else
                <span>个</span> 
                 <p>{{$bottom['juhd'][$i]->name}}</p> 
                @endif

            </a>
        </li>
       
      @endfor
    </ul>
    </div>

    </div>
       <div class="int-right">
   <div>
       @foreach($company as $val)
      <dl>
         <a href="{{URL('center/companydetail')}}">
          <dt>
          <img class="image-com" src="{{$val->company_log}}" >
          </dt>
         </a>
          <dd>
          <script type="text/javascript">
          </script>
            <p class="off-com">{{$val->company_name}}</p>
          </dd>
           <dd>
       
            <p class="off-jian">{{mb_substr($val->company_introduction,0,25,'utf-8')}}</p>  
             
          </dd>
             <dd>
               <!-- <button class="off-care" >+关注</button> -->
          </dd>
        </dl>
      @endforeach 
   </div>
       
     </div>
</div>

</div> 
    
<!-- 消费保障 -->
 <div class="w1200 guarantee">
    <ul class="dib-box">
        <li class="dib">
            <b></b>
            <div class="gua0">消费者保障</div>
            <p>无论是支付环节又或者是退款环节我们层层为您把关</p>
        </li>
        <li class="dib">
            <b></b>
            <div class="gua1">新手上路</div>
            <p>一次激励，让您轻松玩转搜派对。新用户完善信息后，等级立马上升</p>
        </li>
        <li class="dib">
            <b></b>
            <div class="gua2">付款方式</div>
            <p>微信、支付宝，两种方式让您随时随地想玩就玩</p>
        </li>
        <li class="dib guaLI">
            <b></b>
            <div class="gua3">搜派对特色</div>
            <p>有奖活动、查询好友足迹、终极圆梦愿望，更多特色全在搜派对
            </p>
        </li>
    </ul>
</div> 
<!-- 返回顶部  -->
<div class="go-top dn" id="go-top">
    <a href="javascript:;" class="uc-2vm"></a>
  <div class="uc-2vm-pop dn">
    <h2 class="title-2wm">客服电话</h2>
    <div class="logo-2wm-box">
  
      <img src="images/weixin.jpg" alt="素材家园" width="240" height="240">
    </div>
  </div>
     <!-- <a href="#"  class="feedback">1234567</a> -->
    <a href="javascript:;" class="go"></a>
</div>

<!-- 返回顶部 -->
<script>
$(function(){
  $(window).on('scroll',function(){
    var st = $(document).scrollTop();
    if( st>0 ){
      if( $('#main-container').length != 0  ){
        var w = $(window).width(),mw = $('#main-container').width();
        if( (w-mw)/2 > 70 )
          $('#go-top').css({'left':(w-mw)/2+mw+20});
        else{
          $('#go-top').css({'left':'auto'});
        }
      }
      $('#go-top').fadeIn(function(){
        $(this).removeClass('dn');
      });
    }else{
      $('#go-top').fadeOut(function(){
        $(this).addClass('dn');
      });
    } 
  });
  $('#go-top .go').on('click',function(){
    $('html,body').animate({'scrollTop':0},500);
  });

  $('#go-top .uc-2vm').hover(function(){
    $('#go-top .uc-2vm-pop').removeClass('dn');
  },function(){
    $('#go-top .uc-2vm-pop').addClass('dn');
  });
});
</script>
@endsection

@section('bottom')
   	@include('layouts.bottom')
@endsection



