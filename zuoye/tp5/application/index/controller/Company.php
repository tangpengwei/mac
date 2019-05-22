<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/16
 * Time: 下午1:37
 */

namespace app\index\controller;
use think\Controller;

class Company extends Controller
{
    public function add_leader(){
        if ($this->request->isPost()){
            $data = $this->request->only(['name','sex','company_id']);
            //  验证数据
          if (!$data['company_id']){
              $this->error('参数错误');
          }

            $rule = [
              'name' => 'require|length:2,10',
                'sex' => 'require|in:0,1'
            ];
            $msg = [
              'name.require' => '名字为必填项',
              'name.length' => '名字长度为2-10',
              'sex.require' => '性别为必填项',
                'sex.in' => '格式错误'
            ];

           $info= $this->validate($data,$rule,$msg);
           if (\think\Db::table('leader')->where('name',$data['name'])){
               $this->error('名字不能重复');
           }
           if ($info!==true){
               $this->error($info);
           }
            //入库
            if (\think\Db::table('leader')->insert($data)){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }
    }


    public function add_job()
    {
        if ($this->request->isPost()){
            $data = $this->request->only(['name','company_id']);
            // 数据验证
            if (!$data['company_id']){
                $this->error('参数错误');
            }
            if (!$data['name']){
                $this->error('名字不能为空');
            }
            if (mb_strlen($data['name'])<2 || mb_strlen($data['name'])>10){
                $this->error('名字长度为2-10');
            }

            if (\think\Db::table('job')->where('name',$data['name'])){
                $this->error('职位不能重复');
            }
            //入库
            if (\think\Db::table('job')->data($data)->insert()){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }

        }
    }

    public function yelp()
    {

        $user = userInfo();
        if (empty($user)){
            $this->error('你需要登录才能操作');
        }
        if ($this->request->isPost()) {

            $data = $this->request->only(['score', 'salary', 'job_id']);

            //todo 数据验证
            if (!$data['job_id']){
                $this->error('错误');
            }
            $rule = [
                'salary' => 'require|length:2,10',
                'score' => 'require|in:0,1'
            ];
            $msg = [
                'salary.require' => '工资为必填项',
                'salary.length' => '工资长度为2-10',
                'score.require' => '评分为必填项',
                'score.in' => '格式错误'
            ];

            $info= $this->validate($data,$rule,$msg);
            if ($info !==true){
                $this->error($info);
            }




            $data['uid'] = $user->id;
            $data['create_time'] = time();
//            一个用户一个月只能点评一次
//        $last = \think\Db::table('job_yelp')->order('create_time DESC')
//            ->where('uid', $user->id)->where('job_id', $data['job_id'])
//            ->value('create_time');
//        if ($last > time() - 2592000){
//            $this->error('三十天内只能点评一次');
//        }
        //入库
        if (\think\Db::table('job_yelp')->insert($data)) {
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }

    }

        if ($this->request->isGet()){
            $id = $this->request->param('id');
            // 数据的验证

            if (empty($id)){
                $this->error('参数错误');
            }




            $info = \think\Db::table('job')->where('id',$id)->find();
//            print_r($info);
            $this->assign('info',$info);


            //统计薪资水平
            $m = \think\Db::table('job_yelp');
            $data = $m->where('job_id',$id)->select();
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





            $data_one = $m->where('job_id',$id)->select();
            $xx1 = $xx2 = $xx3 = $xx4 = $xx5 = 0;
            foreach ($data_one as $v){
                switch ($v){
                    case $v['score'] > 1 && $v['score'] <= 3:
                        $x2++;
                        break;
                    case $v['score'] > 3 && $v['score'] <= 6:
                        $x3++;
                        break;
                    case $v['score'] > 6 && $v['score'] <= 9:
                        $x4++;
                        break;
                    case $v['score'] = 10:
                        $x5++;
                        break;
                }
            }
            $score = [
                ["value"=>$xx1,"name"=>"评分为1-3"],
                ["value"=>$xx2,"name"=>"评分为3-6"],
                ["value"=>$xx3,"name"=>"评分为6-9"],
                ["value"=>$xx4,"name"=>"评分为10"]
            ];
            $this->assign('score',json_encode($score));

            return $this->fetch();


        }






    }
}















