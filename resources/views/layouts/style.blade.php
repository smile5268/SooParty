<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="keywords" content="关键字"/>
	<meta name="description" content="描述"/>
	<meta name="author" content=""/>

    <link rel="icon" href="{{URL('/images/souq.ico')}}">

	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('/css/neat.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URL::asset('/css/box.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}" type="text/css">
	<!-- 时间版 -->
	<script src="{{ URL::asset('/js/jquery-1.12.3.min.js') }}"></script>
	<!-- 倒计时和投票JS -->
	<script src="{{ URL::asset('/js/index.js') }}"></script>
	<!-- 弹出框 -->
	<link rel="stylesheet" type="text/css" href="{{URL('alert/sweetalert.css')}}" />
    <script src="{{ URL('alert/sweetalert.min.js') }}" type="text/javascript"></script>

</head>
<body>
	<div class="head-top">
		<div class="w1200 nav">
			<!-- 登陆注册 disB是前端写的隐藏，class加上后就会隐藏-->
			<div class="fl">
				<!-- 判断是否登录 -->
				 <?php if(!session('isLogin')){ ?>
					<div class="login-1 disB">
						未登录
						<a href="{{ URL('login') }}">登录</a>/<a href="{{ URL('login/register') }}">注册</a>
					</div>			
				<?php }else{ ?>
					<div class="login-2 disB">
						<a href="{{ URL('center/mysoo') }}?id={{session('userid')}}" class="login-user">{{session('name')}} </a>
						<a href="{{ URL('login/cancel') }}">退出</a>
					</div>
				<?php } ?>
			</div>
			
			<!-- 用户中心 -->
			<div class="user-center">
				<ul>
					<li><a href="{{ URL('/') }}">Soo首页</a></li>
					<li>
						<a href="{{ URL('center/mysoo') }}?id={{session('userid')}}">我的party <b class="nav-b"></b></a>
						<div class="user-c">
                            <a href="{{ URL('center/sign') }}">我参加的</a>
						    <a href="{{ URL('center/sign') }}">我报名的</a>	  
						   <!--  <a href="{{ URL('center/levelman') }}?id={{session('userid')}}" >账户管理</a>  -->
						</div>
					</li>
					<li>

						<a href="{{ URL('center/release') }}"  >发布活动&nbsp;+</a>
					</li>

					<li><a href="{{ URL('list/shoppingCart') }}" class="SCart">购物车 </a></li>
                    <li><a  onclick="friends()"  id="div" >搜友</a></li>
                    <!-- 搜友功能 -->
						<script type="text/javascript">
						function friends(){ 
							swal({   
							title: "搜索你的好友",    
							type: "input",   
							showCancelButton: true,   
							closeOnConfirm: false,   
							animation: "slide-from-top",  
							}, function(inputValue){   
							if (inputValue === false) return false;      
							if (inputValue === "") {     
							swal.showInputError("请输入!");     
							return false   
							}else{
							$.ajax({ 
							    type: "POST", 
							    url: "{{URL('search')}}",
							    data:{'search':inputValue,'_token':"{{ csrf_token()}}"}, 
							    dataType:"json", 
							    success: function (data) {
							    if(data.no){
							        swal.showInputError("没有该用户账号!");     
							        return false  
							    }else{
							    	 var   host = window.location.host;
                            location.href='http://'+host+"/list/friend?friends="+data.username;
							     
							    }  
							      },  
							   });
							}  
							});
					    };
						</script>
                    
					<!-- <li><a href="javascript:;" onclick="ale();">语言 <b class="nav-b"></b></a></li> -->
				</ul>
			</div>
		</div>
	</div>
	@yield('header')

	@yield('content')
	
	@yield('bottom')
</body>
</html>
