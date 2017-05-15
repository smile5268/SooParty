@extends('center.index')

@section('classOn','surey9')

@section('right')

<link rel="stylesheet" type="text/css" href="{{URL('alert/sweetalert.css')}}" />
<script src="{{ URL('alert/sweetalert.min.js') }}" type="text/javascript"></script>
<script>

var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",  
            21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",  
            33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",  
            42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",  
            51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",  
            63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"  
           };  

//检查号码是否符合规范，包括长度，类型  
isCardNo = function(card)  
{  
    //身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X  
    var reg = /(^\d{15}$)|(^\d{17}(\d|X)$)/;  
    if(reg.test(card) === false)  
    {  
        return false;  
    }  
  
    return true;  
};  
  
//取身份证前两位,校验省份  
checkProvince = function(card)  
{  
    var province = card.substr(0,2);  
    if(vcity[province] == undefined)  
    {  
        return false;  
    }  
    return true;  
};  
  
//检查生日是否正确  
checkBirthday = function(card)  
{  
    var len = card.length;  
    //身份证15位时，次序为省（3位）市（3位）年（2位）月（2位）日（2位）校验位（3位），皆为数字  
    if(len == '15')  
    {  
        var re_fifteen = /^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/;   
        var arr_data = card.match(re_fifteen);  
        var year = arr_data[2];  
        var month = arr_data[3];  
        var day = arr_data[4];  
        var birthday = new Date('19'+year+'/'+month+'/'+day);  
        return verifyBirthday('19'+year,month,day,birthday);  
    }  
    //身份证18位时，次序为省（3位）市（3位）年（4位）月（2位）日（2位）校验位（4位），校验位末尾可能为X  
    if(len == '18')  
    {  
        var re_eighteen = /^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/;  
        var arr_data = card.match(re_eighteen);  
        var year = arr_data[2];  
        var month = arr_data[3];  
        var day = arr_data[4];  
        var birthday = new Date(year+'/'+month+'/'+day);  
        return verifyBirthday(year,month,day,birthday);  
    }  

    return false;  
};  
  
//校验日期  
verifyBirthday = function(year,month,day,birthday)  
{  
    var now = new Date();  
    var now_year = now.getFullYear();  
    //年月日是否合理  
    if(birthday.getFullYear() == year && (birthday.getMonth() + 1) == month && birthday.getDate() == day)  
    {  
        //判断年份的范围（3岁到100岁之间)  
        var time = now_year - year;  
        if(time >= 3 && time <= 100)  
        {  
            return true;  
        }  
        return false;  
    }  
    return false;  
};  
  
//校验位的检测  
checkParity = function(card)  
{  
    //15位转18位  
    card = changeFivteenToEighteen(card);  
    var len = card.length;  
    if(len == '18')  
    {  
        var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);   
        var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');   
        var cardTemp = 0, i, valnum;   
        for(i = 0; i < 17; i ++)   
        {   
            cardTemp += card.substr(i, 1) * arrInt[i];   
        }   
        valnum = arrCh[cardTemp % 11];   
        if (valnum == card.substr(17, 1))   
        {  
            return true;  
        }  
        return false;  
    }  
    return false;  
};  
  
//15位转18位身份证号  
changeFivteenToEighteen = function(card)  
{  
    if(card.length == '15')  
    {  
        var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);   
        var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');   
        var cardTemp = 0, i;     
        card = card.substr(0, 6) + '19' + card.substr(6, card.length - 6);  
        for(i = 0; i < 17; i ++)   
        {   
            cardTemp += card.substr(i, 1) * arrInt[i];   
        }   
        card += arrCh[cardTemp % 11];   
        return card;  
    }  
    return card;  
  }; 

