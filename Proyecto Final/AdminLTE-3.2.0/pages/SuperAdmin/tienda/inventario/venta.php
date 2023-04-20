<?php
include_once('../../db/utilities.php');

$id = isset( $_GET['id'] ) ? $_GET['id'] : '';  
//$r = searchINV($id); //Se realiza una busqueda en la base de datos 


//Se revisa que la variable se encuentre definida
if(isset($_POST['codigo_inventario'],$_POST['nombre_producto'],$_POST['precioProducto_inventario'],$_POST['stock'])){

  //Se realiza la actualizacion del registro 
  //updateINV($id,$_POST['codigo_inventario'],$_POST['nombre_producto'],$_POST['precioProducto_inventario'],$_POST['stock']);

  //Al termino de la actualizacion se redirige a la pagina categoria
  //header("location: inventario.php");
  
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
                <a href="../../dashboardSA/dashboard.php" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo --->
        <a href="../SuperAdmin/dashboard.php" class="brand-link">
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
                            <a href="../venta/venta.php" class="nav-link active">
                                <p>
                                    Ventas  
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
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
                                <h1 class="card-title">AGREGAR,ELIMINAR STOCK</h1>
                                <!--Div para que el boton este a la derecha--> 
                            </div>
                            <div class="card-body">
                                <form method="POST" action="agregarInverntario.php" class="form-inline flex-wrap">
                                    <?php echo('<form method="POST" action="venta.php?id_inventario='.$id.'">');?>
                                    
                                    <div class="form-group mr-1">
                                        <label for="id_inventario">id del producto:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="id_inventario" name="id_inventario" value="<?php echo($r['id_inventario'])?>" disabled>
                                    </div>
                                    
                                    <div class="form-group mr-1">
                                        <label for="codigo_inventario">Codigo del producto:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="codigo_inventario" name="codigo_inventario" value="<?php echo($r['codigo_inventario'])?>" disabled>
                                    </div>
                                    
                                    <div class="form-group mr-1">
                                        <label for="nombre_producto">Nombre:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="nombre_producto" name="nombre_producto" value="<?php echo($r['nombre_producto'])?>" disabled>
                                    </div>
                                    
                                    <div class="form-group mr-1">
                                        <label for="precioProducto_inventario">Precio:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="precioProducto_inventario" name="precioProducto_inventario" value="<?php echo($r['precioProducto_inventario'])?>" disabled>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="stock">Stock disponible:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="stock" name="stock" value="<?php echo($r['stock'])?>" disabled>
                                    </div>
                                    
                                </form>
                            </div>

                                    <div class="card-body">
                                    <form method="POST" action="venta.php">
                                        <div class="form-group">
                                        <label>
                                            Agregar o eliminar Stock:
                                        </label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="stock" name="stock">
                                        </div>
                                    </form>
                                    </div>

                                    <br>
                                    <center>
                                        <label>
                                            <h1>
                                            MODIFICAR STOCK:
                                            </h1>
                                        </label>
                                    </center>
                                        <br>
                                        <div class="btn-group mx-auto text-center">
                                        <button type="submit" class="btn btn-success">
                                            <img src="../../db/nuv.png"">
                                            <br>
                                            Modificar 
                                        </button>
                                        <br>
                                        <br>
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