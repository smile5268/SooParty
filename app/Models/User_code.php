<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 用户短信验证表
class User_code extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'user_code';
    public $timestamps = true;
   
}