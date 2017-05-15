<div class="w1200 head-bottom">
	<a href="javascript:;" class="logo"><img src="{{ URL::asset('/images/logo.png') }}" alt="Sooparty" ></a>

	<div class="w1200 head-bottom">
		<a href="{{ URL('/') }}"   class="logo"><img src="{{ URL::asset('/images/logo.png') }}" alt="Sooparty"></a>
		<div class="search" id="search">
            <ul class="menu" id="menu">
            	<li class="active">爱好</li>
              <li class="gradient">奖品</li>
              <li class="gradient">企业</li>
            </ul>
            <div class="form">
                <form action="" method='post' id="form_submits">
                    <span>
  						        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	<input type="hidden" name="seek" value="" class="seek1">
                      <input class="text" type="text" name="ak" value="" placeholder="请输入关键字"/>
                      <input class="btn" id="btnsubmit" type="submit" value=""/>
                    </span>
                </form>
            </div> 
		   <!--  <div class="search-ks">   url('list/enterprise')
		        <a href="javascript:;"  onclick="ale();">iPhone6手机</a>
		        <a href="javascript:;"  onclick="ale();">智能设备</a>
		        <a href="javascript:;"  onclick="ale();">空调</a>
		        <a href="javascript:;"  onclick="ale();">漂流</a>
		        <a href="javascript:;"  onclick="ale();">iPhone6s手机</a>
		        <a href="javascript:;"  onclick="ale();">跳伞</a>
		    </div> -->
		</div>
	</div>
</div>

<script type="text/javascript">
// 切换搜索框
$(function (){
  (function (){
    var aLi = $('#menu li');
    var oText = $('#search').find('.form .seek1');
    var arrText = ['hobby','prize','enterprise'];
    var iNow = 0;
    
    oText.val(arrText[iNow]);
    
    aLi.each(function (index){
      $(this).click(function (){
        aLi.attr('class', 'gradient');
        $(this).attr('class', 'active');
        
        iNow = index;
        
        oText.val(arrText[iNow]);
      });
    });
    
    oText.focus(function (){
      if( $(this).val() == arrText[iNow] ) {
        $(this).val('');
      }
    });
    oText.blur(function (){
      if( $(this).val() == '' ) {
        oText.val(arrText[iNow]);
      }
    });
  })();
});

// 区分搜的是企业还是奖品 如果是企业，跳到企业列表页，如果是爱好或奖品，就跳到活动列表页
$('#btnsubmit').click(function(){
    var seekSwitch = $('.seek1').val();

    if(seekSwitch == 'enterprise'){
        var current = "{{ URL('list/enterprise') }}";

    }else{
        var current = "{{ URL('list/screening/ty0_co0') }}?";
    }
    $('#form_submits').attr('action',current);
    
})
</script>

