<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/7
 * Time: 下午2:11
 */



function autoload($className){

//    print_r($className);
    $path = $className.'.php';
//    print_r($path);
   $path = str_replace('\\',DIRECTORY_SEPARATOR,$path);
//   print_r($path);
//    $path = './class1/'.$className.'.php';
    if (file_exists($path)){
        include_once $path;
    }
}
//function autoload1($className){
//    $path = './class2/'.$className.'.php';
//    if (file_exists($path)){
//        include_once $path;
//    }
//}

//spl_autoload_register('autoload1');
spl_autoload_register('autoload');

use xxx\pig;


$a = new \class2\dog();
echo $a->name;

$b = new people();
echo  $b->name;

include_once './xxx/dog.php';
$c = new aaa\dog();
echo $c->name;
echo $b->elseName;


$d = new pig();
echo $d->name;