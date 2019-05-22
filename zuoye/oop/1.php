<?php

/**
 * 面向过程：
 * 就像流水线工程一样，一步一步来，更关注的动作本身。
 *
 *
 * 面向对象：
 * 关注干这事的这个对象。
 *
 */


/**
 * 面向对象中两个重要概念：类和对象
 * 对象：具体的个体（实例），是由类中产生出来的
 * 类：是对象的模板
 */

class Human{


    /**
     * 类的成员属性
     */
    public $age;
    public $name;
    public $sex = '男';


    /**
     * 类的成员方法
     */
    public function run(){
        echo '我可以跑步';
        // $this 永远代表当前对象
        $this->girl();
//        $this->money();

    }

    public function say(){
        echo '我能说话';
    }

    /**
     * protected 修饰的表示受保护的成员
     * 只能在类的内部或者子类的内部使用
     */
    protected function girl(){
        echo '我的女朋友叫凤姐';
    }


    /**
     * private 修饰的表示私有成员
     * 只能在类的内部使用
     */
    private function money(){
        echo '我有很多钱';
    }

}


/**
 * 通过public protected private 修饰可以控制成员的访问等级 进而达到了一个封装的目的
 * Class Dog
 */
class Dog{
    public $age;
    public $name;
    public $sex = '男';

    public function run(){
        echo '我可以跑步';
        $this->girl();
        $this->money();
    }

    public function say(){
        echo '我能说话';
    }

    protected function girl(){
        echo '我的女朋友叫凤姐';
    }

    private function money(){
        echo '我有很多钱';
    }

}

/**
 * 类的继承
 *
 * 子类会得到父类中可被继承的所有成员（属性和方法）
 * 子类可以有自己的成员（属性和方法）
 * 子类自己的成员如果和父类继承过来的成员同名，那么子类的会覆盖父类的
 * Class Chinese
 */
class Chinese extends Human{

    public function xxx(){
        echo 'xxxxx';
    }

    public function say()
    {
        echo '我能说中文';
    }

}

$liCC = new Human();
$liCC->run();
echo $liCC->sex;

$liCC->sex = '女';
echo $liCC->sex;

//$liCC->girl();
//$liCC->money();



//$GYQ = new Human();
//$GYQ->run();

$DHG = new Dog();

//判断某个对象是否由某个类产生的
var_dump($DHG instanceof Human);
var_dump($liCC instanceof Human);



$YCB = new Chinese();
$YCB->run();
$YCB->xxx();
$YCB->say();

var_dump($YCB instanceof Chinese);
var_dump($YCB instanceof Human);

/**
 * 面向对象的三大特征：封装、继承、多态
 */
