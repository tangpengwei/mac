<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/8
 * Time: 上午9:29
 */

//print_r($_GET['c']);
//print_r($_GET['m']);
$controller = isset($_GET['c'])? $_GET['c'] : 'index';

$method = isset($_GET['m'])? $_GET['m'] : 'index';

$group = isset($_GET['g'])? $_GET['g'] : 'front';
print_r($controller);


function auto($className){

    $path = $className.'.php';
    $path = str_replace('\\','/',$path);

    if (file_exists($path)){
        include_once $path;
    }
}

spl_autoload_register('auto');


$b =  '\controller\\'.$group.'\\'.$controller;
$a = new $b;
$a->$method();






