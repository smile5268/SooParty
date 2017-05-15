<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// 活动表
class Activities extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
  
    use SoftDeletes;

    //设置表名
    protected $table = 'activities';
    public $timestamps = true;

    //设置主键
    public $primaryKey = 'id';

    //设置日期时间格式
    public $dateFormat = "date('Y-m-d H:i:s',time())";

    protected $guarded = ['id','updated_at','created_at'];
    
    //软删除
    protected $dates = ['delete_at'];

    public function leImg(){
        return $this->hasMany('App\Models\Activity_image','act_id','id');
    }

    
}