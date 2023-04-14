<?php
    include_once('./conexion.php');

    function getTienda(){
        global $pdo;
        $sql="SELECT * from tienda";
        $statement=$pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll();
        return $results;
    }
?>