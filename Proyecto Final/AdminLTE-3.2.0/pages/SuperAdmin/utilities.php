<?php
    include('./conexion.php');

    function login(){
        global $pdo;

        //Consulta para traer las filas que coincidan
        $consulta="SELECT * FROM usuarios WHERE usuario='$_REQUEST[usuario]' and contrasena='$_REQUEST[contrasena]'";
        
        //Ejecuta la consulta
        $statement=$pdo->prepare($consulta);
        $statement->execute();

        //Cuenta las filas 
        $filas=$statement->rowCount();
        //Si coincide mas de una 
        if($filas>0){
            foreach($statement as $id => $l){
                if($l['tiendaId']==0){
                header("Location: http://64.226.114.50/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
                }else{
                    header("Location: http://64.226.114.50/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/tienda/dashboard.php?id=$l[tiendaId]");
                }
            }
        }else{
            echo "Datos erroneos";
            header("Location: http://64.226.114.50/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/login.php");
        }
    }

    function gettiendas(){
        global $pdo;

        $sql = "SELECT * FROM usuarios";
        $statements=$pdo->prepare($sql);
        $statements->execute();
        $results=$statements->fetchAll();
        return $results;
    }
?>