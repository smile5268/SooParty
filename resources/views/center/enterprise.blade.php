@extends('center.index')

@section('classOn','surey9')

@section('right')
<style>
/*a{color:#fff;}*/
.file {
  position: relative;top: 10px;display: inline-block;overflow: hidden;text-decoration: none;text-indent: 0;padding-left: 19px;border-radius: 10px;color: #fff;font-size: 13px;height: 36px;line-height: 36px;}
.file input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
}
.gradient:hover{
  color: #fff;
}
.gradient{
   
    filter:alpha(opacity=100 finishopacity=50 style=1 startx=0,starty=0,finishx=0,finishy=150) progid:DXImageTransform.Microsoft.gradient(startcolorstr=#fff,endcolorstr=#ccc,gradientType=0);
    -ms-filter:alpha(opacity=100 finishopacity=50 style=1 startx=0,starty=0,finishx=0,finishy=150) progid:DXImageTransform.Microsoft.gradient(startcolorstr=#fff,endcolorstr=#ccc,gradientType=0);    
    background:-moz-linear-gradient(top, #fff, #ccc);  
    background:-webkit-gradient(linear, 0 0, 0 bottom, from(#0066cc), to(#0066cc));  
    background:-o-linear-gradient(top, #fff, #ccc); 
}
.fileerrorTip1{color:#a9a9a9;}

</style>


<script>

var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",  
            21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",  
            33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",  
            42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",  
            51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",  
            63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"  
           };  

/*企业认证*/
chec = function bttn()  
{   
     var user=document.getElementById('enterprise_name').value.toUpperCase();
    if (user=='') {
        document.getElementById('error-prompt').setAttribute("placeholder","请输入企业名称，企业名称不能为空");
        return false;  
    }
    
    var user=document.getElementById('enterprise_head').value;
    if (user=='') {
     document.getElementById('error-prompt').setAttribute("placeholder","请输入负责人姓名，负责人姓名不能为空");
        return false;  
    }

    var card = document.getElementById('enterpriseuame_card').value;  
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
       document.getElementById('error-prompt').setAttribute("placeholder","您输入的身份证号码不正确,请重新输入"); 
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
    // alert('OK');

    var user=document.getElementById('enterprise_file').value;
    if (user=='') { 
      document.getElementById('error-prompt').setAttribute("placeholder","请上传营业执照，营业执照不能为空");
        return false;  
    }
    return true; 
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
</script>
<!-- 安全中心 -->
    <div class="edit-user" >
       
         <div id="menu-tab">
<!--tag标题-->
    <ul id="nav">
        <li><a href="{{URL('center/real')}}" >个人认证</a></li>
        <li><a href="{{URL('center/enterpriseow')}}" class="selected" >企业认证</a></li>
    </ul>
<!--二级菜单-->

    <div id="menu_con">
       @if(!$ent)
        <div class="tag" >
          <form class="tag-form" action="{{URL('center/enter')}}" method="POST"  onsubmit="return chec()"  enctype="multipart/form-data" >
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <h2 class="tag-front" >Sooparty认证</h2>
                 <p class="tag-realy">
                      <span class="tag-red">*</span>
               
                 <input type="text" name="enterprise_name" id="enterprise_name" placeholder="  请输入企业名称" >
            </p>
             <p class="tag-realy" >
                <span class="tag-red">*</span>
            
                 <input type="text" name="enterprise_head" id="enterprise_head" placeholder=" 请输入相关负责人姓名">
            </p>
                  <p class="tag-realy">
                     <span class="tag-red">*</span>
                    
                  <input type="text" name="enterprise_card" id="enterpriseuame_card" placeholder=" 请输入相关负责身份证号">
                 </p>
                   <p class="tag-realy">
                  <span class="tag-red">*</span>
                  <a href="javascript:;" class="file gradient" >选择文件 
　　                <input type="file" name="enterprise_file" id="enterprise_file">
                   </a>
                   <span class="fileerrorTip1"></span>
                  <!-- <input type="file" name="enterprise_file" id="enterprise_file" placeholder="营业执照："> -->
                 </p>
                 <div class="error-prompt"><input id="error-prompt" readonly=""></div>
                <input class="tag-btn" type="submit"    value='提交认证'>
           </form>
         </div>
          @else
          <div class="tag">
          <form class="form-tag">
                 <h2>{{ $atteif }}</h2>
                 <p >&nbsp;&nbsp;&nbsp;公司名：
                 <input type="text" name="" value="{{$ent->enter_name}}">
            </p>
             <p >&nbsp;&nbsp;&nbsp;负责人：
                 <input type="text" name="" value="{{$ent->enter_headname}}">
            </p>
                  <p>身份证号：
                  <input type="text" name="" value="{{substr_replace( $ent->enter_number, '****', 6, 8)}}">
                 </p>
                   <p>营业执照：
                  <img src="{{$ent->enter_file}}" alt="" style="width:200px;height:100px">
                 </p>
                 @if($tte == 0)
                 <p id="ent"  >审核中，需要1到2个工作日才能完成，节假日推后，如需加速审核，请电话联系我们 0755-85217521</p>
                 @endif
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
<script type="text/javascript">
  $(".file").on("change","input[type='file']",function(){
    var filePath=$(this).val();
    if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
         // $(".fileerrorTip1").html("").hide();
        var arr=filePath.split('\\');
        var fileName=arr[arr.length-1];
        $(".fileerrorTip1").html(fileName);
    }else{
        $(".fileerrorTip1").html("");
        $(".fileerrorTip1").html("您未上传文件，或者您上传文件类型有误！").show();
        return false
    }
})
</script>

@endsection