checkCard = function bttn()  
{    

    var user=document.getElementById('rela-name').value.toUpperCase();
   
    if(user==''){
        // <font color=" #ff0397">图片格式必须是.gif,jpeg,jpg,png</font>

           document.getElementById('error-prompt').setAttribute("placeholder",'请填写姓名');
          return false;
       
     } 
      var card = document.getElementById('card_no').value.toUpperCase(); 
    //是否为空  
    if(card === '')  
    {  
       document.getElementById('error-prompt').setAttribute("placeholder","请输入身份证号，身份证号不能为空");
        return false;  
    }  

    //校验长度，类型  
    if(isCardNo(card) === false)  
    {    
      document.getElementById('error-prompt').setAttribute("placeholder","您输入的身份证号码不正确，请重新输入");
        return false;  
    }  
    //检查省份  
    if(checkProvince(card) === false)  
    {  
        document.getElementById('error-prompt').setAttribute("placeholder","您输入的身份证号码不正确，请重新输入");
        return false;  
    }  
    //校验生日  
    if(checkBirthday(card) === false)  
    {   
        document.getElementById('error-prompt').setAttribute("placeholder","您输入的身份证号码生日不正确,请重新输入"); 
        return false;  
    }  
    //检验位的检测  
    if(checkParity(card) === false)  
    {   
       document.getElementById('error-prompt').setAttribute("placeholder","您的身份证校验位不正确,请重新输入"); 
        return false;  
    }  
};
</script>
<!-- <style>
.demo{width:300px; margin:60px auto 10px auto}
@media only screen and (min-width: 420px) {
    .demo{width:500px; margin:60px auto 10px auto}
}
button, .button {
  background-color: #AEDEF4;color: white;border: none;box-shadow: none;
  font-size: 17px;font-weight: 500;font-weight: 600;
  border-radius: 3px;padding: 15px 35px;margin: 26px 5px 0 5px;cursor: pointer; }
button:hover, .button:hover {background-color: #a1d9f2; }
</style> -->

<!-- 安全中心 -->
    <div class="edit-user" >
       
         <div id="menu-tab">
<!--tag标题-->
    <ul id="nav">
        <li><a href="#" class="selected">个人认证</a></li>
        <li><a href="{{URL('center/enterpriseow')}}">企业认证</a></li>
    </ul>
<!--二级菜单-->
    <div id="menu_con">
       @if(!$user)
        <div class="tag" style="display:block">
          <form class="tag-form" action="{{URL('center/gerenren')}}" method="POST"  onsubmit="return checkCard()" >
           
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <input type="hidden" name="id">
             <h2 class="tag-front" >Sooparty认证</h2>
                 <p class="tag-realy" >
                  <span class="tag-red">*</span>
                  
                 <input type="text" name="username" value="" id="rela-name" placeholder=" 请输入你的真实姓名" >
                  </p >
                  <p class="tag-realy">
                    <span class="tag-red">*</span>
                  <input type="text" name="card_no" id='card_no' placeholder="请输入你的身份证号" >
                 </p>
                 <div class="error-prompt"><input id="error-prompt" readonly></div> 
                 <div class="demo_1">
                      <button class="tag-btn" type="submit" >提交认证</button>
                 </div>
                 <!-- <input class="tag-btn" type="submit"   value='提交认证'  />   -->
                <!--  type="submit" <a class="tag-btn">提交认证</a>  type="submit"    onclick='javascript:checkCard();-->
           </form>
        </div> 
       @else
        <div class="tag" style="display:block">
          <form>
             <h2>实名认证信息</h2>
                 <p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名：
                 <input type="text" name="" value="{{ $user->uname }}">
            </p>
                  <p>身份证号：
                  <input type="text" name="" value="{{ substr_replace( $user->id_number, '*****', 12, 6)}}">
                 </p>
                <!-- <a class="tag-btn">确定</a> -->
          </form>
         </div>
        @endif
        
    </div>
</div>
                  
        </div>
   
<script>
var tabs=function(){
    function tag(name,elem){
        return (elem||document).getElementsByTagName(name);
    }
    //获得相应ID的元素
    function id(name){
        return document.getElementById(name);
    }
    function first(elem){
        elem=elem.firstChild;
        return elem&&elem.nodeType==1? elem:next(elem);
    }
    function next(elem){
        do{
            elem=elem.nextSibling;  
        }while(
            elem&&elem.nodeType!=1  
        )
        return elem;
    }
    return {
        set:function(elemId,tabId){
            var elem=tag("li",id(elemId));
            var tabs=tag("div",id(tabId));
            var listNum=elem.length;
            var tabNum=tabs.length;
            for(var i=0;i<listNum;i++){
                    elem[i].onclick=(function(i){
                        return function(){
                            for(var j=0;j<tabNum;j++){
                                if(i==j){
                                    tabs[j].style.display="block";
                                    //alert(elem[j].firstChild);
                                    elem[j].firstChild.className="selected";

                                }
                                else{
                                    tabs[j].style.display="none";
                                    elem[j].firstChild.className="";
                                }
                            }
                        }
                    })(i)
            }
        }
    }
}();
tabs.set("nav","menu_con");//执行
</script>

<style type="text/css">
    #error-prompt{
        line-height: 50px;

    }
</style>

@endsection