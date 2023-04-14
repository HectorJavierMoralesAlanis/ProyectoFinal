<?php
    include_once('./conexion.php');

    if(!empty($_POST['nombre'])&&!empty($_POST['estado'])){
        global $pdo;
        
        $nombre=$_REQUEST['nombre'];
        $estado=$_REQUEST['estado'];
        //Definir sql
        $sql = "INSERT INTO tienda (nombre,estado)VALUES(:nombre,:estado)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":nombre",$nombre);
        $statement->bindParam(":estado",$estado);
            
        if($statement->execute()){
            header("Location: ./registro_tienda.php");
        }else {
            print("Error en la consulta");
        }
    }else{
        print("Error");
    }
?>