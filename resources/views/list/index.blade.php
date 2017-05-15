@extends('layouts.style')

@section('title', '活动列表')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<style>
  .prev{
    color:red;
  }
  .ulUrl{
    background: #0164bf;
    color: #fff !important;
  }
  .search-screen div span a{
    padding:0 8px;
    border-radius: 5px;
  }
.clear-choose {
    position: absolute;
    top: -67px;
    float: right;
    left: 251px;
    display: block;
    text-align: center;
    width: 80px;
    line-height: 28px;
    border-radius: 5px;
    background: #0066cc;
    color: #ffffff;

}
.clear-choose:hover{
   background: #0066cc;
    color: #ffffff;
}
#list-acti {
    margin-top: 20px;
    overflow: hidden;
}
</style>
<!-- 活动 -->
<div class="event">
  <div class="w1200">
    <a href="" class="tt02 event-on">所有活动</a>
    <ul>
    </ul>
  </div>
</div>

<!-- 内容 -->
<div class="w1200 acti" id="list-acti" >
  <div class="acti-left">
    <!-- 筛选 -->
    <div class="search-screen" id="ulUrlA">
      <div>
        <h1>奖品：</h1>
        <span id="types">
          <label><a href="" title="ty0" class="ty0">全部</a></label>
          <label><a href="" title="ty1" class="ty1">有奖活动</a></label>
          <label><a href="" title="ty2" class="ty2">无奖活动</a></label>
         </span>
      </div>

      <div>
        <h1>价格：</h1>
        <span id="costs">
          <label><a href="" title="co0" class="co0">全部</a></label>
          <label><a href="" title="co1" class="co1">收费</a></label>
          <label><a href="" title="co2" class="co2">免费</a></label>
        </span>
      </div>
       
      <div>
        <h1 style="margin-top: 3px; " >综合排序：</h1>
        <a href="" title="" id="unlimited" >不限</a>
          <!-- <label><a href="" title="" class="Unlimited">不限</a></label> -->
       <!--  <span> -->
       <!-- <input type="button" name="" id="unlimited" value="不限" > -->
      
      <!--  时间 -->
      <div class="demos">
       <label for="appDate">时间</label>
       <input value="" class="appDate" readonly="readonly" name="appDate" id="appDate" type="text">
        <div class="place">
           地区
           <input type="text" value="" size="15" id="getcity_name" name="getcity_name" mod="address|notice" mod_address_source="hotel" mod_address_suggest="@Beijing|北京|53@Shanghai|上海|321@Shenzhen|深圳|91@Guangzhou|广州|80@Qingdao|青岛|292@Chengdu|成都|324@Hangzhou|杭州|383@Wuhan|武汉|192@Tianjin|天津|343@Dalian|大连|248@Xiamen|厦门|61@Chongqing|重庆|394@" mod_address_reference="getcityid" mod_notice_tip="" />
           <input id="getcityid" name="getcityid" type="hidden" value="{$getcityid}"  />
        </div>
      </div>   

        <div id="jsContainer" class="jsContainer" style="height:0">
          <div id="tuna_alert" style="display:none;position:absolute;z-index:999;overflow:hidden;"></div>
          <div id="tuna_jmpinfo" style="visibility:hidden;position:absolute;z-index:120;"></div>
        </div>  
      </div>  
     
    </div> 
    <!-- 地区 -->
<script type="text/javascript" src="{{URL('js/fixdiv.js')}}"></script>
 <script type="text/javascript" src="{{URL('js/address.js')}}"></script> 

