<?php
    require_once './DAO.php';

    function getTiendas(){
        $dao= new DAO;
        $consulta = "SELECT * FROM tienda";
        try{
            $datos=$dao->ejecutarConsulta($consulta);
            if(isset($datos)&&!empty($datos)&&sizeof($datos)>0){
                return $datos;
            }
        }catch(Exception $ex){

        }
    }
?>