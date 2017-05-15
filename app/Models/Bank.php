<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 订单表
class Bank extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'bank';
    public $timestamps = true;

    
}