<?php
include_once("../../PDO/DAO.php");
//Para mostrar los datos en los campos

$dao=new DAO();
$id=$_GET['id'];
$consulta="SELECT * FROM inventario WHERE id=:id";
$parametros=array("id"=>$id);
$inventario=$dao->ejecutarConsulta($consulta,$parametros);
//Para mostrar categorias
foreach($inventario as $id => $in){
$dao2=new DAO();
$consulta2="SELECT * FROM categoria WHERE tiendaId=:id2";
$parametros2= array("id2"=>$in['tiendaId']);
$user_access= $dao2->ejecutarConsulta($consulta2,$parametros2);
}
//Para Actualizar los datos
if(isset($_POST['nombre_producto'], $_POST['precioProducto_inventario'], $_POST['id_categoria'], $_POST['stock'])){

    $dao = new DAO();
    $fecha=date('Y-m-d H:i:s');
    $id2=$_GET['id'];
    $consulta1="UPDATE inventario SET nombre=:nombre, fechaA=:fecha, precioProducto=:precioProducto, categoria=:categoria, stock=:stock WHERE id=:idP";
    
    $parametros1=array("nombre"=>"$_POST[nombre_producto]","fecha"=>$fecha,"precioProducto"=>"$_POST[precioProducto_inventario]","categoria"=>"$_POST[id_categoria]","stock"=>"$_POST[stock]","idP"=>$id2);
    $resultados=$dao->insertarConsulta($consulta1,$parametros1);
    
    if($resultados>=0){
        foreach($inventario as $id =>$tie){
        header("Location: http://64.226.114.50/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/tienda/inventario/inventario.php?id=$tie[tiendaId]");
        }
    }else{
        echo "error";
    }
}
?>
<html>
<head>
    <title>Editar Inventario</title>
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
                <?php foreach($user_access as $id => $l){?>
                <a href="../dashboard.php?id=<?echo $l['tiendaId']?>" class="nav-link">Editar Inventario</a>
                <?php }?>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo --->
        <a href="../dashboard.php<?php $_GET['id']?>" class="brand-link">
            <img src="./lemur.png"  class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Menu lateral-->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Opciones</li>
                    <?php foreach($user_access as $id => $l){?>
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
                            <a href="../usuarios/usuarios2.php?id=<?php echo $l['tiendaId']?>" class="nav-link">
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../categorias/categoria.php?id=<? echo $l['tiendaId']?> class="nav-link">
                                <p>
                                    Categorias
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/login-v2.html" class="nav-link">
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
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php?id=<?php echo $_GET['id']?>">Home</a></li>
                            <li class="breadcrumb-item">Inventario</li>
                            <li class="breadcrumb-item active">Editar Inventario</li>
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
                                <h3 class="card-title">Editar producto</h3>
                                <!--Div para que el boton este a la derecha-->
                                <div class="btn-group" style="float: right;">
                                    <button type="button" class="btn btn-block btn-success" style="float: right;">Agregar nuevo producto</button>
                                </div>
                            </div>

                            <!-- Cuerpo del formulario-->
                            <div class="card-body">
                                <form method="POST" action="./editarInverntario.php?id=<?php echo $_GET['id']?>">
                                <?php foreach($inventario as $id => $inv){?>    
                                    <div class="form-group">
                                        <label>
                                            Nombre:
                                        </label>
                                        <br>
                                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?php echo $inv['nombre']?>">
                                        <br>
                                        <label>
                                            Precio:
                                        </label>
                                        <br>
                                        <input type="text" class="form-control" id="precioProducto_inventario" name="precioProducto_inventario" value="<?php echo $inv['precioProducto']?>">
                                        <br>
                                        <label>
                                            Stock:
                                        </label>
                                        <br>
                                        <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $inv['stock']?>" disabled>
                                        <br>
                                        <label>
                                            Categoria:
                                        </label>
                                        <br>

                                        <select class="custom-select form-control-border" id="id_categoria" name="id_categoria">
                                            <option value="<?php echo $inv['categoria']?>" selected><?php echo $inv['categoria']?></option>
                                            <?php foreach($user_access as $id => $row){?>
                                                <option value="<?php echo $row['descripcion']?>"><?php echo $row['descripcion']?></option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="btn-group" style="float:right;">
                                        <button type="submit" class="btn btn-block btn-success" style="float: right;">
                                        Guardar
                                        </button>
                                    </div>
                                </form>
                                <?php }?>
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