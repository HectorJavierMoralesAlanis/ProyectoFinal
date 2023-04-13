<?php
    include('./conexion.php');
    //Funcion para el login
    function login($usuario,$contrasena)
    {
        global $pdo;

        $consulta="SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'";

        $statement=$pdo->prepare($consulta);
        $statement->execute();
        $filas =$statement->rowCount();

        if($filas>0){
            header("location:../SuperAdmin/dashboardSA/dasboard.php");
        }else{
            echo "Error";
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