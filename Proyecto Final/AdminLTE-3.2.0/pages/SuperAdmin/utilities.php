<?php
    include('./conexion.php');
    //Funcion para el login
    function login($usuario,$contrasena)
    {
        global $pdo;

        $sql = "SELECT * from usuarios";

        $statements = $pdo->prepare($sql);
        
        $statements-> execute();
        $results=$statements->fetchAll();
        if($usuario == $results[0]['usuario']&&$contrasena==$results[0]['contrasena']){
            return true;
        }else{
            return false;
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