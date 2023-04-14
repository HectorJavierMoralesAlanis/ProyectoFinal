<?php
    include('./conexion.php');

    function addTienda($nombre,$estado){
        global $pdo;
        
        $sql = "INSERT INTO tienda VALUES('','$nombre','$estado')";

        $statement = $pdo->prepare($sql);
        $statement->execute();

    }
?>