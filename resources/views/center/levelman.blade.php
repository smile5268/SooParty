@extends('center.index')

@section('classOn','surey7')

@section('right')
<style type="text/css">
.tab5-detail h2,.tab5-detail h3,.tab5-detail p{margin:0 0 15px 0;}  
.tab5-img img{
    width: 980px;
    height: 240px;
}
.tab5-cont{
  width:980px;
  height: auto;
  position: relative;
}
.tab5-botom{
    height: 180px;
    background: #ffffff;
    margin-top: 10px;
    margin-bottom: 20px;
}
.tab5-jib{
    margin-top: 20px;
}

.cont-qiu {
    float: left;padding-top: 10px;
    overflow: hidden;
    width: 950px;
    float: left；width: 750px;
    height: 160px;
   
}

.qiu-water {
    padding: 5px 30px;
    text-align: center;
    float: left;
    color: #0066cc;
    position: relative;
}
/*.qiu-water{  position: relative;left: -30px; padding-left: 23px; margin-left: 38px;
    float: left;  color: #0066cc; 
}*/
.qiu-water span{
   position: relative;top:0px; color: #afafaf;

}

.cont-can canvas {
    margin-left: -10px;
    margin-top: -23px;
}
/*.qiu-deng {
    margin-top: -24px;
    margin-left: 10px;
    float: left;
}*/

.qiu {
    position: relative;
    text-align: center;
    top: -143px; 
    width: 176px;
    float: right;
    border-left: 2px solid #e5e5e5;
}

.qiu p{
    font-size: 18px;
}
.qiu-day{
    font-size: 18px;
}
.tab5-detail {
    width: auto;
    height: 490px;
    background: #ffffff;
    margin-top: 10px;
    padding: 10px 10px;
    font-size: 14px;
    padding-left: 40px;
}
.tab5-detail h4 {
  
    margin-bottom: 20px;
    line-height: 3;
    border-bottom: 2px solid #e5e5e5;
}
.del-prize p{
    color: #0066cc;
}
.del-zhu{
    color: #ff0397;
    margin-bottom: 20px;
}
.del-grow {
    height: 500px;
    background: #ffffff;
    margin-top: 20px;
    padding: 20px 40px;
    margin-bottom: 20px;
}

.del-grow img{
    margin-top: 20px;
    margin-left: 10px;
}
.grow-top{
    font-size: 14px;
    line-height: 40px;
    margin-top: 20px;
}
.grow-li{
    background: #f5f5f5;
   text-indent: 2em;
   margin-bottom: 10px;
}
.grow-li p a{
    color: #0066cc;
}
.grow-li b{
     color: #0066cc;
}

/*图片等比例缩放*/
.qiu-deng {
    position: relative;
    left: 6px;
    width: 926px;
    margin-top: -4px;
    /* height: 40px; */
    overflow: hidden;
}
.sun{
  margin-top: 5px;
    max-width: 60px;
    _width: expression(this.width > 60 ? "80px" : this.width);
}
.qiu-deng input {
    position: relative;
    padding: 0px 14px;
    max-width: 60px;
    _width: expression(this.width > 60 ? "80px" : this.width);
}
</style>
<!-- 进度条 -->
<link type="text/css" href="/css/jquery.spider.disk.css" rel="stylesheet">
<!-- <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.spider.disk.js"></script>
<script type="text/javascript">

