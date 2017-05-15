<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图片</title>
</head>
<style tyle="text/css">
*{}
.dv{margin-left:50px;}
.table{margin-top:20px;text-align: center;}
.lef{width:160px;height:30px;}
.rig{width:60px;}
tr td{border:1px solid #00ce9b;}
</style>
<body>
<div class="dv">
<!-- <input type="button" name="button1" id="button1" value="返回上一步" onclick="history.go(-1)"> -->
    <table class="table" cellpadding="0" cellspacing="0"   " >
    	<tr>
    		<td class="lef">id</td>
    		<td class="rig">{{$user->id}}</td>
    	</tr>
       	<tr>
    		<td class="lef">公司名</td>
    		<td class="rig">{{$user->enter_name}}</td>
    	</tr>
    	<tr>
    		<td class="lef">负责人</td>
    		<td class="rig">{{$user->enter_headname}}</td>
    	</tr>
    	<tr>
    		<td class="lef">负责人身份证号</td>
    		<td class="rig">{{$user->enter_number}}</td>
    	</tr>
    	<tr>
    		<td class="lef">营业执照</td>
    		<td class="rig"><img src="{{$user->enter_file}}" alt="" style="width:1000px;height:560px;"></td>
    	</tr>
    	
    </table>
</div>
</body>
</html>