<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


// 企业认证表
class Enterprise extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */

    protected $table = 'enterprise';
    public $timestamps = true;

    
}