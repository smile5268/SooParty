<?php


//  后台主界面，分三个子页面
Route::group(['prefix'=>'admin'],function(){
                                                       //后台登陆
    Route::group(['prefix'=>'login','middleware' => ['web']], function () {
       Route::any('/',"Admin\AdminLoginController@index");   //后台的登陆页面   
       Route::any('send',"Admin\AdminLoginController@send"); //后台登陆接收 
    });
    Route::group(['prefix'=>'admin','middleware' => ['adminLong']], function (){                //后台
        Route::any('/',"Admin\MainController@index");             //后台首页
    });
    Route::group(['prefix'=>'main','middleware' => ['adminLong']], function (){                 //后台页面的主界面
        Route::get('left',"Admin\MainController@left");           //后台页面的左侧
        Route::get('top',"Admin\MainController@top");             //后台页面的顶部
        Route::get('right',"Admin\MainController@right");         //后台页面的右侧，也就是内容页
    });
    Route::group(['prefix'=>'user','middleware' => ['adminLong']], function () {
        Route::any('userAdd',"Admin\UserController@add");         //管理员添加页
        Route::any('user',"Admin\UserController@register");       //管理员接收页
        Route::any('userList',"Admin\UserController@lister");     //管理员列表页
        Route::any('userEdit',"Admin\UserController@edit");       //管理员修改页
        Route::post('userEd',"Admin\UserController@ed");          //管理员修改接收页
        Route::get('userEnable',"Admin\UserController@enable");   //启用管理员
        Route::get('userDisable',"Admin\UserController@disable"); //禁用管理员  userDel
        Route::any('userDel',"Admin\UserController@del");         //管理员的删除
    });

    Route::group(['prefix'=>'frontuser','middleware' => ['adminLong']], function (){
        Route::any('frontuserList',"Admin\FrontuserController@index");       //会员的列表页面
        Route::get('frontuserEnable',"Admin\FrontuserController@enable");    //启用会员
        Route::get('frontuserDisable',"Admin\FrontuserController@disable");  //禁用会员
        Route::get('frontuserEdit',"Admin\FrontuserController@edit");        //修改会员  
        Route::post('frontuserEd',"Admin\FrontuserController@ed");           //接受会员   
        Route::get('frontuserDel',"Admin\FrontuserController@Del");          //删除会员      
        Route::any('frontuserSec',"Admin\FrontuserController@sec");          //查询账号
    });

    Route::group(['prefix'=>'activity','middleware' => ['adminLong']], function (){
      Route::any('activepage',"Admin\ActivityController@activepage");      //活动页
      Route::get('activityUpdate',"Admin\ActivityController@update");
      Route::get('activityDel',"Admin\ActivityController@del");            //活动页   
      Route::any('activepagerSec',"Admin\ActivityController@sec");         //搜索编号
      Route::any('activepagerSec1',"Admin\ActivityController@sec1");       //搜索名称
      Route::get('disable',"Admin\ActivityController@disable");            // 活动禁用
      Route::get('show',"Admin\ActivityController@show");                  //活动显示    
      Route::any('upda',"Admin\ActivityController@updata");              //活动修改   

      Route::any('act_activity',"Admin\ActivityController@activity");        //活动审核   
      Route::any('add_activity',"Admin\ActivityController@add");             //添加活动
      Route::post('nente',"Admin\ActivityController@nente");                 //接收添加   
      Route::any('tyle',"Admin\ActivityController@tyle");                    //类型列表   
      

      Route::get('actedit',"Admin\ActivityController@actedit");               //类型名修改
      Route::post('editten',"Admin\ActivityController@editten");               //类型接收
      Route::get('hot',"Admin\ActivityController@hot");                       //热门  
      Route::get('theprize',"Admin\ActivityController@theprize");             //有奖
      Route::get('thesele',"Admin\ActivityController@thesele");               //精选活动
      Route::any('elect',"Admin\ActivityController@elect");                  //推选活动
      Route::get('noshow',"Admin\ActivityController@noshow");              //不推荐
      Route::any('showact',"Admin\ActivityController@showact");               //活动查看
      Route::any('activitythrough',"Admin\ActivityController@activitythrough");  //活动通过  
      Route::any('activitynothrough',"Admin\ActivityController@activitynothrough"); //活动不通过  
    });

    Route::group(['prefix'=>'audit','middleware' => ['adminLong']], function (){
      Route::any('firms',"Admin\AuditController@firms");           //企业认证  
      Route::get('tion',"Admin\AuditController@tion");             //放大图片
      Route::get('through',"Admin\AuditController@through");       //通过
      Route::get('nothrough',"Admin\AuditController@nothrough");   //不通过
      Route::get('del',"Admin\AuditController@del");               //删除    firmslist

      Route::get('firmslist',"Admin\AuditController@firmslist");   //企业列表   
      Route::get('push',"Admin\AuditController@push");             //企业推荐
      Route::get('nopush',"Admin\AuditController@nopush");         //不推荐企业
      Route::get('dele',"Admin\AuditController@dele");

    });

    Route::group(['prefix'=>'advertising','middleware' => ['adminLong']],function (){
      Route::any('advertisaddabc',"Admin\AdvertisingController@index");      //首页轮播图   
      Route::post('adver',"Admin\AdvertisingController@adver");                     //轮播图接收
      Route::any('advertisaddlist',"Admin\AdvertisingController@listter");  
      
      Route::get('edit',"Admin\AdvertisingController@edit");                  //修改  
      Route::post('advertisadded',"Admin\AdvertisingController@ed");          //修改接收
      Route::get('del',"Admin\AdvertisingController@del");                    //删除轮播图    
      Route::any('chain',"Admin\AdvertisingController@chain");                //外链广告  
      Route::post('chainshan',"Admin\AdvertisingController@add");             //添加外链  
      Route::any('chainlist',"Admin\AdvertisingController@chainlist");        //外链列表   
      Route::any('chainedit',"Admin\AdvertisingController@chainedit");        //外链修改
      Route::any('chained',"Admin\AdvertisingController@chained");            //外链修改接收
      Route::any('deled',"Admin\AdvertisingController@deled");                //外链删除
    });
     
     Route::group(['prefix'=>'order','middleware' => ['adminLong']], function (){     //订单管理           
        Route::any('orderlist',"Admin\OrderController@orderlist");             //订单列表 
        Route::get('order_showactivities',"Admin\OrderController@order_showactivities");       //查看活动 
        Route::get('order_update',"Admin\OrderController@order_update");       //退款审核  orderupdate
        Route::post('orderupdate',"Admin\OrderController@orderupdate");        // 退款状态修改
        Route::post('ordersearch',"Admin\OrderController@ordersearch");        // 订单搜索
    });
});


