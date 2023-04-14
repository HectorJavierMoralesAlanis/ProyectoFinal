<?php
    include_once('./conexion.php');

    global $pdo;
        
    $nombre=$_POST['nombre'];
    $estado=$_POST['estado'];

    //Definir sql
    $sql = "INSERT INTO tienda (nombre,estado)VALUES(:nombre,:estado)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":nombre",$nombre);
    $statement->bindParam(":estado",$estado);
        
    if($statement->execute()){
        header("Location: ./registro_tienda.php");
    }else print("Error en la consulta");

?>