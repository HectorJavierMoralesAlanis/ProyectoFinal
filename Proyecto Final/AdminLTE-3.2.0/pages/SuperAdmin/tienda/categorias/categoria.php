<?php
include_once('../../PDO/DAO.php');
//Se obtiene el id de la tienda
$id=$_GET['id'];

//Se crea la variable que permite la conexion a la base de datos
$dao = new DAO();

//Se crea la variable donde se guardara la consulta
$consulta="SELECT * FROM categoria WHERE tiendaId=:id";

//Se crea la variable en donde se guardara el array de los parametros
$parametros=array("id"=>$id);

//Se crea la variable donde se guardara el resultado de la consulta
$arrcategorias = $dao->ejecutarConsulta($consulta,$parametros);

?>


<html>
<head>
    <title>Categorias</title>
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
                    <a href="../categorias/categoria.php?id=<?php echo $id?>" class="nav-link">Categoria</a>
                </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo --->
        <a href="../../dashboardSA/dashboard.php" class="brand-link">
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
                            <a href="../dashboard.php?id=<?php echo $id?>" class="nav-link">
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../inventario/inventario.php?id=<?php echo $id?>" class="nav-link">
                                <p>
                                    Inventario
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../usuarios/usuarios2.php?id=<?php echo $id?>" class="nav-link">
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../categorias/categoria.php?id=<?php echo $id?>" class="nav-link active">
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Categorias</li>
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
                                <h3 class="card-title">Categoria</h3>

                                <!--Div para que el boton este a la derecha-->
                                <div class="btn-group" style="float: right;">
                                    <button type="button" class="btn btn-block btn-success" style="float: right;" onclick="window.location.href='registrar_categoria.php?id=<?php echo $id?> '">Agregar nueva categoria</button>
                                </div>
                            </div>
                            <!-- Cuerpo de la tabla-->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Fecha Agregada</th>
                                            <th>Editar?</th>
                                            <th>Eliminar?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Extrea todos los datos de la tabla en la base de datos y los muestra aqui-->
                                        <?php foreach ($arrcategorias as $id => $categoria) { ?>
                                            
                                        <tr>
                                            
                                        <td><?php echo $categoria['nombre']; ?></td>
                                        <td><?php echo $categoria['descripcion']; ?></td>
                                        <td><?php echo $categoria['fecha']; ?></td>
                                        <td class="align-middle"><a href="./editarCategorria.php?id=<?php echo ($categoria['id']);?>" method="POST" class="btn btn-warning btn-block btn-sm" >EDITAR</a></td>
                                        <td class="align-middle"><a href="./eliminarCategoria.php?id=<?php echo($categoria['id']); ?>" class="btn btn-danger btn-block btn-sm">ELIMINAR</a></td>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
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