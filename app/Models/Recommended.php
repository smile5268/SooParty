<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


// 用户表
class Recommended extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */

    protected $table = 'Recommended';
    public $timestamps = true;

    
}