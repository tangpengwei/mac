<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/8
 * Time: 下午3:06
 */
include_once '../vendor/autoload.php';

$database = new Medoo\Medoo([
    'database_type' => 'mysql',
    'database_name' => 'shuju',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 't49057163'
]);

//$data = $database->update("study", ["sex" => '女'], ["shu1" => 12]);
$data = $database->select('study','*', ['shu1[>]' => 0]);

//$database->insert("study", [
//    "name" => "小青",
//    "sex" => "男",
//    "age" => 25
//]);

//$database->delete("study", ["name"=>'小青']);
print_r($data);
//$a=$database->insert('study', [
//    'name' => '大虫',
//    'age' => '25'
//]);
//var_dump($a);