<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/25
 * Time: 下午2:50
 */

session_start();
//var_dump(isset($_SESSION['userLoginInfo']));

if (!isset($_SESSION['userLoginInfo'])){
    header('location:log.php');exit();
}
echo '这是机密';

