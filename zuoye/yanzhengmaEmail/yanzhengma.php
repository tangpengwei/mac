<?php

$email = $_POST['em'];
$re ='/\w+@\w+.[a-zA-Z]{2,10}/';

if (!preg_match($re,$email)){
    echo '错误';
    exit();
}


include_once './PHPMailer/src/PHPMailer.php';
include_once './PHPMailer/src/Exception.php';
include_once './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host       = 'smtp.qq.com';
$mail->SMTPAuth   = true;
$mail->Username   = '528584252@qq.com';
$mail->Password   = 'kqdecbqzyiofbhch';
$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;




$mail->setFrom('528584252@qq.com', 'tangtang');

$mail->addAddress($email);





//$mail->addAttachment('./FDF2BB607D2C84555AD48C210AF70FA5副本.png');


$code = rand(1000,9999);

$mail->isHTML(true);
$mail->Subject = '验证码';
$mail->Body    = '验证码为'.$code;




if ($mail->send()){
    session_start();
    $_SESSION['email'] = $code;
    echo 1;
}else{
    echo 0;
}










