<?php
    try{
        //Creacion de la variable pdo donde se guardara la conexion a la base de datos
        $pdo = new PDO('mysql:host=localhost;dbname=proyecto','admin','51f22d5a340ca74312b5e2e53a6ee3997d024c445932a066');
    }catch(PDOException $e){
        echo 'Error al conectarnos: '.$e->getMessage();
    }
?>