<?php
    include_once('./conexion.php');

    function addTienda($nombre,$estado){
        global $pdo;
        
        //Definir sql
        $sql = "INSERT INTO tienda (nombre,estado) VALUES(:nombre,:estado)";
        $statement = $pdo->prepare($sql);

        //Declaracion de las variables
        $nombreT = "Walmart";
        $estadoT = "Activo";

        //Agregar los valores a la base
        $statement->bindParam(':nombre',$nombreT);
        $statement->bindParam(':estado',$estadoT);

        $statement->execute();

    }
?>