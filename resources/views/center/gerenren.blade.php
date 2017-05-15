@extends('center.index')

@section('classOn','surey9')

@section('right')

<script type="text/javascript" src="/js/jquery.js"></script>
 <script type="text/javascript">
        $(document).ready(function() {
            function jump(count) {
               
                window.setTimeout(function(){
                    count--;
                    if(count > 0) {
                        $('#num').html(count);
                        jump(count);
                    } else {
                       location.href="/center/real";
                    }
                }, 1000);
            }
            jump(3);
        });
    </script>


<!-- 安全中心 -->
<div class="edit-user" >
    <div id="menu-tab">
        <div id="menu_con1">
            <div class="tag" style="display:block">
                <h2>恭喜您！实名认证成功</h2>
                <p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名：
                     <input type="text" name="" value="{{ $user->uname }}">
                </p>
                <p >身份证号：
                      <input type="text" name="" value="{{ substr_replace( $user->id_number, '*****', 12, 6)}}">
                </p>
                <p style="color:#ff0397;font-weight: bold;  ">认证成功3秒后自动跳转。当前还剩<span id="num">3</span>秒</p>
             </div>         
        </div>
    </div>
                  
</div>

<!-- <script>setTimeout('window.location.href=\'/center/real\'',2000)</script> -->

@endsection