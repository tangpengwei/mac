<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 上午9:19
 */

/**
 * 保留在服务端
 * 存储的数据量原则上可以做到无限制
 * 自带数据序列化功能，不限制存储的数据类型
 * 依托cookie，在cookie只存一个标识
 */

session_start();


print_r(session_id());

echo '<a href="111.php?PHPSESSID='.session_id().'">百度</a>';

$_SESSION['xxx1'] = ['大河', '二狗'];