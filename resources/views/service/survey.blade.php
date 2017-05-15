@extends('service.index')

@section('classOn','survey1')

@section('right')
<style type="text/css">
    .pas-about p{
       
         width: 370px;
         height: 34px;
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
.pas-btn p{
  margin-left: 20px;
  font-size: 18px;
  color: #ff006c;
  position: relative;
  top:10px;
}
.pas-shop{
   position: relative;
   top: 30px;
}
.pas-release{
     position: relative;
   top: 50px;
}
.pas-join{
    margin-left: 30px;
}
/*选项卡*/
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";background:#eee url(mask.gif);}
/* tabs*/
#tabs{height:30px;overflow:hidden;}
#tabs li{float:left;margin:0 -15px 0 0;display:inline;}
#tabs a{float:left;position:relative;padding:0 40px;height:0;line-height:30px;text-transform:uppercase;text-decoration:none;color:#fff;border-right:30px solid transparent;border-bottom:30px solid #3D3D3D;border-bottom-color:#777\9;opacity:.3;filter:alpha(opacity=30);}
#tabs a:hover{border-bottom-color:#2ac7e1;opacity:1;filter:alpha(opacity=100);}
#tabs #current{z-index:3;border-bottom-color:#3d3d3d;opacity:1;filter:alpha(opacity=100);}
#content{
 /*   background:#fff;*/
    border-top:2px solid #3d3d3d;padding:2em;
}
/*#content div{display:none;}*/
#content h2,#content h3,#content p{margin:0 0 15px 0;}  
.pas-tabs{
    width: 988px;
   margin:20px auto 0 auto;
}
.tab1-btn{
    width:900px;
    height: 50px;
 position: relative;
    left: -40px;
}
.tab1-btn button{
   border: 1px solid #e5e5e5;
   text-align: center;
   width:80px;
   height: 35px;
   line-height: 35px;
   border-radius: 5px;
   margin-left: 20px;

}
.tab1-btn button:hover{
    color: #ffffff;
    background: #0164bf;

}
.int-left {
    margin-bottom: 10px;
}
.dib{

    border:1px solid #e5e5e5;
    background: #ffffff;
    height: 400px;
    margin: 0px 5px;
   /* border: 3px solid red;*/
}

.int-left{
    position: relative;
    left: -25px;
}
.dib-box{
    width:980px;
  /*  border:2px solid pink;*/
}

.box-title{
    font-size: 16px;
}
.box-prize{
    color: #ff0397;
}

.hot-add{
    position: relative;
    top:-5px;
    left: 180px;   
}
.hot-ad{
    position: relative;
    left: -50px;
}
.o-Price{
    position: relative;
    left: 10px;
}
.tab4-int{

    width:980px;
    height: 60px;
   /* left: -40px;*/
}
.tab4-int p{
     border-bottom: 1px dashed #ccc;
     margin-top: 10px;
     margin: 0px 25px;
}
.tab4-int p span{
    height: 35px;
    line-height: 65px;
}
.tab4-int p img{
    position: relative;
    left: 10px;

    margin: 10px 10px;
    padding-left: 20px;
    /*border-radius: 5px;*/

}
.tab-cont{
      width:980px;
      height: 800px;
    background: #ffffff;  position: relative;
    left: -40px;
}
.tab4-cont{
   position: relative;
   left: 40px;
   margin-top: 20px;
}
.tab4-btn{
    width:980px;
    height: auto;
 /*   float: left;*/
   /* margin-right: 50px;*/
   position: relative;
   left: 700px;
    margin-top: 20px;

}
.tab4-btn button{
   margin-left: 20px;
   width: 80px;
   height: 35px;
   line-height: 35px;
   text-align: center;
   border: 1px solid #e5e5e5;
   background: #ffffff;
   border-radius: 5px;
}
.tab-h{
    width:860px;
    border-bottom: 1px solid #e5e5e5;
   /* border:2px solid red;*/
    padding-right: 60px;
 /*   margin-right: 50px;*/
    margin-top: 10px;
}
.tab4-lv8{
    margin-left: 20px;
    color: #ff0397；
}
.tab5-img img{
    width: 980px;
    height: 240px;
}
.tab5-cont{

   width:980px;
  height: 1600px;
  position: relative;
  left: -40px;
 
}
.tab5-botom{
    height: 180px;
    background: #ffffff;
    margin-top: 10px;
}
.tab5-jib{
    margin-top: 20px;
}
.cont-qiu {
   float: left；width: 750px;/* height: 500px;*/
   padding-left: 20px; padding-top: 10px;
}
.qiu-water{ padding: 10px 25px;text-align: center;
    float: left;  color: #0066cc; 
}
.qiu-water span{
   position: relative;top:0px; color: #afafaf;
 /*  border: 2px solid red;*/

}

