<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 管理员表
class AdminUser extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */

    protected $table ='adminuser';
    public $timestamps = true;

    
}