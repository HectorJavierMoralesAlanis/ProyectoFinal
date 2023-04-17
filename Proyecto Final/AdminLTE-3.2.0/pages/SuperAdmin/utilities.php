<?php
    include('./conexion.php');
    
    function login(){
        global $pdo;

        //Consulta para traer las filas que coincidan
        $consulta="SELECT * FROM usuarios WHERE usuario='$_REQUEST[usuario]' and contrasena='$_REQUEST[contrasena]'";
        
        //Ejecuta la consulta
        $statement=$pdo->prepare($consulta);
        $statement->execute();

        //Cuenta las filas 
        $filas=$statement->rowCount();

        //Si coincide mas de una 
        if($filas>0){
            header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
        }else{
            header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/login.php");
        }
    }
    function getlogin(){
        global $pdo;

        $sql = "SELECT * from usuarios";

        $statements=$pdo->prepare($sql);

        $statements->execute();
        $results=$statements->fetchAll();
        return $results;
    };

    function addTienda(){
        if(!empty($_POST['nombre'])&&!empty($_POST['estado'])){
            global $pdo;
            echo "<h2 style='float: right;'>dentro del post</h2>";
            echo "<h2 style='float: right;'>$_POST[nombre]</h2>";
            echo "<h2 style='float: right;'>$_POST[estado]</h2>";
            $consulta = "SELECT * FROM tienda";
            $declaracion=$pdo->prepare($consulta);
            $declaracion->execute();

        }
    }

    function mostrarTienda(){
        global $pdo;

        $sql = "SELECT * FROM tienda";

        $statements = $pdo->prepare($sql);

        $statements->execute();

        $results=$statements->fetchAll();
        return $results;
    }
?>