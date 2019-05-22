<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/5
 * Time: 下午7:33
 */
session_start();
//print_r($_SESSION);
//echo '<br>';
//print_r($_POST);

if ($_SESSION['email'] == $_POST['yzm']){
    echo 'ok';
}else{
    echo '错误';
}