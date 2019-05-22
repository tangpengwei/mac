<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/15
 * Time: 上午9:51
 */

namespace app\admin\controller;
use think\Controller;

class Sign extends Controller
{
    /**
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 管路员登录操作
     */
    public function login(){
        $request  = $this->request;
        //判断请求是否为Get请求
        if ($request->isGet()){
//            echo password_hash('123456',PASSWORD_DEFAULT);
            //返回一个fetch方法，本意就是通过fetch方法这个入口转到login.php文件
            return $this->fetch();
        }
        //判断请求是否为post
        if ($request->isPost()){
            //把前端通过表单传过来的 mobile 和password 保存到$data变量里边
            $data = $request->only(['mobile','password']);
            //判断规则
            $rule = [
                'mobile'=> 'require|mobile',
                'password' => 'require|length:6,12'
            ];
            //报警信息
            $msg=[
                'mobile.require'=>'手机号为比现象',
                'mobile.mobile'=>'手机号格式不对',
                'password.require'=>'密码必填',
                'password.length'=>'密码长度不对'
            ];
            //判断$data里面的数据是否符合规则
            $check = $this->validate($data,$rule,$msg);
            if ($check !== true){
                //如果不符合规则，显示出一个报警信息
                $this->error($check);
            }
            //判断admin表中是否能找到mobile列中是否有$data['mobile']这个值
            if ($admim = \think\Db::table('admin')->where('mobile',$data['mobile'])->find()){
                //把$data['password']的值转换成哈希值并且和数据库中$admin['password']是否一样
                if (password_verify($data['password'],$admim['password'])){
                    //登录成功 并且把当时$admin 的值记录到session中并且起名为adminUserInfo
                    session('adminUserInfo',$admim);
                    //直接跳转到管理员界面
                    $this->redirect('admin/Index/index');
                }else{
                    //如果密码验证没有通过  直接报错
                    $this->error('您输入的账号或者密码有误');
                }
            }else{
                //如果在数据中没有找到账号 报错
                $this->error('您输入的账号或者密码有误');
            }
        }


    }
}