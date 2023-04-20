<?php
include_once("../../PDO/DAO.php");

$id=$_GET['id'];
$dao=new DAO();
$consulta="SELECT * FROM inventario WHERE codigo=:id";
$parametros=array("id"=>$id);
$usuarios=$dao->ejecutarConsulta($consulta,$parametros);
$dao2=new DAO();
$consulta2="DELETE FROM inventario WHERE codigo=:idU AND nombre=:nombre";
foreach($usuarios as $id => $l){
$parametros2=array("idU"=>$id,"nombre"=>$l['nombre']);
}
$resultados=$dao2->insertarConsulta($consulta2,$parametros2);

if($resultados>=0){
    foreach($usuarios as $id => $l){
    header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/tienda/inventario/inventario.php?id=$l[tiendaId]");
    }
}else{
    echo "error";
}

?>
