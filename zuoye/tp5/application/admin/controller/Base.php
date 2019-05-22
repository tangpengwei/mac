<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/14
 * Time: 下午8:35
 */
namespace app\admin\controller;
use think\App;
use think\Controller;
//创建一个model 并且继承Controller
class Base extends Controller
{
    //魔术构造方法 表示调用该类就直接运行该方法
    public function __construct()
    {
        //继承父类的__construct 魔术方法
        parent::__construct();
        //判断session里面是否有值，如果没有的话，报警提示
        if (!session('adminUserInfo')){
            $this->error('您需要登录');
        }
    }

    /**
     * 退出登录
     */
    public function logout(){
        //通过把session的值置为null，来清除session的值
        session('adminUserInfo',null);
        //直接跳转到登录界面
        $this->redirect('admin/Sign/login');
    }

}