<?php
    try{
        //Creacion de la variable pdo donde se guardara la conexion a la base de datos
        $pdo = new PDO('mysql:host=localhost;dbname=proyecto','admin','2e19c301ddae0c83a59446303955909e093fd240fe36561b');
    }catch(PDOException $e){
        echo 'Error al conectarnos: '.$e->getMessage();
    }
?>