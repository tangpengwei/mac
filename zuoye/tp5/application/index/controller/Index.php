<?php
namespace app\index\controller;

use app\index\model\Interview;
use think\Controller;

class Index  extends Controller
{
    /**
     * 牛逼企业主业
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();

    }

    /**
     * 企业的查找
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function search (){
        $keyword = $this->request->param('wd');
        //empty检查变量是否为空
        if (empty($keyword)){
           $this->redirect('index/Index/index');
        }
        //设置分页模式  并查询出符合搜索条件的列表
       $num = \think\Db::table('company')->where('name','like','%'.$keyword.'%')->count();
        $list = \think\Db::table('company')
            ->where('name','like','%'.$keyword.'%')
            ->paginate(2,false,['query'=>['wd'=>$keyword]]);

        //处理让关键字变红
        $newList = $list->toArray()['data'];
        foreach ($newList as $k=>$v){
            $newList[$k]['name'] = str_replace($keyword,('<span class="text-danger">'.$keyword.'</span>'),$v['name']);

        }
        //把我们设置的模板变量赋值给钱面的name
        $this->assign('keyword',$keyword);
        $this->assign('list',$list);
        $this->assign('newList',$newList);
        $this->assign('num',$num);
        return $this->fetch();

    }

    /**
     * @return mixed 企业的添加
     */
        public function add(){

            $request = $this->request;
            if ($request->isGet()){
                return $this->fetch();
            }
            if ($request->isPost()){

                $rule = [
                    'name' =>'require|length:2,20',
                    'phone' =>'length:11,13',
                    'address' =>'max:50',
                    'scale' =>'require|in:0,1,2,3,4,5',
                    'sex_ratio' =>'require|in:0,1,2',
                    'sort' =>'require|in:0,1,2',
                    'introduce' =>'max:65535',
                ];
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


                $data = $request->param();
                $check = $this->validate($request->param(),$rule,$msg);
                if ($check === true){
                    $userObject = session('userloginInfo');
                    $data['uid'] = $userObject->id;
//                    var_dump(\think\Db::table('company')->data($data)->insert());
                    if (\think\Db::table('company')->data($data)->insert()){
                        $this->success('添加成功');
                    }else{
                        $this->error('添加失败');
                    }
                }else{
                    $this->error($check);
                }

            }





        }
        /**
         * 企业的详情
         */
        public function show(){
           $request = $this->request;
           //接受一下post传过来的id  也就是企业id
           $id = $request->param('id');
           //判断id是否不为null
           if (empty($id)){
               $this->error('您要查看的企业信息不存在');
           }
           //获取企业的基本信息
            $info = \think\Db::table('company')->where('id','=',$id)->find();
           if (empty($info)){
               $this->error('您要查看的企业信息不存在');

           }
           //把$info变量赋值一下
           $this->assign('info',$info);
           //实现分页
//            print_r(Interview::with('author')->where('company_id',$id)->paginate(2));
           $interview_list = Interview::with('author')->where('company_id',$id)->paginate(2);
           $user = userInfo();
            foreach ($interview_list as $k=>$v) {
                //遍历本次查询出的每一个面试经历信息 是否被当前登录用户点赞过
                $where = ['interview_id'=>$v->id,'uid'=>$user->id];
                if (\think\Db::table('interview_ding')->where($where)->find()){
                    $v->dingx = 1;
                }else{
                    $v->dingx = 0;
                }
           }
                $this->assign('interview_list',$interview_list);
                $this->assign('page',$interview_list);

                $tagList = \think\Db::query(sprintf('select * from tag where id in (select tag_id from company_tag where company_id=%d)',$id));
                $this->assign('tagList',$tagList);

                //获取公司领导信息
            $leaders = \think\Db::table('leader')->where('company_id',$id)->select();
            $this->assign('leaders',$leaders);
            //获取公司工作信息
            $job = \think\Db::table('job')->where('company_id',$id)->select();
            $this->assign('job',$job);


                return $this->fetch();
        }