<!-- 时间 -->
  <script src="{{ URL('js/Time-js/jquery.1.7.2.min.js') }}"></script>
  <script src="{{ URL('js/Time-js/mobiscroll_002.js') }}" type="text/javascript"></script>
  <script src="{{ URL('js/Time-js/mobiscroll_004.js') }}" type="text/javascript"></script>
  <script src="{{ URL('js/Time-js/mobiscroll.js') }}" type="text/javascript"></script>
  <script src="{{ URL('js/Time-js/mobiscroll_003.js') }}" type="text/javascript"></script>
  <script src="{{ URL('js/Time-js/mobiscroll_005.js') }}" type="text/javascript"></script>
  <link href="{{ URL('css/mobiscroll_002.css')}}" rel="stylesheet" type="text/css">
  <link href="{{  URL('css/mobiscroll.css')}}"  rel="stylesheet" type="text/css">
  <link href="{{ URL('css/mobiscroll_003.css')}}" rel="stylesheet" type="text/css">                          
 <style type="text/css">
 .place {
    width: 480px;
    margin: 40px auto 0 auto;
    position: relative;
    top: -47px;
    left: 216px;}
.place input{position: relative;top: -9px;left: -10px;
}
 #unlimited {
    background: #0164bf;
    color:#fff;
    /*color: #333;*/
    text-align: center;
    display: block;
    border-radius: 5px;
    float: left;
    margin-left: 18px;
    margin-top: 5px;
    width: 40px;
    height: 24px;
    line-height: 24px;
}
.spot{
  background: #0164bf;color:#fff;
}
.demos {
    /*border: 1px solid red;*/
    width: 456px;
    position: absolute;
    top: 80px;
    left: 176px;
    /* margin-left: 200px; */
    /* position: relative; */
    /* left: 44px; */
    /* top: 10px; */
}
        input, select {
            width: 100px;
            padding: 5px;
           /* margin: 5px 0;*/
            border: 1px solid #aaa;
            box-sizing: border-box;
            border-radius: 5px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -webkit-border-radius: 5px;       
        }  
        #appDate{
          position: relative;left: -10px;top: -10px;
        }  
        .acti-join{float: right;margin-top: -60px;margin-right: 10px;
        
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
        .acti-star{
          float: right;margin-top: 36px;margin-right: -80px;
        }
         .acti-star input{
          background: url('images/star.png');
         }
/*边框移入移出效果*/
.biankuang{
  position: absolute;
  border-radius:10px;
}
.biankuang_1{
  top: 0px;
  left:0px;
  border-left: 3px solid #EB5858;
}
.biankuang_2 {
  width: 0px;
  bottom:-3px;
  left: 0px;
  border-top: 3px solid #EB5858;
}
.biankuang_3{
  height: 0px;
  bottom:0px;
  right:0px;
  border-right: 3px solid #EB5858;
}
.biankuang_4{
  width:0px;
  top:-3px;
  right:0px;
  border-bottom: 3px solid #EB5858;
}

.biankuangg{

  position: absolute;
  border-radius:10px;
}
.biankuangg_1{
  top: 0px;
  left:0px;
  border-left: 3px solid #EB5858;
}
.biankuangg_2 {
  width: 0px;
  bottom:-3px;
  left: 0px;
  border-top: 3px solid #EB5858;
}
.biankuangg_3{
  height: 0px;
  bottom:0px;
  right:0px;
  border-right: 3px solid #EB5858;
}
.biankuangg_4{
  width:0px;
  top:-3px;
  right:0px;
  border-bottom: 3px solid #EB5858;
}

#price-change p {
    position: absolute;
    margin-top: 36px;
    color: #0066cc;
    width: auto;
    font-size: 16px;
    


}
.hot-company span{clear: both;}
.hot-company .name_p{margin-left:12px;margin-top: -2px;width: 102px;display:block;white-space:nowrap;word-wrap:normal;overflow:hidden;text-overflow:ellipsis;text-align:left;}
    </style>

 <script type="text/javascript">
        $(function () {
      var currYear = (new Date()).getFullYear();  
      var opt={};
      opt.date = {preset : 'date'};
      opt.datetime = {preset : 'datetime'};
      opt.time = {preset : 'time'};
      opt.default = {
        theme: 'android-ics light', //皮肤样式
            display: 'modal', //显示方式 
            mode: 'scroller', //日期选择模式
        dateFormat: 'yyyy-mm-dd',
        lang: 'zh',
        showNow: true,
        nowText: "今天",
            startYear: currYear - 10, //开始年份
            endYear: currYear + 10, //结束年份
         headerText: function (valueText) {  array = valueText.split('-');  return array[0] + "年" + array[1] + "月"+array[2]+"日";  },  //自定义弹出框头部格式
           onSelect:function(valueText,inst){
               //点击确定以后的结果
               var time=valueText;  // 筛选的时间
               var regTime = /[&][t][i][m][e]=[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]/; //time的正则
               var likeTime = site.replace(regTime,"");         // 去掉a链接里的&time=
             
               var pageTime = likeTime.replace(pages,"");       // 去掉a链接里的page

               var newTime = pageTime+'&time='+time;        // 生成新的链接
    
               location.href = newTime;         // 转跳页面
                // var showtime=$('#appDate').attr('value');
                //   alert(showtime); 
               
    },
      };
           
        $("#appDate").mobiscroll($.extend(opt['date'], opt['default']));
        var optDateTime = $.extend(opt['datetime'], opt['default']);
        var optTime = $.extend(opt['time'], opt['default']);
        $("#appDateTime").mobiscroll(optDateTime).datetime(optDateTime);
        $("#appTime").mobiscroll(optTime).time(optTime);
  
        });
    </script>

