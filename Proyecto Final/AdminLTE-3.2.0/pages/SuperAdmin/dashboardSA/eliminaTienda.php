<?php
include_once("../PDO/DAO.php");

$id=$_GET['id'];
$dao2=new DAO();
$consulta2="DELETE FROM tienda WHERE id=:idT";
$parametros2=array("idT"=>$id);
$resultados=$dao2->insertarConsulta($consulta2,$parametros2);
if($resultados>=0){
    header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
}else{
    echo "error";
}
?>
