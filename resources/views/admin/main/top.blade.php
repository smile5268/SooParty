@extends('admin.com.header')
@section('title', '后台')
@section('content')
<style>
*{padding: 0;margin:0 auto;background-color:#cccccc; }
</style>
<div class="dv">

</div>
{{ session('adminName') }}
<a href="{{ URL('login/cancel') }}" target="_top" >注销</a> 
@endsection