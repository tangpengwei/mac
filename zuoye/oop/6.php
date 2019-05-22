<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 下午4:00
 */

class Human
{

    public $age;

    public function __construct()
    {
        $this->age = rand(0,100000);
    }
}


$h1 = new Human();
//$h2 = new Human();

// 克隆是得到两个完全一样的独立对象
$h2 = clone $h1;
//echo $h1->age;
print_r($h1);
echo '<br>';
print_r($h2);

echo '<hr>';

$h1->age = 100;
print_r($h1);
echo '<br>';
print_r($h2);

//$hh1 = $h1;
//echo $hh1->age;
//
//$hh1->age = 123;
//echo '<br>';
//echo $h1->age;
//
//echo '<hr>';






//$a = 100;
//$b = &$a;
//$b = 'sss';
//echo $a, $b;
