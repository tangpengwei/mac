<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 下午5:02
 */

include './class/Human.php';

$res = file_get_contents('./1.txt');

$obj = unserialize($res);

echo $obj->name;