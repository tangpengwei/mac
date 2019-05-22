
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>NB企业检索系统</title>

    <link href="/static/ui/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/ui/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/ui/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">

        <div class="wrapper wrapper-content">

            <div class="container">

                <div  style="margin-top: 200px">
                    <h1 class="text-center">NB企业检索系统</h1>
                </div>

                <form action="{:url('/index/Index/search')}" method="post">
                    <div class="input-group m-t-xl col-md-10 col-md-offset-1">
                        <input type="text" class="form-control" name="wd">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">搜索</button>
                    </span>
                    </div>
                </form>
                <p class="text-muted text-center m-t-md">
                    {if $Request.session.userloginInfo}
                    <span>欢迎您： {$Request.session.userloginInfo.mobile}</span>
                    <a href="{:url('index/sign/logout')}">
                        <small>退出</small>
                    </a>
                    {else /}
                    <a href="{:url('index/sign/in')}"><small>登录</small></a> |
                    <a href="{:url('index/sign/up')}">注册一个新账号</a>
                    {/if}
                </p>

            </div>

        </div>

    </div>
</div>



<!--<div id="main" style="width: 600px;height:400px;"></div>-->

<!---->
<!--<script src="/static/echarts/dist/echarts.js"></script>-->
<!--<script>-->
<!--    var myChart = echarts.init(document.getElementById('main'));-->
<!---->
<!--    // 指定图表的配置项和数据-->
<!--    var option = {-->
<!--        title: {-->
<!--            text: '老毛女朋友比例'-->
<!--        },-->
<!--        tooltip: {},-->
<!--        legend: {-->
<!--            data:['女票数']-->
<!--        },-->
<!--        xAxis: {-->
<!--            data: ["明星","工人","公务员","技术员","PHP工程师","Java工程师"]-->
<!--        },-->
<!--        yAxis: {},-->
<!--        series: [{-->
<!--            name: '女票数',-->
<!--            type: 'bar',-->
<!--            data: [5, 20, 36, 10, 10, 20]-->
<!--        }]-->
<!--    };-->
<!---->
<!--    // 使用刚指定的配置项和数据显示图表。-->
<!--    myChart.setOption(option);-->
<!---->
<!---->
<!--</script>-->

</body>

</html>
