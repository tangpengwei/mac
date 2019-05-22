<?php

namespace app\index\model;

use think\Model;

class user extends Model
{

    //面试经历的关联关系 一对多
    public function inter(){
        return $this->hasMany('Interview','uid');
    }
}
