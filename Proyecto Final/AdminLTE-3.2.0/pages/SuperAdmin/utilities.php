<?php
    include('./conexion.php');

    global $pdo;
    $consulta="SELECT * FROM usuarios WHERE usuario='$_REQUEST[usuario]' and contrasena='$_REQUEST[contrasena]'";
    
    $statement=$pdo->prepare($consulta);
    $statement->execute();
    $filas=$statement->rowCount();
    if($filas>0){
        header("Location: http://134.122.77.182/phpmyadmin/index.php?route=/sql&pos=0&db=proyecto&table=usuarios");
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