<?php
    require_once './DAO.php';
    $dao = new DAO();
    $consulta = "SELECT * FROM tienda";

    try{
        $datos=$dao->ejecutarConsulta($consulta);
        if(isset($datos)&&!empty($datos)&&sizeof($datos)>0){
            $tiendas=$datos;
        }
    }catch(Exception $ex){

    }
?>