@if($user->integral)
var $sa='{{$user->integral}}';//初始值
@else
var $sa=88;
@endif
var $ss=107449;//最大值
$str=($sa/107449)*100;
var data1={total:'',users:'',peruser:'',disks:[
{id:'',name:'',value:$str,total:''},
]}; 
$(document).ready(function(){
  refresh(data1);
});
function refresh(data){
  $("#disk_a").disk("poll1",{
    width:'100%', 
    data:data,
  }); 
}
</script>
<div id="tab5">
    <div class="tab5-cont">
         <div class="tab5-img" >       
              @if( $user->integral < 313)
              <img src="/activity/001.gif">
              @elseif( $user->integral < 678 && $user->integral >=313 )
              <img src="/activity/002.gif">
              @elseif( $user->integral < 1365 && $user->integral >=678 )
              <img src="/activity/003.gif">
              @elseif( $user->integral < 5698 && $user->integral >=1365 )
              <img src="/activity/004.gif">
              @elseif( $user->integral < 16458 && $user->integral >=5698 )
              <img src="/activity/005.gif">
              @elseif( $user->integral < 47257 && $user->integral >=16458 )
              <img src="/activity/006.gif">
              @elseif( $user->integral < 107449 && $user->integral >=47257 )
              <img src="/activity/007.gif">
              @elseif( $user->integral  >=107449)
              <img src="/activity/008.gif">
              @endif
          </div>
      <div class="tab5-botom" > 
      <div class="tab5-jib">
            <div class="cont-qiu" >      
                <p class="qiu-water" >水星<br><span>88</span></p> 
                <p class="qiu-water">金星<br><span>313</span></p>
                <p class="qiu-water">地球<br><span>678</span></p>
                <p class="qiu-water">火星<br><span>1365</span></p>
                <p class="qiu-water">木星<br><span>5698</span></p>
                <p class="qiu-water">土星<br><span>16458</span></p>
                <p class="qiu-water" >天王星<br><span>47257</span></p>
                <p class="qiu-water" >海王星<br><span>107449</span></p>
                <div class="formbody"><div id="disk_a"></div>
                </div>
             <div class="qiu-deng">
             @if( $user->integral < 313)
              <input  type="image" name="" class="water" src="/activity/mercury1.png">
              <input type="image" name=""  class="Venus"  src="/activity/Venus.png" >
              <input type="image" name="" class="earth"   src="/activity/earth.png" >
              <input type="image" name="" class="Mars"  src="/activity/Mars.png" >
              <input type="image" name="" class="Jupiter"  src="/activity/Jupiter.png" >
              <input type="image" name="" class="Saturn"  src="/activity/Saturn.png" >
              <input type="image" name="" class="Uranus"  src="/activity/Uranus.png" >
              <input type="image" name="" class="Neptune"  src="/activity/Neptune.png" >
              @elseif( $user->integral < 678 && $user->integral >=313 )
              <input  type="image" name="" class="water" src="/activity/mercury.png">
              <input type="image" name=""  class="Venus"  src="/activity/Venus1.png" >
              <input type="image" name="" class="earth"   src="/activity/earth.png" >
              <input type="image" name="" class="Mars"  src="/activity/Mars.png" >
              <input type="image" name="" class="Jupiter"  src="/activity/Jupiter.png" >
              <input type="image" name="" class="Saturn"  src="/activity/Saturn.png" >
              <input type="image" name="" class="Uranus"  src="/activity/Uranus.png" >
              <input type="image" name="" class="Neptune"  src="/activity/Neptune.png" >
              @elseif( $user->integral < 1365 && $user->integral >=678 )
              <input  type="image" name="" class="water" src="/activity/mercury.png">
              <input type="image" name=""  class="Venus"  src="/activity/Venus.png" >
              <input type="image" name="" class="earth"   src="/activity/earth1.png" >
              <input type="image" name="" class="Mars"  src="/activity/Mars.png" >
              <input type="image" name="" class="Jupiter"  src="/activity/Jupiter.png" >
              <input type="image" name="" class="Saturn"  src="/activity/Saturn.png" >
              <input type="image" name="" class="Uranus"  src="/activity/Uranus.png" >
              <input type="image" name="" class="Neptune"  src="/activity/Neptune.png" >
              @elseif( $user->integral < 5698 && $user->integral >=1365 )
              <input  type="image" name="" class="water" src="/activity/mercury.png">
              <input type="image" name=""  class="Venus"  src="/activity/Venus.png" >
              <input type="image" name="" class="earth"   src="/activity/earth.png" >
              <input type="image" name="" class="Mars"  src="/activity/Mars1.png" >
              <input type="image" name="" class="Jupiter"  src="/activity/Jupiter.png" >
              <input type="image" name="" class="Saturn"  src="/activity/Saturn.png" >
              <input type="image" name="" class="Uranus"  src="/activity/Uranus.png" >
              <input type="image" name="" class="Neptune"  src="/activity/Neptune.png" >
              @elseif( $user->integral < 16458 && $user->integral >=5698 )
              <input  type="image" name="" class="water" src="/activity/mercury.png">
              <input type="image" name=""  class="Venus"  src="/activity/Venus.png" >
              <input type="image" name="" class="earth"   src="/activity/earth.png" >
              <input type="image" name="" class="Mars"  src="/activity/Mars.png" >
              <input type="image" name="" class="Jupiter"  src="/activity/Jupiter1.png" >
              <input type="image" name="" class="Saturn"  src="/activity/Saturn.png" >
              <input type="image" name="" class="Uranus"  src="/activity/Uranus.png" >
              <input type="image" name="" class="Neptune"  src="/activity/Neptune.png" >
              @elseif( $user->integral < 47257 && $user->integral >=16458 )
              <input  type="image" name="" class="water" src="/activity/mercury.png">
              <input type="image" name=""  class="Venus"  src="/activity/Venus.png" >
              <input type="image" name="" class="earth"   src="/activity/earth.png" >
              <input type="image" name="" class="Mars"  src="/activity/Mars.png" >
              <input type="image" name="" class="Jupiter"  src="/activity/Jupiter.png" >
              <input type="image" name="" class="Saturn"  src="/activity/Saturn1.png" >
              <input type="image" name="" class="Uranus"  src="/activity/Uranus.png" >
              <input type="image" name="" class="Neptune"  src="/activity/Neptune.png" >
              @elseif( $user->integral < 107449 && $user->integral >=47257 )
              <input  type="image" name="" class="water" src="/activity/mercury.png">
              <input type="image" name=""  class="Venus"  src="/activity/Venus.png" >
              <input type="image" name="" class="earth"   src="/activity/earth.png" >
              <input type="image" name="" class="Mars"  src="/activity/Mars.png" >
              <input type="image" name="" class="Jupiter"  src="/activity/Jupiter.png" >
              <input type="image" name="" class="Saturn"  src="/activity/Saturn.png" >
              <input type="image" name="" class="Uranus"  src="/activity/Uranus1.png" >
              <input type="image" name="" class="Neptune"  src="/activity/Neptune.png" >
              @elseif( $user->integral  >=107449)
              <input  type="image" name="" class="water" src="/activity/mercury.png">
              <input type="image" name=""  class="Venus"  src="/activity/Venus.png" >
              <input type="image" name="" class="earth"   src="/activity/earth.png" >
              <input type="image" name="" class="Mars"  src="/activity/Mars.png" >
              <input type="image" name="" class="Jupiter"  src="/activity/Jupiter.png" >
              <input type="image" name="" class="Saturn"  src="/activity/Saturn.png" >
              <input type="image" name="" class="Uranus"  src="/activity/Uranus.png" >
              <input type="image" name="" class="Neptune"  src="/activity/Neptune1.png" >
              @endif
            
            <!-- <input type="image" name="" src="/activity/sun.png" > -->
              
            </div> 
            <div class="qiu">
                <p>倒计时</p>
                   <span class="qiu-day">365天</span>              
                   <p>23:25:45</p>    
                   <input type="image" name="" src="/activity/sun.png" class="sun" >
                </div>
        </div>
     </div>            
      </div>
        <!-- 弹出框-水星 -->
