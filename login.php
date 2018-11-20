<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" >

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte1.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    
    <div class="login-logo">
        <img src="dist/img/moph.png" width="100" alt="">
        <br>
        <a href=""><b>Ratchaburi Hospital</b><br>Web Service</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">กรุณา Log In ก่อนเข้าใช้งาน</p>

            <form action="checklogin.php" method="post" autocomplete="off">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" onautocomplete="off" autocomplete="off" autocomplete="false">
                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" autocomplete="false">
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-4 offset-4">
                        <button type="submit" class="btn btn-primary btn-outline-primary btn-block btn-flat">เข้าสู่ระบบ</button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <?php
                        if($_SESSION['loginFail'] == 2){
                            echo "<span class='text-danger text-center'>Username  Password <br> ไม่ถูกต้องไม่สามารถเข้าสู่ระบบได้</span>";
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass   : 'iradio_square-blue',
            increaseArea : '20%' // optional
        })
    })
</script>
</body>
</html>
