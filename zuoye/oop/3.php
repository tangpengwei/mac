<?php

class Human{

    public $age;
    private $sex;
    protected $name;


    /**
     * (私有的、受保护、根本不存在)是对外来说，都属于不可见的。
     * 当为不可见属性赋值的时候，会自动调用
     * @param $x 不可见见属性的名称
     * @param $y 打算为该属性赋的值
     */
    public function __set($x, $y)
    {
        var_dump($x);
        var_dump($y);
        $this->$x = $y;
    }

    /**
     * 调用一个不可见的属性时，会自动调用
     * @param $x 您调的不可见属性的 属性名称
     * @return
     */
    public function __get($x)
    {
        return $this->$x;
    }


    public function xxx(){
        echo $this->sex;
        echo $this->name;
        echo $this->xxxxxxxxxxxx;
    }



}


$h = new Human();

$h->age = 17;
$h->sex = '妖';
$h->name = '二狗';
$h->xxxxxxxxxxxx = '沙雕';


echo $h->name;
//$h->xxx();
