
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台界面</title>
</head>

<frameset cols="190px,*" frameborder="0" >
     <frame src="{{URL('admin/main/left')}}"></frame>
	 <frameset rows="77px,*" >
	  <frame src="{{URL('admin/main/top')}}" scrolling="no" noresize="noresize"  name="left"></frame>
	  <frame src="{{URL('admin/main/right')}}" noresize="noresize" name="right"></frame>
     </frameset>
</frameset>
</html>

