@extends('layouts.style')

@section('title', '订单')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
 <style type="text/css">
     /*免费参加*/

.shop-pay{
    background: #ffffff;
    width: 520px;
    height: 330px;
    margin : 0px auto;
    position: relative;
    z-index: 100;
    top: -600px;
    display: none;
    box-shadow:0 0 5px 5px #cccccc;
}
.order-look{
   float: right;margin-right: 16px;
   width: 110px;
   height: 35px;
   line-height: 35px;
   margin-left: 55px;
   margin-top: -5px;
   text-align: center;
   color: #ffffff;
   background: #0066cc;
   border: none;
   border-radius: 5px;
}
.order-ok{
   float: left;
   width: 110px;
   height: 35px;
   line-height: 35px;
   margin-left: 55px;
   margin-top: -5px;
   text-align: center;
   color: #ffffff;
   background: #0066cc;
   border: none;
   border-radius: 5px;
}
.order-look:hover{
    background: #0066cc;
    color: #ffffff;
}
.order-hr{
    width: 480px;
    border-bottom: 1px dashed #e5e5e5;
    margin-left: 20px;
}
.order-button{
    margin-top: 30px;margin-left: -30px;
}
.order-join h2{
    text-align: center;
    color: #0066cc;
}
.order-join p{
    margin: 10px 20px 0px 20px;
}
.join-youhui{
    font-weight: bold;font-size: 20px;margin: 0 3px;
    color: #e4228b;
}
.join-num{
    width: 60px;
    height: 35px;
    text-indent: 2em;border: 1px solid #ccc;
}
.join-jia{
    width:25px; height:35px; background: #ffffff;border: 1px solid #ccc;
}
.num-jia button{
    position: relative;
    top: -53px;
    left: 126px;
    width: 26px;
    display: block;
}
.join-sx{
  margin-left: 5px;
  color: #e4228b; 
  font-weight: bold;
}
.order-join{
    margin-bottom: 20px;
}
.sub-total{
    float: left;width:104px;background: #e4228b;height:48px;
    color: #ffffff;
    font-size: 16px;font-weight: bold;
    border:none;
}
.shop-alert1,.shop-alert3 {
    float: right;
    position: relative;
    left: 140px;
    top: -30px;
    color:#ff0397; 
}
.shop-alert2{
    float: right;
    position: relative;
    left: 235px;
    top: -30px;
    color:#ff0397; 
}
#tel{
    margin-top: -10px;
}
 </style>
}

<link rel="stylesheet" href="/css/neat.css" type="text/css">
<link rel="stylesheet" href="/css/box.css" type="text/css">
<link rel="stylesheet" href="/css/style.css" type="text/css">
<!-- 购物车 -->
<div class="shop-tit">
    <div class="w1200"><span>提交订单</span></div>
</div>
<div class="shop-place" > 
<div class="shop-Cart-tt">
        <h1>参加活动人预留信息<small></small></h1>
    </div>
    <div class="shop-Cart-add">
        <div class="shop-Cart-add1">
            <ul>
                <li><span style="color:#ff0000">*</span>联 系 人：</li>
                <li><span style="color:#ff0000">*</span>身份证号：</li>
                <li><span style="color:#ff0000">*</span>手机号码：</li>
            </ul>
        </div>   

<!-- <form id='orderForm'> -->
    <div class="shop-Cart-add2">  
        <ul>
            <li style="width: 150px;">
                <input type="text" id="name" name="name" value=''  style="width:150px;" placeholder="请输入您的姓名"/>
                <p class="shop-alert1"></p>
            </li>
            <li style="width: 400px;">
                <input type="text"  id='card_no' name="card_no" value='' placeholder="请输入您的身份证号">
                <p class="shop-alert2"></p>
            </li>
            <li style="width: 148px;">
                <input type="text" id="tel" name="tel" value='' style="width: 140px;" placeholder="请输入您的电话"/>
                 <p class="shop-alert3"></p>
            </li>
        </ul> 
    </div>
 </div> 
  <div class="shop-Cart-tt">
        <h1>确认订单信息</h1>
    </div>
