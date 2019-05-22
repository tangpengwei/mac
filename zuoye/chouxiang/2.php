<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/7
 * Time: 下午4:39
 */
abstract class animal
{
    public abstract function say();
    protected  abstract function xxx();
}
class pig extends animal{
    public function say()
    {
        // TODO: Implement say() method.
        echo '哼哼哼';
    }
    protected function xxx()
    {
        // TODO: Implement xxx() method.
    }
}
$a = new pig();
$a->say();






