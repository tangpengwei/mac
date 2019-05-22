<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/17
 * Time: 上午10:43
 */
namespace app\test\controller;
use think\Cache;
use think\captcha\Captcha;
use think\Controller;
use think\facade\Session;

class Test extends Controller
{
    public function yzm()
    {
        $config = [
            'imageH' => 100,
            'imageW' => 400,
            'fontSize'=>41,
            'useImgBg'=> true,
//            'useCurve'=>false,
//            'useNoise'=>false,
            'length'=>4,
//            'fontttf'=>'5.ttf',
//        'bg'=>[255, 0, 0]
        ];
        $a = new Captcha($config);
        return $a->entry();
    }


    public function yzm1()
    {

        if ($this->request->isGet()){
            return $this->fetch();
        }
        if ($this->request->isPost()){

            $b=$this->request->param('xxx');
            $a = new Captcha();
            if ($a->check($b)){
                echo '成功';
            }else{
                echo '失败';
            }
        }
    }

    public function test1()
    {
        $t1 = microtime(true);

//        for ($i=0;$i<1000;$i++){
//            $res = cache('xxx');
//            if (!$res){
//                $res = \think\Db::table('job')->find();
//                cache('xxx',$res);
//            }
//
//
//        }


//        for ($i=0;$i<1000;$i++){
//            \think\Db::table('job')->find();
//        }


        session('xxx',111);
        session('yyy',2222);
//        print_r(Session::get('xxx'))
        print_r(session('yyy'));

        $t2 = microtime(true);
//        print_r($t2-$t1);
    }


    public function test2()
    {

//        if ($this->request->isPost()){
//            $rule = [
//                'xxx' => 'require|token'
//            ];
//            $a=$this->validate($this->request->param(),$rule);
//            if ($a !==true){
//                echo '失败';
//            }else{
//                echo '成功';
//            }
//
//
//        }
//
//        if ($this->request->isGet()){
//
//
//
//        }

print_r($this->request->get());
        return $this->fetch();


    }



    public function test3(){
        if ($this->request->isGet()){


            return $this->fetch();
        }


        if ($this->request->isPost()){
            $file = request()->file('xxx');
            $info = $file->move('./static/image');
        }



    }

    public function test4()
    {
     echo   url('aaa');
        return $this->fetch();
    }





        public function index()
        {

//            $data = [
//                'name' => "小明",
//                'age' => 12,
//                'sex' => "男",
//            ];
//            print_r($data);
//            echo '<br>';
            //原生数组转成json对象  第二个参数转成中文
//            return json_encode($data,JSON_UNESCAPED_UNICODE);
//            return json($data);
//            return ['name'=>'thinkphp','status'=>1];

        }




}




























