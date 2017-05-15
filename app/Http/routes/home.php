<?php

Route::group(['middleware' => ['web']],function(){  
    // 首页
    Route::get('/', 'IndexController@index');

    // 注销
    Route::any('login/cancel',"LoginController@cancel"); 

    // 活动列表页
    Route::any('list/screening/{screening}', "ListController@index");  

    // 活动详情页 
    Route::get('list/details', "ListController@details");

    Route::any('list/enterprise',"ListController@enterprise");   // 企业列表页  
    
    // 活动收藏
    Route::post('list/attend', "ListController@attend");

    // 加入购物车
    Route::post('list/shopping',"ListController@shopping");

    // 缩略图
    Route::any('thu',"ListController@thu");   

    // 搜友 
    Route::any('search',"ListController@search");  
          
});

// 登录&注册
Route::group(['prefix' => 'login','middleware' => ['loginHome']],function(){  
    Route::get('/', "LoginController@index")->name('user.login');                   // 登录页
    Route::post('receive', "LoginController@receive");          // 登录接收页
    Route::get('register',"LoginController@register");          // 注册页
    Route::post('register/doRegister',"LoginController@doRegister");    // 注册接收
    Route::post('register/repeat',"LoginController@repeat");    // 注册页验证手机号是否注册
    Route::post('register/code',"LoginController@code");        // 注册页短信发送

});

// 活动
Route::group(['prefix'=>'list','middleware' => ['home']],function(){
    Route::get('attendCollection', "ListController@attendCollection");  // 活动收藏页
    Route::get('shoppingCart', "ListController@shoppingCart");     // 购物车页
    Route::post('shoppingAdd', "ListController@shoppingAdd");      // 购物车活动添加
    Route::post('shoppingRed', "ListController@shoppingRed");      // 购物车活动减少
    Route::post('shoppingDel', "ListController@shoppingDel");      // 购物车活动删除
    Route::any('order', "ListController@order");                   // 订单页
    Route::post('orderAdd',"ListController@orderAdd");             // 订单接收页    
    Route::any('friend',"ListController@friend");   //访问主页
    Route::post('focus',"ListController@focus");   //关注别人或是自己
    Route::post('nofocus',"ListController@nofocus"); //取消关注别人或是取消关住自己
    // Route::any('attention',"ListController@attention");  //关注处理

});

// 个人中心
Route::group(['prefix'=>'center','middleware' => ['home']],function(){

        Route::get('index', "CenterController@index");                     // 首页  
        Route::any('mysoo',"CenterController@mysoo");
        Route::any('sign',"CenterController@sign");                          //我报名的
        Route::get('release',"CenterController@release");                    //我发布的
        Route::any('editor',"CenterController@editor");                      //编辑资料
    // Route::any('evaluation',"CenterController@evaluation");               //我的评价
        Route::any('levelman',"CenterController@levelman");                  //等级管理
        Route::any('activitylist',"CenterController@activitylist");          //活动列表
        Route::any('activityadmin',"CenterController@activityadmin");        //活动管理
        Route::get('accountman',"CenterController@accountman");              //账户管理
        Route::any('real',"CenterController@real");                          //实名认证
        Route::post('gerenren',"CenterController@gerenren");                 //个人认证
        Route::any('account_binding',"CenterController@account_binding");    //账号绑定
        Route::any('binding_bank',"CenterController@binding_bank");          //绑定银行卡
        Route::any('account_details',"CenterController@account_details");    //账号明细
        Route::any('update_password',"CenterController@update_password");    //修改密码
        Route::post('update_pass',"CenterController@update_pass");           //接收密码
        Route::post('refund',"CenterController@refund");                     //申请退款
        Route::post('cancel',"CenterController@cancel");                     //申请退款取消

});   

// 发布活动
Route::group(['prefix'=>'service', 'middleware' => ['home']],function(){

    Route::any('doRelease', "ServiceController@doRelease");     // 发布接收页
    Route::any('previewRelease', "ServiceController@previewRelease");   // 发布预览页
    Route::get('website', "ServiceController@website");     //网站地图
    Route::get('release_failure', "ServiceController@release_failure");  //发布失败  
    Route::get('suggestions', "ServiceController@suggestions"); //投诉与建议
    Route::get('user_agreement', "ServiceController@user_agreement"); //用户协议
    Route::get('Privacy', "ServiceController@Privacy"); //隐私协议
    Route::get('contact', "ServiceController@contact"); //联系我们

});

// 微信 wechat
Route::group(['prefix'=>'wechat', 'middleware' => ['wechat']],function(){

    Route::any('/', "WechatController@index");     // 微信支付

});



