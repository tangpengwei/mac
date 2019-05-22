<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 下午4:36
 */

/**
 * 高内聚 低耦合
 */

class Human{

    public $name;

    public function __construct($x)
    {
        $this->name = $x;
    }

    public function watch($animal)
    {
        echo $this->name, '观察一下发现一只', $animal, '<br>';
    }

    public function command()
    {
        echo $this->name, '发出了命令', '<br>';
    }


}