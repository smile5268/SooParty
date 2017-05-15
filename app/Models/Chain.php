<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 管理员表
class Chain extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */

    protected $table ='chain';
    public $timestamps = true;

    
}