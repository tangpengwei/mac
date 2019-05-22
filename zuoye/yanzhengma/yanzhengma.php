<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/5
 * Time: 上午9:02
 */
$input = $_POST['yzm'];
//print_r($input);
session_start();
//echo '<br>';
//print_r($_SESSION['yanzhengma']);

if ($_SESSION['yanzhengma'] != $input){
    echo '你输入的验证码有误';
}else {
    echo '正确';
}
























