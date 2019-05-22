<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/14
 * Time: 下午9:21
 */
namespace app\admin\controller;
class Company extends Base
{

    /**
     * @return mixed
     * @throws \think\exception\DbException
     *                       管理员操作界面
     */
    public function lists(){
        //实现分页系统
        $list = \think\Db::table('company')->paginate(2);
        //自定义一个在html里可以使用的标签
        $this->assign('list',$list);
        //调用lists.php界面
        return $this->fetch();
    }

    /**
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     *
     *     修改企业信息
     */
    public function mod()
    {
        //判断请求是否为post请求
        if ($this->request->isPost()){
            //把我们想要的前端通过post请求的值挑选出来 赋值给$data
            $data = $this->request->only(['name','phone','introduce','sex_ratio','scale','sort','address']);
            //获取前端name等于id属性的值
            $id = $this->request->param('id');
            //验证数据 判断$id 是否为null
            if (empty($id)){
                //报错
                $this->error('传输数据不正确');
            }
            //验证数据规则
            $rule = [
                'name' =>'require|length:2,20',
                'phone' =>'length:11,13',
                'address' =>'max:50',
                'scale' =>'require|in:0,1,2,3,4,5',
                'sex_ratio' =>'require|in:0,1,2',
                'sort' =>'require|in:0,1,2,3,4',
                'introduce' =>'max:65535',
            ];
            //报错信息
            $msg = [
                'name.require' => '企业名称为必填项',
                'name.length' => '企业名称长度为2-20之间',
                'phone.length' => '电话长度有误',
                'address.max' => '地址超过长度限制',
                'scale.require' => '员工规模有误',
                'scale.in' => '员工规模有误',
                'sex_ratio.require' => '男女比例填写有误',
                'sex_ratio.in' => '男女比例填写有误',
                'sort.require' => '企业类型选择有误',
                'sort.in' => '企业类型选择有误',
                'introduce.max' => '企业介绍过长'
            ];
            //验证$data中的值是否符合规则
           $msgInfo=$this->validate($data,$rule,$msg);
           //判断你输入的值是否完全正确
            if ($msgInfo !== true){
                //不正确直接报错
                $this->error($msgInfo);
            }
            //判断表中的数据是否已经更新
            if (\think\Db::table('company')->where('id',$id)->update($data)) {
                //返回一个成功信息 并且跳转到管理员操作页面
                $this->success('修改成功', url('admin/company/lists'));
            }else{
                //如果表中数据更新失败 报错
                $this->error('修改失败');
            }
        }
        //判断请求是否为get请求
        if ($this->request->isGet()){
            //接受前端传过来的name为id的属性值
            $company_id = $this->request->param('id');
            //判断$company_id 的值是否为null
            if (empty($company_id)){
                //报错
                $this->error('非法操作');
            }
            //查找company的表中是否有id等于$company_id 的值
            $info = \think\Db::table('company')->where('id',$company_id)->find();
            //如果$info的值为null
            if (empty($info)){
                //报错
                $this->error('非法操作');
            }
            //自定义标签
            $this->assign('info',$info);
        }

        //返回到修改信息界面
        return $this->fetch();
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     *   删除企业信息
     */

    public function del(){
        //接收传过来的id的值
        $company_id = $this->request->param('id');
        //判断$company_id 的值是否为null
        if (empty($company_id)){
            //报错
            $this->error('非法操作');
        }
        //判断company表中是否有id等于$company_id 的值 如果找到删除该列
        if (\think\Db::table('company')->where('id',$company_id)->delete()){
            //成功提示
            $this->success('删除成功');
        }else{
            //删除失败  报警提示
            $this->error('删除失败');
        }
    }
}