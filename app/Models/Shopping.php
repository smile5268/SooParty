<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 购物车表
class Shopping extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'shopping';
    public $timestamps = true;

}