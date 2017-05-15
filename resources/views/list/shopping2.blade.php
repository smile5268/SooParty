@extends('layouts.style')

@section('title', '购物车')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<!-- 购物车 -->
<div class="shop-tit">
	<div class="w1200"><span>购物车</span></div>
</div>
<div class="catbox">
    <table id="cartTable">
        <thead>
        <tr>
            <th><label>
            <input class="check-all check" type="checkbox"/>&nbsp;&nbsp;全选</label></th>
            <th>活动</th>
            <th>价格（￥）</th>
            <th>数量</th>
            <th>金额（元）</th>
            <th class="oper">操作</th>
        </tr>
        <tr style="height: 20px;"></tr>
        </thead>
        <tbody>
<script type="text/javascript">
   
</script>
        @foreach($details as $det)
  
        <tr>
            <td class="checkbox">
                @if($data>(substr($det->activity_start_time,0,10)))
                    <input type="hidden" />
                @else
                    <input class="check-one check" type="checkbox" name="shoppingId" value="{{ $det->id }}"/>
                @endif
            </td>
            <td class="goods">
              <a href="{{ URL('list/details') }}?id={{ $det->act_id }}"  value="{{ $det->act_id }}">
                <span><img src="../images/ly.jpg" alt="" style="width:120px;height:60px;"/></span>
                <div>

                    <h1>{{ $det->activity_name }}</h1>
                    <!-- <b>夺宝活动（投票）</b> -->

                    @if($data>(substr($det->activity_start_time,0,10)))
                        <img class="phpernote" src="/images/失效.png" style="width:78px;height:30px;">
                    @else
                        
                    @endif
                    <h6>{{ substr($det->activity_start_time,0,10) }} &nbsp; {{ $det->province }} | {{ $det->city }}</h6>
                </div>
              </a>
            </td>
             @if( ($det->cost)==0 )
            <td class="price">0.00</td>
             @else
             <td class="price">{{$det->cost}}</td>
             @endif
                <td class="count" name="{{ $det->id }}">
                <span class="reduce"></span>
                <input class="count-input" type="text" value="{{ $det->act_number }}"/>
                <span class="add" id="{{ $det->id }}">+</span>
            </td>
            <td class="subtotal">{{ $det->cost*$det->act_number }}</td>

            <td class="operation" ><span class="delete" style="cursor:pointer">删除</span></td>
            <input type='hidden' class="packageId" value="{{ $det->packageId }}">
        </tr>
        @endforeach
        
        </tbody>
    </table>
    <div class="cartFoot" id="cartFoot">
        <label class="fl select-all"><input type="checkbox" class="check-all check"/>&nbsp;&nbsp;全选</label>
      <!--   <a class="fl delete" id="deleteAll" href="javascript:;">删除</a> -->
        <a href="{{URL('list/order')}}" style="color: #ffffff"><div class="fr closing" onclick="getTotal();">去付款</div></a>
        <!-- <div onclick="getTotal();">111111</div> -->
        <input type="hidden" id="cartTotalPrice" />
        <div class="fr total">合计：￥<span id="priceTotal">0.00</span></div>
        <div class="fr selected" id="selected">已选商品<span id="selectedTotal">0</span>件</div>
            <!--忽略-->
            <div class="selected-view"><div id="selectedViewList" class="clearfix"></div>
        </div>
    </div>
