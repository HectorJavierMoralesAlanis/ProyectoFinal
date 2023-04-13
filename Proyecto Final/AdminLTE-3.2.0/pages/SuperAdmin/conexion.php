<?php
    try{
        $pdo = new PDO('mysql:host=location;dbname=proyecto','root','2e19c301ddae0c83a59446303955909e093fd240fe36561b');
    }catch(PDOException $e){
        echo 'Error al conectarnos: '.$e->getMessage();
    }
?>