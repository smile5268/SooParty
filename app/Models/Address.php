<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 订单用户信息表
class Address extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'address';
    public $timestamps = true;

    
}