<?php
    include_once('./conexion.php');

    if(!empty($_POST['nombre'])&&!empty($_POST['estado'])){
        global $pdo;
        
        $id="1";
        $nombre=$_REQUEST['nombre'];
        $estado=$_REQUEST['estado'];
        //Definir sql
        $sql = "INSERT INTO tienda (id,nombre,estado)VALUES(:id,:nombre,:estado)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindParam(":nombre",$nombre);
        $statement->bindParam(":estado",$estado);
            
        if($statement->execute()){
            header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
        }else {
            print("Error en la consulta");
        }
    }else{
        print("Error");
    }
?>