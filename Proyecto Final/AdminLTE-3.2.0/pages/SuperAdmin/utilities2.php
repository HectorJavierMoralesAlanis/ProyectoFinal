<?php
    include('./conexion.php');

    function addTienda($nombre,$estado){
        global $pdo;
        
        $sql = "INSERT INTO tienda VALUES(' ','Walmart','Activo')";

        $statement = $pdo->prepare($sql);
        $statement->execute();

    }
?>