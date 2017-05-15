//倒计时
var digit = 2;
$(document).ready(function() {
	showTime();

});
	
function changeImg(obj){
	var value = $(obj).attr("value");
	var num = $(obj).attr("num");
	// if (num >= 20) {
	// 	$(obj).css("cursor","default");
	// 	return false;

	// };
	if (parseInt(value) % digit == 0) {
		
		$(obj).attr("src", "/Public/images/tp/"+ (parseInt(num) + 1) +".png")
		$(obj).attr("num", parseInt(num) + 1);
		if(parseInt(num)>=20){
			$(obj).attr("src", "/Public/images/tp/"+ 20 +".png")
		}
	};
	$(obj).attr("value", parseInt(value) + 1);
	//document.getElementById("bb").innerHTML=value;
	var parentObj = $(obj).parent();
	var changeNumObj = $(parentObj).find("span[class=changeNum]");
	$(changeNumObj).html(value);
}
	
	
function showTime(){
	var endTime = $("span[class='endtime']");
	for(var i = 0; i < endTime.size(); i++)
	{
		var SysSecondStr = $(endTime[i]).attr("value");

		var SysSecond = parseInt(SysSecondStr);
		$(endTime[i]).attr("value", SysSecond - 1);
		if (SysSecond > 0) {
		  int_hour = Math.floor(SysSecond/3600);
		  SysSecond -= int_hour*3600;
		  int_minute = Math.floor(SysSecond/60);
		  SysSecond -= int_minute*60;
		  int_second = Math.floor(SysSecond/1);

		  if(int_hour < 10){
			int_hour="0"+int_hour;
		  }

		  if(int_minute<10){
			 int_minute="0"+int_minute;
		  }

		  if (int_second<10){
			 int_second="0"+int_second;
		  }

		  var desc = int_hour + ":" + int_minute + ":" + int_second;
		  $(endTime[i]).html(desc);
		}else{
		  var parentObj = $(endTime[i]).parent();
		  var changeNumObj = $(parentObj).find("img").get(0);
		  $(changeNumObj).attr("onclick", "javascript:void(0);");
		  $(changeNumObj).css("cursor","default");
		  var desc = "00:00:00";
		  $(endTime[i]).html(desc);
		}
	}
	setTimeout('showTime()',1000);
}









