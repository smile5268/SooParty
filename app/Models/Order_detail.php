<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 活动订单详情表
class Order_detail extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'order_detail';
    public $timestamps = true;

    
}