<div id="listBox">
    <div class="search-cont" id="search-cont">
      <ul style="margin-right:-20px" class="clearfix">

        @foreach($Activities as $actSql)

        <li class="acti-right-recom-cont ">
        <div class="spbq">
        <div class="biankuang biankuang_1"></div>
        <div class="biankuang biankuang_2"></div>
        <div class="biankuang biankuang_3"></div>
        <div class="biankuang biankuang_4"></div>      
          <span>   
            <a href="{{ URL('list/details') }}?id={{ $actSql->id }}">

                @if($actSql->thumbnail)
                <img class="image" src="{{ $actSql->thumbnail }}" alt=""/>
                @else

                <img class="image" src="/images/soo.png" alt=""/>      
                @endif
            </a>
          </span>
          <h1><span class="ellipsis">{{$actSql->activity_name}}</span></h1>
          <div class="acti-right-prize">
            <p  >奖品：</p>   
            <div> 
              <div style="color:#e4228b; font-size:12px; margin-top:2.5px; margin-left:5px" class="ellipsis">{{$actSql->prize_name}}</div>
            </div>
          </div>
          <div id="price-change"> 
          <p ><small>¥</small>
            @if($actSql->price == 0)
                免费
            @else
                {{ $actSql->price }}
            @endif    
          </p>
          </div>
          <div class="acti-right-add">
              <span class="acti-right-time">{{$actSql->activity_start_time}}</span>
              <span class="acti-right-ad">{{$actSql->province}} | {{$actSql->city}}</span>
          </div>
          <div class="acti-right-dp">
            <!-- <a href="../assembly_user/detail.html" class="acti-right-shop-aut">sooparty认证企业</a> -->
              <a href=""  class="hot-company">
              @if(($actSql->activity_classes)==0)
                <span>个</span> 
              @else  
                <span>企</span>  
              @endif
               <p>{{$actSql->name}}</p>
            </a> 

              <!--  <b class="hot-share3" style="margin-left: 50px;  "  >分享</b> -->
          </div>
          </div>
        </li>
        @endforeach
      </ul>
  </div>
  
  <!-- 分页 -->
  <div class="listfy">
      {!! $Activities->render() !!}
  </div> 
</div> 
<script>

      var searchCont=document.getElementById('search-cont');
      var searchContLi=searchCont.getElementsByTagName('li');

      for(var i=0;i<searchContLi.length;i++){
        if(i%3==2){
          searchContLi[i].style.marginRight='0';
        }
      }
</script>
</div>

