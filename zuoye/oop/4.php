<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 下午3:19
 */

class Human
{
    public $sex;

    public function __construct()
    {
        echo '我是人';
        $this->sex = '男';
    }

    public function xxx()
    {
        echo 'xxxx';
    }



}



class Japanese extends Human
{
    public function __construct()
    {
        //调用父级的方法
        //parent就是指父类
        parent::__construct();
        echo '我是日本人';
    }

    public function yyy()
    {
        parent::xxx();
    }
}


$j = new Japanese();

echo $j->sex;

$j->yyy();