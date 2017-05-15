<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 活动套餐表
class Package extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'activity_package';
    public $timestamps = true;

    
}