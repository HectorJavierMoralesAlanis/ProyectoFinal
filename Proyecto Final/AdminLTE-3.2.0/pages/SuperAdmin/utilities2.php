<?php
    include_once('./conexion.php');

    function addTienda($nombre,$estado){
        global $pdo;
        
        //Definir sql
        $sql = "INSERT INTO tienda  VALUES('$nombre','$estado')";
        $statement = $pdo->prepare($sql);
        $statement->execute();

    }
?>