
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>登陆</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://v3.bootcss.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://v3.bootcss.com/examples/signin/signin.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <?php echo $content ?>
</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(function() {
        toastr.options.showDuration = "200";
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.showMethod = "slideToggle";
        toastr.options.hideMethod = "hide";
        <?php if(\Yii::$app->session->getFlash('error')):?>
        toastr.error("<?php echo \Yii::$app->session->getFlash('error')?>");
        <?php endif;?>
        <?php if(\Yii::$app->session->getFlash('success')):?>
        toastr.success("<?php echo \Yii::$app->session->getFlash('success')?>");
        <?php endif;?>
    })
</script>
</body>
</html>
