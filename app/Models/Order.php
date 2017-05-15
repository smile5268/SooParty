<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 订单表
class Order extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'order';
    public $timestamps = true;

    
}