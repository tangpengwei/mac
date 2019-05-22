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
<form action="yanzhengma1.php" method="post">
    邮箱：<input type="text" name="email" id="email">
    <span id="info"></span>
    <br>
    验证码：<input type="text" id="yzm" name="yzm">
    <button id="send" type="button" >请发送验证码</button>
    <br>
    <button type="submit">提交</button>
</form>
<script src="jquery-3.4.0.min.js"></script>
<script>
    var s= document.getElementById('send');
    var mail = document.getElementById('email');

    s.onclick = function () {
       // var email = mail.value;
       // var re = /\w+@\w+.[a-zA-Z]{2,10}$/;
       // if (re.test(email)){
       //     var i = $(this);
       //     $(this).attr('disabled','disabled');
       //     var sec = 3;
       //     var xxx = setInterval(
       //         function () {
       //             --sec;
       //             if (sec<0){
       //                 $('#send').html('再次点击发送邮箱验证码');
       //                 clearInterval(xxx);
       //                 i.removeAttr('disabled');
       //
       //
       //
       //             } else {
       //                 i.html(sec.toString()+'秒后重新发送');
       //             }
       //         },1000);
       //
       //
       //     $.post('yanzhengma.php',{em:email},function (e) {
       //         console.log(e);
       //         e = parseInt(e);
       //
       //         if (e){
       //             console.log(1111111);
       //             alert('发送成功');
       //
       //         }else {
       //             console.log(2222);
       //             alert('发送失败');
       //         }
       //
       //     }
       //     )
       //
       //
       //
       // }else {
       //     $('#info').html('输入的邮箱有误').css({'color':'red','font-size':'12px'})
       // }





        // $.post('1.php',{sex:'男'}, function (xx) {
        //     console.log(xx);
        //     $('#yzm').val(xx.age);
        // },'json');




//
// //新建一个不通过刷新网页而实现刷新某一部分的函数
// var xhr = new XMLHttpRequest();
// //通过调用open方法输入请求内容
// xhr.open('GET','1.php',true);
// //通过send方法发送
// xhr.send();
// xhr.onreadystatechange  = function () {
//     //判断函数状态
//     if (xhr.readyState == 4 && xhr.status == 200){
//         //把1.php中得到的字符串改成对象 并赋值给变量xxx
//         var xxx = JSON.parse(xhr.responseText);
//         // var bbb = xhr.responseText;
//         // console.log(xxx);
//         // console.log(bbb);
//         //获取当前name属性的值到输入框
//         document.getElementById('yzm').value=xxx.name;
//     }
// }








    }


</script>
</body>
</html>