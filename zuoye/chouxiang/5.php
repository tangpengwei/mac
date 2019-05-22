<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/7
 * Time: 下午8:43
 */
//php的性状
trait  a
{
    public function aa()
    {
        echo 'aa';
    }
}
trait b
{
    public function bb(){
        echo 'bb';
    }
}

class ab
{
    use a;
    use b;
}
$a = new ab();
$a->aa();
$a->bb();