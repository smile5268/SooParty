@extends('center.index')

@section('classOn','surey13')

@section('right')
<style type="text/css">

/*认证*/
.edit-user {
    float: left;
    border: 1px solid #e5e5e5;
}
#menu-tab {
    float: left;
    width: 980px;
    overflow: hidden;
    /* margin: 100px auto; */
    border: 1px solid #e5e5e5;
}
#menu-tab #nav {
    display: block;
    width: 100%;
    height: 50px;
    background: #ffffff;
    /* padding: 0; */
    margin: 0;
    list-style: none;
}
#menu-tab #nav li {float:left;width:120px;
}
#menu-tab #nav li a {display:block;line-height:50px;text-decoration:none;padding:0 0 0 5px; text-align:center; color:#333; font-size: 16px;color: #e5e5e5;

}
#menu_con{ width:980px; height:500px; border-top:none;
      background: #ffffff; 
}
.tag {
    padding: 10px;
    overflow: hidden;
    width: 600px;
     margin: 20px auto; 
    text-align: center;
  
}
.selected{
  background:#0066cc; 
  color: #ffffff;
}

.tag h2{
  color: #ff0397;
  margin: 50px auto;

}

.tag input{
  width: 260px;
  height: 35px;
  border: none;
  border-bottom: 1px solid #e5e5e5;
}
.tag p{
   line-height: 50px;
  font-size:  16px;
  font-weight: bold;
}

.tag-return{
  width: 200px;
  margin: 50px auto;

}
.tag .tag-btn{
  display: block;
  width: 150px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  border: none;
  background: #0066cc;
  color: #ffffff;
  border-radius: 5px;
  margin: 50px auto;
}
</style>
<!-- 安全中心 -->
    <div class="edit-user" >
       
         <div id="menu-tab">
<!--tag标题-->
    <ul id="nav">
        <li><a href="#" class="selected">个人认证</a></li>
        <li><a href="#" class="">企业认证</a></li>
    </ul>
<!--二级菜单-->
    <div id="menu_con">
        <div class="tag" style="display:block">
          <form>
             <h2>恭喜您！实名认证成功</h2>
                 <p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名：
                 <input type="text" name="" value="{{$user->uname}}">
            </p>
                  <p>身份证号：
                  <input type="text" name="" value="{{ substr_replace( $user->id_number, '****', 6, 8)}}">
                 </p>
                <a class="tag-btn">确定</a>
          </form>
         </div> 
        <div class="tag" style="display:none">
          <form>
              <h2>恭喜您！企业认证成功</h2>
                 <p >公司名：
                 <input type="text" name="">
            </p>
             <p >负责人：
                 <input type="text" name="">
            </p>
                  <p>身份证号：
                  <input type="text" name="">
                 </p>
                   <p>营业执照：
                  <input type="file" name="">
                 </p>
                <input class="tag-btn" value="确认提交2">
                </form>
         </div> 
    
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
<!--代码部分end-->
@endsection