<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/7
 * Time: 上午11:22
 */

print_r($_POST['yzm']);
echo '<br>';
session_start();
print_r($_SESSION);
if ($_POST['yzm']=$_SESSION['smscode']){
    echo '成功';
}else{
    echo '失败';
}