<div class="catbox">
    <table id="cartTable">
        <thead>
        <tr>
            <th>活动</th>
            <th>价格（￥）</th>
            <th>数量</th>
            <th>金额（元）</th>
        </tr>
        <tr style="height: 20px;"></tr>
        </thead>
        <tbody>
            @foreach($details as $value)
                @if($value)
                    <tr>  
                        <td class="goods">
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            <span><img src="{{ $value->thumbnail }}" alt=""/></span>
                            <div>
                                <h1>{{ $value->activity_name }}</h1>
                                <p>{{ $value->activity_start_time }}</p>
                                <h6>{{ $value->province }} | {{ $value->city }}</h6>
                            </div>
                        </td>
                        <td class="price">
                            @if(isset($value->cost))
                              {{ $value->cost }}
                            @else
                               0.00 
                            @endif
                        </td>
                        <td class="count"><span value="{{ $value->act_number }}" >{{ $value->act_number }}</span></td>
                        <td class="subtotal">{{ $value->cost*$value->act_number }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

    <div class="cartFoot" id="cartFoot">
        <div class="fr closing" onclick="orderForm()"><input type="submit" class="sub-total" name="" value="结 算 "  ></div>
        <input type="hidden" id="cartTotalPrice" />
        <div class="fr total">合计：￥<span id="priceTotal">0.00</span></div>
        <!-- <div class="fr selected" id="selected">已选商品<span id="selectedTotal">0</span>件</div> -->
            <!--忽略-->
            <div class="selected-view"><div id="selectedViewList" class="clearfix"></div>
        </div>
    </div>
<!-- </form> -->

</div>

<script type="text/javascript">            
            var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",  
            21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",  
            33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",  
            42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",  
            51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",  
            63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"  
           };
// 提交
function orderForm(){

    var check = checkCard();
    // 判断验证是否通过
    // if(check){

        var name = $('#name').val();        // 用户名
        var card_no = $('#card_no').val();  // 身份证
        var tel = $('#tel').val();          // 电话

        // 获取购物车里对应的ID
        var orderId=[]; 
        $("input:hidden[name='id']").each(function() {
            orderId.push($(this).val());
        })

        // 总价格
        var total = 0;
        $('.subtotal').each(function(){
            total += parseInt(this.innerHTML);
        });

        $.ajax({
            type: 'POST',
            url: "{{URL('list/orderAdd')}}",
            data:{'orderId':orderId,'total':total,'name':name,'card':card_no,'tel':tel,'_token':"{{ csrf_token() }}"},
            dataType: 'json',
            success: function(data){
                alert(data.cot);
            },
            error : function(){
                alert('网络错误，请刷新页面再次尝试！');
            }
        });

    // }
}

// 验证
function checkCard()  
{  
    var name=document.getElementById("name").value;
    if(name==''){
        $('.shop-alert1').html("姓名不能为空");
        return false;
    }else{
        $('.shop-alert1').html("");
        // return true;
    }

    var card = document.getElementById('card_no').value;  
    //是否为空  
    if(card === '')  
    {  
        $('.shop-alert2').html('请输入身份证号，身份证号不能为空');  
        document.getElementById('card_no').focus;  
        return false;  
    }  else{
        $('.shop-alert2').html('');  
    }

    //校验长度，类型  
    if(isCardNo(card) === false)  
    {  
        $('.shop-alert2').html('您输入的身份证号码不正确，请重新输入');  
        document.getElementById('card_no').focus;  
        return false;  
    }  
    //检查省份  
    if(checkProvince(card) === false)  
    {  
        $('.shop-alert2').html('您输入的身份证号码不正确,请重新输入');  
        document.getElementById('card_no').focus;  
        return false;  
    }  
    //校验生日  
    if(checkBirthday(card) === false)  
    {  
        $('.shop-alert2').html('您输入的身份证号码生日不正确,请重新输入');  
        document.getElementById('card_no').focus();  
        return false;  
    }  
    //检验位的检测  
    if(checkParity(card) === false)  
    {  
        $('.shop-alert2').html('您的身份证校验位不正确,请重新输入');  
        document.getElementById('card_no').focus();  
        return false;  
    }
    //手机号码
    var tel=document.getElementById('tel').value;    
    if(tel==''){
        $('.shop-alert3').html("电话号码不能为空");
        return false ;
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

// 计算总额
 window.onload=function numbers() {
        var total = 0;
        $('.subtotal').each(function(){
            total += parseInt(this.innerHTML);
        });
         // alert(total);
         var num= $('#priceTotal').text(total);//赋值
         return total;
         
    }
</script>
@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection
