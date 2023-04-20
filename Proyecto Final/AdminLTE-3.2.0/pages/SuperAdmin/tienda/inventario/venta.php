<?php
include_once('../../PDO/DAO.php');

$id =  $_GET['id'] ; 
$dao = new DAO();
$consulta ="SELECT * FROM inventario WHERE id=:id";
$parametros = array("id"=>$id);
$r=$dao->ejecutarConsulta($consulta,$parametros);

//$r = searchINV($id); //Se realiza una busqueda en la base de datos 


//Se revisa que la variable se encuentre definida
if(isset($_POST['stock'])){
    //Se realiza la actualizacion del registro 
    $dao2=new DAO();
    $consulta2="UPDATE inventario SET stock=:stock WHERE tiendaid=:idT AND id=:id";
    foreach($r as $id => $t){
    $parametros2=array("stock"=>"$_POST[stock]","idT"=>$t['tiendaId'],"id"=>$id);
    }
    $resultados=$dao2->insertarConsulta($consulta2,$parametros2);
    //Al termino de la actualizacion se redirige a la pagina categoria
    if($resultados>=0){
        foreach($r as $id => $tie){
        header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/tienda/inventario/inventario.php?id=$tie[tiendaId]");
        }
    }else{
        echo "error";
    }

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
                    <?php foreach($r as  $id =>$l){?>
                        <li class="nav-item">
                            <a href="../dashboard.php?id=<?php echo $l['tiendaId']?>" class="nav-link">
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./inventario.php?id=<?php echo $l['tiendaId']?>" class="nav-link active">
                                <p>
                                    Inventario
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../usuarios/usuarios.php?id=<?php echo $l['tiendaId']?>" class="nav-link">
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../categorias/categoria.php?id=<?php echo $l['tiendaId']?>" class="nav-link">
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
                    <?php }?>
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
                                    <?php echo('<form method="POST" action="venta.php?id='.$id.'">');?>
                                    <?php foreach($r as $id => $res){?>
                                    <div class="form-group mr-1">
                                        <label for="id_inventario">id del producto:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="id_inventario" name="id_inventario" value="<?php echo($res['id'])?>" disabled>
                                    </div>
                                    
                                    <div class="form-group mr-1">
                                        <label for="codigo_inventario">Codigo del producto:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="codigo_inventario" name="codigo_inventario" value="<?php echo($res['codigo'])?>" disabled>
                                    </div>
                                    
                                    <div class="form-group mr-1">
                                        <label for="nombre_producto">Nombre:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="nombre_producto" name="nombre_producto" value="<?php echo($res['nombre'])?>" disabled>
                                    </div>
                                    
                                    <div class="form-group mr-1">
                                        <label for="precioProducto_inventario">Precio:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="precioProducto_inventario" name="precioProducto_inventario" value="<?php echo($res['precioProducto'])?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock disponible:</label>
                                        <br>
                                        <input type="text" class="form-control form-control-sm" id="stock" name="stock" value="<?php echo($res['stock'])?>" disabled>
                                    </div>
                                    <?php }?>
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
                                            <img src="../../nvu.png">
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