<div class="dialog-mercury"  >
   <dl>
    <dt><img src="/activity/mercury1.png" class="sun" >   
    </dt>
    <dd >
    <p><span class="dia-dengji">等级：Lv1</span>
           <!-- <a href="" class="dia-join">参加活动</a> -->
      </p>
    </dd>
    <dd class="dd-detail" ><p>中文名：水星</p></dd>
    <dd class="dd-detail"><p>外文名：Mercury</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>等级不够高哦！继续加油！</p>
   </div>
</div>
  <!-- 弹出框-金星 -->
<div class="dialog-Venus"  >
   <dl>
    <dt><img src="/activity/Venus1.png" class="sun" >   
    </dt>
    <dd >
    <p><span class="dia-dengji">等级：Lv2</span></p>
    </dd>
    <dd class="dd-detail" ><p>中文名：金星</p></dd>
    <dd class="dd-detail"><p>外文名：Venus</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>等级不够高哦！继续加油！</p>
   </div>
</div>
<!-- 弹出框-地球 -->
<div class="dialog-earth" >
   <dl>
    <dt><img src="/activity/earth1.png" class="sun" >  
    </dt>
    <dd>
    <p><span class="dia-dengji">等级：Lv3</span>
           <a href="" class="dia-join">立即领取</a>
      </p>
    </dd>
    <dd class="dd-detail"><p>中文名：地球</p></dd>
    <dd class="dd-detail"><p>外文名：Earth</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>恭喜您：获得精美小礼物一份。</p>
   </div>
