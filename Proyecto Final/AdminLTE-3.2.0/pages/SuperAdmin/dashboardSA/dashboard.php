<?php
    //Se incluye el archivo DAO que contiene la funcion para ejecutar la consulta 
    include_once('../PDO/DAO.php');

    //Se crea la variable dao que permite la conexion a la base de datos
    $dao = new DAO();

    //Consulta para seleccionar todos los valores de la tabla tienda
    $consulta="SELECT * FROM tienda";

    //Se guarda en el arreglo los datos obtenidos
    $tiendas=$dao->ejecutarConsulta($consulta);
?>
<html>
<head>
    <title>Dashboard Tiendas</title>
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
                <a href="../dashboardSA/dashboard.php" class="nav-link">Dashboard de Tiendas</a>
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
                    <li class="nav-header ">Opciones</li>
                        <li class="nav-item">
                            <a href="../dashboardSA/dashboard.php" class="nav-link active">
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard de tiendas</li>
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
                                <h3 class="card-title">Tiendas</h3>
                                <!--Div para que el boton este a la derecha-->
                                <div class="btn-group" style="float: right;">
                                    <a href="./registro_tienda.php" class="btn btn-block btn-success" style="float: right;">Agregar mas tiendas</a>
                                </div>
                            </div>
                            <!-- Cuerpo de la tabla-->
                            <div class="card-body">
                                <form method="POST">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Activa</th>
                                                <th>¿Editar?</th>
                                                <th>¿Eliminar?</th>  
                                                <th>Ingresar</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <!-- Se utiliza un foreach para recorrer los valores del arreglo y poder imprimirlos en las columans de la tabla-->
                                            <?php foreach($tiendas as $id =>$tienda){?>
                                                <tr>
                                                    <td><?php echo $tienda['id']?></td>
                                                    <td><?php echo $tienda['nombre']?></td>
                                                    <td><?php echo $tienda['estado']?></td>
                                                    <td><a href="./editar_tienda.php?id=<?php echo($tienda['id']);?>" method="POST" class="btn btn-block btn-warning">Editar</a></td>
                                                    <td><a href="./eliminaTienda.php?id=<?php echo($tienda['id']);?>" method="POST" class="btn btn-block btn-danger">Eliminar</a></td>
                                                    <td><a href="../tienda/dashboard.php?id=<?php echo($tienda['id']);?>" method="POST" class="btn btn-block btn-success">Ingresar</a></td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
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