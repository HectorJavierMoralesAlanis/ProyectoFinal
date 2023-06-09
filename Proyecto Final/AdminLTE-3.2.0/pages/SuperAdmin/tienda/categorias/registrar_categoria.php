<?php
include_once('../../PDO/DAO.php');

//Se revisa que las variables se esten recibiendo para continuar con la insercion de los valores ingresados 
if(isset($_POST['nombre'], $_POST['descripcion'])){
        //Variable que permite la conexion a la base de datos
        $dao=new DAO();

        //Varaible que permite saber la fecha de la insercion
        $fecha=date('Y-m-d H:i:s');

        //Variable que guarda el id de la tienda
        $id=$_GET['id'];

        //Variable que guarda la consulta
        $consulta="INSERT INTO categoria (nombre,descripcion,fecha,tiendaId)"."VALUES (:nombre,:descripcion,:fecha,:idTienda)";

        //Variable que guarda los parametros
        $parametros=array("nombre"=>"$_POST[nombre]","descripcion"=>"$_POST[descripcion]","fecha"=>$fecha,"idTienda"=>$id);

        //Variuable que guarda el resultado de la consulta
        $resultado=$dao->insertarConsulta($consulta,$parametros);

        //Condicional que evalua si resultado 
        if($resultado>=0){
            header("Location: http://64.226.114.50/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/tienda/categorias/categoria.php?id=$id");
        }else{
            echo"error";
        }
}
?>

<html>
<head>
    <title>Registrar Categoria</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!--Navbar-->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Registrar Categoria</a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo --->
        <a href="../dashboard.php?id=<?php echo $_GET['id']?>" class="brand-link">
            <img src="./lemur.png"  class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Menu lateral-->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Opciones</li>
                        <li class="nav-item">
                            <a href="./categoria.php?id=<?php echo $_GET['id']?>" class="nav-link">
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="../inventario/inventario.php?id=<?php echo $_GET['id']?>" class="nav-link">
                                <p>
                                    Inventario
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../usuarios/usuarios2.php?id=<?php echo $_GET['id']?>" class="nav-link">
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../categorias/categoria.php?id=<?php echo $_GET['id']?>" class="nav-link active">
                                <p>
                                    Categorias
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../login.php" class="nav-link">
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
                            <li class="breadcrumb-item"><a href="../dashboard.php?id=<?php echo $_GET['id']?>">Home</a></li>
                            <li class="breadcrumb-item">Categorias</li>
                            <li class="breadcrumb-item active">Registrar Categoria</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    

    <!-- Contenido -->
        <section class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <!-- Header del contenido-->
                            <div class="card-header">
                                <h3 class="card-title">Registrar Categoria</h3>

                            </div>
                            <!-- Cuerpo del formulario-->
                            <div class="card-body">
                            <form method="POST" action="registrar_categoria.php?id=<?php echo $_GET['id']?>">
                                    <div class="form-group">
                                        <label>
                                            Nombre
                                        </label>
                                        <br>
                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label>
                                            Descripcion
                                        </label>
                                        <br>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                                    </div>
                                    <br>
                                    <div class="btn-group" style="float: right;">
                                        <button type="submit" class="btn btn-block btn-success" style="float: right;">REGISTRAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

        <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../../dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../../../plugins/raphael/raphael.min.js"></script>
<script src="../../../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../../../plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../../dist/js/pages/dashboard2.js"></script>
</body>
</html>