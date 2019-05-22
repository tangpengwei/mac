<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/25
 * Time: 上午11:10
 */

//print_r($_POST);


$pdo = new PDO('mysql:host=127.0.0.1;dbname=php', 'root', 123456);

$sql = 'INSERT INTO score (`name`,`chinese`, math, english, history, SW, HX, WL, ZZ, DL) VALUES("%s", %d, %d, %d, %d, %d, %d, %d, %d, %d)';

$sql = sprintf($sql, $_POST['name'], $_POST['chinese'], $_POST['math'], $_POST['english'], $_POST['history'], $_POST['SW'], $_POST['HX'], $_POST['WL'], $_POST['ZZ'], $_POST['DL'] );

//print_r($sql);

if ($pdo->exec($sql)){
    echo '成功<a href="insert2.html">继续添加</a>';
}else{
    echo '失败<a href="insert2.html">重新添加</a>';
}