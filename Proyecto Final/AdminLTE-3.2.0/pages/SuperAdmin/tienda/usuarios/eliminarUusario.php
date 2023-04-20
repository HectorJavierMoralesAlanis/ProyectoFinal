<?php
include_once("../../PDO/DAO.php");
$id=$_GET['id'];
$dao2=new DAO();
$consulta2="DELETE FROM usuarios WHERE tiendaId=:idU";
$parametros2=array("idU"=>$id);

$resultados=$dao->insertarConsulta($consulta2,$parametros2);
if($resultados>=0){
    header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/tienda/usuarios/usuarios2.php?id=$id");
}else{
    echo "error";
}

?>
