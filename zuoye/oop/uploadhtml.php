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

<form method="post" action="upload.php" enctype="multipart/form-data">

    <input type="text" name="aaa">
    <input type="file" name="yyy[]">
    <input type="file" name="yyy[]">

<!--    <input type="file" name="xxx">-->
<!--    <input type="file" name="yyy">-->

    <button type="submit">上传</button>



</form>


</body>
</html>