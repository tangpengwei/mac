<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/23
 * Time: 下午4:11
 */


//print_r($_GET);

//print_r($_POST);

//print_r($_REQUEST);


//$pdo = new PDO('mysql:host=127.0.0.1;dbname=php', 'root', 123456);

//$res = $pdo->query('select * from user');
//print_r($res->fetch());
// 从PDO结果集对象中读取所有的数据
//print_r($res->fetchAll(PDO::FETCH_ASSOC));


//$res = $pdo->query('insert into user (name, age, score, xxx) values ("二狗", 19, 30, 99)');
//$res = $pdo->query('delete from user where id=13');
//$res = $pdo->query('update user set name="tony" where id=12');

//$res = $pdo->exec('insert into user (name, age, score, xxx) values ("二狗", 19, 30, 99)');
//$res = $pdo->exec('delete from user where id=15');
//$res = $pdo->exec('update user set name="jack" where id=14');

//var_dump($res);


var_dump(preg_match('/^1[356879]\d{9}$/', 13456789098, $xxx));
//preg_match_all()
print_r($xxx);