</div>
<script>
    var table = document.getElementById('cartTable'); // 购物车表格
    var selectInputs = document.getElementsByClassName('check'); // 所有勾选框
    var checkAllInputs = document.getElementsByClassName('check-all') // 全选框
    var tr = table.children[1].rows; //行
    var selectedTotal = document.getElementById('selectedTotal'); //已选商品数目容器
    var priceTotal = document.getElementById('priceTotal'); //总计
    var deleteAll = document.getElementById('deleteAll'); // 删除全部按钮
    var selectedViewList = document.getElementById('selectedViewList'); //浮层已选商品列表容器
    var selected = document.getElementById('selected'); //已选商品
    var cartFoot = document.getElementById('cartFoot');
      
    // 结算
    function getTotal() {
         
         // 获取购物车表ID
        var chk_value =[]; 
        $("input:checkbox[name='shoppingId']:checked").each(function(){
            chk_value.push($(this).val());
        });
      alert(chk_value);
        
    }
    // 计算单行价格
    function getSubtotal(tr) {
        var cells = tr.cells;
        var price = cells[2]; //单价
        var subtotal = cells[4]; //小计td
        var countInput = tr.getElementsByTagName('input')[1]; //数目input
        var span = tr.getElementsByTagName('span')[1]; //-号
        //写入HTML
        subtotal.innerHTML = (parseInt(countInput.value) * parseFloat(price.innerHTML)).toFixed(2);
        //如果数目只有一个，把-号去掉
        if (countInput.value == 1) {
            span.innerHTML = '';
        }else{
            span.innerHTML = '-';
        }
    }

    // 点击选择框
    for(var i = 0; i < selectInputs.length; i++ ){
        selectInputs[i].onclick = function () {
            if (this.className.indexOf('check-all') >= 0) { //如果是全选，则吧所有的选择框选中
                for (var j = 0; j < selectInputs.length; j++) {
                    selectInputs[j].checked = this.checked;
                }
            }
            if (!this.checked) { //只要有一个未勾选，则取消全选框的选中状态
                for (var i = 0; i < checkAllInputs.length; i++) {
                    checkAllInputs[i].checked = false;
                }
            }
        }
    }


    //已选商品弹层中的取消选择按钮
    selectedViewList.onclick = function (e) {
        var e = e || window.event;
        var el = e.srcElement;
        if (el.className=='del') {
            var input =  tr[el.getAttribute('index')].getElementsByTagName('input')[0]
            input.checked = false;
            input.onclick();
        }
    }

    //为每行元素添加事件
    for (var i = 0; i < tr.length; i++) {
        //将点击事件绑定到tr元素
        tr[i].onclick = function (e) {
            var e = e || window.event;
            var el = e.target || e.srcElement; //通过事件对象的target属性获取触发元素
            var cls = el.className; //触发元素的class
            var countInout = this.getElementsByTagName('input')[1]; // 数目input
            var value = parseInt(countInout.value); //数目
            var actId = $(this).find('.add').attr('id');     // 活动ID
            var packs = $(this).find('.packageId').val();    // 套餐ID

            //通过判断触发元素的class确定用户点击了哪个元素
            switch (cls) {
                case 'add': //点击了加号
                    var add = countInout.value = value + 1;
                    getSubtotal(this);
                    $.ajax({
                        type: 'POST',
                        url: "shoppingAdd",
                        data:{'add':add,'actId':actId,'_token':"{{ csrf_token() }}",'packs':packs},
                        dataType: 'json',
                        success: function(data){

                        },
                    });
                    break;
                case 'reduce': //点击了减号
                    if (value > 1) {
                        var Red = countInout.value = value - 1;
                        getSubtotal(this);
                            $.ajax({
                                type: 'POST',
                                url: "shoppingRed",
                                data:{'Red':Red,'actId':actId,'_token':"{{ csrf_token() }}",'packs':packs},
                                dataType: 'json',
                                success: function(data){

                                },
                            });
                        }
                    break;
                case 'delete': //点击了删除
                    var conf = confirm('确定删除此商品吗？');
                    if (conf) {
                        this.parentNode.removeChild(this);

                        $.ajax({
                                type: 'POST',
                                url: "shoppingDel",
                                data:{'actId':actId,'_token':"{{ csrf_token() }}",'packs':packs},
                                dataType: 'json',
                                success: function(data){

                                },
                            });
                    }
                    break;
            }
            

        }

        // 给数目输入框绑定keyup事件
        tr[i].getElementsByTagName('input')[1].onkeyup = function () {
            var val = parseInt(this.value);
            if (isNaN(val) || val <= 0) {
                val = 1;
            }
            if (this.value != val) {
                this.value = val;
            }
            getSubtotal(this.parentNode.parentNode); //更新小计          
        }
    }
    // 点击全部删除
    deleteAll.onclick = function () {
        if (selectedTotal.innerHTML != 0) {
            var con = confirm('确定删除所选商品吗？'); //弹出确认框
            if (con) {
                for (var i = 0; i < tr.length; i++) {
                    // 如果被选中，就删除相应的行
                    if (tr[i].getElementsByTagName('input')[0].checked) {
                        tr[i].parentNode.removeChild(tr[i]); // 删除相应节点
                        i--; //回退下标位置
                    }
                }
            }
        } else {
            alert('请选择商品！');
        }
    }

    // 默认全选
    checkAllInputs[0].checked = true;
    checkAllInputs[0].onclick();
</script>


@endsection

@section('bottom')
    @include('layouts.bottom')
@endsection
