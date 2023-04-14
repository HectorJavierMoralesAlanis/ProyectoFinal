<?php
    include_once('./conexion.php');

    function getlogin(){
        global $pdo;

        $sql = "SELECT * FROM `tienda`";

        $statements=$pdo->prepare($sql);

        $statements->execute();
        $results=$statements->fetchAll();
        return $results;
    };
?>