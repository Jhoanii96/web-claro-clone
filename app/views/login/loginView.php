<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Iniciar de sesión | El Dorado</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?= FOLDER_PATH ?>/src/assets/image/favicon.ico">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/blue.css">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/transition.css"> 
    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body id="fade" class="hold-transition login-page img-transition">
    <div class="login-box" style="margin: 4% auto; margin-bottom: 0px; margin-top: 0px; padding-top: 7%;width: 330px;">
        <div class="login-logo"> <img src="<?= FOLDER_PATH ?>/src/assets/image/logo_Claro.png" style="width: 175px; margin-bottom: 5px;"> </div>
        <div class="login-box-body" style="background: rgba(0, 0, 0, 0.7294);">
            <p class="login-box-msg" style="color: rgba(0, 197, 255, 0.8901);">Accede para iniciar sesión.</p>
            <form action="<?= FOLDER_PATH . '/login/signin' ?>" method="post"> 
                <input type="password" style="display: none;" name="password" autocomplete="new-password">
                <div class="form-group has-feedback" style="margin-bottom: 25px;"> 
                    <input type="usern" class="form-control" name="usern" placeholder="Usuario" style="background-color: #0000008a; color: #eee;" 
                    value="<?php if (isset($_COOKIE["member_login"])) {echo $_COOKIE["member_login"];} ?>"> 
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span> 
                </div>
                <div class="form-group has-feedback" style="margin-bottom: 25px;"> 
                    <input type="password" class="form-control" name="passu" placeholder="Password" style="background-color: #0000008a; color: #eee;" 
                    value="<?php if (isset($_COOKIE["member_password"])) {echo $_COOKIE["member_password"];} ?>"> 
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span> 
                </div>
                <?php 
                    if(!empty($data['error_message']))
                    {
                        echo '<span style="text-align: center;display: block;color: red;margin-bottom: 15px;">' . $data['error_message'] . '</span>';
                    }
                    else
                    {
                        echo'';
                    } 
                ?>
                
                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-xs-7">
                        <div class="checkbox icheck"> <label style="color: #a8a8a8;"> <input name="chkb" type="checkbox" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?>> Recuérdame </label> </div>
                    </div>
                    <div class="col-xs-5"> 
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button> 
                    </div>
                </div>
            </form> 
            <span style="font-weight: lighter; font-size: 12px; color: #fff">Derechos de <a href="javascript:;" class="text-center" style="font-weight: normal;">política de datos</a> y <a href="javascript:;" class="text-center" style="font-weight: normal;">política de cookies</a></span>
        </div>
        <div class="footer">
            <p id="author" style="font-size: 15px;"></p>
        </div>
    </div>
    <script src="<?= FOLDER_PATH ?>/src/js/jquery.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/bootstrap.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/icheck.min.js"></script>
    <script>
        $(function() {
            $("input").iCheck({
                checkboxClass: "icheckbox_square-blue",
                radioClass: "iradio_square-blue",
                increaseArea: "20%"
            })
        })
    </script>
    <script type="text/javascript">
        var bgImageArray = [];
        bgImageArray[0] = "<?= FOLDER_PATH ?>/src/assets/image/background/SPL60N.jpg", 
        document.getElementById("fade").style.background = "url(" + bgImageArray[0] + ") no-repeat center center fixed", document.getElementById("fade").style.backgroundSize = "cover";
    </script>
</body>

</html>