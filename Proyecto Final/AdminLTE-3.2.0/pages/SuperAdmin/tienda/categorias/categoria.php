<?php
include_once('../../PDO/DAO.php');
echo $_GET['id'];
$dao = new DAO();
$consulta="SELECT * FROM categoria";
$arrcategorias = $dao->ejecutarConsulta($consulta);

//$arrcategorias = getAllCategorias();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //deletecat($id);
    //header("Location: categoria.php");
}

?>


<html>
<head>
    <title>Tiendas</title>
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
                <a href="../categorias/categoria.php" class="nav-link">Home</a>
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
            <!-- Sidebar user panel -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="./lemur.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Bon</a>
                </div>
            </div>
        
        
            <!-- Menu lateral-->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Opciones</li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../inventario/inventario.php" class="nav-link">
                                <p>
                                    Inventario
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../usuarios/usuarios.php" class="nav-link">
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../categorias/categoria.php" class="nav-link active">
                                <p>
                                    Categorias
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../venta/venta.php" class="nav-link">
                                <p>
                                    Realizar Venta
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <p>
                                    Historial de Venta
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
                                    <button type="button" class="btn btn-block btn-success" style="float: right;"  onclick="window.location.href='registrar_categoria.php'">Agregar nueva categoria</button>

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

                                        <?php foreach ($arrcategorias as $id => $categoria) { ?>
                                            
                                        <tr>
                                            
                                        <td><?php echo $categoria['nombre_categoria']; ?></td>
                                        <td><?php echo $categoria['descripcion_categoria']; ?></td>
                                        <td><?php echo $categoria['fecha_categoria']; ?></td>
                                        <td class="align-middle"><a href="./editarCategorria.php?=<?php echo($_GET['id']);?>" class="btn btn-warning btn-block btn-sm" >EDITAR</a></td>
                                        
                                        <td class="align-middle"><a href="categoria.php?id=<?php echo($categoria['id_categoria']); ?>" class="btn btn-danger btn-block btn-sm" onClick="wait();">ELIMINAR</a></td>
                                        
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