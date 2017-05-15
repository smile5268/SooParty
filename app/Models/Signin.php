<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 活动收藏表
class Signin extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'signin';
    public $timestamps = true;

    
}