</div>
<!-- 弹出框-火星 -->
<div class="dialog-Mars" >
   <dl>
    <dt><img src="/activity/Mars1.png" class="sun" >  </dt>
    <dd>
    <p><span class="dia-dengji">等级：Lv4</span>
           <a href="" class="dia-join">参加活动</a>
      </p>
    </dd>
    <dd class="dd-detail"><p>中文名：火星</p></dd>
    <dd class="dd-detail" ><p>外文名：Mars</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>恭喜您：获得免费参加在50元以下的活动一次。</p>
   </div>
   </div>
  <!-- 弹出框-木星 -->
<div class="dialog-Jupiter" >
   <dl>
    <dt><img src="/activity/Jupiter1.png" class="sun" >  </dt>
    <dd>
    <p><span class="dia-dengji">等级：Lv5</span>
           <a href="" class="dia-join">参加活动</a>
      </p>
    </dd>
    <dd class="dd-detail"><p>中文名：木星</p></dd>
    <dd class="dd-detail" ><p>外文名：Jupiter</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>恭喜您：获得免费参加50元—300元内的活动。</p>
   </div>
   </div> 
     <!-- 弹出框-土星 -->
<div class="dialog-Saturn" >
   <dl>
    <dt><img src="/activity/Saturn1.png" class="sun" >  </dt>
    <dd>
    <p><span class="dia-dengji">等级：Lv6</span>
           <a href="" class="dia-join">参加活动</a>
      </p>
    </dd>
    <dd class="dd-detail"><p>中文名：土星</p></dd>
    <dd class="dd-detail" ><p>外文名：Saturn</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>恭喜您：免费参加300元—800元内的活动。</p>
   </div>
   </div> 
      <!-- 弹出框-天王星 -->
<div class="dialog-Uranus" >
   <dl>
    <dt><img src="/activity/Uranus1.png" class="sun" >  </dt>
    <dd>
    <p><span class="dia-dengji">等级：Lv7</span>
           <a href="" class="dia-join">参加活动</a>
      </p>
    </dd>
    <dd class="dd-detail"><p>中文名：天王星</p></dd>
    <dd class="dd-detail" ><p>外文名：Uranus</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>恭喜您：获得免费参加800元—2000元内的活动。</p>
   </div>
   </div> 
   <!-- 弹出框-海王星 -->
<div class="dialog-Neptune" >
   <dl>
    <dt><img src="/activity/Neptune1.png" class="sun" >  </dt>
    <dd>
    <p><span class="dia-dengji">等级：Lv8</span>
           <a href="" class="dia-join">参加活动</a>
      </p>
    </dd>
    <dd class="dd-detail"><p>中文名：海王星</p></dd>
    <dd class="dd-detail" ><p>外文名：Neptune</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>恭喜您：获得免费参加在2000元—4200元内的活动。</p>
   </div>
   </div>
   <!-- 弹出框-太阳 -->
<div class="dialog-sun" >
   <dl>
    <dt><img src="/activity/Mars1.png" class="sun" >  </dt>
    <dd>
    <p><span class="dia-dengji">等级：Lv9</span>
           <a href="" class="dia-join">参加活动</a>
      </p>
    </dd>
    <dd class="dd-detail"><p>中文名：太阳</p></dd>
    <dd class="dd-detail" ><p>外文名：sunlight</p></dd>
    <dd class="dd-detail"><p>分类：九大行星</p></dd>
   </dl>
   <div class="dia-com">
    <p>点亮9大行星 + 获得太阳 = 100万以内愿望一个</p>
   </div>