        public function add_interview(){
            $user = userInfo();
            if (empty($user)){
                $this->error('您需要登录后才能进行操作',url('index/Sign/in'));
            }
            //面试经历的内容
            $data['content'] = $this->request->param('content');
            //企业的id
            $data['company_id'] = $this->request->param('id');

            //验证数据
            $rule = [
                'content' => 'require|length:10,65535',
                'company_id' => 'require'
            ];
            $msg = [
                'content.require' => '面试经历详情为必填项',
                'content.length' => '面试经历长度错误',
                'company_id.require' => '企业信息不全'
            ];
            if ($this->validate($data,$rule,$msg) === true){
                //验证企业的有效性
                $company = \think\Db::table('company')->where('id',$data['company_id'])->find();
                if (empty($company)){
                    $this->error('企业不存在');
                }
                //记录发表者的信息
                $data['uid'] = $user->id;
                //记录添加时间
                $data['create_time'] = date('Y-m-d H:i:s');
                if (\think\Db::table('interview')->data($data)->insert()){
                    $this->success('添加成功');
                }else{
                    $this->error('添加失败');
                }

            }else{
                $this->error('添加失败');
            }

        }
        public function ding(){
            //用户必须登录
            //当前登录用户的信息
            $user = userInfo();
            if (empty($user)){
                $this->error('你需要登录后才能操作');
            }
            //这是面试经历的id
            $id = $this->request->param('id');
            //数据验证
            if (empty($id)){
                $this->error('非法操作');
            }
            //一条面试经历的信息
            $info = \think\Db::table('interview')->where('id',$id)->find();
            //检验面试信息是否为null
            if (empty($info)){
                $this->error('非法操作');
            }
            //检验是否是给自己点赞
            if ($info['uid'] == $user->id){
                $this->error('不要自己给自己点赞');
            }
            //检验用户是否已经点赞过
            if (\think\Db::table('interview_ding')->where(['interview_id'=>$id, 'uid'=>$user->id])->find()){


                //取消赞
                if (\think\Db::table('interview')->where('id',$id)->setDec('ding')){
                    \think\Db::table('interview_ding')->where(['interview_id' => $id,'uid'=>$user->id])->delete();
                    $this->success('取消成功',null,1);
                }else{
                    $this->error('操作失败');
                }
            }else{
                if (\think\Db::table('interview')->where('id',$id)->setInc('ding')){
                    \think\Db::table('interview_ding')->data(['interview_id'=>$id,'uid'=>$user->id])->insert();
                    $this->success('点赞成功',null,0);
                }else{
                    $this->error('操作失败');
                }
            }


        }


    /**
     * 为企业添加一个标签
     */


        public function add_tag(){
            $request = $this->request;
            $company_id = $request->param('id');
            $tagName = $request->param('tagName');
            //数据验证
            if (empty($company_id)){
                $this->error('非法操作');
            }

            if (mb_strlen($tagName,'utf-8')>10||mb_strlen($tagName,'utf-8')<2){
                $this->error('标签的名称长度应在2-10位之间');
            }
            //一家企业最多打10个标签
            if (\think\Db::table('company_tag')->where('company_id',$company_id)->count()>=10){
                $this->error('最多只能为企业创建10个标签');
            }

            $m = \think\Db::table('tag');
            //去tag表中查询该标签是否存在
            $tagInfo = $m->where('name',$tagName)->find();
            if ($tagInfo){
                $tagId = $tagInfo['id'];
            }else{
                //如果该标签没有存在我们的标签表中并且存在值，则把他添加到库中
                if ($m->data(['name'=>$tagName])->insert()){
                    //获取最近的id
                    $tagId= $m->getLastInsID();
                }
            }

            //记录关系
            $data['company_id']= $company_id;
            $data['tag_id'] = $tagId;
            //检验一下是否已经为该企业打过该标签
            if (\think\Db::table('company_tag')->where($data)->find()){
                $this->error('该标签已经被添加过');
            }

            if (\think\Db::table('company_tag')->insert($data)){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }

        }
}























