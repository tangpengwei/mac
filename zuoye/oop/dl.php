<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 下午4:38
 */


// 引入文件
//include './class/Human.php';
//include_once './class/Human.php';
//require './class/Dog.php';
//require_once './class/Dog.php';


/**
 * 自动加载函数
 * 当试图使用一个不存在的类的时候，会在报错之前自动调用__autoload函数
 * 把试图使用的类的完整名称作为参数传给该函数
 * @param $x
 */
//function __autoload($x){
//
//    include './class/'.$x.'.php';
//}


function xxxx($x){
    $path = './class/'.$x.'.php';
    // file_exists 判断一个文件是否存在
    if (file_exists($path)){
        include $path;
    }
}

function yyyy($x){

    $path = './xxx/'.$x.'.php';
    if (file_exists($path)){
        include $path;
    }
}

// 注册到自动加载函数队列中，根据注册顺序依次调用自动加载函数
// 一旦找到要找的类，本次寻找就结束了
spl_autoload_register('xxxx');
spl_autoload_register('yyyy');


$h = new Human('如花');
$d = new Dog();

$h->watch('兔子');
$h->command();
$d->grab();


$h->watch('山鸡');
$h->command();
$d->grab();

$m = new Mobile();
$m->music();


//var_dump(file_put_contents('./1.txt', serialize($h)));
