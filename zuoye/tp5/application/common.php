<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


function userInfo(){
    $info = session('userloginInfo');
    return $info ? $info : false;
}


function aa($a,$id,$b){
    $m = \think\Db::table($a);
    $data = $m->where($b,$id)->select();
    $x1 = $x2 = $x3 = $x4 = $x5 = 0;
    foreach ($data as $v){
        switch ($v){
            case $v['salary'] <=3000:
                $x1++;
                break;
            case $v['salary'] > 3000 && $v['salary'] <= 5000:
                $x2++;
                break;
            case $v['salary'] > 5000 && $v['salary'] <= 8000:
                $x3++;
                break;
            case $v['salary'] > 8000 && $v['salary'] <= 12000:
                $x4++;
                break;
            case $v['salary'] > 12000:
                $x5++;
                break;
        }
    }
    $salary = [
        ["value"=>$x1,"name"=>"3K以内"],
        ["value"=>$x2,"name"=>"3K-5K"],
        ["value"=>$x3,"name"=>"5K-8K"],
        ["value"=>$x4,"name"=>"8K-12K"],
        ["value"=>$x5,"name"=>"12K以上"],
    ];
    $this->assign('salary',json_encode($salary));
}