@extends('layouts.style')
@section('title', '搜派对')
@section('header')
    @include('layouts.header')
@endsection

@section('content')
  <!-- 我的sooparty -->
<div class="shop-tit">
  <div class="w1200"><span>我的派对</span></div>
</div>
<div class="w1200 shop-Cart"> 
   <div class="shop-jjh">         
          <ul>           
            <li id="surey14"  > <p class="admin-center" >管理中心</p></li>
            <div id="classOn"  class="@yield('classOn')" ></div>
            <li id="surey6" ><a href="{{ URL('center/sign') }}" class="shop-jjh1">我报名的</a></li>
            <li id="surey12" ><a href="{{URL('center/activitylist')}}" class="shop-jjh7">我发布的</a></li> 
            <li id="surey3"><a href="{{ URL('center/coll') }}" class="shop-jjh3">我收藏的</a></li>
            <li id="surey4"><a href="{{ URL('list/shoppingCart') }}" target="_blank" class="shop-jjh4">购物车  </a></li> 
            <li id="surey5"><a href="{{ URL('center/editor') }}" class="shop-jjh5">编辑资料</a></li>
            <li id="surey7"><a href="{{ URL('center/levelman') }}" class="shop-jjh6">我的等级</a></li>    
            <li id="surey9"><a href="{{ URL('center/real') }}" class="shop-jjh8">实名认证</a></li>
            <li id="surey11"><a href="{{ URL('center/binding_bank') }}" class="shop-jjh9">绑定支付宝</a></li>
            <li id="surey10"><a href="{{ URL('center/account_binding') }}" class="shop-jjh10">账号绑定</a></li>
            <li id="surey13"><a href="{{URL('center/update_password')}}" class="shop-jjh10">修改密码</a></li>
            <li id="surey16"><a href="{{URL('center/company')}}" class="shop-jjh11" >公司详情编辑</a></li>
            <li id="surey17"><a href="{{URL('center/companydetail')}}" target="_blank"  class="shop-jjh12" style="border:none; ">公司详情查看</a></li>
          </ul> 
    </div>   
 <script type="text/javascript">
    // 左侧选中变色
     var aa=$("#classOn").attr('class');
     var ab="#"+aa;
     $(ab).addClass('on');
     // $('.shop-jjh11').click(function () {
     //     alert(111);
     // })
</script> 
<!-- 弹出框 -->
<link rel="stylesheet" type="text/css" href="{{URL('alert/sweetalert.css')}}" />
<script src="{{ URL('alert/sweetalert.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.min.js" ></script>
    <div class="PassR">
        @yield('right')
    </div>
</div>

@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection





