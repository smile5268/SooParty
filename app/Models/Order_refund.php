<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 订单退款表
class Order_refund extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'order_refund';
    public $timestamps = true;

    
}