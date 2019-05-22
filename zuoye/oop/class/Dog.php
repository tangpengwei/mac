<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 下午4:38
 */

class Dog
{
    public $name = '旺财';
    public function grab()
    {
        echo $this->name, '接到命令，去抓动物<br>';
    }


}