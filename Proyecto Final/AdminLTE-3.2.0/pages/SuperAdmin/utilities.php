<?php
    include('./conexion.php');
    //Funcion para el login
    function login($usuario,$contrasena)
    {
        global $pdo;
        $boton = $_REQUEST['boton1'];

        $sql = "SELECT * from usuarios WHERE 'id==1' ";

        $statements = $pdo->prepare($sql);
        
        $statements-> execute();
        $results=$statements->fetchAll();
        $boton=false;
        if($usuario == $results['usuarios']&&$contrasena==$results['contrasena']){
            return $boton=true;
        }else{
            return $boton=false;
        }
    }
?>