<!-- 右边 -->
        
   <div class="acti-right">
    <div class="acti-right-recom" style="margin-top: 0;">推荐活动</div>
    @for($i=0;$i<$hear['countti'];$i++) 
    <div class="acti-right-recom-cont">
       <div class="spbqq">
        <div class="biankuangg biankuangg_1"></div>
        <div class="biankuangg biankuangg_2"></div>
        <div class="biankuangg biankuangg_3"></div>
        <div class="biankuangg biankuangg_4"></div>
      <span>
          <a href="{{ URL('list/details') }}?id={{$hear['txhd'][$i]->id }}">
            @if($hear['txhd'][$i]->thumbnail)
            <img src="{{$hear['txhd'][$i]->thumbnail}}" alt="" >
            @else
            <img src="/images/soo.png" alt=""/>
            @endif
           </a>
      </span>
      <h1><span class="ellipsis">{{$hear['txhd'][$i]->activity_name}}</span></h1>
      <div class="acti-right-prize">
        <p>奖品：</p>
        <div>
          <a href="" style="color:#e4228b; font-size:12px; margin-top:1px; margin-left:5px" class="ellipsis">{{$hear['txhd'][$i]->prize_name}}</a>
        </div>
      </div>
   <!--     <div class="acti-right-join">
        <div class="acti-join" >
              <p >已参与：0000</p>
              <p class="man">♂：2501</p>
              <p class="women" >♀：2501</p>    
        </div>
             <div id="container" style=" margin-top: 10px; " >
                <div class="feed" id="feed1">
                <div class="heart " id="like1" rel="like"></div> 
                </div>
                </div>
            </div> -->
            <div id="price-change">
                <p style="margin-left: 12px; " ><small>¥</small> {{ $hear['moreti'][$i] }}</p></div>
      <div class="acti-right-add">

                <span class="acti-right-time" style="margin-top:5px; "   >{{substr_replace($hear['txhd'][$i]->activity_start_time,'',10,10 )}}</span>
                <span class="acti-right-ad">{{$hear['txhd'][$i]->city}} |{{$hear['txhd'][$i]->area}}</span>
            </div>

            <style type="text/css">
             
            </style>



      <div class="acti-right-dp">
            <a href=""  class="hot-company">
               @if(($hear['txhd'][$i]->activity_classes)==1)
                <span class="qi">企</span>  
                <p>{{$hear['txhd'][$i]->name}}</p>
                @else
                <span class="qi">个</span> 
                 <p class="name_p" style="">{{$hear['txhd'][$i]->name}}</p> 
                @endif
       <!--   <b class="hot-share3"  >分享</b> -->
            </a> 
        </div>
      </div> 
    </div> 
    @endfor
  </div>
</div>

<script>
// 活动类型正则
var type = /[t][y][0-9]/;

// 活动价格区间
var cost = /[c][o][0-9]/;

// page正则
var pages = /[p][a][g][e]=[0-9]{1,4}/;

// 当前URL
var site = window.location.href;

// types 类型
$(function(){
    $('#types').find('a').click(function(){
        // 去掉链接里的page
        pageList = site.replace(pages,"");

        // 获取点击的值（知道点击的是哪个标签）
        var titleValue = $(this).attr('title');

        // 替换
        var newList = pageList.replace(type,titleValue);

        // 把新连接添加到a标签里
        $(this).attr('href',newList);
    });
});

// costs 类型
$(function(){
    $('#costs').find('a').click(function(){
        // 去掉链接里的page
        pageList = site.replace(pages,"");

        // 获取点击的值（知道点击的是哪个标签）
        var titleValue = $(this).attr('title');

        // 替换
        var newList = pageList.replace(cost,titleValue);
        
        // 把新连接添加到a标签里
        $(this).attr('href',newList);

    });
});

var mat = site.match(type);
var mat2 = site.match(cost);
var un=site.match();

var ctp = "." + mat;
$(ctp).addClass('ulUrl');

var matt="." + mat2;
$(matt).addClass('ulUrl');



