<?php
    include_once('./conexion.php');

    if(!empty($_POST['nombre'])&&!empty($_POST['estado'])){
        global $pdo;
        //Variables para guardar los valoes del nombre y el estado de la tienda
        $nombre=$_REQUEST['nombre'];
        $estado=$_REQUEST['estado'];

        //Definir la consulata
        $sql = "INSERT INTO tienda (nombre,estado)VALUES(:nombre,:estado)";
        $statement = $pdo->prepare($sql);

        //Se agregan a la consulta los valores de las variables
        $statement->bindParam(":nombre",$nombre);
        $statement->bindParam(":estado",$estado);
            
        //Condicional donde si se ejecuta la consulta exitosa te redirecciona al dashboard y guarda los valores si es falsa se manda un mensaje de error
        if($statement->execute()){
            header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
        }else {
            print("Error en la consulta");
        }
    }
?>