// 个人中心
Route::group(['prefix'=>'center','middleware' => ['home']],function(){
    Route::get('index', "CenterController@index");                                     // 首页 
        Route::any('mysoo',"CenterController@mysoo");                                 //个人主页
        Route::any('signin',"CenterController@signin");                               //签到
        Route::any('sign',"CenterController@sign");                          //我报名的
        Route::any('release',"CenterController@release");                             //我发布的   
        Route::any('coll',"ListController@attendCollection");                         //我的收藏 
        Route::any('colldel',"ListController@colldel");                               //收藏删除
        Route::any('shopcart',"CenterController@shopcart");                           //购物车
        Route::any('editor',"CenterController@editor");                               //编辑资料  
        Route::any('editer',"CenterController@editer");                               //接受编辑资料
    // Route::any('evaluation',"CenterController@evaluation");              //我的评价
        Route::any('levelman',"CenterController@levelman");                           //等级管理
      // Route::any('footprint',"CenterController@footprint");              //我的足迹
        Route::get('accountman',"CenterController@accountman");                      //账户管理
        Route::any('activityadmin',"CenterController@activityadmin");            //活动详情
        Route::any('real',"CenterController@real");                                  //实名认证    
        Route::post('gerenren',"CenterController@gerenren");                         //个人认证
        Route::post('enterprise',"CenterController@enterprise");                     //企业认证  

        Route::get('enterpriseow',"CenterController@enterprises");                //显示企业   

        Route::any('enter',"CenterController@enter");                                //接收企业数据

        Route::any('account_binding',"CenterController@account_binding");     //账号绑定
        Route::any('binding_bank',"CenterController@binding_bank");                 //绑定银行卡
        Route::any('binding',"CenterController@binding");                             //绑定支付账号
        Route::any('account_details',"CenterController@account_details");             //账号明细   
        Route::any('update_password',"CenterController@update_password");             //修改密码   
        Route::post('update_pass',"CenterController@update_pass");                    //接收密码     
        Route::any('company',"CenterController@company");                             //公司详情编辑
        Route::post('company_post',"CenterController@company_post");                  //公司详情接收
        Route::any('companydetail',"CenterController@companydetail");                 //公司详情 
        Route::any('agreement',"CenterController@agreement");                      //服务协议
});   

