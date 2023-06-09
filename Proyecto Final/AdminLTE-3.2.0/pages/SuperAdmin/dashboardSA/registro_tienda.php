<?php
    include_once('../PDO/DAO.php');

    //Condicional donde si el boton si es valido entrara
    if(isset($_POST['enviar'])){
        //Condicional donde si los PPOST nombre y estado no estan vacios entrara
        if(!empty($_POST['nombre'])&&!empty($_POST['estado'])){

            //Se crea la variable dao que permite la conexion a la base de datos
            $dao=new DAO();

            //Se crea la variable de la consulta donde se guardara la consulta
            $consulta="INSERT INTO tienda (nombre,estado)"."VALUES (:nombre,:estado)";

            //Se crea la variable parametros donde se guaradra el resultado de la consulta
            $parametros=array("nombre"=>"$_POST[nombre]","estado"=>"$_POST[estado]");

            $resultado=$dao->insertarConsulta($consulta,$parametros);

            if($resultado>=0){
                header("Location: http://64.226.114.50/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
            }else{
                echo"error";
            }
        }
    }
?>
<html>
<head>
    <title>Registro Tiendas</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!--Navbar-->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../dashboardSA/registro_tienda.php" class="nav-link">Registro Tiendas</a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo --->
        <a href="../dashboardSA/dashboard.php" class="brand-link">
            <img src="./lemur.png"  class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SuperAdmin</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Menu lateral-->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Opciones</li>
                        <li class="nav-item">
                            <a href="../dashboardSA/dashboard.php" class="nav-link">
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../login.php" class="nav-link">
                                <p>
                                    Cerrar sesion
                                </p>
                            </a>
                        </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- Fin del menu lateral -->

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    

    <!-- Contenido -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <!-- Header del contenido-->
                            <div class="card-header">
                                <h3 class="card-title">Registrar Tienda</h3>
                                <!--Div para que el boton este a la derecha-->
                                
                            </div>
                            <!-- Cuerpo de la tabla-->
                            <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                                    <div class="form-group">
                                        <!-- Label donde imprime el nombre-->
                                        <label>
                                            Nombre
                                        </label>
                                        <br>
                                        <!-- Input para ingresar el nombre -->
                                        <input type="text" class="form-control" name="nombre" id="nombre">
                                        <!-- Label para donde imprime estado-->
                                        <label>
                                            Estado:
                                        </label>
                                        <!-- Radio Buttons para marcar si la tienda esta activada o desactivada-->
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="activo" name="estado" value="Activo">
                                            <label for="activo" class="custom-control-label">ACTIVADA</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-danger" type="radio" id="desactivado" name="estado" value="Desactivado">
                                            <label for="desactivado" class="custom-control-label">DESACTIVADA</label>
                                        </div>
                                    </div>
                                    <!-- Boton para registrar la tienda-->
                                    <div class="btn-group" style="float: right;">
                                        <button type="submit" class="btn btn-block btn-success" style="float: right;" name="enviar">REGISTRAR</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

    <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../../plugins/raphael/raphael.min.js"></script>
<script src="../../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard2.js"></script>
</body>
</html>