.cont-can canvas{
    margin-top: -40px;
}
.qiu-deng{
   /* padding-left: 20px;*/
     padding-left: 15px;
     margin-top: -25px;
    float: left;  
}
.qiu-deng input{
     padding: 5px 38px;
}
.qiu{
    position: relative;
   right: -5px;
   text-align: center;
   height: 20px;
   line-height: 20px;
   top: 10px;
}

.qiu p{
    font-size: 18px;
}
.qiu-day{
    font-size: 18px;
  /*  line-height: 20px;*/
}
.tab5-detail{
    width: auto;
    height: 570px;
    background: #ffffff;
    margin-top: 10px;
    padding: 10px 10px;
    font-size: 12px;
    padding-left: 40px;
}
.tab5-detail h4{
    margin-top: 20px;
    margin-bottom: 30px;
}
.del-prize p{
    color: #0066cc;
}
.del-zhu{
    color: #ff0397;
    margin-bottom: 20px;
}
.del-grow{
    height: 500px;
    background: #ffffff;
    margin-top: 20px;
    padding: 20px 40px;
}
.del-grow h4{

   /* border-bottom: 1px solid #e5e5e5;*/
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
}
.grow-li p a{
    color: #0066cc;
}
.grow-li b{
     color: #0066cc;
}
/*tab6-我的足迹*/
.tab6-cont{
    width: 980px;
    height: 900px;
    background: #ffffff;
    margin-left: 20px;
   /* border:2px s;*/
}
.mapTipText{width: 280px;height: 110px;background-color: #ffffff;}
    .mapTipText .mapTipImg{height: 66px; width: 66px; float: left;border: 2px solid #ffffff; border-radius: 50%;overflow: hidden;margin: -12px 5px 0 -12px;}
    .mapTipText .mapTipImg img{width: 100%;height: 100%;}
    .mapTipText .mapTipList{float: left;margin-left: 4px;}
    .mapTipText .mapTipList h2{text-align: left;}
    .mapTipText .mapTipList h2 a{font-size: 24px; color: #262626;text-decoration:none;}
    .mapTipText .mapTipList h2 a:hover{ color: #0085d2;}
    .mapTipText .mapTipList h2 a span{font-size: 16px;margin-left: 3px;}
    .mapTipText .mapTipList ul{ width: 203px;padding-right: 10px;}
    .mapTipText .mapTipList ul li{list-style: none;float: left;padding: 7px 3px 0 3px;}
    .mapTipText .mapTipList ul li a{color: #262626;text-decoration:none;}
    .mapTipText .mapTipList ul li a:hover{background-color:#2ebcfe;color:#ffffff;}
</style>
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
</script>
 <div class="PassR">
        <div class="PassR-sq">
            <div class="PassR-sqL">
                <span><img src="{{URL('images/ly.jpg')}}" alt=""></span>
                <div class="pas-hi">
                    <p>hi,杨帆，起航</p>
                    <span>♀</span>        
                </div>
                <div class="pas-about ">
                      <p >个人用户      
                      </p>
                      <p >在哪。。。。。。</p>
                </div>  
            </div>
            <div class="PassR-sqR">
                <div class="pas-btn" >
                    <button>+ 关注</button>
                    <p>895479</p>
                </div>
                <div class="pas-shop" >
                    <p>店铺综合评价：</p>
                    <span></span>
                    <h6>5.0分</h6>
                </div>
                <div class="pas-release" >
                    <p>发布活动:<span>1545</span> </p>
                     <p class="pas-join">参与活动: <span>1545</span></p>
                </div>
             
            </div>
        </div>
        <div class="pas-tabs" >
  <ul id="tabs">
      <li><a href="#" name="#tab1">我报名的活动</a></li>
      <li><a href="#" name="#tab2">我发布的活动</a></li>
      <li><a href="#" name="#tab3">我收藏的活动</a></li>
      <li><a href="#" name="#tab4">我的评价</a></li>  
      <li><a href="#" name="#tab5">我的等级</a></li>    
      <li><a href="#" name="#tab6">我的足迹</a></li>    
    
  </ul>

  <div id="content">
      <div id="tab1">
         <div class="tab1-btn" >
             <button>待参加</button>
              <button>已参加</button>    
         </div>
        <div class="int-left">
       <ul class="dib-box">
        <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop">
                <span style="position: relative;top:20px; " >A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
               <!--  <b class="hot-share">8251</b> -->
            </a>
        </li>
         <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop" >
                <span style="position: relative;top:20px; " >A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
               <!--    <b class="hot-share">8251</b> -->
            </a>
        </li>
        <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop" >
                <span style="position: relative;top:20px; ">A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
                <!--   <b class="hot-share" style="position: relative; left: 100px; ">8251</b> -->
            </a>
        </li>
      </ul>
    </div>  
      </div>
      <div id="tab2">
           <div class="tab1-btn" >
             <button>待举办</button>
              <button>已举办</button>     
         </div>
           <div class="int-left">
       <ul class="dib-box">
        <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop">
                <span style="position: relative;top:20px; ">A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
               <!--  <b class="hot-share">8251</b> -->
            </a>
        </li>
         <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop" >
                <span style="position: relative;top:20px; ">A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
               <!--    <b class="hot-share">8251</b> -->
            </a>
        </li>
        <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop" >
                <span style="position: relative;top:20px; ">A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
                <!--   <b class="hot-share" style="position: relative; left: 100px; ">8251</b> -->
            </a>
        </li>
      </ul>
    </div>
      </div>
      <div id="tab3">
           <div class="int-left">
       <ul class="dib-box">
        <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop">
                <span style="position: relative;top:20px; ">A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
               <!--  <b class="hot-share">8251</b> -->
            </a>
        </li>
         <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop" >
                <span style="position: relative;top:20px;">A</span>
                <p style="position: relative;top:20px;">Apple营销旗舰店</p>
               <!--    <b class="hot-share">8251</b> -->
            </a>
        </li>
        <li class="dib">
            <span><a href="../Assembly_user/detail.html"><img src="{{ URL::asset('/activity/int1.png') }}" alt=""></a></span>
            <a href="javascript:;"  onclick="ale();" class="hot-tit ellipsis tt03">海上冲浪</a>
            <div class="hot-prize">
                <p>奖品：</p>
                <span>
                    <a href="javascript:;"  onclick="ale();" class="ellipsis">迪卡侬水上滑板</a>
                </span>
            </div>
   
            <p class="o-Price"><small>￥</small>360</p>
            <div class="hot-add">
                <span class="hot-time"  >12月19日(1天)</span>
                <span class="hot-ad">海南|三亚</span>
            </div>
            <a href="个人主页-活动.html"  class="hot-shop" >
                <span style="position: relative;top:20px; ">A</span>
                <p style="position: relative;top:20px; ">Apple营销旗舰店</p>
                <!--   <b class="hot-share" style="position: relative; left: 100px; ">8251</b> -->
            </a>
        </li>
      </ul>
    </div>
      </div>
      <div id="tab4">
        <div class="tab-cont">
         <div class="tab4-int">   
              <p>
                  <img src="/activity/tab4.png">
                 <span>小洋人西瓜刀</span>
                  <span class="tab4-lv8">lv8</span>
             </p>
           
         </div>
         <div class="tab4-cont" >
             <p>刚打开看了下，确实很好。就是可能表带会有点沾灰~但是不怕啦。希望能出表带，到时候能自行更换搭配颜色，那就更棒啦！哈哈！</p>
             <div class="tab4-img">
                 <img src="/activity/index.png">
                <img src="/activity/index.png">
             </div>
             <div class="tab4-btn">
                 <button>回复</button>
                 <button>赞</button>
             </div>
             <div class="tab-h"></div>
         </div>
</div>
      </div>
      <div id="tab5">
    <div class="tab5-cont">
         <div class="tab5-img" >
          <img src="/activity/tab5.png">
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
                <p class="qiu-water"  >冥王星<br><span>19714</span></p>  
                <div class="qiu">
                <p>倒计时</p>
                   <span class="qiu-day">365天</span>              
                   <p>23:25:45</p>    
                </p>    
                </div>
               <div class="cont-can "  >
                          <canvas id="myCanvas" width="900" height="60" >您的浏览器不支持HTML5特效，请更换浏览器</canvas>
              </div> 
        <div class="qiu-deng">
            <input name="" type="button"  style=" width:38px; height:37px;  border:0;  background:url('/activity/水星.png') no-repeat left top" onclick="dialog1()" />
            <input name="" type="button"  style="width:38px; height:37px;  border:0; background:url('/activity/金星.png') no-repeat left top" />
            <input name="" type="button"  style=" width:38px; height:37px;  border:0;  background:url('/activity/地球.png') no-repeat left top" />
            <input name="" type="button"  style="width:38px; height:37px;  border:0;  background:url('/activity/火星.png') no-repeat left top" />
            <input name="" type="button"  style=" width:38px; height:37px;  border:0;  background:url('/activity/木星.png') no-repeat left top" />
            <input name="" type="button"  style="width:72px; height:37px;  border:0;margin-left: -20px; background:url('/activity/土星.png') no-repeat left top" />
            <input name="" type="button"  style=" width:38px; height:37px;  border:0;margin-left: 20px;  background:url('/activity/天王星.png') no-repeat left top" />
            <input name="" type="button"  style="width:38px; height:37px;  border:0;margin-left: 16px;  background:url('/activity/海王星.png') no-repeat left top" />
             <input name="" type="button"  style="width:38px; height:37px;  border:0;margin-left: 16px; background:url('/activity/冥王星.png') no-repeat left top" />
               <input name="" type="button"  style="width:55px; height:54px;  border:0;margin-left: 60px;margin-top: 10px; background:url('/activity/太阳.png') no-repeat left top" />
            </div> 
        </div>
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
        <p>第9级-冥王星：免费参加在4200元—6500元内的活动（每使用一次将扣除90465点成长值），或者领取10，000元奖金（使用后扣除激励成长值以外的所有成长值）使用该
        <p>特权前等级必须为冥王星</p>
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
                         <span style="color:#33c5f1;" >激励成长值：</span> <span>一次激励，让你轻轻松松玩转集结号</span>
                      </li>
                       <li class="grow-li">
                            <p>完成新手任务，马上送<b  > 88</b> 点成长值。<a href=""> 马上完成>></a>
                           
                            </p>
                       </li>
                        <li>
                        <span style="color:#99ce87;" >日常成长值：</span><span>一次激励，让你轻轻松松玩转集结号</span>
                        </li>
                         <li class="grow-li">
                             <p>每日登录。最多可获得<b> 5</b>点成长值。<a href=""> 马上完成>></a>
                             <p>
                         </li>
                          <li class="grow-li">
                              <p>每日被关注。最多可获得<b> 10</b>点成长值。<a href=""> 马上完成>></a>
                              <p>
                          </li>
                           <li> 
                            <span style="color:#ef8692;">  活动成长值：</span>
                            <span>一次激励，让你轻轻松松玩转集结号</span>
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
      <div id="tab6">
          <div class="tab6-cont">
               <div class="itemCon" style="float: left">
    <div id="ChinaMap" style="margin: 50px;"></div>
    <div id="stateTip" style="position: absolute;left: 100%;text-align: left;display: inline;"></div>
</div>
<div id="mapTipContent" style="width: 900px;margin: 0 auto;display: none">
    <div class="mapTipText mapTipText0">
        <div class="mapTipImg"><img src="images/heilongjiang.jpg" alt=""/></div>
        <div class="mapTipList">
            <h2><a href="">黑龙江<span>Heilongjiang</span></a></h2>
            <ul>
                <li><a href="">哈尔滨</a></li>
                <li><a href="">漠河</a></li>
                <li><a href="">五大连池</a></li>
                <li><a href="">兴凯湖</a></li>
                <li><a href="">雪乡</a></li>
                <li><a href="">大兴安岭</a></li>
                <li><a href="">齐齐哈尔</a></li>
                <li><a href="">牡丹江</a></li>
                <li><a href="">伊春</a></li>
                <li><a href="">大庆</a></li>
                <li><a href="">镜泊湖</a></li>
                <li><a href="">帽儿山</a></li>
            </ul>
        </div>
    </div>
    <div class="mapTipText mapTipText1">
        <div class="mapTipImg"><img src="images/jilin.jpg" alt=""/></div>
        <div class="mapTipList">
            <h2><a href="">吉林<span>Jilin</span></a></h2>
            <ul>
                <li><a href="">长白山</a></li>
                <li><a href="">长春</a></li>
                <li><a href="">延吉</a></li>
                <li><a href="">雾凇岛</a></li>
                <li><a href="">集安</a></li>
                <li><a href="">吉林市</a></li>
                <li><a href="">查干湖</a></li>
                <li><a href="">三角龙湾</a></li>
                <li><a href="">通化</a></li>
                <li><a href="">四平</a></li>
                <li><a href="">松原</a></li>
                <li><a href="">白城</a></li>
            </ul>
        </div>
    </div>
    <div class="mapTipText mapTipText2">
        <div class="mapTipImg"><img src="images/liaoning.jpg" alt=""/></div>
        <div class="mapTipList">
            <h2><a href="">辽宁<span>Liaoning</span></a></h2>
            <ul>
                <li><a href="">大连</a></li>
                <li><a href="">丹东</a></li>
                <li><a href="">沈阳</a></li>
                <li><a href="">兴城</a></li>
                <li><a href="">葫芦岛</a></li>
                <li><a href="">绥中</a></li>
                <li><a href="">旅顺</a></li>
                <li><a href="">锦州</a></li>
                <li><a href="">抚顺</a></li>
                <li><a href="">鞍山</a></li>
                <li><a href="">本溪</a></li>
                <li><a href="">营口</a></li>
                <li><a href="">盘锦</a></li>
                <li><a href="">长兴岛</a></li>
            </ul>
        </div>
    </div>
</div>

          </div>
      </div>
  </div>
</div>  
    </div>
    <script type="text/javascript">
var i = 0;
var res = 0;
var context = null;
var total_width = 680;
var total_height = 25;
var initial_x = 20;
var initial_y = 20;
var radius = total_height/2;
window.onload = function() {
    var elem = document.getElementById('myCanvas');
    if (!elem || !elem.getContext) {
        return;
    }

    context = elem.getContext('2d');
    if (!context) {
        return;
    }

    // set font
    context.font = "16px Verdana";

    // Blue gradient for progress bar
    var progress_lingrad = context.createLinearGradient(0,initial_y+total_height,0,0);
    progress_lingrad.addColorStop(0, '#4DA4F3');
    progress_lingrad.addColorStop(0.4, '#ADD9FF');
    progress_lingrad.addColorStop(1, '#9ED1FF');
    context.fillStyle = progress_lingrad;

    //draw();
    res = setInterval(draw, 30);
}

function draw() {
    i+=1;
    // Clear everything before drawing
    context.clearRect(initial_x-5,initial_y-5,total_width+15,total_height+15);
    progressLayerRect(context, initial_x, initial_y, total_width, total_height, radius);
    progressBarRect(context, initial_x, initial_y, i, total_height, radius, total_width);
    progressText(context, initial_x, initial_y, i, total_height, radius, total_width );
    if (i>=total_width) {
        clearInterval(res);
    }
}

/**
 * Draws a rounded rectangle.
 * @param {CanvasContext} ctx
 * @param {Number} x The top left x coordinate
 * @param {Number} y The top left y coordinate
 * @param {Number} width The width of the rectangle
 * @param {Number} height The height of the rectangle
 * @param {Number} radius The corner radius;
 */
function roundRect(ctx, x, y, width, height, radius) {
    ctx.beginPath();
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + width - radius, y);
    ctx.arc(x+width-radius, y+radius, radius, -Math.PI/2, Math.PI/2, false);
    ctx.lineTo(x + radius, y + height);
    ctx.arc(x+radius, y+radius, radius, Math.PI/2, 3*Math.PI/2, false);
    ctx.closePath();
    ctx.fill();
}

/**
 * Draws a rounded rectangle.
 * @param {CanvasContext} ctx
 * @param {Number} x The top left x coordinate
 * @param {Number} y The top left y coordinate
 * @param {Number} width The width of the rectangle
 * @param {Number} height The height of the rectangle
 * @param {Number} radius The corner radius;
 */
function roundInsetRect(ctx, x, y, width, height, radius) {
    ctx.beginPath();
    // Draw huge anti-clockwise box
    ctx.moveTo(1000, 1000);
    ctx.lineTo(1000, -1000);
    ctx.lineTo(-1000, -1000);
    ctx.lineTo(-1000, 1000);
    ctx.lineTo(1000, 1000);
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + width - radius, y);
    ctx.arc(x+width-radius, y+radius, radius, -Math.PI/2, Math.PI/2, false);
    ctx.lineTo(x + radius, y + height);
    ctx.arc(x+radius, y+radius, radius, Math.PI/2, 3*Math.PI/2, false);
    ctx.closePath();
    ctx.fill();
}

function progressLayerRect(ctx, x, y, width, height, radius) {
    ctx.save();
    // Set shadows to make some depth
    ctx.shadowOffsetX = 2;
    ctx.shadowOffsetY = 2;
    ctx.shadowBlur = 5;
    ctx.shadowColor = '#666';

     // Create initial grey layer
    ctx.fillStyle = 'rgba(189,189,189,1)';
    roundRect(ctx, x, y, width, height, radius);

    // Overlay with gradient
    ctx.shadowColor = 'rgba(0,0,0,0)'
    var lingrad = ctx.createLinearGradient(0,y+height,0,0);
    lingrad.addColorStop(0, 'rgba(255,255,255, 0.1)');
    lingrad.addColorStop(0.4, 'rgba(255,255,255, 0.7)');
    lingrad.addColorStop(1, 'rgba(255,255,255,0.4)');
    ctx.fillStyle = lingrad;
    roundRect(ctx, x, y, width, height, radius);

    ctx.fillStyle = 'white';
    //roundInsetRect(ctx, x, y, width, height, radius);

    ctx.restore();
}

/**
 * Draws a half-rounded progress bar to properly fill rounded under-layer
 * @param {CanvasContext} ctx
 * @param {Number} x The top left x coordinate
 * @param {Number} y The top left y coordinate
 * @param {Number} width The width of the bar
 * @param {Number} height The height of the bar
 * @param {Number} radius The corner radius;
 * @param {Number} max The under-layer total width;
 */
function progressBarRect(ctx, x, y, width, height, radius, max) {
    // var to store offset for proper filling when inside rounded area
    var offset = 0;
    ctx.beginPath();
    if (width<radius) {
        offset = radius - Math.sqrt(Math.pow(radius,2)-Math.pow((radius-width),2));
        ctx.moveTo(x + width, y+offset);
        ctx.lineTo(x + width, y+height-offset);
        ctx.arc(x + radius, y + radius, radius, Math.PI - Math.acos((radius - width) / radius), Math.PI + Math.acos((radius - width) / radius), false);
    }
    else if (width+radius>max) {
        offset = radius - Math.sqrt(Math.pow(radius,2)-Math.pow((radius - (max-width)),2));
        ctx.moveTo(x + radius, y);
        ctx.lineTo(x + width, y);
        ctx.arc(x+max-radius, y + radius, radius, -Math.PI/2, -Math.acos((radius - (max-width)) / radius), false);
        ctx.lineTo(x + width, y+height-offset);
        ctx.arc(x+max-radius, y + radius, radius, Math.acos((radius - (max-width)) / radius), Math.PI/2, false);
        ctx.lineTo(x + radius, y + height);
        ctx.arc(x+radius, y+radius, radius, Math.PI/2, 3*Math.PI/2, false);
    }
    else {
        ctx.moveTo(x + radius, y);
        ctx.lineTo(x + width, y);
        ctx.lineTo(x + width, y + height);
        ctx.lineTo(x + radius, y + height);
        ctx.arc(x+radius, y+radius, radius, Math.PI/2, 3*Math.PI/2, false);
    }
    ctx.closePath();
    ctx.fill();

    // draw progress bar right border shadow
    if (width<max-1) {
        ctx.save();
        ctx.shadowOffsetX = 1;
        ctx.shadowBlur = 1;
        ctx.shadowColor = '#666';
        if (width+radius>max)
          offset = offset+1;
        ctx.fillRect(x+width,y+offset,1,total_height-offset*2);
        ctx.restore();
    }
}

/**
 * Draws properly-positioned progress bar percent text
 * @param {CanvasContext} ctx
 * @param {Number} x The top left x coordinate
 * @param {Number} y The top left y coordinate
 * @param {Number} width The width of the bar
 * @param {Number} height The height of the bar
 * @param {Number} radius The corner radius;
 * @param {Number} max The under-layer total width;
 */
function progressText(ctx, x, y, width, height, radius, max) {
    ctx.save();
    ctx.fillStyle = 'white';
    var text = Math.floor(width/max*100)+"%";
    var text_width = ctx.measureText(text).width;
    var text_x = x+width-text_width-radius/2;
    if (width<=radius+text_width) {
        text_x = x+radius/2;
    }
    ctx.fillText(text, text_x, y+22);
    ctx.restore();
}
</script>
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



