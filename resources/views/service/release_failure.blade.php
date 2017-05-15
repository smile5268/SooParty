@extends('layouts.style')

@section('title', '发布失败')

@section('header')
   	@include('layouts.header')
@endsection

@section('content')
<style type="text/css">
.rel-success{
		width:1200px;
		background: #fff;
		margin:20px auto;
		text-align: center;
		padding-bottom: 30px;
	}
.rel-failure{
	font-size: 20px;
	margin: 10px;
	font-weight: bold;
} 

</style>
 <script type="text/javascript">
        $(document).ready(function() {
            function jump(count) {
               
                window.setTimeout(function(){
                    count--;
                    if(count > 0) {
                        $('#num').html(count);
                        jump(count);
                    } else {
                       location.href="/center/release";
                    }
                }, 1000);
            }
            jump(2);
        });
    </script>
<!-- 发布失败 -->
<div class="event">
  <div class="w1200">
    <a href="" class="tt02 event-on">发布失败</a>
  </div>
</div>
<div class="rel-success" >
      <img src="/images/failure.png" alt=""/>
      <p class="rel-failure" >发布失败了<p>
      <p> <span id="num">2</span>秒后返回发布页......</p>
</div>

@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection