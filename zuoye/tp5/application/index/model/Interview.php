<?php

namespace app\index\model;

use think\Model;

class Interview extends Model
{
    //定义相对的关联
    public function author(){
        return $this->belongsTo('user','uid');
    }
}
