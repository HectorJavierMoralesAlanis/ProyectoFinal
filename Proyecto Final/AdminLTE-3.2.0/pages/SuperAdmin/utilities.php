<?php
    include('./conexion.php');

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
    //Funcion para el login
    function login($usuario,$contrasena)
    {
        global $pdo;

        $consulta="SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'";

        $statement=$pdo->prepare($consulta);
        $statement->execute();
        $filas =$statement->rowCount();

        if ($filas>0){
            header("Location: http://134.122.77.182/phpmyadmin/index.php?route=/sql&pos=0&db=proyecto&table=usuarios");
        }
        return $filas;
        
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