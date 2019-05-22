<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/26
 * Time: 上午8:46
 */

//setcookie('xxx', 234567);
//setcookie('abc', 123456, time()+20);

//print_r($_COOKIE);

//setcookie('xxx', null);
//setcookie('xxx', 234567, time()-1);


/**
 * 不安全，数据保存在客户端（非常容易失控）
 * 存的数据量少，（4Kb）
 * 能存的数据类型太少，只支持字符串（数字）
 * 每次请求无论需要与否，整站都会携带cookie，浪费带宽
 */


phpinfo();