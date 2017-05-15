@extends('admin.com.header')
@section('title', '后台')
@section('content')
<style tyle="text/css">
*{padding-top: 5;margin-top:5;background-color:#fafafb}
#dv{margin-top: 100px;margin-left:100px;}
</style>	
<div id="dv">
    @yield('content')
</div>

@endsection