//边框效果
//边框效果--左边的内容--移入
function biankuang(obj){
    $(obj).find('.biankuang_1').stop(true).animate({
        height:'364px'
    },300)
    $(obj).find('.biankuang_2').stop(true).delay(300).animate({
        width:'295px'
    },300)
    $(obj).find('.biankuang_3').stop(true).animate({
        height:'364px'
    },300)
    $(obj).find('.biankuang_4').stop(true).delay(300).animate({
        width:'295px'
    },300)
}
//边框效果--移出
function biankuang1(obj){
    $(obj).find('.biankuang_1').stop(true).delay(100).animate({
        height:'0px'
    },100)
    $(obj).find('.biankuang_2').stop(true).animate({
        width:'0px'
    },100)
    $(obj).find('.biankuang_3').stop(true).delay(100).animate({
        height:'0px'
    },100)
    $(obj).find('.biankuang_4').stop(true).animate({
        width:'0px'
    },100)
}
//触发
$('.spbq').hover(
  function () {
    var obj = $(this);
      $(obj).find('.text_gobuy').addClass('text_gobuy_show');
      $(obj).find('.search_y').animate({left:'150',opacity:1},300);
    biankuang(obj);
  },
  function () {
    var obj = $(this);
    $(obj).find('.text_gobuy').removeClass('text_gobuy_show');
    $(obj).find('.search_y').animate({left:'100',opacity:0},300);
    biankuang1(obj);
  }
);

//边框效果--右边的内容--移入
function biankuangg(obj){
    $(obj).find('.biankuangg_1').stop(true).animate({
        height:'370px'
    },300)
    $(obj).find('.biankuangg_2').stop(true).delay(300).animate({
        width:'238px'
    },300)
    $(obj).find('.biankuangg_3').stop(true).animate({
        height:'370px'
    },300)
    $(obj).find('.biankuangg_4').stop(true).delay(300).animate({
        width:'238px'
    },300)
}
//边框效果--移出
function biankuangg1(obj){
    $(obj).find('.biankuangg_1').stop(true).delay(100).animate({
        height:'0px'
    },100)
    $(obj).find('.biankuangg_2').stop(true).animate({
        width:'0px'
    },100)
    $(obj).find('.biankuangg_3').stop(true).delay(100).animate({
        height:'0px'
    },100)
    $(obj).find('.biankuangg_4').stop(true).animate({
        width:'0px'
    },100)
}
//触发
$('.spbqq').hover(
  function () {
    var obj = $(this);
      $(obj).find('.text_gobuy').addClass('text_gobuy_show');
      $(obj).find('.search_y').animate({left:'150',opacity:1},300);
    biankuangg(obj);
  },
  function () {
    var obj = $(this);
    $(obj).find('.text_gobuy').removeClass('text_gobuy_show');
    $(obj).find('.search_y').animate({left:'100',opacity:0},300);
    biankuangg1(obj);
  }
);
  //获取url
 var lianjie=window.location.href;
 var time=/time/; //正则匹配time单词
   if(time.exec(lianjie)){  
     var aa=lianjie.match(/time=(\S*)/);
     var jiequ=aa[0].substring(5,15);  //选中匹配到的第一个数组截取
      $('#appDate').attr('value',jiequ);
   }else{$('#appDate').attr('value','')}
 // var address=/address=/;   //正则匹配address=
 var aa=lianjie.match(/address=(\S*)/);
 var ss=decodeURI(aa);  //乱码转中文  
      if(aa!=null){        
       var  strs=ss.split(",");
        for(i=0;i<strs.length;i++){  
               if(strs[1].length>strs[1].length){ //判断url地址的地名是否在时间前后
                   $('#getcity_name').attr('value',strs[1])
               }else{ 
                 var  dizhi=strs[1].split("&");
                 $('#getcity_name').attr('value',dizhi[0])
               }
        }
     }
$("#unlimited").click(function(){

  var   host = window.location.host;
  var  cc= window.location.href ="http://"+host+"/list/screening/ty0_co0?";
      $(this).attr('href',cc);
      // $(this).addClass('spot');
      // $(this).css({"background":"#0164bf","color":"#fff"});

});
</script>

@endsection
@section('bottom')
    @include('layouts.bottom')
@endsection



