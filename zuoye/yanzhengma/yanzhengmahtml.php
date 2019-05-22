<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>验证码</title>
</head>
<body>
<form action="yanzhengma.php" method="post">
<input type="text" name="yzm">
<img src="gd.php" id="yzm" alt="">
<button type="submit">提交</button>
</form>
<script>
    var yzm = document.getElementById('yzm');
    yzm.style.cursor = 'pointer';
    yzm.onclick = function () {
        var url = './gd.php?'+Math.random();
        this.setAttribute('src',url);
    }
    
    
</script>
</body>
</html>