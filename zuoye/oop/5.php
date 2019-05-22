<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 下午3:27
 */

class Human{

    // 类常量
    const xxx = '1234567';
    // 使用static修饰的属性是静态属性
    public static $age = 18;


    /**
     * 使用类直接调用静态成员的时候，并不会触发构造函数的调用
     * Human constructor.
     */
    public function __construct()
    {
        echo '构造方法';
    }

    // 使用static修饰的方法是静态方法
    public static function xxx()
    {
        echo '您高寿';
//        echo $this->age;
        echo self::$age;

        echo self::xxx;
    }
}


Human::xxx();


/**
 * 在类的内部：parent指父类，self指本类，$this指当前对象
 */



