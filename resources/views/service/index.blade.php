img@extends('layouts.style')

@section('title', '服务商中心')

@section('header')
   	@include('layouts.header')
@endsection

@section('content')
  <!-- 服务商中心 -->
<div class="shop-tit">
  <div class="w1200"><span>我的party</span></div>
</div>

<div class="w1200 shop-Cart">
  
  <!-- 导航 -->
  <div class="shop-jjh">
    <h1>全部功能</h1>
    <ul>
      <div id="classOn" class="@yield('classOn')"></div>
      <li id="survey1"><a href="{{ URL('service/survey') }}" class="shop-jjh1">个人中心</a></li>
      <li id="survey2"><a href="{{ URL('service/surveyManage') }}" class="shop-jjh4">我报名的</a></li>
      <li id="survey3"><a href="{{ URL('service/release') }}" class="shop-jjh2">我发布的</a></li>
      <li id="survey4"><a href="{{ URL('list/attendCollection') }}" class="shop-jjh5">我的收藏</a></li>
      <!-- <li><a href="" class="shop-jjh3">查看店铺</a></li> class="on" -->
      <!-- <li><a href="" class="shop-jjh6">进行中的活动</a></li> -->
      <li><a href="" class="shop-jjh7">购物车</a></li>
      <li><a href="" class="shop-jjh8">编辑资料</a></li>
       <li><a href="" class="shop-jjh7">我的评价</a></li>
      <li><a href="" class="shop-jjh8">我的等级</a></li>
      <li><a href="" class="shop-jjh9">我的足迹</a></li>
    </ul>
  </div>
  
<script>
    // 左侧选中变色
    var aa= $("#classOn").attr('class');
    var ab="#"+aa;
    $(ab).addClass('on');

</script>
  
  
  <!-- 安全中心 -->

    <div class="PassR">
        @yield('right')
    </div>

</div>

@endsection

@section('bottom')
   	@include('layouts.bottom')
@endsection



