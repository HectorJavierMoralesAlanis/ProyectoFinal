<?php
    include_once('../PDO/DAO.php');
    $dao=new DAO();
    $id=$_GET['id'];
    $consulta="SELECT * "."FROM tienda WHERE id=:id";
    $parametros = array("id"=>$id);
    $tienda=$dao->ejecutarConsulta($consulta,$parametros);

    if(isset($_POST['enviar'])){
        if(!empty($_POST['nombre'])&&!empty($_POST['estado'])){
            $dao2=new DAO();
            $consulta2="UPDATE tienda SET nombre = :nombre, estado = :estado "."WHERE id=:id";
            $parametros2= array("nombre"=>"$_POST[nombre]","estado"=>"$_POST[estado]","id"=>$id);
            $resultado=$dao2->insertarConsulta($consulta2,$parametros2);
            if($resultados>=0){
                header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
            }else{
                echo "error";
            }
        }
    }

?>

<html>
<head>
    <title>Tiendas</title>
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
                <a href="../dashboardSA/dashboard.php" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo --->
        <a href="../dashboardSA/dashboard.php" class="brand-link">
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
                                <h3 class="card-title">Editar Tienda</h3>
                                <!--Div para que el boton este a la derecha-->
                                
                            </div>
                            <!-- Cuerpo de la tabla-->
                            <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                                    <?php foreach($tienda as $id => $tiendas){?>
                                        <div class="form-group">

                                            <label>
                                                Nombre
                                            </label>
                                            <br>
                                            <input type="text" class="form-control" value="<?php echo($tiendas['nombre'])?>" name="nombre" id="nombre">

                                            <label>
                                                Estado:
                                            </label>

                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="activo" name="estado" <?php if($tiendas['estado']=='Activo'){?>checked<?php }?>>
                                                <label for="activo" class="custom-control-label">ACTIVADA</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input custom-control-input-danger" type="radio" id="desactivado" name="estado" <?php if($tiendas['estado']=='Desactivado'){?>checked<?php }?>>
                                                <label for="desactivado" class="custom-control-label">DESACTIVADA</label>
                                            </div>

                                        </div>
                                    <?php }?>
                                    <div class="btn-group" style="float: right;">
                                    <button type="submit" class="btn btn-block btn-success" style="float: right;" name="enviar">ACTUALIZAR</button>
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