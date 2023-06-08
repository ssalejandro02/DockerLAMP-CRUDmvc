<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>CRUDmvc</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">LOGIN</p>

        <form method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="log_user" placeholder="User">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="log_pass" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Iniciar Sesión</button>
                </div>
                <!-- /.col -->
            </div>

            <?php
            $ingreso = new ctrUsuarios();
            $ingreso->ctrIngresoUsuarios();
            ?>

        </form>
    </div>
    <!-- /.login-box-body -->
</div>
</body>
</html>