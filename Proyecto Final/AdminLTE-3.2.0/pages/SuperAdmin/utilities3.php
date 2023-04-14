<?php
    include_once('./conexion.php');

    global $pdo;
    $sql="SELECT * from tienda";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $tiendas=$statement->fetchAll();
?>