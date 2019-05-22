<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/25
 * Time: 下午2:09
 */


if ($_POST['pwd'] != $_POST['rpwd']){
    echo '两次密码输入不一致';exit();
}

if(!preg_match('/^\w{6,10}$/', $_POST['pwd'])){
    echo '密码的长度应该在6-10位之间';exit();
}

$usernameLength = mb_strlen($_POST['username'], 'UTF-8');
if ($usernameLength > 10 || $usernameLength < 2){
    echo '用户名的长度应该在2-10位之间';exit();
}

$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);


$pdo = new PDO('mysql:host=127.0.0.1;dbname=php', 'root', 123456);

$res = $pdo->query('select * from member where username="'.$_POST['username'].'"');

if($res->fetch()){
    echo '该用户已注册';exit();
}

$res = $pdo->exec(sprintf('insert into member (username, pwd) values ("%s", "%s")', $_POST['username'], $pwd));

if($res){
    echo '注册成功';
}else{
    echo '注册失败';
}


