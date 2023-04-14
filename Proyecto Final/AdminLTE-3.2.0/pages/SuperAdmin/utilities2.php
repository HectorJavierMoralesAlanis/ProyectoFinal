<?php
    include_once('./conexion.php');

    if(!empty($_POST['nombre'])&&!empty($_POST['estado'])){
        global $pdo;
        
        $nombre=$_REQUEST['nombre'];
        $estado=$_REQUEST['estado'];
        $id=" ";
        //Definir sql
        $sql = "INSERT INTO tienda (id,nombre,estado)VALUES(:id,:nombre,:estado)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":nombre",$nombre);
        $statement->bindParam(":estado",$estado);
        $statement->bindParam(":id",$id);
            
        if($statement->execute()){
            header("Location: ./registro_tienda.php");
        }else {
            print("Error en la consulta");
        }
    }else{
        print("Error");
    }
?>