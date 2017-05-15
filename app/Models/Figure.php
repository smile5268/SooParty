<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 广告表
class Figure extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */

    protected $table ='figure';
    public $timestamps = true;

    
}