</div>
      <div class="tab5-detail" >
          <h4 class="del-title" >Sooparty等级详解</h4>
          <p>Sooparty等级与太阳系9大行星一一对应，等级又与“成长值”相对应，每个星球公转周期为该等级“成长值”.</p>
          <p>  用户通过在Sooparty登录、被关注、参加活动，评价所获得。</p>
           <p> 累积的成长值总额决定等级级别。</p> 
            <p>成长值越高，等级越高。免费的活动价格越大</p>
            <div class="del-prize">
           <p>第3级-地球：获得一份神秘礼品</p> 
           <p>第4级-火星：免费参加50元内的活动（每使用一次将扣除687点成长值），使用该特权前等级必须为火星或火星以上等级</p> 
           <p>第5级-木星：免费参加50元—300元内的活动（每使用一次将扣除4333点成长值），使用该特权前等级必须为木星或木星以上等级</p> 
            <p>第6级-土星：免费参加300元—800元内的活动（每使用一次将扣除10760点成长值），使用该特权前等级必须为土星或土星以上等级</p> 
           <p>第7级-天王星：免费参加在800元—2000元内的活动（每使用一次将扣除30799点成长值），使用该特权前等级必须为天王星或天王星以上等级</p> 
            <p>第8级-海王星：免费参加在2000元—4200元内的活动（每使用一次将扣除60192点成长值），使用该特权前等级必须为海王星或海王星以上等级</p> 
        </div>
         <p class="del-zhu">（注：高等级拥有低等级的所有特权，火星及以上等级每使用一次特权将扣除相应成长值）</p>
         <p>终极大奖：点亮9大行星 + 获得太阳 = 100万以内一个愿望</p>
         </div>
          <div class="del-grow">
              <h4>成长值公式</h4>
              <img src="/activity/grow.png">
              <div class="grow-top" >
                  <ul>
                      <li>
                         <span style="color:#33c5f1;" >激励成长值：</span> <span>一次激励，让你轻轻松松玩转搜派对</span>
                      </li>
                       <li class="grow-li">
                            <p>完成新手任务，马上送<b  > 88</b> 点成长值。
                            @if(isset($user->username)==null)
                            <a href="{{URL('center/account_binding')}}"> 马上完成>></a>
                            @else
                            <a href="">已完成>></a>
                            @endif
                            </p>
                       </li>
                        <li>
                        <span style="color:#99ce87;" >日常成长值：</span><span>一次激励，让你轻轻松松玩转搜派对</span>
                        </li>
                         <li class="grow-li">
                             <p>每日签到，可获得<b>1</b>点成长值。<a href=""> 马上完成>></a>
                             <p>
                         </li>
                          <li class="grow-li">
                              <p>每日被关注。最多可获得<b> 10</b>点成长值。<a href=""> 马上完成>></a>
                              <p>
                          </li>
                           <li> 
                            <span style="color:#ef8692;">  活动成长值：</span>
                            <span>一次激励，让你轻轻松松玩转搜派对</span>
                            </li>
                            <li class="grow-li">
                                <p>参加活动，参加越多，奖励越多。<a href=""> 马上完成>></a>
                                </p>
                            </li>
                  </ul>
              </div>
          </div>
         </div>
          
      </div>
   
<script type="text/javascript">
$(document).ready(function(){
  // 鼠标悬浮显示水星
  $(".water").mouseover(function(){
     $('.dialog-mercury').show();
  });
  $(".water").mouseout(function(){
     $('.dialog-mercury').hide();
  });

   // 鼠标悬浮显示金星
  $(".Venus").mouseover(function(){
     $('.dialog-Venus').show();
  });
  $(".Venus").mouseout(function(){
     $('.dialog-Venus').hide();
  });
 // 鼠标悬浮显示地球
  $(".earth").mouseover(function(){
     $('.dialog-earth').show();
  });
  $(".earth").mouseout(function(){
     $('.dialog-earth').hide();
  });

   // 鼠标悬浮显示火星
  $(".Mars").mouseover(function(){
     $('.dialog-Mars').show();
  });
  $(".Mars").mouseout(function(){
     $('.dialog-Mars').hide();
  });
    // 鼠标悬浮显示木星
  $(".Jupiter").mouseover(function(){
     $('.dialog-Jupiter').show();
  });
  $(".Jupiter").mouseout(function(){
     $('.dialog-Jupiter').hide();
  });

    // 鼠标悬浮显示土星
  $(".Saturn").mouseover(function(){
     $('.dialog-Saturn').show();
  });
  $(".Saturn").mouseout(function(){
     $('.dialog-Saturn').hide();
  });
      // 鼠标悬浮显示天王星
  $(".Uranus").mouseover(function(){
     $('.dialog-Uranus').show();
  });
  $(".Uranus").mouseout(function(){
     $('.dialog-Uranus').hide();
  });
        // 鼠标悬浮显示海王星
  $(".Neptune").mouseover(function(){
     $('.dialog-Neptune').show();
  });
  $(".Neptune").mouseout(function(){
     $('.dialog-Neptune').hide();
  });
     // 鼠标悬浮显示太阳
  $(".sun").mouseover(function(){
     $('.dialog-sun').show();
  });
  $(".sun").mouseout(function(){
     $('.dialog-sun').hide();
  });

});


</script>
  <!--   <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script> -->
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