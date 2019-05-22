<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/25
 * Time: 上午11:38
 */

$name = $_POST['name'];

$pdo = new PDO('mysql:host=127.0.0.1;dbname=php', 'root', 123456);

$res = $pdo->query(sprintf('SELECT * FROM score WHERE name="%s"',$name));

$info = $res->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table>
    <tr>
        <td>姓名：</td>
        <td><?php echo $info['name']; ?></td>
    </tr>
    <tr>
        <td>语文：</td>
        <td><?php echo $info['chinese']; ?></td>
    </tr>
    <tr>
        <td>数学</td>
        <td><?php echo $info['math']; ?></td>
    </tr>
    <tr>
        <td>历史：</td>
        <td><?php echo $info['history']; ?></td>
    </tr>
    <tr>
        <td>英语：</td>
        <td><?php echo $info['english']; ?></td>
    </tr>
    <tr>
        <td>物理：</td>
        <td><?php echo $info['WL']; ?></td>
    </tr>
    <tr>
        <td>生物：</td>
        <td><?php echo $info['SW']; ?></td>
    </tr>
    <tr>
        <td>地理：</td>
        <td><?php echo $info['DL']; ?></td>
    </tr>
    <tr>
        <td>化学：</td>
        <td><?php echo $info['HX']; ?></td>
    </tr>
    <tr>
        <td>政治：</td>
        <td><?php echo $info['ZZ']; ?></td>
    </tr>
</table>

</body>
</html>