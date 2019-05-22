<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 下午2:44
 */

class Human{

    public $age;
    public $name;
    public $sex = '男';

    //魔术方法


    /**
     * 构造方法
     * 当通过new产生一个对象的时候，会自动调用构造方法
     * Human constructor.
     */
    public function __construct($x , $y){
        $this->age = $x;
        $this->name = $y;
    }

    /**
     * PHP4的写法（非常不推荐使用）
     * Human constructor.
     */
//    public function Human(){
//        echo  1111;
//    }


    public function run(){
        echo '我可以跑步';
        $this->girl();
    }

    public function say(){
        echo '我能说话';
    }

    protected function girl(){
        echo '我的女朋友叫凤姐', '我是', $this->name;
    }

    private function money(){
        echo '我有很多钱';
    }

    /**
     * 析构方法（在对象被销毁的时候自动调用）
     */
    public function __destruct()
    {
        // TODO: Implement __destruct() method.

        echo 'Game Over';
    }

}

$lcc = new Human(18, '李聪聪');
echo $lcc->run();

//unset($lcc);

//$lcc = new Human();
