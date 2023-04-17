<?php
    include('./utilities.php');
    if(isset($_POST['enviar'])){
        login(0);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="./login.php" class="h1"><b>Login</b></a>
            </div>
            <div class="card-body">
            <p class="login-box-msg">Ingrese los datos para el Inicio de sesion</p>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <!-- Campo para ingresar el nombre de usuario -->
                <div class="input-group mb-3">
                    <input name="usuario" id="usuario" type="text" class="form-control" placeholder="usuario" requierd>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <!-- Campo para ingresar la contraseña del usuario-->
                <div class="input-group mb-3">
                    <input name="contrasena" id="contrasena" type="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Recuerdame
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- Boton para iniciar sesion -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" name="enviar">Iniciar sesion</button>
                    </div>
                <!-- /.col -->
                </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
