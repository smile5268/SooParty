@extends('layouts.style')

@section('title', '活动列表')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<style type="text/css">
/*.header-top{position: relative;}*/
.box{position: relative;
    margin-top: 14px;
    left: -6px;}
.box_div{position: relative ;background: #fff;margin:6px;width:220px;height: 330px;float: left;border: 1px solid #e5e5e5;-moz-border-radius: 6px;/* Gecko browsers */-webkit-border-radius: 6px;   /* Webkit browsers */border-radius:6px;/* W3C syntax */}
.box_div .box_div_content{margin-left: 10px;padding-top: 10px;}
.box_div img{border-radius:6px 6px 0 0 ;width: 240px;height: 188px;}
/*.box_div .box_div_content b{font-size: 14px;font-family:微软雅黑;

}*/
.box-title{
  width:194px;color: #0066cc;font-weight: bold;
  white-space:nowrap;
  word-wrap:normal;overflow:hidden;text-overflow:ellipsis;text-align:left;
  font-size: 14px;
}
.box-content{
  margin-top: 76px; white-space:nowrap;
  word-wrap:normal;overflow:hidden;text-overflow:ellipsis;text-align:left;color:#c3c3c3;
}
.box_div .box_div_content span{position: absolute;float:left;margin-top: 28px;width: 200px;height: 30px;}
/*.box_div .box_div_content p{color:#c3c3c3;width:194px;white-space:nowrap;
  word-wrap:normal;overflow:hidden;text-overflow:ellipsis;text-align:left;}*/
</style>

<div class="header-top">
	<div class="event">
	  <div class="w1200">
	    <a href="" class="tt02 event-on">所有企业</a>
	    <ul>
	    </ul>
	  </div>
	</div>
   <div class="box w1200" >
     <div class="box_div">
        <a href=""><img src="/images/9.png"></a>
         <div class="box_div_content">
           <p class="box-title" > 某某科技有限公司</p>
           <span>主办活动次数：666</span>
           <P class="box-content" >简介：这是一个公司简介</P>
         </div>
     </div>
     <div class="box_div">
        <a href=""><img src="/upload/thumbnail/20160924/20160924164229353792.png"></a>
        <div class="box_div_content">
           <p class="box-title" > 某某科技有限公司</p>
           <span>主办活动次数：666</span>
           <P class="box-content" >简介：这是一个公司简介</P>
         </div>
     </div>
     <div class="box_div">
        <a href=""><img src="/upload/thumbnail/20160924/20160924164229353792.png"></a>
        <div class="box_div_content">
           <p class="box-title" > 某某科技有限公司</p>
           <span>主办活动次数：666</span>
           <P class="box-content" >简介：这是一个公司简介</P>
         </div>
     </div>
     <div class="box_div">
        <a href=""><img src="/images/9.png"></a>
         <div class="box_div_content">
            <p class="box-title" > 某某科技有限公司</p>
           <span>主办活动次数：666</span>
           <P class="box-content" >简介：这是一个公司简介</P>
         </div>
     </div>
     <div class="box_div">
        <a href=""><img src="/upload/thumbnail/20160924/20160924164229353792.png"></a>
        <div class="box_div_content">
            <p class="box-title" > 某某科技有限公司</p>
           <span>主办活动次数：666</span>
           <P class="box-content" >简介：这是一个公司简介</P>
         </div>
     </div>
     <div class="box_div">
        <a href=""><img src="/upload/thumbnail/20160924/20160924164229353792.png"></a>
        <div class="box_div_content">
            <p class="box-title" > 某某科技有限公司</p>
           <span>主办活动次数：666</span>
           <P class="box-content" >简介：这是一个公司简介</P>
         </div>
     </div>

     
	 

   </div>
    <!-- 分页 -->
     <div class="listfy">
	
	 </div>
</div>
@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection
