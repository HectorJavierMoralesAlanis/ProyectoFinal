<?php
    include('./conexion.php');

    function addTienda($nombre,$estado){
        global $pdo;
        
        //Definir sql
        $sql = "INSERT INTO tienda (nombre,estado) VALUES(:nombre,:estado)";
        $statement = $pdo->prepare($sql);

        //Declaracion de las variables
        $nombreT = $nombre;
        $estadoT = $estado;

        //Agregar los valores a la base
        $statement->bindParam(':nombre',$nombreT);
        $statement->bindParam(':estado',$estadoT);
        
        $statement->execute();

    }
?>