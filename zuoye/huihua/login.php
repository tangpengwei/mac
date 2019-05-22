<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/25
 * Time: 下午2:50
 */

//$_POST['username'];
//$_POST['pwd'];


//todo 数据的格式的一些验证
$pdo = new PDO('mysql:host=127.0.0.1;dbname=php', 'root', 123456);

$res = $pdo->query('select * from member where username="'.$_POST['username'].'"');
$info = $res->fetch(PDO::FETCH_ASSOC);

if(!$info){
    echo '您的用户名或者密码有误';exit();
}


if(password_verify($_POST['pwd'], $info['pwd'])){
    echo '登录成功';
//    setcookie('xxxx', serialize($info));
    session_start();
    $_SESSION['userLoginInfo'] = $info;
}else{
    echo '您的用户名或者密码有误';exit();
}