<?php
    include_once('./conexion.php');

    global $pdo;
    $sql="SELECT * FROM tienda";
    $statement=$pdo->prepare($sql);
    $statement->execute();
?>