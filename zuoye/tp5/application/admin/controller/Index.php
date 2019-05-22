<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/14
 * Time: 下午8:52
 */



namespace app\admin\controller;

/**
 * Class Index
 * @package app\admin\controller
 * 管理员主页面
 */

class Index extends Base
{
    //通过调用index方法进入管理员主页面
    public function index(){
        return $this->fetch();
    }
    public function index1(){
        echo 111;
    }
}