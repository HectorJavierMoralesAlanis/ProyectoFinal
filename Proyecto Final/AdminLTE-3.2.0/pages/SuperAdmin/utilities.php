<?php
    include('./conexion.php');

    function login(){
        global $pdo;
        $consulta="SELECT * FROM usuarios WHERE usuario='$_REQUEST[usuario]' and contrasena='$_REQUEST[contrasena]'";
        
        $statement=$pdo->prepare($consulta);
        $statement->execute();
        $filas=$statement->rowCount();
        if($filas>0){
            header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
        }else if(isset($filas)){
            echo "Error con los datos ingresados";
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
?>