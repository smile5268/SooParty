@extends('layouts.style')

@section('title', 'SooParty')

@section('header')
   	@include('layouts.header')
@endsection

@section('content')
<style type="text/css">
	.rel-success{
		width:1200px;
		margin:20px auto;
	}
</style>
<!-- 发布成功 -->
<div class="event">
  <div class="w1200">
    <a href="" class="tt02 event-on">发布成功</a>
  </div>
</div>
<div class="rel-success" >
	 <img src="/images/re_success.png" alt=""/>
</div>

<script>setTimeout('window.location.href=\'/\'',2000)</script>

@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection