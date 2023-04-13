<?php
    include('./conexion.php');
    //Funcion para el login
    echo "aux";
    function login($usuario,$contrasena)
    {
        global $pdo;

        $sql = "SELECT * from usuarios WHERE id==1 ";

        $statements = $pdo->prepare($sql);
        
        $statements-> execute();
        $results=$statements->fetchAll();
        echo $results['usuarios'];
        if($usuario == $results['usuarios']&&$contrasena==$results['contrasena']){
            return $results;
        }else{
            return false;
        }
    }
    function getlogin(){
        global $pdo;

        $sql = "SELECT * from usuarios WHERE 'id=1'";

        $statements=$pdo->prepare($sql);

        $statements->execute();
        $results=$statements->fetchAll();
        return $results;
    };
?>