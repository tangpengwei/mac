<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/8
 * Time: 上午9:31
 */
namespace controller\front;


class look
{

    public function cat (){
        echo 222;
    }
    public function loo(){
        $a = new  \Model\look();
        print_r( $a->file());

    }
}
//$a = new lookat();
//$a->look();