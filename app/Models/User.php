<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 用户表
class User extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'user';
    public $timestamps = true;

    
}