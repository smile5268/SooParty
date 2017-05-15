<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usdel extends Model
{
    use SoftDeletes;

    //设置表名
    public $table = 'user';

    //设置主键
    public $primaryKey = 'id';

    //设置日期时间格式
    public $dateFormat = "date('Y-m-d H:i:s',time())";

    protected $guarded = ['id','views','user_id','updated_at','created_at'];

    protected $dates = ['delete_at'];
}